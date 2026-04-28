<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'NovaCore')</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}?v=1.0">
    <link rel="icon" href="{{ asset('images/logoplano.png') }}" type="image/png">
    @stack('styles')
</head>

<body>
    @php
        $themeColor = '#1cc88a'; // Menta (Inicio)
        if (request()->routeIs('aprende*') || request()->routeIs('lessons*') || request()->routeIs('levels.*')) {
            $themeColor = '#3b82f6'; // Azul
        } elseif (request()->routeIs('events*')) {
            $themeColor = '#a78bfa'; // Morado
        } elseif (request()->routeIs('fenomenos*')) {
            $themeColor = '#fb7185'; // Rojo
        } elseif (request()->routeIs('recompensas*')) {
            $themeColor = '#fbbf24'; // Dorado
        } elseif (request()->routeIs('dashboard') && Auth::check()) {
            $themeColor = Auth::user()->user_level_color; // Color de Rango
        }
    @endphp

    <header>
        <div class="logo-area">
            <h1 style="margin: 0; line-height: 1;"><a href="{{ route('inicio') }}" style="background: -webkit-linear-gradient(135deg, #fff, {{ $themeColor }}); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">NovaCore</a></h1>
            <a href="{{ route('inicio') }}" style="font-size: 0.65rem; color: rgba(255,255,255,0.5); text-decoration: none; display: block; margin-top: 2px; letter-spacing: 0.5px;">Toca aquí para volver al inicio</a>
        </div>
        <nav>
            <a href="{{ route('aprende') }}" class="nav-link-aprende {{ request()->routeIs('aprende*') || request()->routeIs('lessons*') ? 'active-aprende' : '' }}">Aprende</a>
            <a href="{{ route('events.index') }}" class="nav-link-eventos {{ request()->routeIs('events*') ? 'active-eventos' : '' }}">Eventos</a>
            <a href="{{ route('fenomenos.index') }}" class="nav-link-fenomenos {{ request()->routeIs('fenomenos*') ? 'active-fenomenos' : '' }}">Fenómenos</a>
            <a href="{{ route('recompensas') }}" class="nav-link-recompensas {{ request()->routeIs('recompensas*') ? 'active-recompensas' : '' }}">Recompensas</a>
            @auth
                @if(Auth::user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" style="margin-right: 15px; color: #ffeb3b;">Panel Admin</a>
                @endif
                <a href="{{ url('/dashboard') }}" class="btn-login" style="background: rgba(255, 255, 255, 0.1); border: 1px solid rgba(255, 255, 255, 0.3); display: inline-flex; flex-direction: column; align-items: center; gap: 4px; padding: 6px 15px;">
                    <div style="display: flex; align-items: center; gap: 8px;">
                        @if(Auth::user()->currentReward)
                            <span style="color: {{ Auth::user()->currentReward->color }}; width: 18px; height: 18px; display: inline-block;">
                                {!! Auth::user()->currentReward->icon !!}
                            </span>
                            <span style="color: {{ Auth::user()->currentReward->text_color }};">{{ Auth::user()->name }}</span>
                        @else
                            <span>{{ Auth::user()->name }}</span>
                        @endif
                    </div>
                    <div style="width: 100%; height: 4px; background: rgba(0,0,0,0.5); border-radius: 2px; overflow: hidden; margin-top: 2px;">
                        <div style="height: 100%; width: {{ Auth::user()->xp_progress }}%; background: {{ Auth::user()->user_level_color }}; box-shadow: 0 0 5px {{ Auth::user()->user_level_color }}; transition: width 0.5s;"></div>
                    </div>
                </a>
            @else
                <a href="{{ route('login') }}" class="btn-login">Iniciar Sesión</a>
                <a href="{{ route('register') }}" style="margin-left: 10px;">Registrarse</a>
            @endauth
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    @unless(request()->routeIs('sugerencias') || request()->routeIs('informacion'))
        <footer style="display: block; padding: 4rem 5% 2rem; background: rgba(10, 15, 25, 0.95); border-top: 1px solid {{ $themeColor }}33; margin-top: auto;">
            <div style="max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 40px; margin-bottom: 3rem;">
                
                <!-- Branding -->
                <div>
                    <a href="{{ route('inicio') }}" style="display: inline-block; margin-bottom: 15px; width: 100%; max-width: 220px;">
                        <img src="{{ asset('images/logotexto.png') }}" alt="NovaCore Logo Completo" style="width: 100%; height: auto; display: block;">
                    </a>
                </div>

                <!-- Exploración -->
                <div>
                    <h3 style="color: white; font-size: 1.1rem; margin-top: 0; margin-bottom: 20px; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 10px;">Exploración</h3>
                    <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 12px;">
                        <li><a href="{{ route('aprende') }}" style="color: #cbd5e1; text-decoration: none; font-size: 0.95rem; transition: color 0.3s;" onmouseover="this.style.color='{{ $themeColor }}'" onmouseout="this.style.color='#cbd5e1'">Academia Estelar</a></li>
                        <li><a href="{{ route('fenomenos.index') }}" style="color: #cbd5e1; text-decoration: none; font-size: 0.95rem; transition: color 0.3s;" onmouseover="this.style.color='{{ $themeColor }}'" onmouseout="this.style.color='#cbd5e1'">Observatorio (APOD)</a></li>
                        <li><a href="{{ route('events.index') }}" style="color: #cbd5e1; text-decoration: none; font-size: 0.95rem; transition: color 0.3s;" onmouseover="this.style.color='{{ $themeColor }}'" onmouseout="this.style.color='#cbd5e1'">Radar de Eventos</a></li>
                    </ul>
                </div>

                <!-- Sistema -->
                <div>
                    <h3 style="color: white; font-size: 1.1rem; margin-top: 0; margin-bottom: 20px; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 10px;">Sistema</h3>
                    <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 12px;">
                        <li><a href="{{ route('informacion') }}" style="color: #cbd5e1; text-decoration: none; font-size: 0.95rem; transition: color 0.3s;" onmouseover="this.style.color='{{ $themeColor }}'" onmouseout="this.style.color='#cbd5e1'">Información General</a></li>
                        <li><a href="{{ route('sugerencias') }}" style="color: #cbd5e1; text-decoration: none; font-size: 0.95rem; transition: color 0.3s;" onmouseover="this.style.color='{{ $themeColor }}'" onmouseout="this.style.color='#cbd5e1'">Sugerencias de Mejora</a></li>
                    </ul>
                </div>
                
                <!-- Estado -->
                <div>
                    <h3 style="color: white; font-size: 1.1rem; margin-top: 0; margin-bottom: 20px; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 10px;">Estado de Red</h3>
                    <div style="background: rgba(0,0,0,0.5); padding: 15px; border-radius: 10px; border: 1px solid {{ $themeColor }}4d;">
                        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                            <span style="width: 8px; height: 8px; background: {{ $themeColor }}; border-radius: 50%; box-shadow: 0 0 10px {{ $themeColor }}; animation: pulse-dot 2s infinite;"></span>
                            <span style="color: {{ $themeColor }}; font-size: 0.85rem; font-weight: bold; letter-spacing: 1px;">SISTEMA EN LÍNEA</span>
                        </div>
                        <div style="color: #64748b; font-size: 0.8rem; font-family: monospace;">VER: 1.0.0-NOVA</div>
                    </div>
                </div>

            </div> <!-- CIERRE DEL GRID AÑADIDO -->
            
            <div style="max-width: 1200px; margin: 0 auto; text-align: center; border-top: 1px solid rgba(255,255,255,0.05); padding-top: 20px; color: #64748b; font-size: 0.85rem;">
                &copy; {{ date('Y') }} NovaCore. Todos los derechos reservados. Misión de exploración espacial educativa.
            </div>
        </footer>
        <style>
            @keyframes pulse-dot { 0%, 100% { opacity: 1; } 50% { opacity: 0.3; } }
        </style>
    @endunless

</body>

</html>