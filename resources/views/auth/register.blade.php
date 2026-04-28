<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaCore | Registro Estelar</title>
    <link rel="icon" href="{{ asset('images/logoplano.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}?v=1.0">
</head>

<body class="auth-page">

    <div class="auth-box auth-box--register">
        <a href="{{ route('inicio') }}" class="auth-brand">
            <img src="{{ asset('images/logoplano.png') }}" alt="NovaCore Logo">
        </a>
        <h1>NovaCore</h1>
        <p>Inicia tu entrenamiento estelar hoy</p>

        @if ($errors->any())
            <div class="auth-errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="auth-form-group">
                <label for="name">Nombre de Comandante</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Ej. Neil_Armstrong" required autofocus>
            </div>

            <div class="auth-form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                    placeholder="astronauta@novacore.com" required>
            </div>

            <div class="auth-form-group">
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password" placeholder="Mínimo 8 caracteres" required
                    autocomplete="new-password">
            </div>

            <div class="auth-form-group">
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input id="password_confirmation" type="password" name="password_confirmation"
                    placeholder="Repite tu contraseña" required>
            </div>

            <button type="submit" class="auth-btn auth-btn--register">Iniciar Expedición</button>
        </form>

        <div class="auth-footer">
            ¿Ya perteneces a la flota? <a href="{{ route('login') }}">Inicia sesión</a>
        </div>

        <a href="{{ route('inicio') }}" class="auth-back">← Abortar y volver a Inicio</a>
    </div>

</body>

</html>