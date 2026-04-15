<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaCore - Admin Panel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --negro: #000000;
            --azul: #2746FF;
            --morado: #680EBC;
            --lavanda: #8767EB;
            --menta: #59DEA0;
            --fondo-soft: rgba(255, 255, 255, 0.05);
            --error: #ff4d4d;
            --glass-bg: rgba(20, 20, 30, 0.6);
            --glass-border: rgba(255, 255, 255, 0.08);
        }

        body {
            background-color: var(--negro);
            background-image: radial-gradient(circle at top right, #1a1a3a 0%, #000 100%);
            color: white;
            font-family: 'Inter', sans-serif;
            margin: 0;
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 260px;
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border-right: 1px solid var(--glass-border);
            display: flex;
            flex-direction: column;
            padding: 2rem 1rem;
            box-shadow: 2px 0 20px rgba(0, 0, 0, 0.5);
            position: fixed;
            height: 100vh;
            box-sizing: border-box;
        }

        .sidebar-brand a {
            color: var(--menta);
            text-decoration: none;
            font-size: 1.8rem;
            font-weight: 800;
            display: block;
            text-align: center;
            margin-bottom: 2.5rem;
            letter-spacing: 1px;
        }

        .sidebar-nav {
            list-style: none;
            padding: 0;
            margin: 0;
            flex-grow: 1;
        }

        .sidebar-nav li {
            margin-bottom: 0.5rem;
        }

        .sidebar-nav a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 12px 15px;
            border-radius: 12px;
            transition: all 0.3s ease;
            font-weight: 600;
        }

        .sidebar-nav a:hover, .sidebar-nav a.active {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .sidebar-nav a.active {
            box-shadow: inset 4px 0 0 var(--menta);
        }

        .sidebar-footer {
            margin-top: auto;
            text-align: center;
            padding-top: 1rem;
            border-top: 1px solid var(--glass-border);
        }
        
        .sidebar-footer a {
            color: rgba(255, 255, 255, 0.5);
            text-decoration: none;
            font-size: 0.85rem;
        }

        .sidebar-footer a:hover {
            color: var(--menta);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 260px;
            padding: 2rem 3rem;
            box-sizing: border-box;
        }

        .top-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--glass-border);
        }

        .page-title {
            font-size: 1.8rem;
            font-weight: 800;
            color: white;
            margin: 0;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
        }

        .logout-btn {
            background: rgba(255, 77, 77, 0.1);
            color: var(--error);
            border: 1px solid rgba(255, 77, 77, 0.3);
            padding: 6px 12px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.2s;
        }

        .logout-btn:hover {
            background: rgba(255, 77, 77, 0.2);
            border-color: var(--error);
        }

        /* Common Cosmic UI Components */
        .cosmic-card {
            background: var(--glass-bg);
            backdrop-filter: blur(15px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            margin-bottom: 2rem;
        }

        .cosmic-btn {
            background: linear-gradient(45deg, var(--morado), var(--azul));
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-block;
        }

        .cosmic-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(39, 70, 255, 0.4);
        }

        .cosmic-btn-sec {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 1px solid var(--glass-border);
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-block;
        }

        .cosmic-btn-sec:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.3);
        }

        /* Cosmic Table */
        .cosmic-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 1rem;
        }

        .cosmic-table th {
            text-align: left;
            padding: 15px;
            color: var(--lavanda);
            text-transform: uppercase;
            font-size: 0.8rem;
            font-weight: 800;
            border-bottom: 1px solid var(--glass-border);
        }

        .cosmic-table td {
            padding: 15px;
            color: rgba(255, 255, 255, 0.8);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            font-size: 0.95rem;
        }

        .cosmic-table tr:hover td {
            background: rgba(255, 255, 255, 0.02);
            color: white;
        }

        .action-links a {
            margin-right: 10px;
            color: var(--menta);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: bold;
        }

        .action-links a.delete {
            color: var(--error);
        }

        .action-links a:hover {
            text-decoration: underline;
        }

        /* Standard Forms */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            color: var(--lavanda);
            font-size: 0.85rem;
            font-weight: bold;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            padding: 12px 15px;
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid var(--glass-border);
            border-radius: 10px;
            color: white;
            font-family: inherit;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        .form-group input:focus, .form-group textarea:focus, .form-group select:focus {
            outline: none;
            border-color: var(--azul);
        }

        .form-group select option {
            background: var(--negro);
            color: white;
        }

        /* Success Message */
        .alert-success {
            background: rgba(89, 222, 160, 0.1);
            color: var(--menta);
            padding: 1rem;
            border-radius: 10px;
            border: 1px solid rgba(89, 222, 160, 0.3);
            margin-bottom: 2rem;
            font-weight: 600;
        }

    </style>
</head>

<body>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">NovaCore</a>
        </div>
        
        <ul class="sidebar-nav">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    Módulo Central
                </a>
            </li>
            <li>
                <a href="{{ route('admin.levels.index') ?? '#' }}" class="{{ request()->routeIs('admin.levels.*') ? 'active' : '' }}">
                    Niveles
                </a>
            </li>
            <li>
                <a href="{{ route('admin.lessons.index') ?? '#' }}" class="{{ request()->routeIs('admin.lessons.*') ? 'active' : '' }}">
                    Lecciones
                </a>
            </li>
            <li>
                <a href="{{ route('admin.events.index') }}" class="{{ request()->routeIs('admin.events.*') ? 'active' : '' }}">
                    Eventos
                </a>
            </li>
        </ul>

        <div class="sidebar-footer">
            <a href="{{ route('inicio') }}">← Volver a la App</a>
        </div>
    </aside>

    <!-- Content -->
    <main class="main-content">
        <header class="top-header">
            <h1 class="page-title">@yield('title', 'Admin Dashboard')</h1>
            
            <div class="user-info">
                <span>Cmdte. {{ Auth::user()->name ?? 'Admin' }}</span>
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" class="logout-btn">Salir</button>
                </form>
            </div>
        </header>

        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

</body>
</html>
