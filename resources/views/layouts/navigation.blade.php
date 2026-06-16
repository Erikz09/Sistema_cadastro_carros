<nav x-data="{ open: false }" style="background:#111827; border-bottom:1px solid #1f2d4a; position:relative; z-index:10;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Logo + Links -->
            <div class="flex items-center gap-8">
                <a href="{{ route('carros.index') }}" style="font-family:Georgia,serif; font-size:20px; color:#fff; text-decoration:none;">
                    Auto<span style="color:#e94560;">Gest</span>
                </a>

                <div class="hidden sm:flex gap-6">
                    <a href="{{ route('carros.index') }}"
                       style="font-size:12px; letter-spacing:1px; text-transform:uppercase; text-decoration:none;
                              color: {{ request()->routeIs('carros.*') ? '#e94560' : '#8892b0' }};
                              border-bottom: {{ request()->routeIs('carros.*') ? '2px solid #e94560' : '2px solid transparent' }};
                              padding-bottom:4px; transition:color 0.2s;">
                        <i class="fas fa-car mr-1"></i> Carros
                    </a>
                    <a href="{{ route('usuarios.lista') }}"
                       style="font-size:12px; letter-spacing:1px; text-transform:uppercase; text-decoration:none;
                              color: {{ request()->routeIs('usuarios.*') ? '#e94560' : '#8892b0' }};
                              border-bottom: {{ request()->routeIs('usuarios.*') ? '2px solid #e94560' : '2px solid transparent' }};
                              padding-bottom:4px; transition:color 0.2s;">
                        <i class="fas fa-users mr-1"></i> Usuários
                    </a>
                </div>
            </div>

            <!-- Dropdown usuário -->
            <div class="hidden sm:flex items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button style="display:flex; align-items:center; gap:8px; background:transparent; border:1px solid #1f2d4a; border-radius:6px; padding:8px 14px; color:#8892b0; font-size:13px; cursor:pointer; transition:border-color 0.2s;"
                                onmouseover="this.style.borderColor='#e94560'; this.style.color='#fff'"
                                onmouseout="this.style.borderColor='#1f2d4a'; this.style.color='#8892b0'">
                            <i class="fas fa-user-circle" style="color:#e94560;"></i>
                            {{ Auth::user()->name }}
                            <i class="fas fa-chevron-down" style="font-size:10px;"></i>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div style="background:#111827; border:1px solid #1f2d4a; border-radius:8px; overflow:hidden; min-width:180px;">
                            <div style="padding:12px 16px; border-bottom:1px solid #1f2d4a;">
                                <div style="font-size:13px; color:#fff; font-weight:500;">{{ Auth::user()->name }}</div>
                                <div style="font-size:11px; color:#4a5568;">{{ Auth::user()->email }}</div>
                            </div>

                            <a href="{{ route('profile.edit') }}"
                               style="display:block; padding:10px 16px; font-size:12px; letter-spacing:1px; text-transform:uppercase; color:#8892b0; text-decoration:none; transition:color 0.2s;"
                               onmouseover="this.style.color='#e94560'; this.style.background='rgba(233,69,96,0.05)'"
                               onmouseout="this.style.color='#8892b0'; this.style.background='transparent'">
                                <i class="fas fa-user mr-2"></i> Perfil
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        style="width:100%; text-align:left; padding:10px 16px; font-size:12px; letter-spacing:1px; text-transform:uppercase; color:#e94560; background:transparent; border:none; cursor:pointer; transition:background 0.2s;"
                                        onmouseover="this.style.background='rgba(233,69,96,0.05)'"
                                        onmouseout="this.style.background='transparent'">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Sair
                                </button>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger mobile -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = !open" style="background:transparent; border:none; color:#8892b0; padding:8px; cursor:pointer;">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden"
         style="border-top:1px solid #1f2d4a; padding:12px 16px;">
        <a href="{{ route('carros.index') }}" style="display:block; padding:10px 0; font-size:12px; letter-spacing:1px; text-transform:uppercase; color:#8892b0; text-decoration:none;">
            <i class="fas fa-car mr-2"></i> Carros
        </a>
        <a href="{{ route('usuarios.lista') }}" style="display:block; padding:10px 0; font-size:12px; letter-spacing:1px; text-transform:uppercase; color:#8892b0; text-decoration:none;">
            <i class="fas fa-users mr-2"></i> Usuários
        </a>
        <a href="{{ route('profile.edit') }}" style="display:block; padding:10px 0; font-size:12px; letter-spacing:1px; text-transform:uppercase; color:#8892b0; text-decoration:none;">
            <i class="fas fa-user mr-2"></i> Perfil
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" style="padding:10px 0; font-size:12px; letter-spacing:1px; text-transform:uppercase; color:#e94560; background:transparent; border:none; cursor:pointer;">
                <i class="fas fa-sign-out-alt mr-2"></i> Sair
            </button>
        </form>
    </div>
</nav>