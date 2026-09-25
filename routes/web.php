<?php

use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ServiceTypeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\GlobalSearchController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\BackupController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| PÁGINA PRINCIPAL
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});


/*
|--------------------------------------------------------------------------
| CAMBIO DE IDIOMA
|--------------------------------------------------------------------------
*/

Route::get(
    '/language/{locale}',
    [LanguageController::class, 'change']
)->name('language.change');


/*
|--------------------------------------------------------------------------
| USUARIOS AUTENTICADOS
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/dashboard',
        [DashboardController::class, 'index']
    )->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | BÚSQUEDA GLOBAL
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/busqueda-global',
        [GlobalSearchController::class, 'index']
    )->name('search.global');


    /*
    |--------------------------------------------------------------------------
    | DATOS DE BÚSQUEDA GLOBAL
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/busqueda-global/data',
        [GlobalSearchController::class, 'data']
    )->name('global.search.data');


    /*
    |--------------------------------------------------------------------------
    | REGISTROS
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/records',
        [RecordController::class, 'index']
    )->name('records.index');

    Route::get(
        '/records/create',
        [RecordController::class, 'create']
    )->name('records.create');

    Route::post(
        '/records',
        [RecordController::class, 'store']
    )->name('records.store');

    Route::put(
        '/records/{record}',
        [RecordController::class, 'update']
    )->name('records.update');

    Route::delete(
        '/record-images/{image}',
        [RecordController::class, 'destroyImage']
    )->name('record-images.destroy');


    /*
    |--------------------------------------------------------------------------
    | AGREGAR SERVICIO AL REGISTRO
    |--------------------------------------------------------------------------
    */

    Route::post(
        '/records/{record}/services',
        [RecordController::class, 'addService']
    )->name('records.services.add');


    /*
    |--------------------------------------------------------------------------
    | COMPAÑÍAS
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/companies',
        [CompanyController::class, 'index']
    )->name('companies.index');

    Route::get(
        '/companies/create',
        [CompanyController::class, 'create']
    )->name('companies.create');

    Route::post(
        '/companies',
        [CompanyController::class, 'store']
    )->name('companies.store');

    Route::post(
        '/companies/from-record',
        [CompanyController::class, 'storeFromRecord']
    )->name('companies.storeFromRecord');

    Route::get(
        '/companies/{company}/edit',
        [CompanyController::class, 'edit']
    )->name('companies.edit');

    Route::put(
        '/companies/{company}',
        [CompanyController::class, 'update']
    )->name('companies.update');


    /*
    |--------------------------------------------------------------------------
    | REPORTES
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/reports',
        [ReportController::class, 'index']
    )->name('reports.index');


    /*
    |--------------------------------------------------------------------------
    | EXPORTAR REGISTROS FILTRADOS A PDF
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/reports-export/pdf',
        [ReportController::class, 'exportPdf']
    )->name('reports.export.pdf');


    /*
    |--------------------------------------------------------------------------
    | EXPORTAR REGISTROS FILTRADOS A EXCEL
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/reports-export/excel',
        [ReportController::class, 'exportExcel']
    )->name('reports.export.excel');


    /*
    |--------------------------------------------------------------------------
    | PDF DE UN REGISTRO
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/reports/{record}/pdf',
        [ReportController::class, 'recordPdf']
    )->name('reports.record.pdf');


    /*
    |--------------------------------------------------------------------------
    | EXCEL DE UN REGISTRO
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/reports/{record}/excel',
        [ReportController::class, 'recordExcel']
    )->name('reports.record.excel');


    /*
    |--------------------------------------------------------------------------
    | DETALLE DE UN REGISTRO EN REPORTES
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/reports/{record}',
        [ReportController::class, 'show']
    )->name('reports.show');


    /*
    |--------------------------------------------------------------------------
    | PERFIL
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');

    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');

    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');


    /*
    |--------------------------------------------------------------------------
    | SOLO ADMINISTRADOR
    |--------------------------------------------------------------------------
    */

    Route::middleware('admin')->group(function () {


        /*
        |--------------------------------------------------------------------------
        | USUARIOS
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/users',
            [UserController::class, 'index']
        )->name('users.index');

        Route::post(
            '/users',
            [UserController::class, 'store']
        )->name('users.store');

        Route::put(
            '/users/{user}',
            [UserController::class, 'update']
        )->name('users.update');

        Route::delete(
            '/users/{user}',
            [UserController::class, 'destroy']
        )->name('users.destroy');


        /*
        |--------------------------------------------------------------------------
        | SERVICIOS Y PRECIOS
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/service-types',
            [ServiceTypeController::class, 'index']
        )->name('service-types.index');

        Route::post(
            '/service-types',
            [ServiceTypeController::class, 'store']
        )->name('service-types.store');

        Route::put(
            '/service-types/{serviceType}',
            [ServiceTypeController::class, 'update']
        )->name('service-types.update');

        Route::post(
            '/service-types/iva',
            [ServiceTypeController::class, 'saveIva']
        )->name('service-types.save-iva');


        /*
        |--------------------------------------------------------------------------
        | FACTURAS
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/invoices',
            [InvoiceController::class, 'index']
        )->name('invoices.index');

        Route::get(
            '/invoices/create',
            [InvoiceController::class, 'create']
        )->name('invoices.create');

        Route::get(
            '/invoices/records',
            [InvoiceController::class, 'records']
        )->name('invoices.records');

        Route::post(
            '/invoices',
            [InvoiceController::class, 'store']
        )->name('invoices.store');


        /*
        |--------------------------------------------------------------------------
        | PDF DE FACTURA
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/invoices/{invoice}/pdf',
            [InvoiceController::class, 'pdf']
        )->name('invoices.pdf');


        /*
        |--------------------------------------------------------------------------
        | DETALLE DE FACTURA
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/invoices/{invoice}',
            [InvoiceController::class, 'show']
        )->name('invoices.show');


        /*
        |--------------------------------------------------------------------------
        | ESTADO DE PAGO
        |--------------------------------------------------------------------------
        */

        Route::post(
            '/invoices/{invoice}/payment-status',
            [InvoiceController::class, 'updatePaymentStatus']
        )->name('invoices.payment-status');
        Route::post(
            '/invoices/{invoice}/payment-proof',
            [InvoiceController::class, 'updatePaymentProof']
        )->name('invoices.payment-proof');

        Route::post(
            '/invoices/{invoice}/send-reminder',
            [InvoiceController::class, 'sendPaymentReminder']
        )->name('invoices.send-reminder');
        
        Route::post(
            '/invoices/{invoice}/send-payment-received',
            [InvoiceController::class, 'sendPaymentReceived']
        )->name('invoices.send-payment-received');

                /*
        |--------------------------------------------------------------------------
        | RESPALDOS Y RESTAURACIÓN
        |--------------------------------------------------------------------------
        |
        | Solo accesible para administradores. Estas rutas permiten crear,
        | descargar, eliminar y restaurar respaldos completos de la base
        | de datos PostgreSQL.
        |
        */

        Route::middleware('throttle:5,1')->group(function () {

            Route::get(
                '/backups',
                [BackupController::class, 'index']
            )->name('backups.index');

            Route::post(
                '/backups',
                [BackupController::class, 'store']
            )->name('backups.store');

            Route::post(
                '/backups/restore',
                [BackupController::class, 'restore']
            )->name('backups.restore');

            Route::get(
                '/backups/{filename}/download',
                [BackupController::class, 'download']
            )
                ->where('filename', '[A-Za-z0-9_\-]+\.dump')
                ->name('backups.download');

            Route::delete(
                '/backups/{filename}',
                [BackupController::class, 'destroy']
            )
                ->where('filename', '[A-Za-z0-9_\-]+\.dump')
                ->name('backups.destroy');

            Route::get(
                '/backups/test',
                [BackupController::class, 'testBackup']
            )->name('backups.test');
        });

    });


    /*
    |--------------------------------------------------------------------------
    | ACCIONES DE FACTURAS
    |--------------------------------------------------------------------------
    |
    | Estas rutas permanecen disponibles para usuarios autenticados
    | según la lógica actual de los controladores.
    |
    */

    Route::post(
        '/invoices/brokers',
        [InvoiceController::class, 'storeBroker']
    )->name('invoices.brokers.store');

    Route::post(
        '/invoices/consignees',
        [InvoiceController::class, 'storeConsignee']
    )->name('invoices.consignees.store');

    Route::post(
        '/invoices/companies',
        [InvoiceController::class, 'storeCompany']
    )->name('invoices.companies.store');

    Route::get(
        '/invoices/{invoice}/xml',
        [InvoiceController::class, 'xml']
    )->name('invoices.xml');

    Route::post(
        '/invoices/{invoice}/send-email',
        [InvoiceController::class, 'sendEmail']
    )->name('invoices.send-email');

    /*
    |--------------------------------------------------------------------------
    | ENVÍO MASIVO DE FACTURAS
    |--------------------------------------------------------------------------
    */

    Route::post(
        '/invoices/bulk-email',
        [InvoiceController::class, 'bulkEmail']
    )->name('invoices.bulk-email');

    Route::post(
        '/invoices/bulk-email/send',
        [InvoiceController::class, 'sendBulkEmail']
    )->name('invoices.bulk-email.send');

    

});


/*
|--------------------------------------------------------------------------
| AUTENTICACIÓN
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
