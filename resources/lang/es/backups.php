<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Página de respaldos
    |--------------------------------------------------------------------------
    */

    'title'                 => 'Respaldos',
    'subtitle'              => 'Administra los respaldos de la base de datos del sistema.',

    /*
    |--------------------------------------------------------------------------
    | Acciones principales
    |--------------------------------------------------------------------------
    */

    'create'                => 'Crear respaldo',
    'creating'              => 'Creando respaldo...',
    'diagnostic'            => 'Diagnóstico',

    'download'              => 'Descargar',
    'delete'                => 'Eliminar',

    /*
    |--------------------------------------------------------------------------
    | Restauración
    |--------------------------------------------------------------------------
    */

    'restore_title'         => 'Restaurar respaldo',
    'restore_description'   => 'Restaura la base de datos utilizando un archivo .dump.',
    'restore_button'        => 'Restaurar respaldo',
    'restoring'             => 'Restaurando...',
    'select_file'           => 'Seleccionar respaldo',

    'warning_label'         => 'Advertencia:',
    'restore_warning'       => 'restaurar un respaldo reemplazará los datos actuales de la base de datos. Asegúrate de tener un respaldo reciente antes de continuar.',

    /*
    |--------------------------------------------------------------------------
    | Lista de respaldos
    |--------------------------------------------------------------------------
    */

    'available'             => 'Respaldos disponibles',
    'available_description' => 'Archivos de respaldo almacenados en el sistema.',
    'no_backups'            => 'No hay respaldos disponibles.',

    'column_file'           => 'Archivo',
    'column_date'           => 'Fecha',
    'column_size'           => 'Tamaño',
    'column_actions'        => 'Acciones',

    /*
    |--------------------------------------------------------------------------
    | Confirmaciones y mensajes JS
    |--------------------------------------------------------------------------
    */

    'confirm_delete'        => "¿Eliminar este respaldo?\n\nEsta acción no se puede deshacer.",

    'js_select_file'        => 'Selecciona un archivo de respaldo.',

    'confirm_restore_title'    => 'ADVERTENCIA',
    'confirm_restore_body'     => 'La restauración reemplazará TODOS los datos actuales de la base de datos.',
    'confirm_restore_file'     => 'Archivo seleccionado:',
    'confirm_restore_duration' => "La operación puede tardar varios minutos.\nNO cierres esta ventana hasta que termine.",
    'confirm_restore_question' => '¿Deseas continuar?',

];