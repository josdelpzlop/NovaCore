@extends('layouts.master')

@section('title', 'Centro de Mando | NovaCore')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}?v=1.0">
<style>
    :root {
        --user-color: {{ Auth::user()->user_level_color }};
        --user-color-20: {{ Auth::user()->user_level_color }}20;
        --user-color-25: {{ Auth::user()->user_level_color }}25;
        --user-color-30: {{ Auth::user()->user_level_color }}30;
        --user-color-40: {{ Auth::user()->user_level_color }}40;
        --user-color-50: {{ Auth::user()->user_level_color }}50;
        --user-color-60: {{ Auth::user()->user_level_color }}60;
        --user-color-80: {{ Auth::user()->user_level_color }}80;
    }
    .dashboard-title { background: linear-gradient(135deg, #fff, var(--user-color)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    .dashboard-header-icon { color: var(--user-color); filter: drop-shadow(0 0 10px var(--user-color-80)); }
    .profile-card { background: linear-gradient(180deg, rgba(16,26,43,0.9), var(--user-color-20)); border: 1px solid var(--user-color-40); box-shadow: 0 10px 40px rgba(0,0,0,0.5), inset 0 0 30px {{ Auth::user()->user_level_color }}10; }
    .avatar-glow { background: radial-gradient(circle, var(--user-color-60) 0%, transparent 70%); }
    .avatar-frame { border-color: var(--user-color); box-shadow: 0 0 20px var(--user-color-80), inset 0 0 20px rgba(0,0,0,0.5); }
    .avatar-frame:hover { box-shadow: 0 0 30px var(--user-color) !important; }
    .progress-panel { background: linear-gradient(135deg, rgba(16,26,43,0.9), var(--user-color-25)); border: 1px solid var(--user-color-50); }
    .progress-panel-bg { background: radial-gradient(ellipse, var(--user-color-20) 0%, transparent 60%); }
    .progress-rank-name { text-shadow: 0 0 20px var(--user-color-80); }
    .progress-level { color: var(--user-color); text-shadow: 0 0 30px {{ Auth::user()->user_level_color }}90; }
    .xp-bar-fill { background: linear-gradient(90deg, rgba(255,255,255,0.2), var(--user-color)); box-shadow: 0 0 20px var(--user-color); }
    .modal-submit { background: linear-gradient(90deg, var(--user-color), #1e40af); box-shadow: 0 10px 20px var(--user-color-30); }
    .modal-submit:hover { box-shadow: 0 15px 30px var(--user-color-50); }
    .dashboard-bg-orb--1, .dashboard-bg-orb--2 { background: radial-gradient(circle, var(--user-color) 0%, transparent 70%); }
</style>
@endpush

@section('content')
<div class="dashboard-wrapper">
    
    <!-- Elementos decorativos de fondo -->
    <div class="dashboard-bg">
        <div class="dashboard-bg-orb dashboard-bg-orb--1"></div>
        <div class="dashboard-bg-orb dashboard-bg-orb--2"></div>
        <div class="dashboard-bg-orb dashboard-bg-orb--3" style="background: radial-gradient(circle, #fff 0%, transparent 70%);"></div>
    </div>
    
    <!-- Mensajes de Estado -->
    @if(session('success'))
        <div style="background: rgba(16,185,129,0.1); border: 1px solid rgba(16,185,129,0.3); color: #34d399; padding: 15px; border-radius: 12px; margin-bottom: 20px; font-weight: bold; display: flex; align-items: center; gap: 10px;">
            <svg style="width:1.2rem;height:1.2rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            {{ session('success') }}
        </div>
    @endif
    @if($errors->any())
        <div style="background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.3); color: #fca5a5; padding: 15px; border-radius: 12px; margin-bottom: 20px;">
            <ul style="margin:0;padding-left:20px;">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif
    
    <!-- Título -->
    <div class="dashboard-header">
        <div class="dashboard-header-left">
            <svg class="dashboard-header-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            <h1 class="dashboard-title">Centro de Mando Principal</h1>
        </div>
        <button onclick="openProfileModal('all')" class="cosmic-btn-sec">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            AJUSTES DEL SISTEMA
        </button>
    </div>

    <div class="dashboard-grid">
        
        <!-- ========================================== -->
        <!-- COLUMNA IZQUIERDA: PERFIL DEL COMANDANTE   -->
        <!-- ========================================== -->
        <div class="profile-col">
            
            <div class="profile-card">
                <!-- Avatar -->
                <div class="avatar-container" onclick="openProfileModal('avatar')">
                    <div class="avatar-glow"></div>
                    <div class="avatar-frame">
                        @if(Auth::user()->avatar)
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}">
                        @else
                            {{ substr(Auth::user()->name, 0, 1) }}
                        @endif
                        <div class="edit-overlay">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                    </div>
                </div>

                <!-- Nombre -->
                <div class="profile-identity">
                    <h2 class="profile-name" onclick="openProfileModal('name')">{{ Auth::user()->name }}</h2>
                    <svg class="profile-edit-icon" onclick="openProfileModal('name')" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                </div>
                
                <div class="profile-status">
                    <span class="profile-status-dot"></span>
                    <span class="profile-status-text">SISTEMA EN LÍNEA</span>
                </div>

                <!-- Título Equipado -->
                @if(Auth::user()->currentReward)
                    <div class="equipped-title" style="border: 1px solid {{ Auth::user()->currentReward->color }}50;">
                        <div class="equipped-title-bg" style="background: radial-gradient(circle at top right, {{ Auth::user()->currentReward->color }}20 0%, transparent 70%);"></div>
                        <p class="equipped-title-label">Título Equipado</p>
                        <div class="equipped-title-icon" style="color: {{ Auth::user()->currentReward->color }}; filter: drop-shadow(0 0 10px {{ Auth::user()->currentReward->color }}80);">
                            {!! Auth::user()->currentReward->icon !!}
                        </div>
                        <h3 class="equipped-title-name" style="color: {{ Auth::user()->currentReward->text_color }};">{{ Auth::user()->currentReward->name }}</h3>
                    </div>
                @else
                    <div class="no-title">
                        <p>Sin título equipado</p>
                        <a href="{{ route('recompensas') }}">Visitar Sala de Trofeos</a>
                    </div>
                @endif
                
                <div class="profile-since">
                    Miembro desde el {{ Auth::user()->created_at->format('d/m/Y') }}
                </div>
            </div>

            <!-- Botón Cerrar Sesión -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Cerrar Sesión
                </button>
            </form>

        </div>


        <!-- ========================================== -->
        <!-- COLUMNA DERECHA: TELEMETRÍA Y PROGRESO     -->
        <!-- ========================================== -->
        <div class="telemetry-col">
            
            <!-- Gran Panel de Progreso -->
            <div class="progress-panel">
                <div class="progress-panel-bg" style="transform: rotate(-45deg);"></div>
                <div class="progress-content">
                    <div class="progress-header">
                        <div>
                            <h2 class="progress-rank-label">Clasificación de Rango</h2>
                            <div class="progress-rank-name">{{ Auth::user()->user_level }}</div>
                        </div>
                        <div style="text-align: right;">
                            <div class="progress-level">LVL {{ Auth::user()->user_level_number }}</div>
                            <div class="progress-xp">{{ Auth::user()->xp }} / {{ Auth::user()->user_level_number === 'MAX' ? '∞' : Auth::user()->next_level_xp }} XP</div>
                        </div>
                    </div>
                    <div class="xp-bar">
                        <div class="xp-bar-fill" style="width: {{ Auth::user()->xp_progress }}%;"></div>
                    </div>
                    <p class="progress-hint">
                        @if(Auth::user()->xp_progress >= 100)
                            ¡Has alcanzado el máximo nivel de conocimiento estelar!
                        @else
                            A solo {{ Auth::user()->next_level_xp - Auth::user()->xp }} XP de ascender al siguiente rango. Sigue explorando.
                        @endif
                    </p>
                </div>
            </div>

            <!-- Grid de Estadísticas -->
            <div class="stats-grid">
                <div class="stat-card" onclick="openDashboardModal('lessonsModal')" style="background: rgba(59,130,246,0.05); border: 1px solid rgba(59,130,246,0.2);" title="Ver Lecciones Completadas">
                    <div class="stat-icon" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.3);">
                        <svg style="color: #60a5fa; filter: drop-shadow(0 0 10px rgba(59,130,246,0.5));" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <div>
                        <div class="stat-value">{{ Auth::user()->completedLessons()->count() }}</div>
                        <div class="stat-label">Lecciones</div>
                    </div>
                </div>

                <div class="stat-card" onclick="openDashboardModal('eventsModal')" style="background: rgba(167,139,250,0.05); border: 1px solid rgba(167,139,250,0.2);" title="Ver Eventos Asistidos">
                    <div class="stat-icon" style="background: rgba(167,139,250,0.1); border: 1px solid rgba(167,139,250,0.3);">
                        <svg style="color: #c4b5fd; filter: drop-shadow(0 0 10px rgba(167,139,250,0.5));" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    </div>
                    <div>
                        <div class="stat-value">{{ Auth::user()->attendedEventsCount() }}</div>
                        <div class="stat-label">Eventos Vistos</div>
                    </div>
                </div>
            </div>

            <!-- Navegación Táctica -->
            <div class="tactical-nav">
                <h3>Navegación Táctica</h3>
                <div class="tactical-nav-grid">
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
        <div class="dashboard-modal-content" style="background: rgba(16, 26, 43, 0.95); border: 1px solid rgba(255, 255, 255, 0.15); box-shadow: 0 20px 60px rgba(0,0,0,0.9), 0 0 30px {{ Auth::user()->user_level_color }}30; border-radius: 30px;">
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
        <div class="dashboard-modal-content detail-modal-blue">
            <div class="detail-modal-header">
                <h3 class="detail-modal-title">
                    <svg style="color: #60a5fa;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    Lecciones Completadas
                </h3>
                <button type="button" onclick="document.getElementById('lessonsModal').style.display='none'; document.body.style.overflow='auto';" class="detail-modal-close">&times;</button>
            </div>
            @if(Auth::user()->completedLessons->count() > 0)
                <ul class="detail-list custom-scrollbar">
                    @foreach(Auth::user()->completedLessons as $lesson)
                        <li class="detail-list-item">
                            <div class="detail-list-meta" style="color: #60a5fa;">{{ $lesson->level->title ?? 'Nivel Desconocido' }}</div>
                            <div class="detail-list-title">{{ $lesson->title }}</div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="detail-empty">No has completado ninguna lección todavía.</p>
            @endif
        </div>
    </div>

    <div id="eventsModal" class="dashboard-modal-backdrop" onclick="closeDashboardModal(event, 'eventsModal')">
        <div class="dashboard-modal-content detail-modal-purple">
            <div class="detail-modal-header">
                <h3 class="detail-modal-title">
                    <svg style="color: #c4b5fd;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    Eventos Asistidos
                </h3>
                <button type="button" onclick="document.getElementById('eventsModal').style.display='none'; document.body.style.overflow='auto';" class="detail-modal-close">&times;</button>
            </div>
            @if(Auth::user()->attendedEvents->count() > 0)
                <ul class="detail-list custom-scrollbar">
                    @foreach(Auth::user()->attendedEvents as $event)
                        <li class="detail-list-item">
                            <div class="detail-list-meta" style="color: #c4b5fd;">{{ $event->event_date ? $event->event_date->format('d/m/Y') : 'Fecha Desconocida' }}</div>
                            <div class="detail-list-title">{{ $event->title }}</div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="detail-empty">No has asistido a ningún evento todavía.</p>
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

@endsection

