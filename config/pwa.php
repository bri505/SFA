<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Botón de instalación flotante
    |--------------------------------------------------------------------------
    |
    | Muestra un botón flotante en la esquina inferior de la pantalla para
    | que el usuario pueda instalar la PWA sin tener que buscar el menú
    | del navegador.
    |
    */
    'install-button' => true,


    /*
    |--------------------------------------------------------------------------
    | Manifest
    |--------------------------------------------------------------------------
    */
    'manifest' => [
        'name'             => 'SFA - Sistema para Facturas Americanas',
        'short_name'       => 'SFA',
        'description'      => 'Sistema administrativo para gestión de registros, compañías y facturas americanas.',
        'start_url'        => '/',
        'scope'            => '/',
        'display'          => 'standalone',
        'orientation'      => 'any',
        'background_color' => '#f5f6f8',
        'theme_color'      => '#111827',
        'lang'             => 'es',

        'icons' => [
            [
                'src'     => 'logo-192.png',
                'sizes'   => '192x192',
                'type'    => 'image/png',
                'purpose' => 'any',
            ],
            [
                'src'     => 'logo-512.png',
                'sizes'   => '512x512',
                'type'    => 'image/png',
                'purpose' => 'any maskable',
            ],
        ],
    ],


    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Déjalo en false si no usas Livewire en el proyecto.
    |
    */
    'livewire-app' => false,

];