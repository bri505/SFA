<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Symfony\Component\Process\Process;
use Throwable;

class BackupController extends Controller
{
    /**
     * Extensiones permitidas para respaldos.
     */
    private const BACKUP_EXTENSION = '.dump';

    /**
     * Ruta absoluta al directorio de respaldos.
     */
    private function backupDirectory(): string
    {
        return storage_path('app' . DIRECTORY_SEPARATOR . 'backups');
    }

    /**
     * Ruta absoluta al directorio temporal de restauración.
     */
    private function temporaryDirectory(): string
    {
        return $this->backupDirectory() . DIRECTORY_SEPARATOR . 'temp';
    }

    /**
     * Asegura que los directorios existan y sean escribibles.
     */
    private function ensureDirectories(): void
    {
        foreach ([$this->backupDirectory(), $this->temporaryDirectory()] as $dir) {
            if (!File::exists($dir)) {
                File::makeDirectory($dir, 0755, true);
            }
        }
    }

    /**
     * Devuelve el entorno base del sistema con las variables necesarias
     * para que las herramientas de PostgreSQL funcionen correctamente
     * (especialmente en Windows, donde SystemRoot y PATH son críticos).
     */
    private function buildProcessEnvironment(?string $password = null): array
    {
        // getenv() sin argumentos devuelve todas las variables del proceso PHP.
        $environment = getenv();

        if (!is_array($environment)) {
            $environment = [];
        }

        // Fusionar con $_SERVER para capturar variables que a veces no
        // aparecen en getenv() según la SAPI (php-fpm, apache, etc.).
        $environment = array_merge($_SERVER, $environment);

        // Filtrar valores no escalares (array_merge puede traer arrays).
        $environment = array_filter($environment, static function ($value) {
            return is_scalar($value) || $value === null;
        });

        // En Windows, PostgreSQL necesita SystemRoot para SSL/SCRAM.
        if (PHP_OS_FAMILY === 'Windows') {
            $environment['SystemRoot'] = $environment['SystemRoot']
                ?? getenv('SystemRoot')
                ?: 'C:\\Windows';

            $environment['windir'] = $environment['windir']
                ?? $environment['SystemRoot'];

            if (empty($environment['PATH'])) {
                $environment['PATH'] = getenv('PATH') ?: '';
            }
        }

        if ($password !== null && $password !== '') {
            $environment['PGPASSWORD'] = $password;
        }

        // Evitar que psql/pg_dump intenten abrir un editor interactivo.
        $environment['PGCLIENTENCODING'] = 'UTF8';

        return $environment;
    }

    /**
     * Extrae y normaliza los datos de conexión de la BD pgsql.
     */
    private function databaseConfig(): array
    {
        $config = config('database.connections.pgsql', []);

        return [
            'host'     => $config['host'] ?? '127.0.0.1',
            'port'     => (string) ($config['port'] ?? '5432'),
            'database' => $config['database'] ?? 'sfa',
            'username' => $config['username'] ?? 'postgres',
            'password' => (string) ($config['password'] ?? ''),
        ];
    }

    /**
     * Localiza un ejecutable de PostgreSQL.
     *
     * Prioridad:
     *   1. Variable de entorno específica (PG_DUMP_PATH, PG_RESTORE_PATH, PSQL_PATH).
     *   2. Rutas típicas de instalación en Windows.
     *   3. Búsqueda en PATH (where / which).
     */
    private function findPostgresExecutable(string $executable): ?string
    {
        $envKeys = [
            'pg_dump'    => 'PG_DUMP_PATH',
            'pg_restore' => 'PG_RESTORE_PATH',
            'psql'       => 'PSQL_PATH',
        ];

        if (isset($envKeys[$executable])) {
            $configured = env($envKeys[$executable]);
            if ($configured && File::exists($configured)) {
                return $configured;
            }
        }

        if (PHP_OS_FAMILY === 'Windows') {
            $versions = ['18', '17', '16', '15', '14', '13'];
            $bases = [
                'C:\\Program Files\\PostgreSQL\\',
                'C:\\Program Files (x86)\\PostgreSQL\\',
                'D:\\Program Files\\PostgreSQL\\',
            ];

            foreach ($bases as $base) {
                foreach ($versions as $version) {
                    $candidate = $base . $version . '\\bin\\' . $executable . '.exe';
                    if (File::exists($candidate)) {
                        return $candidate;
                    }
                }
            }
        } else {
            $unixPaths = [
                '/usr/bin/' . $executable,
                '/usr/local/bin/' . $executable,
                '/usr/lib/postgresql/16/bin/' . $executable,
                '/usr/lib/postgresql/15/bin/' . $executable,
                '/opt/homebrew/bin/' . $executable,
            ];

            foreach ($unixPaths as $candidate) {
                if (File::exists($candidate)) {
                    return $candidate;
                }
            }
        }

        // Último recurso: buscar en PATH.
        $finder = PHP_OS_FAMILY === 'Windows' ? 'where' : 'which';

        try {
            $process = new Process([$finder, $executable]);
            $process->setTimeout(10);
            $process->run();

            if ($process->isSuccessful()) {
                $lines = preg_split('/\r\n|\r|\n/', trim($process->getOutput()));
                foreach ($lines as $line) {
                    $line = trim($line);
                    if ($line !== '' && File::exists($line)) {
                        return $line;
                    }
                }
            }
        } catch (Throwable $e) {
            Log::warning('No se pudo buscar el ejecutable en PATH', [
                'executable' => $executable,
                'error'      => $e->getMessage(),
            ]);
        }

        return null;
    }

    /**
     * Pantalla principal con la lista de respaldos disponibles.
     */
    public function index()
    {
        $this->ensureDirectories();

        $backups = collect(File::files($this->backupDirectory()))
            ->filter(function ($file) {
                return strtolower($file->getExtension()) === 'dump';
            })
            ->sortByDesc(function ($file) {
                return $file->getMTime();
            })
            ->values();

        return view('backups.index', compact('backups'));
    }

    /**
     * Crear un nuevo respaldo.
     */
    public function store()
    {
        set_time_limit(300);

        $this->ensureDirectories();

        $config = $this->databaseConfig();

        $timestamp = now()->format('Y-m-d_H-i-s');
        $filename  = 'sfa_backup_' . $timestamp . self::BACKUP_EXTENSION;
        $filepath  = $this->backupDirectory() . DIRECTORY_SEPARATOR . $filename;

        $pgDump = $this->findPostgresExecutable('pg_dump');

        if (!$pgDump) {
            return back()->with(
                'error',
                'No se encontró pg_dump de PostgreSQL. Configura PG_DUMP_PATH en el .env o verifica la instalación.'
            );
        }

        Log::info('SFA BACKUP START', [
            'pg_dump'   => $pgDump,
            'host'      => $config['host'],
            'port'      => $config['port'],
            'database'  => $config['database'],
            'user'      => $config['username'],
            'filepath'  => $filepath,
        ]);

        $command = [
            $pgDump,
            '-h', $config['host'],
            '-p', $config['port'],
            '-U', $config['username'],
            '-F', 'c',
            '-f', $filepath,
            $config['database'],
        ];

        $process = new Process($command);
        $process->setEnv($this->buildProcessEnvironment($config['password']));
        $process->setTimeout(300);

        try {
            $process->run();
        } catch (Throwable $e) {
            Log::error('SFA BACKUP EXCEPTION', ['error' => $e->getMessage()]);

            if (File::exists($filepath)) {
                File::delete($filepath);
            }

            return back()->with('error', 'Error ejecutando pg_dump: ' . $e->getMessage());
        }

        Log::info('SFA BACKUP RESULT', [
            'exit_code'  => $process->getExitCode(),
            'successful' => $process->isSuccessful(),
            'error'      => $process->getErrorOutput(),
            'output'     => $process->getOutput(),
            'file'       => File::exists($filepath),
            'size'       => File::exists($filepath) ? File::size($filepath) : 0,
        ]);

        if (!$process->isSuccessful()) {
            $errorOutput = trim($process->getErrorOutput());

            if (File::exists($filepath)) {
                File::delete($filepath);
            }

            return back()->with(
                'error',
                'No se pudo crear el respaldo. Código: ' . $process->getExitCode()
                . ($errorOutput !== ''
                    ? ' | Error: ' . $errorOutput
                    : ' | pg_dump no proporcionó detalles adicionales.')
            );
        }

        if (!File::exists($filepath) || File::size($filepath) === 0) {
            if (File::exists($filepath)) {
                File::delete($filepath);
            }

            return back()->with(
                'error',
                'pg_dump terminó correctamente, pero el archivo de respaldo está vacío o no existe.'
            );
        }

        return back()->with(
            'success',
            'Respaldo creado correctamente: ' . $filename
        );
    }

    /**
     * Descargar un respaldo.
     */
    public function download(string $filename)
    {
        $filename = $this->sanitizeFilename($filename);

        if (!str_ends_with(strtolower($filename), self::BACKUP_EXTENSION)) {
            abort(404);
        }

        $path = $this->backupDirectory() . DIRECTORY_SEPARATOR . $filename;

        if (!File::exists($path)) {
            abort(404);
        }

        return response()->download(
            $path,
            $filename,
            ['Content-Type' => 'application/octet-stream']
        );
    }

    /**
     * Eliminar un respaldo.
     */
    public function destroy(string $filename)
    {
        $filename = $this->sanitizeFilename($filename);

        if (!str_ends_with(strtolower($filename), self::BACKUP_EXTENSION)) {
            abort(404);
        }

        $path = $this->backupDirectory() . DIRECTORY_SEPARATOR . $filename;

        if (!File::exists($path)) {
            return back()->with('error', 'El respaldo no existe.');
        }

        File::delete($path);

        return back()->with('success', 'Respaldo eliminado correctamente.');
    }

    /**
     * Restaurar un respaldo subido.
     *
     * ADVERTENCIA: este proceso borra los objetos existentes de la base
     * de datos (pg_restore --clean).
     */
    public function restore(Request $request)
    {
        set_time_limit(600);

        $request->validate([
            'backup' => [
                'required',
                'file',
                'max:512000',            // 500 MB máximo (en KB)
                'extensions:dump',       // valida por extensión, no por MIME
            ],
        ]);

        $this->ensureDirectories();

        $config = $this->databaseConfig();

        $pgRestore = $this->findPostgresExecutable('pg_restore');

        if (!$pgRestore) {
            return back()->with(
                'error',
                'No se encontró pg_restore. Configura PG_RESTORE_PATH en el .env o verifica la instalación.'
            );
        }

        // Guardar el archivo subido en el directorio temporal.
        $uploaded     = $request->file('backup');
        $tempFilename = 'restore_' . Str::uuid() . self::BACKUP_EXTENSION;
        $tempPath     = $this->temporaryDirectory() . DIRECTORY_SEPARATOR . $tempFilename;

        try {
            $uploaded->move($this->temporaryDirectory(), $tempFilename);
        } catch (Throwable $e) {
            Log::error('SFA RESTORE UPLOAD FAILED', ['error' => $e->getMessage()]);
            return back()->with('error', 'No se pudo guardar el archivo subido: ' . $e->getMessage());
        }

        $environment = $this->buildProcessEnvironment($config['password']);

        // Paso 1: terminar conexiones activas a la base de datos objetivo.
        $this->terminateDatabaseConnections($config, $environment);

        // Paso 2: desconectar a Laravel de la BD antes de restaurar.
        // Esto evita bloqueos propios en la misma base de datos.
        try {
            DB::disconnect('pgsql');
        } catch (Throwable $e) {
            Log::warning('No se pudo desconectar la BD pgsql antes de restaurar', [
                'error' => $e->getMessage(),
            ]);
        }

        // Paso 3: ejecutar pg_restore.
        $command = [
            $pgRestore,
            '--host=' . $config['host'],
            '--port=' . $config['port'],
            '--username=' . $config['username'],
            '--dbname=' . $config['database'],
            '--clean',
            '--if-exists',
            '--no-owner',
            '--no-acl',
            '--single-transaction',
            $tempPath,
        ];

        $process = new Process($command);
        $process->setEnv($environment);
        $process->setTimeout(600);

        try {
            $process->run();
        } catch (Throwable $e) {
            $this->cleanupTempFile($tempPath);
            DB::reconnect('pgsql');

            Log::error('SFA RESTORE EXCEPTION', ['error' => $e->getMessage()]);

            return back()->with(
                'error',
                'Error ejecutando pg_restore: ' . $e->getMessage()
            );
        }

        Log::info('SFA RESTORE RESULT', [
            'exit_code'  => $process->getExitCode(),
            'successful' => $process->isSuccessful(),
            'error'      => $process->getErrorOutput(),
            'output'     => $process->getOutput(),
        ]);

        $this->cleanupTempFile($tempPath);

        // Reconectar Laravel a la BD ya restaurada.
        try {
            DB::reconnect('pgsql');
        } catch (Throwable $e) {
            Log::warning('No se pudo reconectar la BD pgsql tras restaurar', [
                'error' => $e->getMessage(),
            ]);
        }

        if (!$process->isSuccessful()) {
            $error = trim($process->getErrorOutput());

            return back()->with(
                'error',
                'No se pudo restaurar el respaldo: '
                . ($error !== '' ? $error : 'código ' . $process->getExitCode())
            );
        }

        // Limpiar cachés de Laravel tras restaurar.
        try {
            Artisan::call('optimize:clear');
        } catch (Throwable $e) {
            Log::warning('No se pudo limpiar caché tras restaurar', [
                'error' => $e->getMessage(),
            ]);
        }

        return back()->with(
            'success',
            'La base de datos fue restaurada correctamente.'
        );
    }

    /**
     * Endpoint de diagnóstico para verificar que la conexión a PostgreSQL
     * funciona desde el proceso PHP.
     */
    public function testBackup()
    {
        $config = $this->databaseConfig();

        $psql = $this->findPostgresExecutable('psql');

        if (!$psql) {
            return response()->json([
                'successful' => false,
                'error'      => 'No se encontró el ejecutable psql.',
            ], 500);
        }

        $command = [
            $psql,
            '-h', $config['host'],
            '-p', $config['port'],
            '-U', $config['username'],
            '-d', $config['database'],
            '-c', 'SELECT current_database() AS db, current_user AS usr, version() AS version;',
        ];

        $process = new Process($command);
        $process->setEnv($this->buildProcessEnvironment($config['password']));
        $process->setTimeout(30);

        try {
            $process->run();
        } catch (Throwable $e) {
            return response()->json([
                'successful' => false,
                'error'      => $e->getMessage(),
            ], 500);
        }

        return response()->json([
            'psql_path'  => $psql,
            'exit_code'  => $process->getExitCode(),
            'successful' => $process->isSuccessful(),
            'error'      => $process->getErrorOutput(),
            'output'     => $process->getOutput(),
            'php_sapi'   => PHP_SAPI,
            'os'         => PHP_OS_FAMILY,
        ]);
    }

    /* ------------------------------------------------------------------
     |  Helpers privados
     * ------------------------------------------------------------------ */

    /**
     * Termina las conexiones activas a la base de datos indicada.
     */
    private function terminateDatabaseConnections(array $config, array $environment): void
    {
        $psql = $this->findPostgresExecutable('psql');

        if (!$psql) {
            Log::warning('No se encontró psql; no se pudieron terminar conexiones previas.');
            return;
        }

        $dbName = str_replace("'", "''", $config['database']);

        $sql = "SELECT pg_terminate_backend(pid) "
             . "FROM pg_stat_activity "
             . "WHERE datname = '{$dbName}' "
             . "AND pid <> pg_backend_pid();";

        $process = new Process([
            $psql,
            '-h', $config['host'],
            '-p', $config['port'],
            '-U', $config['username'],
            '-d', 'postgres',
            '-c', $sql,
        ]);

        $process->setEnv($environment);
        $process->setTimeout(60);

        try {
            $process->run();

            Log::info('SFA TERMINATE CONNECTIONS', [
                'successful' => $process->isSuccessful(),
                'output'     => $process->getOutput(),
                'error'      => $process->getErrorOutput(),
            ]);
        } catch (Throwable $e) {
            Log::warning('Fallo terminando conexiones activas', [
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Elimina un archivo temporal si existe.
     */
    private function cleanupTempFile(string $path): void
    {
        try {
            if (File::exists($path)) {
                File::delete($path);
            }
        } catch (Throwable $e) {
            Log::warning('No se pudo eliminar el archivo temporal', [
                'path'  => $path,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Normaliza un nombre de archivo evitando path traversal
     * en Windows y Linux.
     */
    private function sanitizeFilename(string $filename): string
    {
        // Reemplazar separadores de Windows por '/' para basename().
        $filename = str_replace('\\', '/', $filename);
        return basename($filename);
    }
}