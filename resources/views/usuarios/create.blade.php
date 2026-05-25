<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>AutoGest — Criar Conta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background: #0a0f1e;
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        #stars { position: fixed; inset: 0; z-index: 0; pointer-events: none; }
        .star {
            position: absolute;
            border-radius: 50%;
            background: #fff;
            animation: twinkle 3s infinite alternate;
        }
        @keyframes twinkle {
            from { opacity: 0.2; }
            to   { opacity: 0.9; }
        }

        .card {
            position: relative;
            z-index: 1;
            background: #111827;
            border: 1px solid #1f2d4a;
            border-radius: 12px;
            padding: 40px 36px;
            width: 100%;
            max-width: 480px;
            margin: 40px 16px;
        }

        .brand {
            font-size: 11px;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: #e94560;
            text-align: center;
            margin-bottom: 8px;
        }

        h1 {
            font-family: Georgia, serif;
            font-size: 26px;
            color: #fff;
            text-align: center;
            margin-bottom: 6px;
        }

        .sub {
            font-size: 13px;
            color: #4a5568;
            text-align: center;
            margin-bottom: 32px;
        }

        .alert-danger {
            background: #2d1b1b;
            border: 1px solid #e94560;
            border-radius: 6px;
            padding: 10px 14px;
            color: #f87171;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .alert-danger ul { padding-left: 16px; margin: 0; }

        .field { margin-bottom: 20px; }

        .field label {
            display: block;
            font-size: 11px;
            color: #8892b0;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .field input {
            width: 100%;
            background: #0a0f1e;
            border: 1px solid #1f2d4a;
            border-radius: 6px;
            padding: 12px 14px;
            color: #fff;
            font-size: 14px;
            transition: border-color 0.2s;
        }

        .field input:focus {
            outline: none;
            border-color: #e94560;
        }

        .field input.is-invalid { border-color: #e94560; }

        .invalid-feedback {
            color: #f87171;
            font-size: 12px;
            margin-top: 6px;
            display: block;
        }

        .btn-submit {
            width: 100%;
            background: #e94560;
            color: #fff;
            border: none;
            padding: 14px;
            border-radius: 6px;
            font-size: 13px;
            letter-spacing: 2px;
            text-transform: uppercase;
            cursor: pointer;
            margin-top: 8px;
            transition: background 0.2s;
        }
        .btn-submit:hover { background: #c73652; }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 24px;
            margin-top: 20px;
        }

        .footer-links a {
            font-size: 12px;
            color: #4a5568;
            text-decoration: none;
            transition: color 0.2s;
        }
        .footer-links a:hover { color: #e94560; }
    </style>
</head>
<body>
    <div id="stars"></div>

    <div class="card">
        <div class="brand">AutoGest</div>
        <h1>Criar Conta</h1>
        <p class="sub">Preencha os dados para se cadastrar</p>

        @if($errors->any())
            <div class="alert-danger">
                <ul>
                    @foreach($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf

            <div class="field">
                <label for="name">Nome</label>
                <input type="text" id="name" name="name"
                    class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
                    value="{{ old('name') }}"
                    placeholder="Seu nome completo">
                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="field">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email"
                    class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                    value="{{ old('email') }}"
                    placeholder="seu@email.com">
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="field">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password"
                    class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                    placeholder="Mínimo 6 caracteres">
                @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="field">
                <label for="password_confirmation">Confirmar Senha</label>
                <input type="password" id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Repita a senha">
            </div>

            <button type="submit" class="btn-submit">
                <i class="fas fa-user-plus"></i> Criar Conta
            </button>
        </form>

        <div class="footer-links">
            <a href="{{ route('login') }}">Já tenho conta → Entrar</a>
            <a href="{{ route('welcome') }}">← Página inicial</a>
        </div>
    </div>

    <script>
        const container = document.getElementById('stars');
        for (let i = 0; i < 80; i++) {
            const s = document.createElement('div');
            s.className = 'star';
            const size = Math.random() * 2.5 + 0.5;
            s.style.cssText = `
                width:${size}px; height:${size}px;
                top:${Math.random()*90}%;
                left:${Math.random()*100}%;
                animation-delay:${Math.random()*4}s;
                animation-duration:${2+Math.random()*3}s
            `;
            container.appendChild(s);
        }
    </script>
</body>
</html>