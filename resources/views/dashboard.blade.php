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
            <h1 style="font-size: 2.5rem; margin-bottom: 10px; background: -webkit-linear-gradient(#fff, {{ Auth::user()->current_title && array_key_exists(Auth::user()->current_title, App\Models\User::$achievementData) ? App\Models\User::$achievementData[Auth::user()->current_title]['text_color'] : '#a5b4fc' }}); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                Bienvenido, {{ Auth::user()->name }}
            </h1>
            <p style="color: #94a3b8; font-size: 1.1rem; margin-bottom: 20px;">Tu Centro de Mando Estelar</p>

            @if(Auth::user()->current_title && array_key_exists(Auth::user()->current_title, App\Models\User::$achievementData))
                <div style="display: inline-flex; align-items: center; gap: 10px; background: rgba(0,0,0,0.5); border: 1px solid {{ App\Models\User::$achievementData[Auth::user()->current_title]['color'] }}; padding: 10px 25px; border-radius: 30px; margin-bottom: 40px; box-shadow: 0 0 15px {{ App\Models\User::$achievementData[Auth::user()->current_title]['color'] }}40;">
                    <span style="color: {{ App\Models\User::$achievementData[Auth::user()->current_title]['color'] }}; width: 24px; height: 24px; display: block;">
                        {!! App\Models\User::$achievementData[Auth::user()->current_title]['icon'] !!}
                    </span>
                    <span style="color: white; font-weight: bold; font-size: 1.1rem; text-transform: uppercase; letter-spacing: 1px;">
                        {{ App\Models\User::$achievementData[Auth::user()->current_title]['name'] }}
                    </span>
                </div>
            @else
                <div style="margin-bottom: 40px;"></div>
            @endif

            <!-- NEW: Animación y nivel -->
            <div style="background: rgba(0,0,0,0.3); border: 1px solid {{ Auth::user()->user_level_color }}50; border-radius: 20px; padding: 30px; text-align: center; margin-bottom: 40px; position: relative; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
                <div style="position: absolute; top: -50%; left: -50%; width: 200%; height: 200%; background: radial-gradient(circle, {{ Auth::user()->user_level_color }}20 0%, transparent 70%); z-index: 0; animation: pulse 4s infinite alternate;"></div>
                
                <div style="position: relative; z-index: 1;">
                    <h2 style="color: white; margin-top: 0; font-size: 1.8rem; font-weight: 300;">
                        ¡Vamos <span style="color: {{ Auth::user()->user_level_color }}; font-weight: bold;">{{ Auth::user()->name }}</span>, completa tus misiones y obtén el mejor título!
                    </h2>
                    
                    <div style="display: flex; justify-content: center; align-items: center; gap: 20px; margin: 30px 0; flex-wrap: wrap;">
                        <div style="font-size: 4rem; font-weight: 900; color: {{ Auth::user()->user_level_color }}; text-shadow: 0 0 20px {{ Auth::user()->user_level_color }}80;">
                            LVL {{ Auth::user()->user_level_number }}
                        </div>
                        <div style="text-align: left; min-width: 200px;">
                            <div style="font-size: 1.5rem; color: white; text-transform: uppercase; letter-spacing: 2px;">{{ Auth::user()->user_level }}</div>
                            <div style="color: #94a3b8; font-size: 1rem;">{{ Auth::user()->xp }} / {{ Auth::user()->next_level_xp }} XP</div>
                        </div>
                    </div>

                    <div style="height: 12px; background: rgba(255,255,255,0.1); border-radius: 6px; overflow: hidden; max-width: 600px; margin: 0 auto; border: 1px solid rgba(255,255,255,0.1);">
                        <div style="width: {{ Auth::user()->xp_progress }}%; height: 100%; background: linear-gradient(90deg, rgba(255,255,255,0.1), {{ Auth::user()->user_level_color }}); box-shadow: 0 0 15px {{ Auth::user()->user_level_color }}; transition: width 1s ease-in-out;"></div>
                    </div>
                </div>
            </div>
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
                <svg style="width: 3rem; height: 3rem; color: #4e73df; margin: 0 auto 10px; display: block;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
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
                <svg style="width: 3rem; height: 3rem; color: #1cc88a; margin: 0 auto 10px; display: block;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                <h3 style="font-size: 2rem; margin: 0;">{{ Auth::user()->xp }}</h3>
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
                <svg style="width: 3rem; height: 3rem; color: #f6c23e; margin: 0 auto 10px; display: block;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                <h3 style="font-size: 1.5rem; margin: 0; padding-top: 5px; color: {{ Auth::user()->user_level_color }};">{{ Auth::user()->user_level }}</h3>
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
                " onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'"><svg style="width: 1.2rem; height: 1.2rem; vertical-align: text-bottom; margin-right: 5px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path></svg> Continuar Aprendiendo</a>

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
                        <svg style="width: 1.2rem; height: 1.2rem; vertical-align: text-bottom; margin-right: 5px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg> Desconectar
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>

<style>
    @keyframes pulse {
        0% { transform: scale(1); opacity: 0.5; }
        100% { transform: scale(1.1); opacity: 1; }
    }
</style>
@endsection
