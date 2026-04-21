@extends('layouts.master')

@section('title', 'Recompensas - NovaCore')

@section('content')
<div class="recompensas-container" style="max-width: 1100px; margin: 3rem auto; padding: 0 5%; min-height: 70vh;">
    <section class="hero-recompensas" style="margin-bottom: 3rem;">
        <h1 style="font-size: 3rem; color: var(--menta); margin-bottom: 1rem; text-shadow: 0 0 20px rgba(89, 222, 160, 0.2);">Logros del Comandante</h1>
        <p style="font-size: 1.15rem; color: #e2e8f0; line-height: 1.8;">Tu colección personal de honores espaciales y descubrimientos validados. Gana puntos de experiencia (XP) para subir de nivel completando lecciones y asistiendo a eventos.</p>
    </section>

    @if(session('success'))
        <div style="background: rgba(40, 167, 69, 0.2); border: 1px solid #28a745; padding: 15px; border-radius: 8px; margin-bottom: 20px; color: #a3ffb8;">
            {{ session('success') }}
        </div>
    @endif
    @if($errors->any())
        <div style="background: rgba(220, 53, 69, 0.2); border: 1px solid #dc3545; padding: 15px; border-radius: 8px; margin-bottom: 20px; color: #ffa3a3;">
            {{ $errors->first() }}
        </div>
    @endif

    <!-- Barra de Progreso Dinámica -->
    <section class="progreso-global" style="background: rgba(255,255,255,0.05); border-radius: 20px; padding: 2rem; border: 1px solid {{ $user->user_level_color }}50; margin-bottom: 3rem; display: flex; align-items: center; gap: 2rem;">
        
        <div style="text-align: center; min-width: 150px;">
            <div style="font-size: 3rem; font-weight: bold; color: {{ $user->user_level_color }}; text-shadow: 0 0 15px {{ $user->user_level_color }}80;">LVL {{ $user->user_level_number }}</div>
            <div style="font-size: 0.9rem; color: white; text-transform: uppercase; letter-spacing: 1px;">{{ $user->user_level }}</div>
        </div>

        <div class="bar-container" style="flex-grow: 1; height: 12px; background: rgba(0,0,0,0.5); border-radius: 10px; overflow: hidden; border: 1px solid rgba(255,255,255,0.1);">
            <div class="bar-fill" style="width: {{ $user->xp_progress }}%; height: 100%; background: linear-gradient(90deg, rgba(255,255,255,0.1), {{ $user->user_level_color }}); box-shadow: 0 0 15px {{ $user->user_level_color }}; transition: width 1s ease-in-out;"></div>
        </div>
        
        <div class="stats-text" style="text-align: right; min-width: 100px;">
            <span style="color: {{ $user->user_level_color }}; font-weight: bold; font-size: 1.2rem;">{{ $user->xp }} / {{ $user->next_level_xp }}</span> 
            <span style="font-size: 0.8rem; color: rgba(255,255,255,0.5); display: block;">Puntos XP</span>
        </div>
    </section>

    <div class="bento-grid trofeos-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 2rem;">
        
        <!-- Recompensa 1 -->
        <div class="bento-card trofeo-card {{ $achievements['pionero_lunar'] ? '' : 'locked' }}" style="background: {{ $achievements['pionero_lunar'] ? 'linear-gradient(135deg, rgba(39, 70, 255, 0.1), rgba(104, 14, 188, 0.1))' : 'rgba(16, 26, 43, 0.5)' }}; border: 1px solid {{ $user->current_title === 'pionero_lunar' ? '#94a3b8' : 'rgba(255,255,255,0.1)' }}; border-radius: 24px; padding: 2rem; text-align: center; backdrop-filter: blur(10px); transition: all 0.3s ease; {{ $achievements['pionero_lunar'] ? '' : 'filter: grayscale(1) opacity(0.6);' }} {{ $user->current_title === 'pionero_lunar' ? 'box-shadow: 0 0 20px rgba(148, 163, 184, 0.5);' : '' }}">
            <svg class="trofeo-icon" style="width: 3.5rem; height: 3.5rem; margin: 0 auto 1rem; display: block; filter: drop-shadow(0 0 10px rgba(135, 103, 235, 0.5)); color: currentColor;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
            <h3 style="font-size: 1.1rem; color: {{ $achievements['pionero_lunar'] ? 'var(--lavanda)' : '#94a3b8' }}; margin-top: 0;">Pionero Lunar</h3>
            <p style="font-size: 0.85rem; color: {{ $achievements['pionero_lunar'] ? '#cbd5e1' : '#94a3b8' }}; margin-bottom: 15px;">Completar tu primera lección en la academia.</p>
            @if($achievements['pionero_lunar'])
                @if($user->current_title === 'pionero_lunar')
                    <div style="margin-top: 15px; padding: 5px; background: rgba(148, 163, 184, 0.2); border: 1px solid #94a3b8; border-radius: 20px; color: #94a3b8; font-size: 0.8rem; text-transform: uppercase;">✔ Equipado</div>
                @else
                    <form action="{{ route('recompensas.equip', 'pionero_lunar') }}" method="POST" style="margin-top: 15px;">
                        @csrf
                        <button type="submit" style="padding: 5px 15px; font-size: 0.8rem; background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.3); color: white; border-radius: 20px; cursor: pointer; transition: 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'">Equipar Título</button>
                    </form>
                @endif
            @else
                <span style="font-size: 0.8rem; color: #64748b; text-transform: uppercase; display: block; margin-top: 15px;">🔒 Bloqueado</span>
            @endif
        </div>

        <!-- Recompensa 2 -->
        <div class="bento-card trofeo-card {{ $achievements['cazador_estelar'] ? '' : 'locked' }}" style="background: {{ $achievements['cazador_estelar'] ? 'linear-gradient(135deg, rgba(39, 70, 255, 0.1), rgba(104, 14, 188, 0.1))' : 'rgba(16, 26, 43, 0.5)' }}; border: 1px solid {{ $user->current_title === 'cazador_estelar' ? '#06b6d4' : 'rgba(255,255,255,0.1)' }}; border-radius: 24px; padding: 2rem; text-align: center; backdrop-filter: blur(10px); transition: all 0.3s ease; {{ $achievements['cazador_estelar'] ? '' : 'filter: grayscale(1) opacity(0.6);' }} {{ $user->current_title === 'cazador_estelar' ? 'box-shadow: 0 0 20px rgba(6, 182, 212, 0.5);' : '' }}">
            <svg class="trofeo-icon" style="width: 3.5rem; height: 3.5rem; margin: 0 auto 1rem; display: block; filter: drop-shadow(0 0 10px rgba(135, 103, 235, 0.5)); color: currentColor;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            <h3 style="font-size: 1.1rem; color: {{ $achievements['cazador_estelar'] ? 'var(--lavanda)' : '#94a3b8' }}; margin-top: 0;">Cazador Estelar</h3>
            <p style="font-size: 0.85rem; color: {{ $achievements['cazador_estelar'] ? '#cbd5e1' : '#94a3b8' }}; margin-bottom: 15px;">Asistir a 5 eventos astronómicos registrados.</p>
            @if($achievements['cazador_estelar'])
                @if($user->current_title === 'cazador_estelar')
                    <div style="margin-top: 15px; padding: 5px; background: rgba(6, 182, 212, 0.2); border: 1px solid #06b6d4; border-radius: 20px; color: #06b6d4; font-size: 0.8rem; text-transform: uppercase;">✔ Equipado</div>
                @else
                    <form action="{{ route('recompensas.equip', 'cazador_estelar') }}" method="POST" style="margin-top: 15px;">
                        @csrf
                        <button type="submit" style="padding: 5px 15px; font-size: 0.8rem; background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.3); color: white; border-radius: 20px; cursor: pointer; transition: 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'">Equipar Título</button>
                    </form>
                @endif
            @else
                <span style="font-size: 0.8rem; color: #64748b; text-transform: uppercase; display: block; margin-top: 15px;">🔒 Bloqueado</span>
            @endif
        </div>

        <!-- Recompensa 3 -->
        <div class="bento-card trofeo-card {{ $achievements['rey_anillos'] ? '' : 'locked' }}" style="background: {{ $achievements['rey_anillos'] ? 'linear-gradient(135deg, rgba(39, 70, 255, 0.1), rgba(104, 14, 188, 0.1))' : 'rgba(16, 26, 43, 0.5)' }}; border: 1px solid {{ $user->current_title === 'rey_anillos' ? '#fb923c' : 'rgba(255,255,255,0.1)' }}; border-radius: 24px; padding: 2rem; text-align: center; backdrop-filter: blur(10px); transition: all 0.3s ease; {{ $achievements['rey_anillos'] ? '' : 'filter: grayscale(1) opacity(0.6);' }} {{ $user->current_title === 'rey_anillos' ? 'box-shadow: 0 0 20px rgba(251, 146, 60, 0.5);' : '' }}">
            <svg class="trofeo-icon" style="width: 3.5rem; height: 3.5rem; margin: 0 auto 1rem; display: block; filter: drop-shadow(0 0 10px rgba(135, 103, 235, 0.5)); color: currentColor;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
            <h3 style="font-size: 1.1rem; color: {{ $achievements['rey_anillos'] ? 'var(--lavanda)' : '#94a3b8' }}; margin-top: 0;">Rey de los Anillos</h3>
            <p style="font-size: 0.85rem; color: {{ $achievements['rey_anillos'] ? '#cbd5e1' : '#94a3b8' }}; margin-bottom: 15px;">Completa un total de 5 lecciones de la academia.</p>
            @if($achievements['rey_anillos'])
                @if($user->current_title === 'rey_anillos')
                    <div style="margin-top: 15px; padding: 5px; background: rgba(251, 146, 60, 0.2); border: 1px solid #fb923c; border-radius: 20px; color: #fb923c; font-size: 0.8rem; text-transform: uppercase;">✔ Equipado</div>
                @else
                    <form action="{{ route('recompensas.equip', 'rey_anillos') }}" method="POST" style="margin-top: 15px;">
                        @csrf
                        <button type="submit" style="padding: 5px 15px; font-size: 0.8rem; background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.3); color: white; border-radius: 20px; cursor: pointer; transition: 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'">Equipar Título</button>
                    </form>
                @endif
            @else
                <span style="font-size: 0.8rem; color: #64748b; text-transform: uppercase; display: block; margin-top: 15px;">🔒 Bloqueado</span>
            @endif
        </div>

        <!-- Recompensa 4 -->
        <div class="bento-card trofeo-card {{ $achievements['vuelo_inaugural'] ? '' : 'locked' }}" style="background: {{ $achievements['vuelo_inaugural'] ? 'linear-gradient(135deg, rgba(39, 70, 255, 0.1), rgba(104, 14, 188, 0.1))' : 'rgba(16, 26, 43, 0.5)' }}; border: 1px solid {{ $user->current_title === 'vuelo_inaugural' ? '#ef4444' : 'rgba(255,255,255,0.1)' }}; border-radius: 24px; padding: 2rem; text-align: center; backdrop-filter: blur(10px); transition: all 0.3s ease; {{ $achievements['vuelo_inaugural'] ? '' : 'filter: grayscale(1) opacity(0.6);' }} {{ $user->current_title === 'vuelo_inaugural' ? 'box-shadow: 0 0 20px rgba(239, 68, 68, 0.5);' : '' }}">
            <svg class="trofeo-icon" style="width: 3.5rem; height: 3.5rem; margin: 0 auto 1rem; display: block; filter: drop-shadow(0 0 10px rgba(135, 103, 235, 0.5)); color: currentColor;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
            <h3 style="font-size: 1.1rem; color: {{ $achievements['vuelo_inaugural'] ? 'var(--lavanda)' : '#94a3b8' }}; margin-top: 0;">Vuelo Inaugural</h3>
            <p style="font-size: 0.85rem; color: {{ $achievements['vuelo_inaugural'] ? '#cbd5e1' : '#94a3b8' }}; margin-bottom: 15px;">Asistir a tu primer evento astronómico.</p>
            @if($achievements['vuelo_inaugural'])
                @if($user->current_title === 'vuelo_inaugural')
                    <div style="margin-top: 15px; padding: 5px; background: rgba(239, 68, 68, 0.2); border: 1px solid #ef4444; border-radius: 20px; color: #ef4444; font-size: 0.8rem; text-transform: uppercase;">✔ Equipado</div>
                @else
                    <form action="{{ route('recompensas.equip', 'vuelo_inaugural') }}" method="POST" style="margin-top: 15px;">
                        @csrf
                        <button type="submit" style="padding: 5px 15px; font-size: 0.8rem; background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.3); color: white; border-radius: 20px; cursor: pointer; transition: 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'">Equipar Título</button>
                    </form>
                @endif
            @else
                <span style="font-size: 0.8rem; color: #64748b; text-transform: uppercase; display: block; margin-top: 15px;">🔒 Bloqueado</span>
            @endif
        </div>
        
         <!-- Recompensa 5 -->
        <div class="bento-card trofeo-card {{ $achievements['leyenda_nova'] ? '' : 'locked' }}" style="background: {{ $achievements['leyenda_nova'] ? 'linear-gradient(135deg, rgba(39, 70, 255, 0.1), rgba(104, 14, 188, 0.1))' : 'rgba(16, 26, 43, 0.5)' }}; border: 1px solid {{ $user->current_title === 'leyenda_nova' ? '#fbbf24' : 'rgba(255,255,255,0.1)' }}; border-radius: 24px; padding: 2rem; text-align: center; backdrop-filter: blur(10px); transition: all 0.3s ease; {{ $achievements['leyenda_nova'] ? '' : 'filter: grayscale(1) opacity(0.6);' }} {{ $user->current_title === 'leyenda_nova' ? 'box-shadow: 0 0 20px rgba(251, 191, 36, 0.5);' : '' }}">
            <svg class="trofeo-icon" style="width: 3.5rem; height: 3.5rem; margin: 0 auto 1rem; display: block; filter: drop-shadow(0 0 10px rgba(135, 103, 235, 0.5)); color: currentColor;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
            <h3 style="font-size: 1.1rem; color: {{ $achievements['leyenda_nova'] ? 'var(--lavanda)' : '#94a3b8' }}; margin-top: 0;">Leyenda Nova</h3>
            <p style="font-size: 0.85rem; color: {{ $achievements['leyenda_nova'] ? '#cbd5e1' : '#94a3b8' }}; margin-bottom: 15px;">Alcanzar el nivel máximo: Ente Espacial (Nivel MAX).</p>
            @if($achievements['leyenda_nova'])
                @if($user->current_title === 'leyenda_nova')
                    <div style="margin-top: 15px; padding: 5px; background: rgba(251, 191, 36, 0.2); border: 1px solid #fbbf24; border-radius: 20px; color: #fbbf24; font-size: 0.8rem; text-transform: uppercase;">✔ Equipado</div>
                @else
                    <form action="{{ route('recompensas.equip', 'leyenda_nova') }}" method="POST" style="margin-top: 15px;">
                        @csrf
                        <button type="submit" style="padding: 5px 15px; font-size: 0.8rem; background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.3); color: white; border-radius: 20px; cursor: pointer; transition: 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'">Equipar Título</button>
                    </form>
                @endif
            @else
                <span style="font-size: 0.8rem; color: #64748b; text-transform: uppercase; display: block; margin-top: 15px;">🔒 Bloqueado</span>
            @endif
        </div>

    </div>
</div>

<style>
    .trofeo-card:hover:not(.locked) {
        transform: translateY(-8px);
        background: rgba(39, 70, 255, 0.15) !important;
        box-shadow: 0 15px 30px rgba(0,0,0,0.4), inset 0 0 15px rgba(39, 70, 255, 0.1);
    }
    @media (max-width: 768px) {
        .progreso-global {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }
        .bar-container {
            width: 100%;
        }
        .stats-text {
            text-align: left !important;
        }
    }
</style>
@endsection
