<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>
        SFA
    </title>

    {{-- PWA: manifest + meta tags --}}
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#111827">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="SFA">
    <link rel="apple-touch-icon" href="/logo.png">
    <link rel="icon" type="image/png" href="/alfonsos-logo.png">

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>


<body>

    {{ $slot }}

    {{-- PWA: registrar service worker --}}
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function () {
                navigator.serviceWorker.register('/sw.js', { scope: '/' })
                    .then(function (reg) {
                        console.log('SW registrado:', reg.scope);
                    })
                    .catch(function (err) {
                        console.error('SW error:', err);
                    });
            });
        }
    </script>

</body>

</html>