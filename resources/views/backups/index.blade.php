<x-app-layout>

    <style>
        .backup-page {
            padding: 28px 20px;
        }

        .backup-container {
            max-width: 1100px;
            margin: 0 auto;
        }

        .backup-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }

        .backup-title {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
            color: #111827;
        }

        .backup-subtitle {
            margin: 5px 0 0;
            font-size: 13px;
            color: #6b7280;
        }

        .backup-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .backup-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 0;
            border-radius: 7px;
            padding: 10px 16px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: opacity .15s, transform .15s;
        }

        .backup-button:hover {
            opacity: .9;
        }

        .backup-button:active {
            transform: translateY(1px);
        }

        .backup-button:disabled {
            opacity: .6;
            cursor: not-allowed;
        }

        .backup-button-primary {
            background: #111827;
            color: white;
        }

        .backup-button-secondary {
            background: #e5e7eb;
            color: #111827;
        }

        .backup-button-danger {
            background: #dc2626;
            color: white;
        }

        .backup-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .04);
            margin-bottom: 20px;
        }

        .backup-card-header {
            padding: 16px 18px;
            border-bottom: 1px solid #e5e7eb;
        }

        .backup-card-title {
            margin: 0;
            font-size: 15px;
            font-weight: 700;
            color: #111827;
        }

        .backup-card-description {
            margin: 4px 0 0;
            font-size: 12px;
            color: #6b7280;
        }

        .backup-table-wrapper {
            overflow-x: auto;
        }

        .backup-table {
            width: 100%;
            border-collapse: collapse;
        }

        .backup-table th {
            background: #f9fafb;
            padding: 11px 14px;
            text-align: left;
            font-size: 11px;
            font-weight: 700;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: .03em;
            white-space: nowrap;
        }

        .backup-table td {
            padding: 13px 14px;
            border-top: 1px solid #f0f0f0;
            font-size: 12px;
            color: #374151;
            vertical-align: middle;
        }

        .backup-filename {
            font-weight: 600;
            color: #111827;
            word-break: break-word;
        }

        .backup-actions-cell {
            display: flex;
            gap: 7px;
            align-items: center;
            flex-wrap: wrap;
        }

        .backup-small-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 0;
            border-radius: 6px;
            padding: 7px 10px;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
        }

        .backup-download {
            background: #e5e7eb;
            color: #111827;
        }

        .backup-delete {
            background: #fee2e2;
            color: #991b1b;
        }

        .backup-empty {
            padding: 35px 20px;
            text-align: center;
            color: #6b7280;
            font-size: 13px;
        }

        .backup-alert {
            margin-bottom: 18px;
            padding: 12px 15px;
            border-radius: 7px;
            font-size: 13px;
        }

        .backup-alert-success {
            background: #dcfce7;
            border: 1px solid #bbf7d0;
            color: #166534;
        }

        .backup-alert-error {
            background: #fee2e2;
            border: 1px solid #fecaca;
            color: #991b1b;
        }

        .restore-box {
            padding: 18px;
        }

        .restore-warning {
            margin-bottom: 16px;
            padding: 13px 15px;
            background: #fffbeb;
            border: 1px solid #fde68a;
            border-radius: 7px;
            color: #92400e;
            font-size: 12px;
            line-height: 1.5;
        }

        .restore-form {
            display: flex;
            align-items: flex-end;
            gap: 12px;
            flex-wrap: wrap;
        }

        .restore-field {
            flex: 1;
            min-width: 260px;
        }

        .restore-label {
            display: block;
            margin-bottom: 6px;
            font-size: 12px;
            font-weight: 600;
            color: #374151;
        }

        .restore-input {
            width: 100%;
            padding: 9px 10px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            background: white;
            font-size: 12px;
            color: #374151;
        }

        .restore-input:focus {
            outline: none;
            border-color: #6b7280;
            box-shadow: 0 0 0 2px rgba(107, 114, 128, .1);
        }

        .restore-button {
            white-space: nowrap;
        }

        @media (max-width: 700px) {
            .backup-page {
                padding: 20px 12px;
            }

            .backup-header {
                align-items: flex-start;
            }

            .backup-actions {
                width: 100%;
            }

            .backup-actions .backup-button {
                flex: 1;
            }

            .restore-form {
                display: block;
            }

            .restore-field {
                margin-bottom: 10px;
            }

            .restore-button {
                width: 100%;
            }
        }
    </style>

    <div class="backup-page">
        <div class="backup-container">

            {{-- ============================================================
                 ENCABEZADO
            ============================================================= --}}

            <div class="backup-header">

                <div>
                    <h1 class="backup-title">
                        {{ __('backups.title') }}
                    </h1>

                    <p class="backup-subtitle">
                        {{ __('backups.subtitle') }}
                    </p>
                </div>

                <div class="backup-actions">

                    {{-- Botón de diagnóstico: abre el endpoint testBackup --}}
                    <a
                        href="{{ route('backups.test') }}"
                        target="_blank"
                        rel="noopener"
                        class="backup-button backup-button-secondary"
                    >
                        {{ __('backups.diagnostic') }}
                    </a>

                    <form
                        method="POST"
                        action="{{ route('backups.store') }}"
                        id="createBackupForm"
                    >
                        @csrf

                        <button
                            type="submit"
                            class="backup-button backup-button-primary"
                            id="createBackupButton"
                            data-loading-text="{{ __('backups.creating') }}"
                        >
                            {{ __('backups.create') }}
                        </button>
                    </form>

                </div>

            </div>


            {{-- ============================================================
                 MENSAJES
            ============================================================= --}}

            @if(session('success'))
                <div class="backup-alert backup-alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="backup-alert backup-alert-error">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="backup-alert backup-alert-error">
                    {{ $errors->first() }}
                </div>
            @endif


            {{-- ============================================================
                 RESTAURAR RESPALDO
            ============================================================= --}}

            <div class="backup-card">

                <div class="backup-card-header">

                    <h2 class="backup-card-title">
                        {{ __('backups.restore_title') }}
                    </h2>

                    <p class="backup-card-description">
                        {{ __('backups.restore_description') }}
                    </p>

                </div>

                <div class="restore-box">

                    <div class="restore-warning">
                        <strong>{{ __('backups.warning_label') }}</strong>
                        {{ __('backups.restore_warning') }}
                    </div>

                    <form
                        method="POST"
                        action="{{ route('backups.restore') }}"
                        enctype="multipart/form-data"
                        id="restoreBackupForm"
                        class="restore-form"
                    >
                        @csrf

                        <div class="restore-field">

                            <label
                                for="backup"
                                class="restore-label"
                            >
                                {{ __('backups.select_file') }}
                            </label>

                            <input
                                type="file"
                                name="backup"
                                id="backup"
                                class="restore-input"
                                accept=".dump,application/octet-stream"
                                required
                            >

                        </div>

                        <button
                            type="submit"
                            class="backup-button backup-button-danger restore-button"
                            id="restoreBackupButton"
                            data-loading-text="{{ __('backups.restoring') }}"
                        >
                            {{ __('backups.restore_button') }}
                        </button>

                    </form>

                </div>

            </div>


            {{-- ============================================================
                 LISTA DE RESPALDOS
            ============================================================= --}}

            <div class="backup-card">

                <div class="backup-card-header">

                    <h2 class="backup-card-title">
                        {{ __('backups.available') }}
                    </h2>

                    <p class="backup-card-description">
                        {{ __('backups.available_description') }}
                    </p>

                </div>

                @if($backups->isEmpty())

                    <div class="backup-empty">
                        {{ __('backups.no_backups') }}
                    </div>

                @else

                    <div class="backup-table-wrapper">

                        <table class="backup-table">

                            <thead>
                                <tr>
                                    <th>
                                        {{ __('backups.column_file') }}
                                    </th>

                                    <th>
                                        {{ __('backups.column_date') }}
                                    </th>

                                    <th>
                                        {{ __('backups.column_size') }}
                                    </th>

                                    <th>
                                        {{ __('backups.column_actions') }}
                                    </th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($backups as $backup)

                                    @php
                                        /*
                                         * Formatear el tamaño del archivo
                                         * de forma legible: B / KB / MB / GB.
                                         */
                                        $bytes = $backup->getSize();

                                        if ($bytes < 1024) {
                                            $sizeLabel = $bytes . ' B';
                                        } elseif ($bytes < 1048576) {
                                            $sizeLabel = number_format($bytes / 1024, 2) . ' KB';
                                        } elseif ($bytes < 1073741824) {
                                            $sizeLabel = number_format($bytes / 1048576, 2) . ' MB';
                                        } else {
                                            $sizeLabel = number_format($bytes / 1073741824, 2) . ' GB';
                                        }
                                    @endphp

                                    <tr>

                                        <td>
                                            <div class="backup-filename">
                                                {{ $backup->getFilename() }}
                                            </div>
                                        </td>

                                        <td>
                                            {{ \Illuminate\Support\Carbon::createFromTimestamp(
                                                $backup->getMTime()
                                            )->format('d/m/Y H:i:s') }}
                                        </td>

                                        <td>
                                            {{ $sizeLabel }}
                                        </td>

                                        <td>

                                            <div class="backup-actions-cell">

                                                <a
                                                    href="{{ route(
                                                        'backups.download',
                                                        $backup->getFilename()
                                                    ) }}"
                                                    class="backup-small-button backup-download"
                                                >
                                                    {{ __('backups.download') }}
                                                </a>

                                                <form
                                                    method="POST"
                                                    action="{{ route(
                                                        'backups.destroy',
                                                        $backup->getFilename()
                                                    ) }}"
                                                    class="delete-backup-form"
                                                    data-confirm="{{ __('backups.confirm_delete') }}"
                                                >
                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="backup-small-button backup-delete"
                                                    >
                                                        {{ __('backups.delete') }}
                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @endif

            </div>

        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {

            /*
            |--------------------------------------------------------------------------
            | TEXTOS TRADUCIDOS PARA EL JS
            |--------------------------------------------------------------------------
            */

            const i18n = {
                creating:         @json(__('backups.creating')),
                restoring:        @json(__('backups.restoring')),
                selectFile:       @json(__('backups.js_select_file')),
                confirmDelete:    @json(__('backups.confirm_delete')),
                confirmRestoreTitle: @json(__('backups.confirm_restore_title')),
                confirmRestoreBody:  @json(__('backups.confirm_restore_body')),
                confirmRestoreFile:  @json(__('backups.confirm_restore_file')),
                confirmRestoreDuration: @json(__('backups.confirm_restore_duration')),
                confirmRestoreQuestion: @json(__('backups.confirm_restore_question')),
            };


            /*
            |--------------------------------------------------------------------------
            | CREAR RESPALDO
            |--------------------------------------------------------------------------
            */

            const createBackupForm =
                document.getElementById('createBackupForm');

            const createBackupButton =
                document.getElementById('createBackupButton');

            if (createBackupForm && createBackupButton) {

                createBackupForm.addEventListener('submit', function () {

                    createBackupButton.disabled = true;

                    createBackupButton.textContent = i18n.creating;

                });

            }


            /*
            |--------------------------------------------------------------------------
            | ELIMINAR RESPALDO
            |--------------------------------------------------------------------------
            */

            document
                .querySelectorAll('.delete-backup-form')
                .forEach(function (form) {

                    form.addEventListener('submit', function (event) {

                        const message =
                            form.dataset.confirm || i18n.confirmDelete;

                        const confirmed = confirm(message);

                        if (!confirmed) {
                            event.preventDefault();
                        }

                    });

                });


            /*
            |--------------------------------------------------------------------------
            | RESTAURAR RESPALDO
            |--------------------------------------------------------------------------
            */

            const restoreBackupForm =
                document.getElementById('restoreBackupForm');

            const restoreBackupButton =
                document.getElementById('restoreBackupButton');

            const backupInput =
                document.getElementById('backup');

            if (restoreBackupForm) {

                restoreBackupForm.addEventListener(
                    'submit',
                    function (event) {

                        if (!backupInput || !backupInput.files.length) {

                            event.preventDefault();

                            alert(i18n.selectFile);

                            return;
                        }

                        const filename =
                            backupInput.files[0].name;

                        const confirmed = confirm(
                            i18n.confirmRestoreTitle + '\n\n' +
                            i18n.confirmRestoreBody + '\n\n' +
                            i18n.confirmRestoreFile + '\n' +
                            filename + '\n\n' +
                            i18n.confirmRestoreDuration + '\n\n' +
                            i18n.confirmRestoreQuestion
                        );

                        if (!confirmed) {

                            event.preventDefault();

                            return;
                        }

                        if (restoreBackupButton) {

                            restoreBackupButton.disabled = true;

                            restoreBackupButton.textContent =
                                i18n.restoring;

                        }

                    }
                );

            }

        });
    </script>

</x-app-layout>