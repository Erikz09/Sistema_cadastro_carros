<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AutoGest — {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background-color: #0a0f1e;
            background-image: radial-gradient(ellipse at 20% 50%, #0f1a35 0%, transparent 60%),
                              radial-gradient(ellipse at 80% 20%, #1a0a1e 0%, transparent 50%);
        }
        #stars { position: fixed; inset: 0; z-index: 0; pointer-events: none; }
        .star {
            position: absolute;
            border-radius: 50%;
            background: #fff;
            animation: twinkle 3s infinite alternate;
        }
        @keyframes twinkle {
            from { opacity: 0.15; }
            to   { opacity: 0.7; }
        }


        /* Sobrescreve os inputs do Breeze para o tema escuro */
        input[type="email"],
        input[type="password"],
        input[type="text"] {
            background-color: #0a0f1e !important;
            border-color: #1f2d4a !important;
            color: #fff !important;
        }
        input[type="email"]:focus,
        input[type="password"]:focus,
        input[type="text"]:focus {
            border-color: #0f2d91 !important;
            box-shadow: 0 0 0 2px #395C6B !important;
        }
        label { color: #8892b0 !important; font-size: 11px; letter-spacing: 1px; text-transform: uppercase; }

        /* Botão primário */
        button[type="submit"],
        .btn-primary {
            background-color: #4d70b8 !important;
            border-color: #130b79 !important;
            color: #fff !important;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            font-size: 12px;
            transition: background 0.2s;
        }
        button[type="submit"]:hover { background-color: #0f357c !important; }
    </style>
</head>
<body class="font-sans antialiased min-h-screen flex flex-col">

    <div id="stars"></div>
    <div class="road"><div class="road-line"></div></div>

    <!-- Logo / Marca -->
    <div class="relative z-10 text-center pt-10">
        <a href="{{ route('welcome') }}">
            <span style="font-family: Georgia, serif; font-size: 11px; letter-spacing: 5px;
                         text-transform: uppercase; color: #4d70b8;">
                Sistema Automotivo
            </span>
            <h1 style="font-family: Georgia, serif; font-size: 28px; color: #fff; margin-top: 4px;">
                Auto<span style="color:#4d70b8;">Gest</span>
            </h1>
        </a>
    </div>

    <!-- Card do formulário -->
    <div class="relative z-10 flex flex-col items-center justify-center flex-1 px-4 pb-20">
        <div style="
            background: #111827;
            border: 1px solid #1f2d4a;
            border-radius: 12px;
            padding: 36px 32px;
            width: 100%;
            max-width: 400px;
        ">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
