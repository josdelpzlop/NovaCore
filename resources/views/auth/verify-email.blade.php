<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaCore - Verificar Correo</title>
    <style>
        :root {
            --negro: #000000;
            --azul: #2746FF;
            --morado: #680EBC;
            --lavanda: #8767EB;
            --menta: #59DEA0;
            --fondo-soft: rgba(255, 255, 255, 0.05);
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
            max-width: 500px;
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
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 2rem;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        /* Botón */
        .btn-submit {
            display: inline-block;
            background: linear-gradient(45deg, var(--morado), var(--azul));
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            text-decoration: none;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(39, 70, 255, 0.4);
        }

        .link-secondary {
            color: rgba(255, 255, 255, 0.4);
            font-size: 0.85rem;
            text-decoration: none;
            margin-left: 15px;
            transition: color 0.3s;
        }

        .link-secondary:hover {
            color: white;
        }

        .success-message {
            color: var(--menta);
            margin-bottom: 1.5rem;
            font-weight: bold;
        }

        .actions {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }
    </style>
</head>

<body>

    <div class="auth-box">
        <h1><a href="{{ route('inicio') }}">NovaCore</a></h1>

        <p>
            ¡Gracias por unirte a la tripulación! <br>
            Antes de despegar, ¿podrías verificar tu dirección de correo haciendo clic en el enlace que te acabamos de
            enviar?
            Si no recibiste el correo, con gusto te enviaremos otro.
        </p>

        @if (session('status') == 'verification-link-sent')
            <div class="success-message">
                Se ha enviado un nuevo enlace de verificación a tu correo.
            </div>
        @endif

        <div class="actions">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn-submit">Reenviar Correo</button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" style="background: none; border: none; cursor: pointer;" class="link-secondary">
                    Cerrar Sesión
                </button>
            </form>
        </div>
    </div>

</body>

</html>