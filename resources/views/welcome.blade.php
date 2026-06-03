<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>AutoGest — Sistema de Carros</title>
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

        .hero {
            position: relative;
            z-index: 1;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 80px 24px 120px;
        }

        .brand {
            font-size: 11px;
            letter-spacing: 5px;
            text-transform: uppercase;
            color: #e94560;
            margin-bottom: 20px;
        }

        .hero h1 {
            font-family: Georgia, serif;
            font-size: clamp(40px, 8vw, 72px);
            color: #fff;
            line-height: 1.1;
            margin-bottom: 16px;
        }

        .hero h1 span { color: #e94560; }

        .hero p {
            font-size: 16px;
            color: #8892b0;
            margin-bottom: 40px;
            max-width: 420px;
        }

        .btn-group {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .btn-primary {
            background: #e94560;
            color: #fff;
            border: none;
            padding: 14px 40px;
            border-radius: 4px;
            font-size: 13px;
            letter-spacing: 2px;
            text-transform: uppercase;
            text-decoration: none;
            display: inline-block;
            transition: background 0.2s, transform 0.2s;
        }
        .btn-primary:hover { background: #c73652; transform: translateY(-2px); }

        .btn-secondary {
            background: transparent;
            color: #e94560;
            border: 1px solid #e94560;
            padding: 14px 40px;
            border-radius: 4px;
            font-size: 13px;
            letter-spacing: 2px;
            text-transform: uppercase;
            text-decoration: none;
            display: inline-block;
            transition: background 0.2s, transform 0.2s;
        }
        .btn-secondary:hover { background: rgba(233, 69, 96, 0.1); transform: translateY(-2px); }

        .features {
            display: flex;
            gap: 40px;
            margin-top: 64px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .feat {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .feat-icon {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            border: 1px solid #e94560;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #e94560;
            font-size: 20px;
        }

        .feat span {
            font-size: 12px;
            color: #8892b0;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <div id="stars"></div>

    <div class="hero">
        <p class="brand">Sistema Automotivo</p>
        <h1>Bem-vindo ao<br><span>AutoGest</span></h1>
        <p>Gerencie seu catálogo de veículos com facilidade. Cadastre, edite e visualize carros em um só lugar.</p>

        <div class="btn-group">
            <a href="{{ route('login') }}" class="btn-primary">Acessar o Sistema →</a>
            <a href="{{ route('register') }}" class="btn-secondary">Criar Conta</a>

        </div>

        <div class="features">
            <div class="feat">
                <div class="feat-icon"><i class="fas fa-car"></i></div>
                <span>Cadastro</span>
            </div>
            <div class="feat">
                <div class="feat-icon"><i class="fas fa-list"></i></div>
                <span>Listagem</span>
            </div>
            <div class="feat">
                <div class="feat-icon"><i class="fas fa-image"></i></div>
                <span>Fotos</span>
            </div>
            <div class="feat">
                <div class="feat-icon"><i class="fas fa-lock"></i></div>
                <span>Segurança</span>
            </div>
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