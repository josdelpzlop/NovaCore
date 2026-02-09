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
            <a href="#">Eventos</a>
            <a href="#">Recompensas</a>
            @auth
                <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn-login">Iniciar Sesión</a>
                <a href="{{ route('register') }}" style="margin-left: 10px;">Registrarse</a>
            @endauth
        </nav>
    </header>

    @yield('content')

    <footer>
        <a href="#" class="btn-outline">Sugerencias</a>
        <a href="#" class="btn-outline">Información General</a>
    </footer>

</body>

</html>