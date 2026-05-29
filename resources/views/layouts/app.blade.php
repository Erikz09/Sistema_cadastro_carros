<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AutoGest — {{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background: #0a0f1e !important;
            color: #cbd5e1 !important;
        }
        #stars { position: fixed; inset: 0; z-index: 0; pointer-events: none; }
        .star {
            position: absolute;
            border-radius: 50%;
            background: #fff;
            animation: twinkle 3s infinite alternate;
        }
        @keyframes twinkle {
            from { opacity: 0.1; }
            to   { opacity: 0.6; }
        }
        .app-wrapper {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        /* Page header */
        .page-header {
            background: #111827;
            border-bottom: 1px solid #1f2d4a;
            padding: 20px 32px;
        }
        .page-header h2 {
            font-family: Georgia, serif;
            font-size: 20px;
            color: #fff;
            font-weight: 600;
        }
        /* Content area */
        .page-content {
            flex: 1;
            padding: 32px;
        }
        /* Cards */
        .bg-white {
            background: #111827 !important;
            border: 1px solid #1f2d4a !important;
            color: #cbd5e1 !important;
        }
        /* Inputs */
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            background: #0a0f1e !important;
            border-color: #1f2d4a !important;
            color: #fff !important;
        }
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #e94560 !important;
            box-shadow: 0 0 0 2px rgba(233,69,96,0.2) !important;
        }
        label {
            color: #8892b0 !important;
            font-size: 11px !important;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        /* Textos gerais */
        p, span, div { color: inherit; }
        .text-gray-600, .text-gray-700, .text-gray-800, .text-gray-900 {
            color: #8892b0 !important;
        }
        .text-gray-400, .text-gray-500 { color: #4a5568 !important; }
        /* Botões */
        button[type="submit"] {
            background: #e94560 !important;
            border-color: #e94560 !important;
            color: #fff !important;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            font-size: 12px;
        }
        button[type="submit"]:hover { background: #c73652 !important; }
        /* Botão de perigo */
        .btn-danger-dark {
            background: transparent !important;
            border: 1px solid #e94560 !important;
            color: #e94560 !important;
            font-size: 12px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .btn-danger-dark:hover {
            background: rgba(233,69,96,0.1) !important;
        }
        /* Separadores */
        .border-t, .border-b { border-color: #1f2d4a !important; }
        /* Seção de perigo */
        .bg-red-50 { background: #2d1b1b !important; }
        .text-red-800 { color: #f87171 !important; }
        .text-red-600 { color: #e94560 !important; }
        /* Modal */
        .bg-white.rounded-lg {
            background: #111827 !important;
            border: 1px solid #1f2d4a !important;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div id="stars"></div>

    <div class="app-wrapper">
        @include('layouts.navigation')

        @if (isset($header))
            <div class="page-header">
                {{ $header }}
            </div>
        @endif

        <main class="page-content">
            {{ $slot }}
        </main>
    </div>

    <script>
        const container = document.getElementById('stars');
        for (let i = 0; i < 60; i++) {
            const s = document.createElement('div');
            s.className = 'star';
            const size = Math.random() * 2 + 0.5;
            s.style.cssText = `
                width:${size}px; height:${size}px;
                top:${Math.random()*100}%;
                left:${Math.random()*100}%;
                animation-delay:${Math.random()*4}s;
                animation-duration:${2+Math.random()*3}s
            `;
            container.appendChild(s);
        }
    </script>
</body>
</html>