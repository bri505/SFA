<?php

return [

    /*
    |--------------------------------------------------------------------------
    | FACTURAS
    |--------------------------------------------------------------------------
    */

    'title' => 'Facturación',
    'subtitle' => 'Control de facturas y pagos',
    'new_invoice' => 'Nueva factura',

    /*
    |--------------------------------------------------------------------------
    | BOTONES
    |--------------------------------------------------------------------------
    */

    'pdf_button' => 'PDF',

    /*
    |--------------------------------------------------------------------------
    | ESTADOS DE PAGO
    |--------------------------------------------------------------------------
    */

    'payment_status' => [

        'pending' => 'Por pagar',

        'in_process' => 'En trámite',

        'paid' => 'Pagadas',

        'cancelled' => 'Canceladas',

    ],

    /*
    |--------------------------------------------------------------------------
    | RESUMEN FINANCIERO
    |--------------------------------------------------------------------------
    */

    'financial' => [

        'pending_collection' => 'Pendiente de cobro',

        'total_collected' => 'Total cobrado',

        'total_invoiced' => 'Total facturado',

    ],

    /*
    |--------------------------------------------------------------------------
    | FILTROS
    |--------------------------------------------------------------------------
    */

    'filters' => [

        'all' => 'Todas',

    ],

    /*
    |--------------------------------------------------------------------------
    | TABLA
    |--------------------------------------------------------------------------
    */

    'table' => [

        'title' => 'Facturas',

        'invoice' => 'Factura',

        'company' => 'Empresa',

        'period' => 'Periodo',

        'subtotal' => 'Subtotal',

        'tax' => 'IVA',

        'total' => 'Total',

        'payment_status' => 'Estado de pago',

        'generated_by' => 'Generada por',

        'actions' => 'Acciones',

    ],

    /*
    |--------------------------------------------------------------------------
    | ACCIONES
    |--------------------------------------------------------------------------
    */

    'actions' => [

        'view' => 'Ver',

    ],

    /*
    |--------------------------------------------------------------------------
    | MENSAJES
    |--------------------------------------------------------------------------
    */

    'no_invoices' => 'No hay facturas registradas.',

    /*
    |--------------------------------------------------------------------------
    | FACTURA
    |--------------------------------------------------------------------------
    */

    'invoice' => 'Factura',

    'invoices' => 'Facturas',

    'detail' => 'Detalle de factura',

    'invoice_information' => 'Información de factura',

    'invoice_number' => 'Número de factura',

    'company' => 'Empresa',

    'client' => 'Cliente',

    'period' => 'Periodo',

    'billing_period' => 'Periodo de facturación',

    'generated_by' => 'Generada por',

    'generated_at' => 'Generada el',

    'status' => 'Estado',

    'current_status' => 'Estado actual',

    'payment_status_label' => 'Estado de pago',

    'generated' => 'Generada',

    /*
    |--------------------------------------------------------------------------
    | REGISTROS
    |--------------------------------------------------------------------------
    */

    'included_records' => 'Registros incluidos',

    'records' => 'Registros',

    'record' => 'Registro',

    'date' => 'Fecha',

    'invoice_field' => 'Invoice',

    'paps' => 'PAPS',

    'services' => 'Servicios',

    'service' => 'Servicio',

    'amount' => 'Importe',

    'subtotal' => 'Subtotal',

    'no_records' => 'No existen registros.',

    'no_services' => 'Sin servicios registrados.',

    /*
    |--------------------------------------------------------------------------
    | CARGOS
    |--------------------------------------------------------------------------
    */

    'additional_charge' => 'Cargo adicional',

    'shipping' => 'Shipping',

    'handling' => 'Handling',

    'shipping_handling' => 'Shipping & Handling',

    /*
    |--------------------------------------------------------------------------
    | TOTALES
    |--------------------------------------------------------------------------
    */

    'records_subtotal' => 'Subtotal de registros',

    'tax_rate' => 'Tasa de impuesto',

    'tax' => 'Impuesto',

    'total' => 'Total',

    /*
    |--------------------------------------------------------------------------
    | ACCIONES GENERALES
    |--------------------------------------------------------------------------
    */

    'back' => '← Facturas',

    'save_status' => 'Guardar estado',

    /*
    |--------------------------------------------------------------------------
    | MENSAJES GENERALES
    |--------------------------------------------------------------------------
    */

    'no_billing_company' => 'No se especificó una empresa de facturación.',

    'no_data' => '—',

    /*
    |--------------------------------------------------------------------------
    | CREAR FACTURA
    |--------------------------------------------------------------------------
    */

    'create' => [

        'title' => 'Generar factura',

        'subtitle' => 'Selecciona los registros y configura la información de facturación.',

        'configuration' => 'Configuración de factura',

        'billing_company' => 'Empresa encargada',

        'select_company' => 'Seleccionar empresa',

        'add_company' => 'Agregar empresa',

        'broker' => 'Broker',

        'without_broker' => 'Sin broker',

        'add_broker' => 'Agregar broker',

        'consignee' => 'Consignatario',

        'without_consignee' => 'Sin consignatario',

        'add_consignee' => 'Agregar consignatario',

        'billing_type' => 'Tipo de facturación',

        'single_company' => 'Una empresa',

        'multiple_companies' => 'Varias empresas',

        'record_company' => 'Empresa de los registros',

        'record_companies' => 'Empresas de los registros',

        'period_start' => 'Periodo inicial',

        'period_end' => 'Periodo final',

        /*
        |--------------------------------------------------------------------------
        | OPCIONES
        |--------------------------------------------------------------------------
        */

        'invoice_options' => 'Opciones de factura',

        'apply_tax' => 'Aplicar impuesto',

        'shipping_handling' => 'Shipping / Handling',

        'percent' => '%',

        /*
        |--------------------------------------------------------------------------
        | BÚSQUEDA DE REGISTROS
        |--------------------------------------------------------------------------
        */

        'search_records' => 'Buscar registros',

        'available_records' => 'Registros disponibles',

        'select_company_period' => 'Selecciona una empresa y un periodo para buscar registros.',

        /*
        |--------------------------------------------------------------------------
        | TABLA DE REGISTROS
        |--------------------------------------------------------------------------
        */

        'table' => [

            'date' => 'Fecha',

            'company' => 'Empresa',

            'invoice_number' => 'Número de factura',

            'paps' => 'PAPS',

            'fact' => 'FACT',

            'origin' => 'Entrada',

            'destination' => 'Salida',

            'services' => 'Servicios',

            'billing_invoice' => 'Número de facturación',

            'billing_paps' => 'PAPS facturación',

            'pallets' => 'Pallets',

            'additional_charge' => 'Cargo adicional',

            'amount' => 'Importe',

        ],

        /*
        |--------------------------------------------------------------------------
        | RESUMEN
        |--------------------------------------------------------------------------
        */

        'summary' => 'Resumen',

        'selected_records' => 'Registros seleccionados',

        'subtotal' => 'Subtotal',

        'tax' => 'Impuesto',

        'total' => 'Total',

        /*
        |--------------------------------------------------------------------------
        | COMENTARIOS
        |--------------------------------------------------------------------------
        */

        'comments' => 'Comentarios',

        'comments_placeholder' => 'Comentarios adicionales para la factura...',

        /*
        |--------------------------------------------------------------------------
        | ACCIONES
        |--------------------------------------------------------------------------
        */

        'cancel' => 'Cancelar',

        'generate_invoice' => 'Generar factura',

        /*
        |--------------------------------------------------------------------------
        | MODAL NUEVA EMPRESA
        |--------------------------------------------------------------------------
        */

        'company_modal' => [

            'title' => 'Nueva empresa',

            'name' => 'Nombre',

            'code' => 'Código',

            'tax_id' => 'Tax ID',

            'save' => 'Guardar empresa',

        ],

        /*
        |--------------------------------------------------------------------------
        | MODAL NUEVO BROKER
        |--------------------------------------------------------------------------
        */

        'broker_modal' => [

            'title' => 'Nuevo broker',

            'name' => 'Nombre',

            'save' => 'Guardar broker',

        ],

        /*
        |--------------------------------------------------------------------------
        | MODAL NUEVO CONSIGNATARIO
        |--------------------------------------------------------------------------
        */

        'consignee_modal' => [

            'title' => 'Nuevo consignatario',

            'name' => 'Nombre',

            'save' => 'Guardar consignatario',

        ],

        /*
        |--------------------------------------------------------------------------
        | JAVASCRIPT
        |--------------------------------------------------------------------------
        */

        'js' => [

            'company_create_error' =>
                'No fue posible crear la empresa.',

            'company_create_exception' =>
                'Ocurrió un error al crear la empresa.',

            'broker_create_error' =>
                'No fue posible crear el broker.',

            'broker_create_exception' =>
                'Ocurrió un error al crear el broker.',

            'consignee_create_error' =>
                'No fue posible crear el consignatario.',

            'consignee_create_exception' =>
                'Ocurrió un error al crear el consignatario.',

            'select_company' =>
                'Selecciona al menos una empresa para buscar los registros.',

            'select_period' =>
                'Selecciona el periodo de la factura.',

            'searching_records' =>
                'Buscando registros...',

            'get_records_error' =>
                'No fue posible obtener los registros.',

            'no_records_found' =>
                'No se encontraron registros en el periodo seleccionado.',

            'service' =>
                'Servicio',

            'no_services' =>
                'Sin servicios',

            'services_label' =>
                'Servicios:',

            'additional_charge' =>
                'Cargo adicional',

            'select_record' =>
                'Selecciona al menos un registro para generar la factura.',

            'generating' =>
                'Generando...',

        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | PDF
    |--------------------------------------------------------------------------
    */

    'pdf' => [

        'invoice' => 'FACTURA',

        'invoice_date' => 'FECHA DE FACTURA:',

        'receiving_date' => 'FECHA DE RECEPCIÓN:',

        'invoice_number' => 'FACTURA #',

        'bill_to' => 'Facturar a',

        'invoice_information' => 'Información de factura',

        'period' => 'Periodo:',

        'generated_by' => 'Generada por:',

        'billing_period' => 'Periodo de facturación:',

        'date' => 'Fecha',

        'company' => 'Empresa',

        'invoice' => 'Factura',

        'paps' => 'PAPS',

        'services' => 'Servicios',

        'comments' => 'Comentarios',

        'amount' => 'Importe',

        'service' => 'Servicio',

        'additional_charge' => 'Cargo adicional',

        'no_records' => 'No hay registros disponibles.',

        'no_service' => '—',

        'notes' => 'Notas',

        'records_subtotal' => 'Subtotal de registros',

        'shipping' => 'Shipping',

        'handling' => 'Handling',

        'tax_rate' => 'Tasa de impuesto',

        'total' => 'TOTAL',

        'phone' => 'Teléfono:',

        'tax_id' => 'Tax ID:',

        'invoice_footer' => 'Factura',

    ],

    'send_email' => 'Enviar por correo',
'send_invoice' => 'Enviar factura por correo',
'email_subject' => 'Título del correo',
'default_email_subject' => 'Factura :invoice - SFA',
'recipients' => 'Destinatarios',
'no_company_emails' => 'Esta empresa no tiene correos registrados.',
'documents_to_send' => 'Documentos a enviar',
'pdf_document' => 'Documento PDF de la factura',
'xml_document' => 'Documento XML de la factura',

];
