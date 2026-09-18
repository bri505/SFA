<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Process;

class BackupController extends Controller
{
    /**
     * Carpeta donde se almacenan los respaldos.
     */
    private function backupPath(): string
    {
        return str_replace(
            '/',
            '\\',
            storage_path('app/backups')
        );
    }

    /**
     * Ruta de pg_dump de PostgreSQL 16.
     */
    private function pgDumpPath(): string
    {
        return 'C:\\Program Files\\PostgreSQL\\16\\bin\\pg_dump.exe';
    }

    /**
     * Mostrar listado de respaldos.
     */
    public function index()
    {
        $path = $this->backupPath();

        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        $backups = collect(File::files($path))
            ->filter(function ($file) {
                return strtolower($file->getExtension()) === 'dump';
            })
            ->sortByDesc(function ($file) {
                return $file->getMTime();
            })
            ->map(function ($file) {
                return [
                    'name' => $file->getFilename(),
                    'size' => $this->formatBytes($file->getSize()),
                    'date' => date('d/m/Y H:i:s', $file->getMTime()),
                ];
            })
            ->values();

        return view('backups.index', compact('backups'));
    }

    /**
     * Crear un nuevo respaldo.
     */
    public function store()
{
    $pgDump = 'C:\\Program Files\\PostgreSQL\\16\\bin\\pg_dump.exe';

    $testPath = storage_path('app/backups/prueba_http.dump');

    if (File::exists($testPath)) {
        File::delete($testPath);
    }

    $password = (string) config('database.connections.pgsql.password');

    $command = '"' . $pgDump . '"'
        . ' --verbose'
        . ' --host=127.0.0.1'
        . ' --port=5432'
        . ' --username=postgres'
        . ' --dbname=sfa'
        . ' --format=custom'
        . ' --file="' . $testPath . '"';

    $process = Process::fromShellCommandline($command);

    $process->setTimeout(300);

    $process->setEnv([
        'PGPASSWORD' => $password,
    ]);

    $process->run();

    dd([
        'command' => $command,
        'password_configured' => !empty($password),
        'password_length' => strlen($password),

        'successful' => $process->isSuccessful(),
        'exit_code' => $process->getExitCode(),

        'output' => $process->getOutput(),
        'error' => $process->getErrorOutput(),

        'file_exists' => File::exists($testPath),
        'file_size' => File::exists($testPath)
            ? File::size($testPath)
            : null,

        'test_path' => $testPath,
    ]);
}
    /**
     * Descargar un respaldo.
     */
    public function download(string $filename)
    {
        $filename = basename($filename);

        $filepath = $this->backupPath() . DIRECTORY_SEPARATOR . $filename;

        if (!File::exists($filepath)) {
            abort(404, 'El respaldo no existe.');
        }

        return response()->download($filepath);
    }

    /**
     * Eliminar un respaldo.
     */
    public function destroy(string $filename)
    {
        $filename = basename($filename);

        $filepath = $this->backupPath() . DIRECTORY_SEPARATOR . $filename;

        if (!File::exists($filepath)) {
            return back()->with(
                'error',
                'El respaldo no existe.'
            );
        }

        File::delete($filepath);

        return back()->with(
            'success',
            "Respaldo eliminado correctamente: {$filename}"
        );
    }

    /**
     * Convertir bytes a una unidad legible.
     */
    private function formatBytes(int $bytes): string
    {
        if ($bytes === 0) {
            return '0 Bytes';
        }

        $units = [
            'Bytes',
            'KB',
            'MB',
            'GB',
            'TB',
        ];

        $i = (int) floor(log($bytes, 1024));

        return round($bytes / (1024 ** $i), 2) . ' ' . $units[$i];
    }
}
