<?php

return [

    'title' => 'Reportes',

    'subtitle' =>
        'Consulta y analiza los registros almacenados en SFA.',

    'filters' => [

        'search' => 'Búsqueda',

        'search_placeholder' =>
            'ID, número de factura, PAPS, cliente, chofer...',

        'company' => 'Cliente',

        'driver' => 'Chofer',

        'from' => 'Desde',

        'to' => 'Hasta',

        'filter' => 'Filtrar',

        'quantity_type' => 'Tipo de cantidad',

        'all' => 'Todos',

        'clear' => 'Limpiar filtros',

    ],

    'quantity_types' => [

        'palets' => 'Palets',

        'containers' => 'Contenedores',

        'pieces' => 'Piezas',

    ],

    'summary' => [

        'records_found' => 'Registros encontrados',

        'total_quantity' => 'Cantidad total',

        'registered_services' => 'Servicios registrados',

    ],

    'results' => [

        'title' => 'Registros',

        'record' => 'registro',

        'records' => 'registros',

        'no_records' =>
            'No encontramos registros con los filtros seleccionados.',

    ],

    'export' => [

        'pdf' => 'Exportar PDF',

        'excel' => 'Exportar Excel',

    ],

    'table' => [

        'record' => 'Registro',

        'date' => 'Fecha',

        'company' => 'Cliente',

        'invoice_number' => 'Número de factura',

        'paps' => 'PAPS',

        'driver' => 'Chofer',

        'trailer' => 'Remolque',

        'shipper' => 'Transportista',

        'consignee' => 'Consignatario',

        'broker' => 'Agente comercial',

        'origin' => 'Origen',

        'destination' => 'Destino',

        'quantity' => 'Cantidad',

    ],

    'modal' => [

        'detail' => 'Detalle del registro',

        'record' => 'Registro',

        'loading' => 'Cargando información...',

        'record_information' => 'Información del registro',

        'transport_participants' =>
            'Transporte y participantes',

        'services' => 'Servicios',

        'no_services' =>
            'No hay servicios registrados.',

        'notes' => 'Notas',

        'no_notes' => 'Sin notas.',

        'tracking' => 'Registro y seguimiento',

    ],

    'fields' => [

        'record' => 'Registro',

        'date' => 'Fecha',

        'invoice_number' => 'Número de factura',

        'paps' => 'PAPS',

        'origin' => 'Origen',

        'destination' => 'Destino',

        'quantity' => 'Cantidad',

        'company' => 'Cliente',

        'driver' => 'Chofer',

        'trailer' => 'Remolque',

        'shipper' => 'Transportista',

        'consignee' => 'Consignatario',

        'broker' => 'Agente comercial',

        'registered_by' => 'Registrado por',

    ],

    'services' => [

        'service' => 'Servicio',

        'quantity' => 'Cantidad',

        'price' => 'Precio',

        'subtotal' => 'Subtotal',

    ],

    'errors' => [

        'load_record' =>
            'No se pudo cargar el registro.',

        'invalid_record' =>
            'El registro no contiene información.',

        'load_information' =>
            'No se pudo cargar la información del registro.',

    ],

];
