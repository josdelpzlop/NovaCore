<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaCore | Registro Estelar</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --negro: #000000;
            --azul: #2746FF;
            --morado: #680EBC;
            --lavanda: #8767EB;
            --menta: #59DEA0;
            --error: #ff4d4d;
        }

        body {
            background-color: var(--negro);
            background-image: 
                radial-gradient(circle at 20% 30%, rgba(39, 70, 255, 0.15) 0%, transparent 40%),
                radial-gradient(circle at 80% 70%, rgba(104, 14, 188, 0.15) 0%, transparent 40%),
                radial-gradient(circle at center, #0a0a1a 0%, #000 100%);
            color: white;
            font-family: 'Outfit', sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
            padding: 2rem 0;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background-image: radial-gradient(white 1px, transparent 1px);
            background-size: 50px 50px;
            opacity: 0.1;
            z-index: 0;
        }

        .register-box {
            background: rgba(20, 20, 30, 0.6);
            backdrop-filter: blur(25px);
            padding: 3.5rem;
            border-radius: 40px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            width: 100%;
            max-width: 450px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.8), 0 0 30px rgba(89, 222, 160, 0.05);
            text-align: center;
            position: relative;
            z-index: 1;
            animation: slideUp 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(40px) scale(0.95); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .brand-logo {
            margin-bottom: 2rem;
            display: inline-block;
            transition: transform 0.3s ease;
        }

        .brand-logo:hover {
            transform: scale(1.1) rotate(-5deg);
        }

        .brand-logo img {
            height: 70px;
            filter: drop-shadow(0 0 15px var(--menta));
        }

        .register-box h1 {
            margin: 0 0 0.5rem;
            font-size: 2.2rem;
            font-weight: 800;
            background: linear-gradient(135deg, #fff, var(--menta));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .register-box p {
            color: rgba(255, 255, 255, 0.5);
            margin-bottom: 2.5rem;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
        }

        .form-group {
            margin-bottom: 1.2rem;
            text-align: left;
        }

        .form-group label {
            display: block;
            color: var(--lavanda);
            font-size: 0.7rem;
            margin-bottom: 6px;
            margin-left: 5px;
            text-transform: uppercase;
            font-weight: 800;
            letter-spacing: 1.5px;
        }

        .form-group input {
            width: 100%;
            padding: 14px 20px;
            background: rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            color: white;
            outline: none;
            box-sizing: border-box;
            font-family: inherit;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            border-color: var(--menta);
            box-shadow: 0 0 20px rgba(89, 222, 160, 0.2);
            background: rgba(0, 0, 0, 0.6);
        }

        .btn-submit {
            width: 100%;
            background: linear-gradient(135deg, var(--menta), var(--azul));
            color: var(--negro);
            border: none;
            padding: 16px;
            border-radius: 16px;
            font-size: 1.1rem;
            font-weight: 900;
            cursor: pointer;
            margin-top: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            transition: all 0.4s ease;
            box-shadow: 0 10px 20px rgba(89, 222, 160, 0.2);
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(89, 222, 160, 0.4);
            filter: brightness(1.1);
        }

        .register-footer {
            margin-top: 2.5rem;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.4);
        }

        .register-footer a {
            color: var(--lavanda);
            text-decoration: none;
            font-weight: 800;
            transition: color 0.3s;
        }

        .register-footer a:hover {
            color: white;
            text-shadow: 0 0 10px var(--lavanda);
        }

        .back-home {
            display: inline-block;
            margin-top: 2rem;
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.3);
            text-decoration: none;
            transition: color 0.3s;
        }

        .back-home:hover {
            color: rgba(255, 255, 255, 0.8);
        }

        .error-container {
            background: rgba(255, 77, 77, 0.1);
            border: 1px solid rgba(255, 77, 77, 0.3);
            padding: 12px 15px;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            text-align: left;
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        .error-container ul { margin: 0; padding-left: 20px; list-style-type: none; }
        .error-container li { color: #fca5a5; font-size: 0.85rem; font-weight: 600; }
    </style>
</head>

<body>

    <div class="register-box">
        <a href="{{ route('inicio') }}" class="brand-logo">
            <img src="{{ asset('images/logoplano.png') }}" alt="NovaCore Logo">
        </a>
        <h1>NovaCore</h1>
        <p>Inicia tu entrenamiento estelar hoy</p>

        @if ($errors->any())
            <div class="error-container">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name">Nombre de Comandante</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Ej. Neil_Armstrong" required
                    autofocus>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                    placeholder="astronauta@novacore.com" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password" placeholder="Mínimo 8 caracteres" required
                    autocomplete="new-password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input id="password_confirmation" type="password" name="password_confirmation"
                    placeholder="Repite tu contraseña" required>
            </div>

            <button type="submit" class="btn-submit">Iniciar Expedición</button>
        </form>

        <div class="register-footer">
            ¿Ya perteneces a la flota? <a href="{{ route('login') }}">Inicia sesión</a>
        </div>

        <a href="{{ route('inicio') }}" class="back-home">← Abortar y volver a Inicio</a>
    </div>

</body>

</html>