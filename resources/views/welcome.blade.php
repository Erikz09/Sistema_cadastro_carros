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
            background: #020617;
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            color: #F8FAFC;
        }

        /* ===== NAVBAR ===== */
        .navbar {
            position: fixed; top: 0; left: 0; right: 0; z-index: 100;
            background: #0F172A;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid #1f2d4a;
            padding: 0 40px;
            height: 64px;
            display: flex; align-items: center; justify-content: space-between;
        }

        .navbar-brand {
            font-family: Georgia, serif;
            font-size: 22px;
            color: #fff;
            text-decoration: none;
        }
        .navbar-brand span { color: #4d70b8; }

        .navbar-tagline {
            font-size: 10px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #4a5568;
        }

        .navbar-left { display: flex; flex-direction: column; gap: 2px; }

        .navbar-buttons { display: flex; gap: 12px; align-items: center; }

        .btn-nav-login {
            background: transparent;
            border: 1px solid #4d70b8;
            color: #4d70b8;
            padding: 8px 20px;
            border-radius: 4px;
            font-size: 12px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            text-decoration: none;
            transition: background 0.2s, color 0.2s;
        }
        .btn-nav-login:hover { background: rgba(100, 79, 219, 0.1); }

        .btn-nav-register {
            background: #4d70b8;
            border: 1px solid #4d70b8;
            color: #fff;
            padding: 8px 20px;
            border-radius: 4px;
            font-size: 12px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            text-decoration: none;
            transition: background 0.2s;
        }
        .btn-nav-register:hover { background: #1f2d4a; }

        /* ===== HERO ===== */
        .hero {
            position: relative; z-index: 1;
            padding: 140px 40px 60px;
            text-align: center;
        }

        .hero-label {
            font-size: 12px; letter-spacing: 5px;
            text-transform: uppercase; color: #4d70b8;
            margin-bottom: 16px; display: block;
        }

        .hero h1 {
            font-family: Georgia, serif;
            font-size: clamp(36px, 7vw, 64px);
            color: #F8FAFC; line-height: 1.1; margin-bottom: 16px;
        }
        .hero h1 span { color: #F8FAFC; }

        .hero p {
            font-size: 15px; color: #8892b0;
            max-width: 480px; margin: 0 auto 36px;
            line-height: 1.7;
        }

        .hero-stats {
            display: flex; gap: 40px; justify-content: center;
            margin-top: 48px; flex-wrap: wrap;
        }

        .stat {
            display: flex; flex-direction: column; align-items: center; gap: 4px;
        }
        .stat-number {
            font-family: Georgia, serif; font-size: 32px; color: #4d70b8; font-weight: 700;
        }
        .stat-label {
            font-size: 10px; letter-spacing: 2px; text-transform: uppercase; color: #4a5568;
        }

        /* ===== SEPARADOR ===== */
        .section-label {
            position: relative; z-index: 1;
            text-align: center; padding: 48px 40px 24px;
        }
        .section-label span {
            font-size: 10px; letter-spacing: 4px;
            text-transform: uppercase; color: #4d70b8;
        }
        .section-label h2 {
            font-family: Georgia, serif; font-size: 28px;
            color: #fff; margin-top: 8px;
        }

        /* ===== GRID DE CARROS ===== */
        .cars-grid {
            position: relative; z-index: 1;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 24px;
            padding: 0 40px 80px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .car-card {
            background: #111827;
            border: 1px solid #1f2d4a;
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.2s, border-color 0.2s, box-shadow 0.2s;
        }
        .car-card:hover {
            transform: translateY(-4px);
            border-color: #4d70b8;
            box-shadow: 0 8px 32px rgba(233,69,96,0.12);
        }

        .car-img {
            width: 100%; height: 200px; object-fit: cover;
            background: #0a0f1e;
        }

        .car-img-placeholder {
            width: 100%; height: 200px;
            background: #0d1220;
            display: flex; align-items: center; justify-content: center;
            border-bottom: 1px solid #1f2d4a;
        }
        .car-img-placeholder i { font-size: 48px; color: #1f2d4a; }

        .car-body { padding: 20px; }

        .car-badge {
            display: inline-block;
            background: rgba(233,69,96,0.12);
            color: #e94560;
            font-size: 10px;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 3px 10px;
            border-radius: 20px;
            margin-bottom: 10px;
        }

        .car-title {
            font-family: Georgia, serif;
            font-size: 20px; color: #fff; margin-bottom: 4px;
        }

        .car-subtitle {
            font-size: 12px; color: #4a5568; margin-bottom: 16px;
        }

        .car-details {
            display: grid; grid-template-columns: 1fr 1fr;
            gap: 10px; margin-bottom: 16px;
        }

        .car-detail {
            display: flex; flex-direction: column; gap: 2px;
        }
        .car-detail-label {
            font-size: 9px; letter-spacing: 1.5px;
            text-transform: uppercase; color: #4a5568;
        }
        .car-detail-value {
            font-size: 13px; color: #cbd5e1;
        }

        .car-footer {
            display: flex; align-items: center; justify-content: space-between;
            padding-top: 16px;
            border-top: 1px solid #1f2d4a;
        }

        .car-price {
            font-family: Georgia, serif;
            font-size: 18px; color: #e94560; font-weight: 700;
        }

        .car-owner {
            font-size: 11px; color: #4a5568;
            display: flex; align-items: center; gap: 6px;
        }
        .car-owner i { color: #e94560; font-size: 10px; }

        /* ===== EMPTY STATE ===== */
        .empty-state {
            position: relative; z-index: 1;
            text-align: center; padding: 80px 40px;
        }
        .empty-state i { font-size: 64px; color: #1f2d4a; margin-bottom: 20px; display: block; }
        .empty-state h3 { font-family: Georgia, serif; font-size: 22px; color: #fff; margin-bottom: 8px; }
        .empty-state p { font-size: 13px; color: #4a5568; }

        /* ===== CTA BOTTOM ===== */
        .cta-section {
            position: relative; z-index: 1;
            text-align: center;
            padding: 60px 40px;
            border-top: 1px solid #1f2d4a;
            background: rgba(233,69,96,0.03);
        }
        .cta-section h3 {
            font-family: Georgia, serif; font-size: 24px;
            color: #fff; margin-bottom: 8px;
        }
        .cta-section p { font-size: 13px; color: #8892b0; margin-bottom: 28px; }
        .cta-buttons { display: flex; gap: 16px; justify-content: center; flex-wrap: wrap; }

        .btn-cta-primary {
            background: #4d70b8; color: #fff;
            padding: 14px 40px; border-radius: 4px;
            font-size: 12px; letter-spacing: 2px;
            text-transform: uppercase; text-decoration: none;
            transition: background 0.2s, transform 0.2s;
        }
        .btn-cta-primary:hover { background: #1f2d4a; transform: translateY(-2px); }

        .btn-cta-secondary {
            background: transparent; color: #4d70b8;
            border: 1px solid #1f2d4a;
            padding: 14px 40px; border-radius: 4px;
            font-size: 12px; letter-spacing: 2px;
            text-transform: uppercase; text-decoration: none;
            transition: background 0.2s, transform 0.2s;
        }
        .btn-cta-secondary:hover { background: rgba(42, 30, 109, 0.1); transform: translateY(-2px); }

        /* Responsive */
        @media (max-width: 600px) {
            .navbar { padding: 0 20px; }
            .cars-grid { padding: 0 16px 60px; grid-template-columns: 1fr; }
            .hero { padding: 120px 20px 40px; }
        }
    </style>
</head>
<body>
    <div id="stars"></div>

    {{-- NAVBAR --}}
    <nav class="navbar">
        <div class="navbar-left">
            <a href="{{ route('welcome') }}" class="navbar-brand">Auto<span>Gest</span></a>
            <span class="navbar-tagline">Sistema Automotivo</span>
        </div>
        <div class="navbar-buttons">
            <a href="{{ route('login') }}" class="btn-nav-login">
                <i class="fas fa-sign-in-alt"></i> Entrar
            </a>
            <a href="{{ route('register') }}" class="btn-nav-register">
                <i class="fas fa-user-plus"></i> Cadastrar
            </a>
        </div>
    </nav>

    {{-- HERO --}}
    <div class="hero">
        <span class="hero-label">Catálogo de Veículos</span>
        <h1>Bem-vindo ao<br><span>AutoGest</span></h1>
        <p>Explore o catálogo completo de veículos cadastrados. Faça login para gerenciar seus próprios carros.</p>

        <div class="hero-stats">
            <div class="stat">
                <span class="stat-number">{{ $carros->count() }}</span>
                <span class="stat-label">Veículos</span>
            </div>
            <div class="stat">
                <span class="stat-number">{{ $carros->unique('marca')->count() }}</span>
                <span class="stat-label">Marcas</span>
            </div>
            <div class="stat">
                <span class="stat-number">{{ $carros->min('ano') ?? '—' }}</span>
                <span class="stat-label">Ano mais antigo</span>
            </div>
            <div class="stat">
                <span class="stat-number">{{ $carros->max('ano') ?? '—' }}</span>
                <span class="stat-label">Ano mais recente</span>
            </div>
        </div>
    </div>

    {{-- GRID DE CARROS --}}
    @if($carros->isNotEmpty())
        <div class="section-label">
            <span>Catálogo</span>
            <h2>Todos os Veículos</h2>
        </div>

        <div class="cars-grid">
            @foreach($carros as $carro)
            <div class="car-card">
                @if($carro->foto)
                    <img src="{{ asset('storage/' . $carro->foto) }}"
                         alt="{{ $carro->marca }} {{ $carro->modelo }}"
                         class="car-img">
                @else
                    <div class="car-img-placeholder">
                        <i class="fas fa-car"></i>
                    </div>
                @endif

                <div class="car-body">
                    <span class="car-badge">{{ $carro->ano }}</span>
                    <h3 class="car-title">{{ $carro->marca }}</h3>
                    <p class="car-subtitle">{{ $carro->modelo }}</p>

                    <div class="car-details">
                        <div class="car-detail">
                            <span class="car-detail-label">Cor</span>
                            <span class="car-detail-value">{{ $carro->cor }}</span>
                        </div>
                        <div class="car-detail">
                            <span class="car-detail-label">Placa</span>
                            <span class="car-detail-value">{{ $carro->placa }}</span>
                        </div>
                    </div>

                    <div class="car-footer">
                        <span class="car-price">
                            R$ {{ number_format($carro->preco, 2, ',', '.') }}
                        </span>
                        @if($carro->user)
                        <span class="car-owner">
                            <i class="fas fa-user"></i>
                            {{ $carro->user->name }}
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="empty-state">
            <i class="fas fa-car"></i>
            <h3>Nenhum veículo cadastrado ainda</h3>
            <p>Faça login e seja o primeiro a cadastrar um carro!</p>
        </div>
    @endif

    {{-- CTA --}}
    <div class="cta-section">
        <h3>Quer gerenciar seus veículos?</h3>
        <p>Crie uma conta gratuita e comece a cadastrar seus carros agora.</p>
        <div class="cta-buttons">
            <a href="{{ route('register') }}" class="btn-cta-primary">
                <i class="fas fa-user-plus"></i> Criar Conta
            </a>
            <a href="{{ route('login') }}" class="btn-cta-secondary">
                <i class="fas fa-sign-in-alt"></i> Já tenho conta
            </a>
        </div>
    </div>
</body>
</html>
