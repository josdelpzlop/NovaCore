@extends('layouts.master')

@section('title', 'Centro de Mando - NovaCore')

@section('content')
<div class="dashboard-wrapper" style="max-width: 1400px; margin: 0 auto; padding: 100px 5% 50px; min-height: 80vh;">
    
    <!-- Elementos decorativos de fondo -->
    <div style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; overflow: hidden; pointer-events: none; z-index: -1;">
        <div style="position: absolute; top: -10%; left: -10%; width: 50vw; height: 50vw; background: radial-gradient(circle, {{ Auth::user()->user_level_color }} 0%, transparent 70%); filter: blur(100px); opacity: 0.1; animation: pulseGlow 8s infinite alternate;"></div>
        <div style="position: absolute; top: 30%; right: -15%; width: 60vw; height: 60vw; background: radial-gradient(circle, {{ Auth::user()->user_level_color }} 0%, transparent 70%); filter: blur(120px); opacity: 0.1; animation: pulseGlow 10s infinite alternate-reverse;"></div>
        <div style="position: absolute; bottom: -20%; left: 10%; width: 50vw; height: 50vw; background: radial-gradient(circle, #ffffff 0%, transparent 70%); filter: blur(100px); opacity: 0.05; animation: pulseGlow 12s infinite alternate;"></div>
    </div>
    
    <!-- Título de Sección -->
    <div style="margin-bottom: 2.5rem; display: flex; align-items: center; gap: 15px;">
        <svg style="width: 2.5rem; height: 2.5rem; color: {{ Auth::user()->user_level_color }}; filter: drop-shadow(0 0 10px {{ Auth::user()->user_level_color }}80);" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
        <h1 style="font-size: 2.5rem; margin: 0; font-weight: 800; background: -webkit-linear-gradient(135deg, #fff, {{ Auth::user()->user_level_color }}); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
            Centro de Mando Principal
        </h1>
    </div>

    <!-- Bento Grid Structure -->
    <div class="dashboard-grid" style="display: grid; grid-template-columns: 350px 1fr; gap: 30px; align-items: stretch;">
        
        <!-- ========================================== -->
        <!-- COLUMNA IZQUIERDA: PERFIL DEL COMANDANTE   -->
        <!-- ========================================== -->
        <div class="profile-col" style="display: flex; flex-direction: column; gap: 20px;">
            
            <!-- Tarjeta de Perfil Central -->
            <div style="background: linear-gradient(180deg, rgba(16, 26, 43, 0.9), {{ Auth::user()->user_level_color }}20); border: 1px solid {{ Auth::user()->user_level_color }}40; border-radius: 24px; padding: 40px 20px; text-align: center; backdrop-filter: blur(15px); box-shadow: 0 10px 40px rgba(0,0,0,0.5), inset 0 0 30px {{ Auth::user()->user_level_color }}10; flex-grow: 1; display: flex; flex-direction: column;">
                
                <!-- Avatar -->
                <div class="avatar-container" style="position: relative; width: 120px; height: 120px; margin: 0 auto 25px;">
                    <div style="position: absolute; top: -10%; left: -10%; width: 120%; height: 120%; background: radial-gradient(circle, {{ Auth::user()->user_level_color }}60 0%, transparent 70%); z-index: 0; animation: pulse 4s infinite alternate; border-radius: 50%;"></div>
                    <div style="position: relative; width: 100%; height: 100%; background: linear-gradient(135deg, rgba(255,255,255,0.1), rgba(0,0,0,0.5)); border-radius: 50%; z-index: 1; display: flex; justify-content: center; align-items: center; font-size: 3.5rem; font-weight: bold; color: white; border: 3px solid {{ Auth::user()->user_level_color }}; box-shadow: 0 0 20px {{ Auth::user()->user_level_color }}80, inset 0 0 20px rgba(0,0,0,0.5);">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                </div>

                <!-- Info Usuario -->
                <h2 style="font-size: 1.8rem; margin: 0 0 5px; color: white; font-weight: 800; letter-spacing: 1px;">{{ Auth::user()->name }}</h2>
                
                <!-- Estado En Línea -->
                <div style="display: flex; align-items: center; justify-content: center; gap: 8px; margin-bottom: 30px;">
                    <span style="width: 8px; height: 8px; background: #10b981; border-radius: 50%; box-shadow: 0 0 10px #10b981;"></span>
                    <span style="color: #10b981; font-size: 0.8rem; font-weight: bold; letter-spacing: 1.5px;">SISTEMA EN LÍNEA</span>
                </div>

                <!-- Título Equipado -->
                @if(Auth::user()->current_title && array_key_exists(Auth::user()->current_title, App\Models\User::$achievementData))
                    @php 
                        $titleData = App\Models\User::$achievementData[Auth::user()->current_title]; 
                    @endphp
                    <div style="margin-top: auto; background: rgba(0,0,0,0.4); border: 1px solid {{ $titleData['color'] }}50; border-radius: 20px; padding: 20px 15px; position: relative; overflow: hidden;">
                        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: radial-gradient(circle at top right, {{ $titleData['color'] }}20 0%, transparent 70%); pointer-events: none;"></div>
                        <p style="color: #64748b; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 2px; margin: 0 0 10px;">Título Equipado</p>
                        <div style="color: {{ $titleData['color'] }}; width: 3.5rem; height: 3.5rem; margin: 0 auto 10px; display: block; filter: drop-shadow(0 0 10px {{ $titleData['color'] }}80);">
                            {!! $titleData['icon'] !!}
                        </div>
                        <h3 style="color: {{ $titleData['text_color'] }}; margin: 0; font-size: 1.2rem; text-transform: uppercase; font-weight: 800; letter-spacing: 1px;">{{ $titleData['name'] }}</h3>
                    </div>
                @else
                    <div style="margin-top: auto; background: rgba(0,0,0,0.3); border: 1px dashed rgba(255,255,255,0.2); border-radius: 20px; padding: 20px 15px;">
                        <p style="color: #64748b; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; margin: 0;">Sin título equipado</p>
                        <a href="{{ route('recompensas') }}" style="color: #3b82f6; text-decoration: none; font-size: 0.85rem; display: block; margin-top: 10px;">Visitar Sala de Trofeos</a>
                    </div>
                @endif
                
                <div style="margin-top: 25px; padding-top: 25px; border-top: 1px solid rgba(255,255,255,0.05); color: #64748b; font-size: 0.8rem; letter-spacing: 1px; text-transform: uppercase;">
                    Miembro desde el {{ Auth::user()->created_at->format('d/m/Y') }}
                </div>
            </div>

            <!-- Botón Cerrar Sesión -->
            <form method="POST" action="{{ route('logout') }}" style="width: 100%;">
                @csrf
                <button type="submit" class="logout-btn" style="width: 100%; background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.3); color: #fca5a5; padding: 15px; border-radius: 16px; font-weight: bold; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px; display: flex; justify-content: center; align-items: center; gap: 10px; cursor: pointer; transition: all 0.3s ease;">
                    <svg style="width: 1.2rem; height: 1.2rem;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Cerrar Sesión
                </button>
            </form>

        </div>


        <!-- ========================================== -->
        <!-- COLUMNA DERECHA: TELEMETRÍA Y PROGRESO     -->
        <!-- ========================================== -->
        <div class="telemetry-col" style="display: flex; flex-direction: column; gap: 30px;">
            
            <!-- Gran Panel de Progreso -->
            <div style="background: linear-gradient(135deg, rgba(16, 26, 43, 0.9), {{ Auth::user()->user_level_color }}25); border: 1px solid {{ Auth::user()->user_level_color }}50; border-radius: 24px; padding: 40px; position: relative; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.5);">
                
                <!-- Fondo animado -->
                <div style="position: absolute; top: -50%; right: -20%; width: 60%; height: 200%; background: radial-gradient(ellipse, {{ Auth::user()->user_level_color }}20 0%, transparent 60%); z-index: 0; animation: pulse 6s infinite alternate-reverse; transform: rotate(-45deg);"></div>
                
                <div style="position: relative; z-index: 1;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 25px; flex-wrap: wrap; gap: 20px;">
                        <div>
                            <h2 style="margin: 0 0 5px; font-size: 1.2rem; color: #cbd5e1; font-weight: normal; text-transform: uppercase; letter-spacing: 2px;">Clasificación de Rango</h2>
                            <div style="font-size: 2.5rem; font-weight: 900; color: white; text-transform: uppercase; letter-spacing: 1px; text-shadow: 0 0 20px {{ Auth::user()->user_level_color }}80;">
                                {{ Auth::user()->user_level }}
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <div style="font-size: 4rem; font-weight: 900; color: {{ Auth::user()->user_level_color }}; line-height: 1; text-shadow: 0 0 30px {{ Auth::user()->user_level_color }}90;">
                                LVL {{ Auth::user()->user_level_number }}
                            </div>
                            <div style="color: #94a3b8; font-size: 1.1rem; font-weight: bold; margin-top: 5px; letter-spacing: 1px;">
                                {{ Auth::user()->xp }} / {{ Auth::user()->next_level_xp }} XP
                            </div>
                        </div>
                    </div>

                    <!-- Barra XP Larga -->
                    <div style="height: 16px; background: rgba(0,0,0,0.6); border-radius: 8px; overflow: hidden; width: 100%; border: 1px solid rgba(255,255,255,0.1); position: relative;">
                        <div style="width: {{ Auth::user()->xp_progress }}%; height: 100%; background: linear-gradient(90deg, rgba(255,255,255,0.2), {{ Auth::user()->user_level_color }}); box-shadow: 0 0 20px {{ Auth::user()->user_level_color }}; transition: width 1.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);"></div>
                    </div>
                    <p style="margin: 15px 0 0; color: #94a3b8; font-size: 0.9rem;">
                        @if(Auth::user()->xp_progress >= 100)
                            ¡Has alcanzado el máximo nivel de conocimiento estelar!
                        @else
                            A solo {{ Auth::user()->next_level_xp - Auth::user()->xp }} XP de ascender al siguiente rango. Sigue explorando.
                        @endif
                    </p>
                </div>
            </div>

            <!-- Grid de Estadísticas Menores -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                
                <!-- Stat: Lecciones -->
                <div class="stat-card" style="background: rgba(59, 130, 246, 0.05); border: 1px solid rgba(59, 130, 246, 0.2); border-radius: 20px; padding: 25px; display: flex; align-items: center; gap: 20px; transition: all 0.3s ease;">
                    <div style="background: rgba(59, 130, 246, 0.1); padding: 15px; border-radius: 15px; border: 1px solid rgba(59, 130, 246, 0.3);">
                        <svg style="width: 2.5rem; height: 2.5rem; color: #60a5fa; filter: drop-shadow(0 0 10px rgba(59, 130, 246, 0.5));" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <div>
                        <div style="font-size: 2.5rem; font-weight: 900; color: white; line-height: 1;">{{ Auth::user()->completedLessons()->count() }}</div>
                        <div style="color: #94a3b8; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px; margin-top: 5px;">Lecciones</div>
                    </div>
                </div>

                <!-- Stat: Eventos -->
                <div class="stat-card" style="background: rgba(167, 139, 250, 0.05); border: 1px solid rgba(167, 139, 250, 0.2); border-radius: 20px; padding: 25px; display: flex; align-items: center; gap: 20px; transition: all 0.3s ease;">
                    <div style="background: rgba(167, 139, 250, 0.1); padding: 15px; border-radius: 15px; border: 1px solid rgba(167, 139, 250, 0.3);">
                        <svg style="width: 2.5rem; height: 2.5rem; color: #c4b5fd; filter: drop-shadow(0 0 10px rgba(167, 139, 250, 0.5));" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    </div>
                    <div>
                        <div style="font-size: 2.5rem; font-weight: 900; color: white; line-height: 1;">{{ Auth::user()->attendedEventsCount() }}</div>
                        <div style="color: #94a3b8; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px; margin-top: 5px;">Eventos Vistos</div>
                    </div>
                </div>
            </div>

            <!-- Navegación Táctica Rápida -->
            <div style="background: rgba(16, 26, 43, 0.7); border: 1px solid rgba(255,255,255,0.1); border-radius: 24px; padding: 30px; backdrop-filter: blur(10px);">
                <h3 style="margin: 0 0 20px; font-size: 1.1rem; color: #cbd5e1; text-transform: uppercase; letter-spacing: 2px;">Navegación Táctica</h3>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
                    <a href="{{ route('aprende') }}" class="nav-card nav-card-blue">
                        <svg viewBox="0 0 24 24"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        Academia Estelar
                    </a>
                    
                    <a href="{{ route('events.index') }}" class="nav-card nav-card-purple">
                        <svg viewBox="0 0 24 24"><path d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path></svg>
                        Radar de Misiones
                    </a>

                    <a href="{{ route('fenomenos.index') }}" class="nav-card nav-card-red">
                        <svg viewBox="0 0 24 24"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        Observatorio Diario
                    </a>
                </div>
            </div>

        </div>

    </div>
</div>

<style>
    /* Efectos hover para las tarjetas de estadísticas */
    .stat-card:hover {
        transform: translateY(-5px);
        background: rgba(255,255,255,0.08) !important;
    }
    
    /* Estilos para los botones de Navegación Táctica */
    .nav-card {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 15px 20px;
        border-radius: 16px;
        color: white;
        text-decoration: none;
        font-weight: bold;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        text-align: center;
    }
    
    .nav-card svg {
        width: 1.2rem;
        height: 1.2rem;
        fill: none;
        stroke: currentColor;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    .nav-card-blue {
        background: rgba(59, 130, 246, 0.1);
        border: 1px solid rgba(59, 130, 246, 0.3);
        color: #93c5fd;
    }
    .nav-card-blue:hover {
        background: rgba(59, 130, 246, 0.2);
        border-color: rgba(59, 130, 246, 0.6);
        box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
        transform: translateY(-3px);
        color: white;
    }

    .nav-card-purple {
        background: rgba(167, 139, 250, 0.1);
        border: 1px solid rgba(167, 139, 250, 0.3);
        color: #c4b5fd;
    }
    .nav-card-purple:hover {
        background: rgba(167, 139, 250, 0.2);
        border-color: rgba(167, 139, 250, 0.6);
        box-shadow: 0 0 20px rgba(167, 139, 250, 0.3);
        transform: translateY(-3px);
        color: white;
    }

    .nav-card-red {
        background: rgba(244, 63, 94, 0.1);
        border: 1px solid rgba(244, 63, 94, 0.3);
        color: #fda4af;
    }
    .nav-card-red:hover {
        background: rgba(244, 63, 94, 0.2);
        border-color: rgba(244, 63, 94, 0.6);
        box-shadow: 0 0 20px rgba(244, 63, 94, 0.3);
        transform: translateY(-3px);
        color: white;
    }

    .logout-btn:hover {
        background: rgba(239, 68, 68, 0.2) !important;
        border-color: rgba(239, 68, 68, 0.5) !important;
        color: white !important;
        box-shadow: 0 0 15px rgba(239, 68, 68, 0.3);
    }

    @keyframes pulse { 0%, 100% { opacity: 0.5; transform: scale(1); } 50% { opacity: 1; transform: scale(1.05); } }

    /* Responsive adjustments */
    @media (max-width: 900px) {
        .dashboard-grid {
            grid-template-columns: 1fr;
        }
        .profile-col {
            margin-bottom: 20px;
        }
    }
</style>
@endsection
