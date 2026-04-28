@extends('layouts.master')

@section('title', 'Centro de Mando | NovaCore')

@section('content')
<div class="dashboard-wrapper" style="max-width: 1400px; margin: 0 auto; padding: 100px 5% 50px; min-height: 80vh;">
    
    <!-- Elementos decorativos de fondo -->
    <div style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; overflow: hidden; pointer-events: none; z-index: -1;">
        <div style="position: absolute; top: -10%; left: -10%; width: 50vw; height: 50vw; background: radial-gradient(circle, {{ Auth::user()->user_level_color }} 0%, transparent 70%); filter: blur(100px); opacity: 0.1; animation: pulseGlow 8s infinite alternate;"></div>
        <div style="position: absolute; top: 30%; right: -15%; width: 60vw; height: 60vw; background: radial-gradient(circle, {{ Auth::user()->user_level_color }} 0%, transparent 70%); filter: blur(120px); opacity: 0.1; animation: pulseGlow 10s infinite alternate-reverse;"></div>
        <div style="position: absolute; bottom: -20%; left: 10%; width: 50vw; height: 50vw; background: radial-gradient(circle, #ffffff 0%, transparent 70%); filter: blur(100px); opacity: 0.05; animation: pulseGlow 12s infinite alternate;"></div>
    </div>
    
    <!-- Mensajes de Estado -->
    @if(session('success'))
        <div style="background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.3); color: #34d399; padding: 15px; border-radius: 12px; margin-bottom: 20px; font-weight: bold; display: flex; align-items: center; gap: 10px;">
            <svg style="width: 1.2rem; height: 1.2rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.3); color: #fca5a5; padding: 15px; border-radius: 12px; margin-bottom: 20px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <!-- Título de Sección -->
    <div style="margin-bottom: 2.5rem; display: flex; align-items: center; justify-content: space-between;">
        <div style="display: flex; align-items: center; gap: 15px;">
            <svg style="width: 2.5rem; height: 2.5rem; color: {{ Auth::user()->user_level_color }}; filter: drop-shadow(0 0 10px {{ Auth::user()->user_level_color }}80);" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            <h1 style="font-size: 2.5rem; margin: 0; font-weight: 800; background: -webkit-linear-gradient(135deg, #fff, {{ Auth::user()->user_level_color }}); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                Centro de Mando Principal
            </h1>
        </div>
        <button onclick="openProfileModal('all')" class="cosmic-btn-sec" style="font-size: 0.85rem; padding: 10px 20px; display: flex; align-items: center; gap: 10px;">
            <svg style="width: 1.1rem; height: 1.1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            AJUSTES DEL SISTEMA
        </button>
    </div>

    <!-- Bento Grid Structure -->
    <div class="dashboard-grid" style="display: grid; grid-template-columns: 350px 1fr; gap: 30px; align-items: stretch;">
        
        <!-- ========================================== -->
        <!-- COLUMNA IZQUIERDA: PERFIL DEL COMANDANTE   -->
        <!-- ========================================== -->
        <div class="profile-col" style="display: flex; flex-direction: column; gap: 20px;">
            
            <!-- Tarjeta de Perfil Central -->
            <div style="background: linear-gradient(180deg, rgba(16, 26, 43, 0.9), {{ Auth::user()->user_level_color }}20); border: 1px solid {{ Auth::user()->user_level_color }}40; border-radius: 24px; padding: 40px 20px; text-align: center; backdrop-filter: blur(15px); box-shadow: 0 10px 40px rgba(0,0,0,0.5), inset 0 0 30px {{ Auth::user()->user_level_color }}10; flex-grow: 1; display: flex; flex-direction: column;">
                
                <!-- Avatar Clickable -->
                <div class="avatar-container clickable-profile" onclick="openProfileModal('avatar')" style="position: relative; width: 120px; height: 120px; margin: 0 auto 25px; cursor: pointer; group;">
                    <div style="position: absolute; top: -10%; left: -10%; width: 120%; height: 120%; background: radial-gradient(circle, {{ Auth::user()->user_level_color }}60 0%, transparent 70%); z-index: 0; animation: pulse 4s infinite alternate; border-radius: 50%;"></div>
                    <div class="avatar-frame" style="position: relative; width: 100%; height: 100%; background: linear-gradient(135deg, rgba(255,255,255,0.1), rgba(0,0,0,0.5)); border-radius: 50%; z-index: 1; display: flex; justify-content: center; align-items: center; font-size: 3.5rem; font-weight: bold; color: white; border: 3px solid {{ Auth::user()->user_level_color }}; box-shadow: 0 0 20px {{ Auth::user()->user_level_color }}80, inset 0 0 20px rgba(0,0,0,0.5); overflow: hidden; transition: all 0.3s;">
                        @if(Auth::user()->avatar)
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            {{ substr(Auth::user()->name, 0, 1) }}
                        @endif
                        <!-- Overlay Editar -->
                        <div class="edit-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.6); display: flex; justify-content: center; align-items: center; opacity: 0; transition: opacity 0.3s;">
                            <svg style="width: 2rem; height: 2rem; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                    </div>
                </div>

                <!-- Info Usuario Clickable -->
                <div style="display: flex; align-items: center; justify-content: center; gap: 10px; margin-bottom: 5px;">
                    <h2 onclick="openProfileModal('name')" style="font-size: 1.8rem; margin: 0; color: white; font-weight: 800; letter-spacing: 1px; cursor: pointer; transition: color 0.3s;" onmouseover="this.style.color='{{ Auth::user()->user_level_color }}'" onmouseout="this.style.color='white'">
                        {{ Auth::user()->name }}
                    </h2>
                    <svg onclick="openProfileModal('name')" style="width: 1.2rem; height: 1.2rem; color: rgba(255,255,255,0.3); cursor: pointer; transition: color 0.3s;" onmouseover="this.style.color='{{ Auth::user()->user_level_color }}'" onmouseout="this.style.color='rgba(255,255,255,0.3)'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                </div>
                
                <!-- Estado En Línea -->
                <div style="display: flex; align-items: center; justify-content: center; gap: 8px; margin-bottom: 30px;">
                    <span style="width: 8px; height: 8px; background: #10b981; border-radius: 50%; box-shadow: 0 0 10px #10b981;"></span>
                    <span style="color: #10b981; font-size: 0.8rem; font-weight: bold; letter-spacing: 1.5px;">SISTEMA EN LÍNEA</span>
                </div>

                <!-- Título Equipado -->
                @if(Auth::user()->currentReward)
                    <div style="margin-top: auto; background: rgba(0,0,0,0.4); border: 1px solid {{ Auth::user()->currentReward->color }}50; border-radius: 20px; padding: 20px 15px; position: relative; overflow: hidden;">
                        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: radial-gradient(circle at top right, {{ Auth::user()->currentReward->color }}20 0%, transparent 70%); pointer-events: none;"></div>
                        <p style="color: #64748b; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 2px; margin: 0 0 10px;">Título Equipado</p>
                        <div style="color: {{ Auth::user()->currentReward->color }}; width: 3.5rem; height: 3.5rem; margin: 0 auto 10px; display: block; filter: drop-shadow(0 0 10px {{ Auth::user()->currentReward->color }}80);">
                            {!! Auth::user()->currentReward->icon !!}
                        </div>
                        <h3 style="color: {{ Auth::user()->currentReward->text_color }}; margin: 0; font-size: 1.2rem; text-transform: uppercase; font-weight: 800; letter-spacing: 1px;">{{ Auth::user()->currentReward->name }}</h3>
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
                                {{ Auth::user()->xp }} / {{ Auth::user()->user_level_number === 'MAX' ? '∞' : Auth::user()->next_level_xp }} XP
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
                <div class="stat-card" onclick="openDashboardModal('lessonsModal')" style="cursor: pointer; background: rgba(59, 130, 246, 0.05); border: 1px solid rgba(59, 130, 246, 0.2); border-radius: 20px; padding: 25px; display: flex; align-items: center; gap: 20px; transition: all 0.3s ease;" title="Ver Lecciones Completadas">
                    <div style="background: rgba(59, 130, 246, 0.1); padding: 15px; border-radius: 15px; border: 1px solid rgba(59, 130, 246, 0.3);">
                        <svg style="width: 2.5rem; height: 2.5rem; color: #60a5fa; filter: drop-shadow(0 0 10px rgba(59, 130, 246, 0.5));" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <div>
                        <div style="font-size: 2.5rem; font-weight: 900; color: white; line-height: 1;">{{ Auth::user()->completedLessons()->count() }}</div>
                        <div style="color: #94a3b8; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px; margin-top: 5px;">Lecciones</div>
                    </div>
                </div>

                <!-- Stat: Eventos -->
                <div class="stat-card" onclick="openDashboardModal('eventsModal')" style="cursor: pointer; background: rgba(167, 139, 250, 0.05); border: 1px solid rgba(167, 139, 250, 0.2); border-radius: 20px; padding: 25px; display: flex; align-items: center; gap: 20px; transition: all 0.3s ease;" title="Ver Eventos Asistidos">
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
    <!-- Modals -->
    <div id="profileModal" class="dashboard-modal-backdrop" onclick="closeDashboardModal(event, 'profileModal')">
        <div class="dashboard-modal-content" style="background: rgba(16, 26, 43, 0.85); backdrop-filter: blur(25px); border: 1px solid rgba(255, 255, 255, 0.15); box-shadow: 0 20px 60px rgba(0,0,0,0.9), 0 0 30px {{ Auth::user()->user_level_color }}30; border-radius: 30px;">
            <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 20px; margin-bottom: 25px;">
                <h3 id="profile-modal-title" style="margin: 0; color: white; font-size: 1.6rem; display: flex; align-items: center; gap: 12px; font-weight: 800;">
                    <div style="background: {{ Auth::user()->user_level_color }}; padding: 8px; border-radius: 12px;">
                        <svg style="width: 1.5rem; height: 1.5rem; color: white;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    </div>
                    Ajustes de Comandante
                </h3>
                <button type="button" onclick="document.getElementById('profileModal').style.display='none'; document.body.style.overflow='auto';" style="background: rgba(255,255,255,0.05); border: none; color: white; width: 35px; height: 35px; border-radius: 50%; cursor: pointer; display: flex; justify-content: center; align-items: center; font-size: 1.2rem;">&times;</button>
            </div>
            
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 20px;">
                @csrf
                <!-- Seccion Avatar -->
                <div id="section-avatar" style="background: rgba(255,255,255,0.03); padding: 20px; border-radius: 20px; border: 1px solid rgba(255,255,255,0.05);">
                    <label style="color: var(--lavanda); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 2px; font-weight: bold; margin-bottom: 15px; display: block;">Identidad Visual (Avatar)</label>
                    <div style="display: flex; align-items: center; gap: 20px;">
                        <div style="width: 70px; height: 70px; border-radius: 50%; overflow: hidden; border: 2px solid {{ Auth::user()->user_level_color }};">
                            @if(Auth::user()->avatar)
                                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" style="width: 100%; height: 100%; object-fit: cover;">
                            @else
                                <div style="width: 100%; height: 100%; background: #1e293b; display: flex; justify-content: center; align-items: center; font-weight: bold; color: white;">{{ substr(Auth::user()->name, 0, 1) }}</div>
                            @endif
                        </div>
                        <input type="file" name="avatar" style="flex: 1; font-size: 0.85rem; color: #94a3b8;">
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <!-- Seccion Nombre -->
                    <div id="section-name" style="display: flex; flex-direction: column; gap: 8px;">
                        <label style="color: var(--lavanda); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 2px; font-weight: bold;">Nombre</label>
                        <input type="text" name="name" value="{{ Auth::user()->name }}" required style="background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.1); color: white; padding: 14px; border-radius: 15px; font-size: 1rem; outline: none; transition: border-color 0.3s;" onfocus="this.style.borderColor='{{ Auth::user()->user_level_color }}'">
                    </div>
                    <!-- Seccion Email -->
                    <div id="section-email" style="display: flex; flex-direction: column; gap: 8px;">
                        <label style="color: var(--lavanda); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 2px; font-weight: bold;">Correo</label>
                        <input type="email" name="email" value="{{ Auth::user()->email }}" required style="background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.1); color: white; padding: 14px; border-radius: 15px; font-size: 1rem; outline: none; transition: border-color 0.3s;" onfocus="this.style.borderColor='{{ Auth::user()->user_level_color }}'">
                    </div>
                </div>

                <!-- Seccion Password -->
                <div id="section-password" style="padding: 20px; border-radius: 20px; background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.05);">
                    <p style="color: #64748b; font-size: 0.8rem; margin: 0 0 15px;">Solo completa estos campos si deseas cambiar tu clave de acceso.</p>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                        <div style="display: flex; flex-direction: column; gap: 8px;">
                            <label style="color: var(--lavanda); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 2px; font-weight: bold;">Nueva contraseña</label>
                            <input type="password" name="password" style="background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.1); color: white; padding: 14px; border-radius: 15px; font-size: 1rem; outline: none;" placeholder="••••••••">
                        </div>
                        <div style="display: flex; flex-direction: column; gap: 8px;">
                            <label style="color: var(--lavanda); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 2px; font-weight: bold;">Confirmar contraseña</label>
                            <input type="password" name="password_confirmation" style="background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.1); color: white; padding: 14px; border-radius: 15px; font-size: 1rem; outline: none;" placeholder="••••••••">
                        </div>
                    </div>
                </div>

                <button type="submit" id="btn-submit-profile" style="background: linear-gradient(90deg, {{ Auth::user()->user_level_color }}, #1e40af); border: none; color: white; padding: 18px; border-radius: 20px; font-weight: 800; text-transform: uppercase; letter-spacing: 2px; cursor: pointer; transition: all 0.3s; box-shadow: 0 10px 20px {{ Auth::user()->user_level_color }}30;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 15px 30px {{ Auth::user()->user_level_color }}50';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 20px {{ Auth::user()->user_level_color }}30';">
                    Actualizar Protocolos
                </button>
            </form>
        </div>
    </div>

    <div id="lessonsModal" class="dashboard-modal-backdrop" onclick="closeDashboardModal(event, 'lessonsModal')">
        <div class="dashboard-modal-content" style="border: 1px solid rgba(59, 130, 246, 0.3); box-shadow: 0 10px 40px rgba(0,0,0,0.8), inset 0 0 20px rgba(59, 130, 246, 0.1);">
            <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 15px; margin-bottom: 20px;">
                <h3 style="margin: 0; color: white; font-size: 1.5rem; display: flex; align-items: center; gap: 10px;">
                    <svg style="width: 1.5rem; height: 1.5rem; color: #60a5fa;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    Lecciones Completadas
                </h3>
                <button type="button" onclick="document.getElementById('lessonsModal').style.display='none'; document.body.style.overflow='auto';" style="background: transparent; border: none; color: #94a3b8; font-size: 1.5rem; cursor: pointer;">&times;</button>
            </div>
            
            @if(Auth::user()->completedLessons->count() > 0)
                <ul style="list-style: none; padding: 0; margin: 0; max-height: 400px; overflow-y: auto; padding-right: 10px;" class="custom-scrollbar">
                    @foreach(Auth::user()->completedLessons as $lesson)
                        <li style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.05); border-radius: 12px; padding: 15px; margin-bottom: 10px; display: flex; flex-direction: column; gap: 5px;">
                            <div style="color: #60a5fa; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px;">{{ $lesson->level->title ?? 'Nivel Desconocido' }}</div>
                            <div style="color: white; font-weight: bold; font-size: 1.1rem;">{{ $lesson->title }}</div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p style="color: #94a3b8; text-align: center; padding: 20px 0;">No has completado ninguna lección todavía.</p>
            @endif
        </div>
    </div>

    <div id="eventsModal" class="dashboard-modal-backdrop" onclick="closeDashboardModal(event, 'eventsModal')">
        <div class="dashboard-modal-content" style="border: 1px solid rgba(167, 139, 250, 0.3); box-shadow: 0 10px 40px rgba(0,0,0,0.8), inset 0 0 20px rgba(167, 139, 250, 0.1);">
            <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 15px; margin-bottom: 20px;">
                <h3 style="margin: 0; color: white; font-size: 1.5rem; display: flex; align-items: center; gap: 10px;">
                    <svg style="width: 1.5rem; height: 1.5rem; color: #c4b5fd;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    Eventos Asistidos
                </h3>
                <button type="button" onclick="document.getElementById('eventsModal').style.display='none'; document.body.style.overflow='auto';" style="background: transparent; border: none; color: #94a3b8; font-size: 1.5rem; cursor: pointer;">&times;</button>
            </div>
            
            @if(Auth::user()->attendedEvents->count() > 0)
                <ul style="list-style: none; padding: 0; margin: 0; max-height: 400px; overflow-y: auto; padding-right: 10px;" class="custom-scrollbar">
                    @foreach(Auth::user()->attendedEvents as $event)
                        <li style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.05); border-radius: 12px; padding: 15px; margin-bottom: 10px; display: flex; flex-direction: column; gap: 5px;">
                            <div style="color: #c4b5fd; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px;">{{ $event->event_date ? $event->event_date->format('d/m/Y') : 'Fecha Desconocida' }}</div>
                            <div style="color: white; font-weight: bold; font-size: 1.1rem;">{{ $event->title }}</div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p style="color: #94a3b8; text-align: center; padding: 20px 0;">No has asistido a ningún evento todavía.</p>
            @endif
        </div>
    </div>
</div>

<script>
    function openProfileModal(mode) {
        const modal = document.getElementById('profileModal');
        const title = document.getElementById('profile-modal-title');
        const btnSubmit = document.getElementById('btn-submit-profile');
        
        // Secciones
        const secAvatar = document.getElementById('section-avatar');
        const secName = document.getElementById('section-name');
        const secEmail = document.getElementById('section-email');
        const secPass = document.getElementById('section-password');

        // Reset display
        [secAvatar, secName, secEmail, secPass].forEach(s => s.style.display = 'flex');
        secAvatar.style.display = 'block'; // Avatar es block por contenedor interno
        secPass.style.display = 'block'; // Password es block por contenedor interno

        if (mode === 'avatar') {
            title.innerHTML = '<div style="background: {{ Auth::user()->user_level_color }}; padding: 8px; border-radius: 12px;"><svg style="width: 1.5rem; height: 1.5rem; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path></svg></div> Actualizar Avatar';
            [secName, secEmail, secPass].forEach(s => s.style.display = 'none');
            btnSubmit.innerText = 'Guardar Nueva Foto';
        } else if (mode === 'name') {
            title.innerHTML = '<div style="background: {{ Auth::user()->user_level_color }}; padding: 8px; border-radius: 12px;"><svg style="width: 1.5rem; height: 1.5rem; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg></div> Cambiar Nombre';
            [secAvatar, secEmail, secPass].forEach(s => s.style.display = 'none');
            secName.style.flex = '1 1 100%';
            btnSubmit.innerText = 'Confirmar Identidad';
        } else {
            title.innerHTML = '<div style="background: {{ Auth::user()->user_level_color }}; padding: 8px; border-radius: 12px;"><svg style="width: 1.5rem; height: 1.5rem; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path></svg></div> Ajustes del Sistema';
            btnSubmit.innerText = 'Actualizar Protocolos';
        }

        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function openDashboardModal(modalId) {
        document.getElementById(modalId).style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
    function closeDashboardModal(event, modalId) {
        if (event.target.id === modalId) {
            document.getElementById(modalId).style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    }
</script>

<style>
    .dashboard-modal-backdrop {
        position: fixed; top: 0; left: 0; width: 100vw; height: 100vh;
        background: rgba(0, 0, 0, 0.7); backdrop-filter: blur(10px); z-index: 1000;
        display: none; justify-content: center; align-items: center; padding: 20px;
    }
    .dashboard-modal-content {
        background: linear-gradient(135deg, #101a2b, #0f172a);
        border-radius: 24px; padding: 30px; width: 100%; max-width: 600px;
        position: relative; animation: modalFadeIn 0.3s ease-out forwards;
    }
    @keyframes modalFadeIn {
        from { opacity: 0; transform: translateY(20px) scale(0.95); }
        to { opacity: 1; transform: translateY(0) scale(1); }
    }
    .custom-scrollbar::-webkit-scrollbar { width: 6px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: rgba(255,255,255,0.05); border-radius: 10px; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.2); border-radius: 10px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: rgba(255,255,255,0.3); }
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

    /* Botón Cósmico Secundario (Ajustes) */
    .cosmic-btn-sec {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: white;
        font-weight: 800;
        letter-spacing: 1px;
        text-transform: uppercase;
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.3);
    }
    .cosmic-btn-sec:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: {{ Auth::user()->user_level_color }};
        box-shadow: 0 0 20px {{ Auth::user()->user_level_color }}60;
        transform: translateY(-2px) scale(1.02);
    }

    /* Estilos para inputs del modal */
    #profileModal input[type="text"], 
    #profileModal input[type="email"], 
    #profileModal input[type="password"] {
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
    }
    #profileModal input:focus {
        border-color: {{ Auth::user()->user_level_color }} !important;
        box-shadow: 0 0 15px {{ Auth::user()->user_level_color }}40 !important;
        background: rgba(0, 0, 0, 0.5) !important;
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

    .avatar-frame:hover {
        transform: scale(1.05);
        border-color: white !important;
        box-shadow: 0 0 30px {{ Auth::user()->user_level_color }} !important;
    }

    .avatar-frame:hover .edit-overlay {
        opacity: 1 !important;
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
