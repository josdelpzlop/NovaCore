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
            <h1><a href="{{ route('inicio') }}">NovaCore</a></h1>
        </div>
        <nav>
            <a href="{{ route('aprende') }}">Aprende</a>
            <a href="{{ route('events.index') }}">Eventos</a>
            <a href="#">Recompensas</a>
            @auth
                @if(Auth::user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" style="margin-right: 15px; color: #ffeb3b;">Panel Admin</a>
                @endif
                <a href="{{ url('/dashboard') }}" class="btn-login" style="background: rgba(255, 255, 255, 0.1); border: 1px solid rgba(255, 255, 255, 0.3);">{{ Auth::user()->name }}</a>
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