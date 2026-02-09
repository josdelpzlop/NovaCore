<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaCore - Recuperar Acceso</title>
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

        /* Contenedor */
        .auth-box {
            background: var(--fondo-soft);
            backdrop-filter: blur(15px);
            padding: 3rem;
            border-radius: 30px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            width: 100%;
            max-width: 450px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        .auth-box h1 a {
            color: var(--menta);
            text-decoration: none;
            font-size: 2rem;
            font-weight: 800;
            display: block;
            margin-bottom: 0.5rem;
        }

        .auth-box p {
            color: rgba(255, 255, 255, 0.6);
            margin-bottom: 2rem;
            font-size: 0.9rem;
            line-height: 1.5;
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

        .back-home {
            display: inline-block;
            margin-top: 1.5rem;
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.3);
            text-decoration: none;
        }

        .status-message {
            color: var(--menta);
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>

    <div class="auth-box">
        <h1><a href="{{ route('inicio') }}">NovaCore</a></h1>

        <p>
            ¿Perdiste tu llave de acceso? No hay problema. <br>
            Dinos tu correo y te enviaremos un enlace para recuperar tu cuenta.
        </p>

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

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                    placeholder="astronauta@novacore.com" required autofocus>
            </div>

            <button type="submit" class="btn-submit">Enviar Enlace de Recuperación</button>
        </form>

        <a href="{{ route('login') }}" class="back-home">← Volver al Login</a>
    </div>

</body>

</html>