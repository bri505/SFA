<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Backup page
    |--------------------------------------------------------------------------
    */

    'title'                 => 'Backups',
    'subtitle'              => 'Manage the system database backups.',

    /*
    |--------------------------------------------------------------------------
    | Main actions
    |--------------------------------------------------------------------------
    */

    'create'                => 'Create backup',
    'creating'              => 'Creating backup...',
    'diagnostic'            => 'Diagnostic',

    'download'              => 'Download',
    'delete'                => 'Delete',

    /*
    |--------------------------------------------------------------------------
    | Restore
    |--------------------------------------------------------------------------
    */

    'restore_title'         => 'Restore backup',
    'restore_description'   => 'Restore the database using a .dump file.',
    'restore_button'        => 'Restore backup',
    'restoring'             => 'Restoring...',
    'select_file'           => 'Select backup',

    'warning_label'         => 'Warning:',
    'restore_warning'       => 'restoring a backup will replace the current database data. Make sure you have a recent backup before continuing.',

    /*
    |--------------------------------------------------------------------------
    | Backups list
    |--------------------------------------------------------------------------
    */

    'available'             => 'Available backups',
    'available_description' => 'Backup files stored in the system.',
    'no_backups'            => 'No backups available.',

    'column_file'           => 'File',
    'column_date'           => 'Date',
    'column_size'           => 'Size',
    'column_actions'        => 'Actions',

    /*
    |--------------------------------------------------------------------------
    | Confirmations and JS messages
    |--------------------------------------------------------------------------
    */

    'confirm_delete'        => "Delete this backup?\n\nThis action cannot be undone.",

    'js_select_file'        => 'Select a backup file.',

    'confirm_restore_title'    => 'WARNING',
    'confirm_restore_body'     => 'Restoring will replace ALL current database data.',
    'confirm_restore_file'     => 'Selected file:',
    'confirm_restore_duration' => "The operation may take several minutes.\nDO NOT close this window until it finishes.",
    'confirm_restore_question' => 'Do you want to continue?',

];