@extends('layouts.master')

@section('title', 'Mi Dashboard')

@section('content')
<div class="dashboard-container" style="
    padding: 100px 20px 50px;
    min-height: 80vh;
    display: flex;
    justify-content: center;
    align-items: flex-start;
">
    <div class="dashboard-card" style="
        background: rgba(16, 26, 43, 0.7);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        width: 100%;
        max-width: 900px;
        padding: 40px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.5), inset 0 0 20px rgba(78, 115, 223, 0.2);
        color: white;
    ">
        
        <div class="dashboard-header" style="text-align: center; margin-bottom: 40px;">
            <div class="avatar" style="
                width: 100px; height: 100px; 
                background: linear-gradient(135deg, #4e73df, #1cc88a);
                border-radius: 50%;
                margin: 0 auto 20px;
                display: flex; justify-content: center; align-items: center;
                font-size: 40px; font-weight: bold;
                border: 4px solid rgba(255, 255, 255, 0.2);
                box-shadow: 0 0 30px rgba(28, 200, 138, 0.3);
            ">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <h1 style="font-size: 2.5rem; margin-bottom: 10px; background: -webkit-linear-gradient(#fff, #a5b4fc); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                Bienvenido, {{ Auth::user()->name }}
            </h1>
            <p style="color: #94a3b8; font-size: 1.1rem;">Tu Centro de Mando Estelar</p>
        </div>

        <div class="stats-grid" style="
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        ">
            <div class="stat-card" style="
                background: rgba(255,255,255,0.05);
                border: 1px solid rgba(255,255,255,0.1);
                border-radius: 15px;
                padding: 25px;
                text-align: center;
                transition: transform 0.3s, box-shadow 0.3s;
            " onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 20px rgba(78,115,223,0.2)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                <div style="font-size: 3rem; color: #4e73df; margin-bottom: 10px;">📚</div>
                <h3 style="font-size: 2rem; margin: 0;">{{ Auth::user()->completedLessons()->count() }}</h3>
                <p style="color: #cbd5e1; margin: 5px 0 0;">Lecciones Completadas</p>
            </div>

            <div class="stat-card" style="
                background: rgba(255,255,255,0.05);
                border: 1px solid rgba(255,255,255,0.1);
                border-radius: 15px;
                padding: 25px;
                text-align: center;
                transition: transform 0.3s, box-shadow 0.3s;
            " onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 20px rgba(28,200,138,0.2)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                <div style="font-size: 3rem; color: #1cc88a; margin-bottom: 10px;">🌟</div>
                <h3 style="font-size: 2rem; margin: 0;">{{ Auth::user()->completedLessons()->count() * 150 }}</h3>
                <p style="color: #cbd5e1; margin: 5px 0 0;">Puntos de Experiencia</p>
            </div>
            
            <div class="stat-card" style="
                background: rgba(255,255,255,0.05);
                border: 1px solid rgba(255,255,255,0.1);
                border-radius: 15px;
                padding: 25px;
                text-align: center;
                transition: transform 0.3s, box-shadow 0.3s;
            " onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 20px rgba(246,194,62,0.2)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                <div style="font-size: 3rem; color: #f6c23e; margin-bottom: 10px;">🛡️</div>
                <h3 style="font-size: 1.5rem; margin: 0; padding-top: 5px;">Explorador</h3>
                <p style="color: #cbd5e1; margin: 5px 0 0;">Rango Actual</p>
            </div>
        </div>

        <div class="quick-actions" style="text-align: center;">
            <p style="color: #94a3b8; margin-bottom: 15px; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 2px;">Navegación del Sistema</p>
            <div style="margin-top: 15px;">
                <a href="{{ route('aprende') }}" class="btn-login" style="
                    background: linear-gradient(90deg, #4e73df, #224abe);
                    padding: 12px 30px;
                    font-size: 1.1rem;
                    border-radius: 30px;
                    text-decoration: none;
                    display: inline-block;
                    margin-right: 15px;
                    margin-bottom: 10px;
                    box-shadow: 0 5px 15px rgba(78, 115, 223, 0.4);
                    transition: all 0.3s;
                " onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">🚀 Continuar Aprendiendo</a>

                <form method="POST" action="{{ route('logout') }}" style="display: inline-block;">
                    @csrf
                    <button type="submit" style="
                        background: rgba(255,255,255,0.1);
                        color: white;
                        border: 1px solid rgba(255,255,255,0.3);
                        padding: 12px 30px;
                        font-size: 1.1rem;
                        border-radius: 30px;
                        cursor: pointer;
                        transition: background 0.3s, transform 0.3s;
                    " onmouseover="this.style.background='rgba(255,255,255,0.2)'; this.style.transform='scale(1.05)';" onmouseout="this.style.background='rgba(255,255,255,0.1)'; this.style.transform='scale(1)';">
                        🔌 Desconectar
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
