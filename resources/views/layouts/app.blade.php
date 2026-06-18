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
        .page-content {
            flex: 1;
            padding: 32px;
        }
        .bg-white {
            background: #111827 !important;
            border: 1px solid #1f2d4a !important;
            color: #cbd5e1 !important;
        }
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
            border-color: #4d70b8 !important;
            box-shadow: 0 0 0 2px rgba(77, 112, 184, 0.2) !important;
        }
        label {
            color: #4d70b8 !important;
            font-size: 11px !important;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        p, span, div { color: inherit; }
        .text-gray-600, .text-gray-700, .text-gray-800, .text-gray-900 {
            color: #ffffff !important;
        }
        .text-gray-400, .text-gray-500 { color: #4a5568 !important; }
        button[type="submit"] {
            background: #4d70b8 !important;
            border-color: #4d70b8 !important;
            color: #fff !important;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            font-size: 12px;
            transition: all 0.2s ease;
        }
        button[type="submit"]:hover { 
            background: #3b5894 !important;
            border-color: #3b5894 !important;
        }
        .btn-danger-dark {
            background: transparent !important;
            border: 1px solid #dc3545 !important;
            color: #dc3545 !important;
            font-size: 12px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .btn-danger-dark:hover {
            background: rgba(220, 53, 69, 0.1) !important;
        }
        .border-t, .border-b { border-color: #1f2d4a !important; }
        .bg-red-50 { background: #2d1b1b !important; }
        .text-red-800 { color: #ebdddd !important; }
        .text-red-600 { color: #fbecef !important; }
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
</body>
</html>