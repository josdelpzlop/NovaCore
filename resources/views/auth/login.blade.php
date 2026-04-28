<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaCore | Iniciar Sesión</title>
    <link rel="icon" href="{{ asset('images/logoplano.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}?v=1.0">
</head>

<body class="auth-page">

    <div class="auth-box auth-box--login">
        <a href="{{ route('inicio') }}" class="auth-brand">
            <img src="{{ asset('images/logoplano.png') }}" alt="NovaCore Logo">
        </a>
        <h1>NovaCore</h1>
        <p>Inicia sesión en tu terminal estelar</p>

        @if (session('status'))
            <div class="auth-status">{{ session('status') }}</div>
        @endif

        @if ($errors->any())
            <div class="auth-errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="auth-form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                    placeholder="astronauta@novacore.com" required autofocus>
            </div>

            <div class="auth-form-group">
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password" placeholder="••••••••" required
                    autocomplete="current-password">
            </div>

            <div class="auth-form-group auth-remember">
                <label for="remember_me">
                    <input id="remember_me" type="checkbox" name="remember">
                    Recuérdame
                </label>
            </div>

            <button type="submit" class="auth-btn auth-btn--login">Sincronizar Datos</button>
        </form>

        <div class="auth-footer">
            ¿Nuevo en la flota? <a href="{{ route('register') }}">Únete a la misión</a>
        </div>

        <a href="{{ route('inicio') }}" class="auth-back">← Abortar y volver a Inicio</a>
    </div>

</body>

</html>