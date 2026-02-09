<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaCore - Registro Estelar</title>
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
            min-height: 100vh;
            padding: 2rem 0;
        }

        /* Contenedor de Registro */
        .register-box {
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

        .register-box h1 a {
            color: var(--menta);
            text-decoration: none;
            font-size: 2rem;
            font-weight: 800;
            display: block;
            margin-bottom: 0.5rem;
        }

        .register-box p {
            color: rgba(255, 255, 255, 0.6);
            margin-bottom: 2rem;
            font-size: 0.9rem;
        }

        /* Formulario */
        .form-group {
            margin-bottom: 1.2rem;
            text-align: left;
        }

        .form-group label {
            display: block;
            color: var(--lavanda);
            font-size: 0.75rem;
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
            transition: all 0.3s;
        }

        .form-group input:focus {
            border-color: var(--menta);
            background: rgba(89, 222, 160, 0.05);
        }

        /* Botón de Registro */
        .btn-submit {
            width: 100%;
            background: linear-gradient(45deg, var(--azul), var(--menta));
            color: var(--negro);
            border: none;
            padding: 14px;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 800;
            cursor: pointer;
            margin-top: 1rem;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(89, 222, 160, 0.3);
        }

        /* Enlaces inferiores */
        .register-footer {
            margin-top: 2rem;
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.5);
        }

        .register-footer a {
            color: var(--lavanda);
            text-decoration: none;
            font-weight: bold;
        }

        .back-home {
            display: inline-block;
            margin-top: 1.5rem;
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.3);
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="register-box">
        <h1><a href="{{ route('inicio') }}">NovaCore</a></h1>
        <p>Crea tu perfil y comienza la expedición.</p>

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

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name">Nombre de Usuario</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Astronauta_01" required
                    autofocus>
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                    placeholder="explorador@universo.com" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password" placeholder="Mínimo 8 caracteres" required
                    autocomplete="new-password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input id="password_confirmation" type="password" name="password_confirmation"
                    placeholder="Repite tu clave" required>
            </div>

            <button type="submit" class="btn-submit">Registrar Misión</button>
        </form>

        <div class="register-footer">
            ¿Ya eres miembro? <a href="{{ route('login') }}">Inicia sesión</a>
        </div>

        <a href="{{ route('inicio') }}" class="back-home">← Volver a Inicio</a>
    </div>

</body>

</html>