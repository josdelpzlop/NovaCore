<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'NovaCore')</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>

<body>

    <header>
        <div class="logo-area">
            <h1 style="margin: 0; line-height: 1;"><a href="{{ route('inicio') }}">NovaCore</a></h1>
            <a href="{{ route('inicio') }}" style="font-size: 0.65rem; color: rgba(255,255,255,0.5); text-decoration: none; display: block; margin-top: 2px; letter-spacing: 0.5px;">Toca aquí para volver al inicio</a>
        </div>
        <nav>
            <a href="{{ route('aprende') }}">Aprende</a>
            <a href="{{ route('events.index') }}">Eventos</a>
            <a href="{{ route('fenomenos.index') }}">Fenómenos</a>
            <a href="{{ route('recompensas') }}">Recompensas</a>
            @auth
                @if(Auth::user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" style="margin-right: 15px; color: #ffeb3b;">Panel Admin</a>
                @endif
                <a href="{{ url('/dashboard') }}" class="btn-login" style="background: rgba(255, 255, 255, 0.1); border: 1px solid rgba(255, 255, 255, 0.3); display: inline-flex; align-items: center; gap: 8px;">
                    @if(Auth::user()->current_title && array_key_exists(Auth::user()->current_title, App\Models\User::$achievementData))
                        <span style="color: {{ App\Models\User::$achievementData[Auth::user()->current_title]['color'] }}; width: 18px; height: 18px; display: inline-block;">
                            {!! App\Models\User::$achievementData[Auth::user()->current_title]['icon'] !!}
                        </span>
                        <span style="color: {{ App\Models\User::$achievementData[Auth::user()->current_title]['text_color'] }};">{{ Auth::user()->name }}</span>
                    @else
                        {{ Auth::user()->name }}
                    @endif
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
        <footer>
            <a href="{{ route('sugerencias') }}" class="btn-outline">Sugerencias</a>
            <a href="{{ route('informacion') }}" class="btn-outline">Información General</a>
        </footer>
    @endunless

</body>

</html>