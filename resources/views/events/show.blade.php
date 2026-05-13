@extends('layouts.master')

@section('title', $event->title . ' | NovaCore')

@section('content')
    <!-- Fondo decorativo estático - Eventos (Morado/Magenta) -->
    <div style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; overflow: hidden; pointer-events: none; z-index: -1;">
        <div style="position: absolute; top: -10%; left: -10%; width: 50vw; height: 50vw; background: radial-gradient(circle, #8b5cf6 0%, transparent 70%); filter: blur(100px); opacity: 0.1;"></div>
        <div style="position: absolute; top: 30%; right: -15%; width: 60vw; height: 60vw; background: radial-gradient(circle, #d946ef 0%, transparent 70%); filter: blur(120px); opacity: 0.08;"></div>
        <div style="position: absolute; bottom: -20%; left: 10%; width: 50vw; height: 50vw; background: radial-gradient(circle, #a78bfa 0%, transparent 70%); filter: blur(100px); opacity: 0.06;"></div>
    </div>

<section class="lesson-section" style="padding: 100px 20px 50px; min-height: 80vh; display: flex; flex-direction: column; align-items: center;">
    
    <div style="width: 100%; max-width: 850px; margin-bottom: 2rem;">
        <a href="{{ route('events.index') }}" style="color: #a78bfa; text-decoration: none; font-size: 0.95rem; font-weight: bold; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s;" onmouseover="this.style.color='#c4b5fd'" onmouseout="this.style.color='#a78bfa'">
            &larr; Volver al Radar de Eventos
        </a>
    </div>

    <div class="lesson-container" style="
        background: rgba(16, 26, 43, 0.8);
        border: 1px solid rgba(139, 92, 246, 0.2);
        border-radius: 24px;
        width: 100%;
        max-width: 850px;
        padding: 50px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.5);
        color: white;
    ">
        @if(session('success'))
            <div style="background: rgba(59, 130, 246, 0.1); border: 1px solid rgba(59, 130, 246, 0.3); color: #60a5fa; padding: 15px; border-radius: 12px; margin-bottom: 30px; text-align: center; font-weight: bold; box-shadow: 0 0 20px rgba(59, 130, 246, 0.1);">
                {{ session('success') }}
            </div>
        @endif

        @if(session('info'))
            <div style="background: rgba(139, 92, 246, 0.1); border: 1px solid rgba(139, 92, 246, 0.3); color: #a78bfa; padding: 15px; border-radius: 12px; margin-bottom: 30px; text-align: center; font-weight: bold; box-shadow: 0 0 20px rgba(139, 92, 246, 0.1);">
                {{ session('info') }}
            </div>
        @endif

        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 30px; border-bottom: 1px solid rgba(139, 92, 246, 0.2); padding-bottom: 30px; flex-wrap: wrap; gap: 20px;">
            <div style="flex: 1; min-width: 300px;">
                <span style="display: inline-flex; align-items: center; gap: 6px; background: rgba(139, 92, 246, 0.1); color: #a78bfa; padding: 6px 14px; border-radius: 8px; font-weight: bold; font-size: 0.8rem; text-transform: uppercase; border: 1px solid rgba(139, 92, 246, 0.3); margin-bottom: 10px;">
                    <svg style="width: 1rem; height: 1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Reporte de Misión
                </span>
                <h1 style="font-size: 3rem; margin: 0 0 15px 0; font-weight: 800; background: -webkit-linear-gradient(135deg, #fff, #8b5cf6); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">{{ $event->title }}</h1>
                <div style="display: flex; flex-wrap: wrap; gap: 20px; color: #94a3b8; font-size: 0.95rem;">
                    <span style="display: flex; align-items: center; gap: 5px; font-family: monospace;">
                        <svg style="width: 1.2rem; height: 1.2rem; color: #64748b;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        {{ $event->event_date->format('d M, Y - H:i') }}
                    </span>
                    <span style="display: flex; align-items: center; gap: 5px; color: #f59e0b; background: rgba(245, 158, 11, 0.1); padding: 2px 8px; border-radius: 6px; border: 1px solid rgba(245, 158, 11, 0.2);">
                        <svg style="width: 1rem; height: 1rem;" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        Recompensa: {{ $event->xp_reward }} XP
                    </span>
                </div>
            </div>
            
            <div>
                <span style="display: inline-block; background: {{ $event->status == 'upcoming' ? 'rgba(139, 92, 246, 0.15)' : ($event->status == 'ongoing' ? 'rgba(239, 68, 68, 0.15)' : 'rgba(59, 130, 246, 0.15)') }}; padding: 10px 20px; border-radius: 12px; font-weight: bold; border: 1px solid {{ $event->status == 'upcoming' ? 'rgba(139, 92, 246, 0.4)' : ($event->status == 'ongoing' ? 'rgba(239, 68, 68, 0.4)' : 'rgba(59, 130, 246, 0.4)') }}; text-transform: uppercase; color: {{ $event->status == 'upcoming' ? '#a78bfa' : ($event->status == 'ongoing' ? '#ef4444' : '#60a5fa') }};">
                    @if($event->status == 'ongoing') <span style="display: inline-block; width: 8px; height: 8px; background: #ef4444; border-radius: 50%; margin-right: 5px; animation: blink 1.5s infinite;"></span> @endif
                    {{ $event->status == 'upcoming' ? 'Próximo' : ($event->status == 'ongoing' ? 'En Vivo' : 'Completado') }}
                </span>
            </div>
        </div>

        <div class="lesson-content" style="font-size: 1.15rem; line-height: 1.9; color: #cbd5e1; margin-bottom: 40px;">
            <p>{{ $event->description }}</p>
            
            @if($event->location)
                <div style="margin-top: 40px; padding: 25px; background: rgba(0,0,0,0.5); border-radius: 16px; border-left: 4px solid #8b5cf6; border-right: 1px solid rgba(255,255,255,0.05); border-top: 1px solid rgba(255,255,255,0.05); border-bottom: 1px solid rgba(255,255,255,0.05);">
                    <strong style="color: white; display: flex; align-items: center; gap: 8px; margin-bottom: 15px;">
                        <svg style="width: 1.5rem; height: 1.5rem; color: #8b5cf6;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        Ubicación / Enlace de Ingreso:
                    </strong>
                    @if(filter_var($event->location, FILTER_VALIDATE_URL))
                        <a href="{{ $event->location }}" target="_blank" style="display: inline-block; background: rgba(139, 92, 246, 0.1); color: #a78bfa; padding: 10px 20px; border-radius: 8px; text-decoration: none; word-break: break-all; border: 1px solid rgba(139, 92, 246, 0.3); transition: all 0.3s;" onmouseover="this.style.background='rgba(139, 92, 246, 0.2)'" onmouseout="this.style.background='rgba(139, 92, 246, 0.1)'">
                            {{ $event->location }} ↗
                        </a>
                    @else
                        <span style="color: #a78bfa; font-family: monospace; font-size: 1.2rem;">{{ $event->location }}</span>
                    @endif
                </div>
            @endif
        </div>

        <div class="lesson-actions" style="border-top: 1px dashed rgba(139, 92, 246, 0.3); padding-top: 40px; text-align: center;">
            @auth
                @if($hasAttended)
                    <div style="display: inline-flex; flex-direction: column; align-items: center;">
                        <button disabled style="background: rgba(59, 130, 246, 0.1); border: 1px solid rgba(59, 130, 246, 0.4); color: #60a5fa; padding: 15px 40px; font-size: 1.2rem; border-radius: 30px; font-weight: bold; cursor: not-allowed; display: flex; align-items: center; gap: 10px;">
                            <svg style="width: 1.5rem; height: 1.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Ya estás inscrito en esta misión
                        </button>
                        <p style="margin-top: 15px; color: #94a3b8; font-size: 0.95rem;">Tus credenciales han sido verificadas. Prepara tus sistemas.</p>
                    </div>
                @else
                    @if($event->status == 'completed')
                        <button disabled style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: #64748b; padding: 15px 40px; font-size: 1.2rem; border-radius: 30px; cursor: not-allowed; font-weight: bold;">
                            El evento ha finalizado
                        </button>
                    @else
                        <form action="{{ route('events.attend', $event) }}" method="POST">
                            @csrf
                            <button type="submit" style="background: linear-gradient(45deg, #6d28d9, #a78bfa); padding: 15px 50px; font-size: 1.2rem; font-weight: 800; border-radius: 30px; border: 1px solid #c4b5fd; cursor: pointer; color: white; box-shadow: 0 10px 20px rgba(139, 92, 246, 0.3); transition: all 0.3s; display: inline-flex; align-items: center; gap: 10px;" onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 15px 30px rgba(139, 92, 246, 0.5)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 20px rgba(139, 92, 246, 0.3)'">
                                <svg style="width: 1.5rem; height: 1.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                Inscribirme a la Misión
                            </button>
                        </form>
                    @endif
                @endif
            @else
                <div style="background: rgba(0,0,0,0.5); padding: 30px; border-radius: 16px; border: 1px dashed rgba(139, 92, 246, 0.3); max-width: 500px; margin: 0 auto;">
                    <svg style="width: 3rem; height: 3rem; color: #64748b; margin-bottom: 15px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    <p style="margin-top: 0; margin-bottom: 25px; color: #cbd5e1; font-size: 1.1rem;">Para registrarte en esta misión necesitas autenticarte en los sistemas.</p>
                    <div style="display: flex; justify-content: center; gap: 15px;">
                        <a href="{{ route('login') }}" style="background: rgba(139, 92, 246, 0.1); border: 1px solid rgba(139, 92, 246, 0.4); padding: 12px 25px; border-radius: 12px; text-decoration: none; color: #a78bfa; font-weight: bold; transition: all 0.3s;" onmouseover="this.style.background='rgba(139, 92, 246, 0.2)'" onmouseout="this.style.background='rgba(139, 92, 246, 0.1)'">Iniciar Sesión</a>
                        <a href="{{ route('register') }}" style="background: #8b5cf6; color: #fff; padding: 12px 25px; border-radius: 12px; text-decoration: none; font-weight: bold; transition: all 0.3s; box-shadow: 0 0 15px rgba(139, 92, 246, 0.3);" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">Crear Cuenta</a>
                    </div>
                </div>
            @endauth
        </div>

    </div>
</section>

<style>
    @keyframes blink { 0%, 100% { opacity: 1; } 50% { opacity: 0; } }
</style>
@endsection
