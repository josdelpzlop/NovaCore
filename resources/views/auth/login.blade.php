<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaCore - Iniciar Sesión</title>
    <style>
        :root {
            --negro: #000000;
            --azul: #2746FF;
            --morado: #680EBC;
            --lavanda: #8767EB;
            --menta: #59DEA0;
            --fondo-soft: rgba(255, 255, 255, 0.05);
            --error: #ff4d4d;
        }

        body {
            background-color: var(--negro);
            background-image: radial-gradient(circle at center, #1a1a2e 0%, #000 100%);
            color: white;
            font-family: 'Inter', sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        /* Contenedor de Login */
        .login-box {
            background: var(--fondo-soft);
            backdrop-filter: blur(15px);
            padding: 3rem;
            border-radius: 30px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            width: 100%;
            max-width: 400px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        .login-box h1 a {
            color: var(--menta);
            text-decoration: none;
            font-size: 2rem;
            font-weight: 800;
            display: block;
            margin-bottom: 0.5rem;
        }

        .login-box p {
            color: rgba(255, 255, 255, 0.6);
            margin-bottom: 2rem;
            font-size: 0.9rem;
        }

        /* Formulario */
        .form-group {
            margin-bottom: 1.5rem;
            text-align: left;
        }

        .form-group label {
            display: block;
            color: var(--lavanda);
            font-size: 0.8rem;
            margin-bottom: 5px;
            margin-left: 5px;
            text-transform: uppercase;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: white;
            outline: none;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        .form-group input:focus {
            border-color: var(--azul);
        }

        /* Botón de Acción */
        .btn-submit {
            width: 100%;
            background: linear-gradient(45deg, var(--morado), var(--azul));
            color: white;
            border: none;
            padding: 12px;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            margin-top: 1rem;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(39, 70, 255, 0.4);
        }

        /* Enlaces inferiores */
        .login-footer {
            margin-top: 2rem;
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.5);
        }

        .login-footer a {
            color: var(--menta);
            text-decoration: none;
            font-weight: bold;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        .back-home {
            display: inline-block;
            margin-top: 1.5rem;
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.3);
            text-decoration: none;
        }

        .error-message {
            color: var(--error);
            font-size: 0.8rem;
            margin-top: 5px;
            display: block;
        }

        .status-message {
            color: var(--menta);
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>

    <div class="login-box">
        <h1><a href="{{ route('inicio') }}">NovaCore</a></h1>
        <p>Identifícate para acceder a tu panel estelar.</p>

        <!-- Session Status -->
        @if (session('status'))
            <div class="status-message">
                {{ session('status') }}
            </div>
        @endif

        <!-- Global Errors -->
        @if ($errors->any())
            <div
                style="color: #ff4d4d; margin-bottom: 1rem; text-align: left; font-size: 0.9rem; background: rgba(255, 77, 77, 0.1); padding: 10px; border-radius: 8px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                    placeholder="astronauta@novacore.com" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password" placeholder="••••••••" required
                    autocomplete="current-password">
            </div>

            <!-- Remember Me -->
            <div class="form-group" style="margin-bottom: 1rem;">
                <label for="remember_me"
                    style="display: inline-flex; align-items: center; text-transform: none; font-size: 0.9rem; cursor: pointer;">
                    <input id="remember_me" type="checkbox" name="remember" style="width: auto; margin-right: 10px;">
                    <span style="color: rgba(255,255,255,0.7);">Recuérdame</span>
                </label>
            </div>

            <button type="submit" class="btn-submit">Entrar a la Nave</button>

            <div style="margin-top: 15px;">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                        style="color: rgba(255,255,255,0.4); font-size: 0.8rem; text-decoration: none;">¿Olvidaste tu
                        contraseña?</a>
                @endif
            </div>
        </form>

        <div class="login-footer">
            ¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate aquí</a>
        </div>

        <a href="{{ route('inicio') }}" class="back-home">← Volver a Inicio</a>
    </div>

</body>

</html>