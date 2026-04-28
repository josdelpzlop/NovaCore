<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaCore | Iniciar Sesión</title>
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
            height: 100vh;
            overflow: hidden;
            position: relative;
        }

        /* Efecto de estrellas sutil */
        body::before {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background-image: radial-gradient(white 1px, transparent 1px);
            background-size: 50px 50px;
            opacity: 0.1;
            z-index: 0;
        }

        .login-box {
            background: rgba(20, 20, 30, 0.6);
            backdrop-filter: blur(25px);
            padding: 3.5rem;
            border-radius: 40px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            width: 100%;
            max-width: 420px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.8), 0 0 30px rgba(39, 70, 255, 0.1);
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
            transform: scale(1.1) rotate(5deg);
        }

        .brand-logo img {
            height: 70px;
            filter: drop-shadow(0 0 15px var(--menta));
        }

        .login-box h1 {
            margin: 0 0 0.5rem;
            font-size: 2.2rem;
            font-weight: 800;
            background: linear-gradient(135deg, #fff, var(--menta));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .login-box p {
            color: rgba(255, 255, 255, 0.5);
            margin-bottom: 2.5rem;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
        }

        .form-group {
            margin-bottom: 1.8rem;
            text-align: left;
        }

        .form-group label {
            display: block;
            color: var(--lavanda);
            font-size: 0.75rem;
            margin-bottom: 8px;
            margin-left: 5px;
            text-transform: uppercase;
            font-weight: 800;
            letter-spacing: 1.5px;
        }

        .form-group input {
            width: 100%;
            padding: 15px 20px;
            background: rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            color: white;
            outline: none;
            box-sizing: border-box;
            font-family: inherit;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            border-color: var(--azul);
            box-shadow: 0 0 20px rgba(39, 70, 255, 0.3);
            background: rgba(0, 0, 0, 0.6);
        }

        .btn-submit {
            width: 100%;
            background: linear-gradient(135deg, var(--azul), var(--morado));
            color: white;
            border: none;
            padding: 16px;
            border-radius: 16px;
            font-size: 1.1rem;
            font-weight: 800;
            cursor: pointer;
            margin-top: 1rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            transition: all 0.4s ease;
            box-shadow: 0 10px 20px rgba(39, 70, 255, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(39, 70, 255, 0.5);
            filter: brightness(1.1);
        }

        .login-footer {
            margin-top: 2.5rem;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.4);
        }

        .login-footer a {
            color: var(--menta);
            text-decoration: none;
            font-weight: 800;
            transition: color 0.3s;
        }

        .login-footer a:hover {
            color: white;
            text-shadow: 0 0 10px var(--menta);
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

        .status-message {
            background: rgba(89, 222, 160, 0.1);
            color: var(--menta);
            padding: 12px;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            font-weight: 600;
        }
    </style>
</head>

<body>

    <div class="login-box">
        <a href="{{ route('inicio') }}" class="brand-logo">
            <img src="{{ asset('images/logoplano.png') }}" alt="NovaCore Logo">
        </a>
        <h1>NovaCore</h1>
        <p>Inicia sesión en tu terminal estelar</p>

        @if (session('status'))
            <div class="status-message">{{ session('status') }}</div>
        @endif

        @if ($errors->any())
            <div class="error-container">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                    placeholder="astronauta@novacore.com" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password" placeholder="••••••••" required
                    autocomplete="current-password">
            </div>

            <div class="form-group" style="margin-bottom: 2rem;">
                <label for="remember_me" style="display: inline-flex; align-items: center; text-transform: none; font-size: 0.85rem; cursor: pointer; margin: 0;">
                    <input id="remember_me" type="checkbox" name="remember" style="width: auto; margin-right: 8px;">
                    <span style="color: rgba(255,255,255,0.6); font-weight: normal;">Recuérdame</span>
                </label>
            </div>

            <button type="submit" class="btn-submit">Sincronizar Datos</button>
        </form>

        <div class="login-footer">
            ¿Nuevo en la flota? <a href="{{ route('register') }}">Únete a la misión</a>
        </div>

        <a href="{{ route('inicio') }}" class="back-home">← Abortar y volver a Inicio</a>
    </div>

</body>

</html>