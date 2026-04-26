@extends('layouts.master')

@section('title', 'Eventos | NovaCore')

@section('content')
    <!-- Elementos decorativos de fondo (Fixed) - Eventos (Morado/Magenta) -->
    <div style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; overflow: hidden; pointer-events: none; z-index: -1;">
        <div style="position: absolute; top: -10%; left: -10%; width: 50vw; height: 50vw; background: radial-gradient(circle, #8b5cf6 0%, transparent 70%); filter: blur(100px); opacity: 0.15; animation: pulseGlow 8s infinite alternate;"></div>
        <div style="position: absolute; top: 30%; right: -15%; width: 60vw; height: 60vw; background: radial-gradient(circle, #d946ef 0%, transparent 70%); filter: blur(120px); opacity: 0.15; animation: pulseGlow 10s infinite alternate-reverse;"></div>
        <div style="position: absolute; bottom: -20%; left: 10%; width: 50vw; height: 50vw; background: radial-gradient(circle, #a78bfa 0%, transparent 70%); filter: blur(100px); opacity: 0.1; animation: pulseGlow 12s infinite alternate;"></div>
        
        <div style="position: absolute; top: 0; left: 4%; width: 1px; height: 100%; background: linear-gradient(to bottom, transparent, rgba(139,92,246,0.15), transparent);"></div>
        <div style="position: absolute; top: 0; right: 4%; width: 1px; height: 100%; background: linear-gradient(to bottom, transparent, rgba(217,70,239,0.15), transparent);"></div>
    </div>

<main style="max-width: 1200px; margin: 0 auto; padding: 100px 5% 50px; min-height: 80vh;">
    <!-- Texto de Introducción Estilizado -->
    <section style="text-align: center; margin-bottom: 5rem;">
        <div style="display: inline-flex; align-items: center; gap: 6px; background: rgba(139, 92, 246, 0.1); border: 1px solid rgba(139, 92, 246, 0.3); color: #a78bfa; padding: 6px 18px; border-radius: 20px; font-size: 0.85rem; font-weight: bold; text-transform: uppercase; margin-bottom: 20px; letter-spacing: 2px;">
            <svg style="width: 1.2rem; height: 1.2rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path></svg>
            Radar de Misiones
        </div>
        <h2 style="font-size: 3.5rem; margin-top: 0; margin-bottom: 20px; font-weight: 800; background: -webkit-linear-gradient(135deg, #fff, #8b5cf6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; text-shadow: 0 0 30px rgba(139, 92, 246, 0.3);">
            Misiones y Eventos
        </h2>
        <div style="background: rgba(16, 26, 43, 0.6); backdrop-filter: blur(15px); border: 1px solid rgba(255,255,255,0.05); padding: 30px 40px; border-radius: 20px; max-width: 750px; margin: 0 auto; box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
            <p style="font-size: 1.15rem; color: #cbd5e1; line-height: 1.8; margin: 0;">
                Únete a misiones en vivo, lanzamientos de SpaceX y eventos especiales de la academia. Mantente alerta al radar para conseguir puntos de experiencia (XP) adicionales y dominar el cosmos.
            </p>
        </div>
    </section>

    @if(isset($spacex) && $spacex)
    <!-- Lanzamiento Destacado (SpaceX) -->
    <div style="margin-bottom: 4rem;">
        <div style="background: linear-gradient(145deg, rgba(139, 92, 246, 0.15), rgba(16, 26, 43, 0.9)); border: 1px solid rgba(139, 92, 246, 0.3); border-radius: 24px; padding: 40px; box-shadow: 0 15px 40px rgba(0,0,0,0.4), inset 0 0 20px rgba(139, 92, 246, 0.1); display: flex; flex-wrap: wrap; gap: 40px; align-items: center; backdrop-filter: blur(10px); position: relative; overflow: hidden;">
            
            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 4px; background: linear-gradient(90deg, transparent, #8b5cf6, transparent); opacity: 0.8;"></div>

            <div style="flex: 1; min-width: 300px; position: relative; z-index: 2;">
                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 20px;">
                    <span style="width: 10px; height: 10px; background: #ef4444; border-radius: 50%; box-shadow: 0 0 10px #ef4444; animation: blink 1.5s infinite;"></span>
                    <span style="color: #ef4444; font-size: 0.85rem; font-weight: bold; letter-spacing: 2px;">INTERCEPCIÓN EN VIVO</span>
                </div>
                
                <h3 style="color: white; font-size: 2.5rem; margin-top: 0; margin-bottom: 10px; font-weight: 800;">{{ $spacex['name'] ?? 'Misión Clasificada' }}</h3>
                <div style="background: rgba(255,255,255,0.05); border: 1px dashed rgba(255,255,255,0.2); padding: 10px 15px; border-radius: 10px; display: inline-block; margin-bottom: 25px;">
                    <span style="color: #94a3b8; font-size: 0.9rem;">FECHA DE LANZAMIENTO (T-Minus)</span><br>
                    <span style="color: #a78bfa; font-weight: bold; font-size: 1.2rem; font-family: monospace;">{{ $spacex['formatted_date'] ?? 'Fecha por confirmar' }}</span>
                </div>
                <p style="color: #cbd5e1; font-size: 1.05rem; line-height: 1.8; margin-bottom: 0;">
                    {{ $spacex['details_es'] ?? 'La sonda aún no ha enviado telemetría válida. Esperando confirmación de carga útil.' }}
                </p>
            </div>
            
            <div style="flex: 1; min-width: 300px; text-align: center; position: relative; z-index: 2;">
                @if(isset($spacex['image']) && $spacex['image'])
                    <img src="{{ $spacex['image'] }}" alt="Launch Image" style="width: 100%; max-height: 280px; object-fit: cover; border-radius: 16px; border: 1px solid rgba(139, 92, 246, 0.4); box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
                @else
                    <div style="font-size: 8rem; animation: float 6s ease-in-out infinite;">🚀</div>
                @endif
                <div style="margin-top: 25px;">
                    <a href="https://www.youtube.com/results?search_query=live+launch+{{ urlencode($spacex['name'] ?? 'space') }}" target="_blank" style="display: inline-flex; align-items: center; gap: 10px; background: #8b5cf6; color: #fff; font-weight: bold; text-decoration: none; padding: 12px 30px; border-radius: 30px; transition: all 0.3s ease; box-shadow: 0 0 20px rgba(139, 92, 246, 0.4);">
                        <svg style="width: 1.2rem; height: 1.2rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Ver Transmisión Visual
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 2rem; border-bottom: 1px solid rgba(139, 92, 246, 0.2); padding-bottom: 15px;">
        <svg style="width: 1.8rem; height: 1.8rem; color: #8b5cf6;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
        <h3 style="color: white; font-size: 1.5rem; margin: 0;">Calendario Estelar</h3>
    </div>

    <!-- Grid de Eventos Normales -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px;">
        @forelse($events as $event)
            <div style="background: linear-gradient(145deg, rgba(16, 26, 43, 0.8), rgba(10, 15, 25, 0.95)); border: 1px solid rgba(139, 92, 246, 0.2); border-radius: 24px; padding: 30px; position: relative; overflow: hidden;" class="event-card hover-lift">
                
                <div style="position: absolute; top: 0; left: 0; width: 4px; height: 100%; background: {{ $event->status == 'upcoming' ? '#8b5cf6' : ($event->status == 'ongoing' ? '#ef4444' : '#3b82f6') }};"></div>

                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 15px;">
                    <div style="background: rgba(139, 92, 246, 0.1); border: 1px solid rgba(139, 92, 246, 0.3); color: #a78bfa; padding: 4px 12px; border-radius: 8px; font-size: 0.75rem; font-weight: bold; text-transform: uppercase;">
                        {{ $event->status == 'upcoming' ? 'Próximo' : ($event->status == 'ongoing' ? 'En Vivo' : 'Completado') }}
                    </div>
                    <div style="color: #f59e0b; font-weight: bold; font-size: 0.9rem; display: flex; align-items: center; gap: 5px; background: rgba(245, 158, 11, 0.1); padding: 4px 10px; border-radius: 8px; border: 1px solid rgba(245, 158, 11, 0.3);">
                        <svg style="width: 1rem; height: 1rem;" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        +{{ $event->xp_reward }} XP
                    </div>
                </div>

                <h3 style="font-size: 1.4rem; margin-bottom: 10px; color: white;">{{ $event->title }}</h3>
                <p style="color: #94a3b8; font-size: 0.95rem; margin-bottom: 20px; line-height: 1.6;">{{ Str::limit($event->description, 100) }}</p>
                
                <div style="display: flex; align-items: center; color: #cbd5e1; font-size: 0.9rem; margin-bottom: 25px; font-family: monospace;">
                    <svg style="width: 1.2rem; height: 1.2rem; margin-right: 8px; color: #64748b;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    T-Minus: {{ $event->event_date->format('d/m/Y H:i') }}
                </div>

                <a href="{{ route('events.show', $event) }}" style="display: flex; align-items: center; justify-content: center; gap: 8px; text-decoration: none; padding: 12px; background: rgba(139, 92, 246, 0.1); border: 1px solid rgba(139, 92, 246, 0.3); color: #a78bfa; border-radius: 12px; transition: all 0.3s; font-weight: bold; width: 100%; box-sizing: border-box;" onmouseover="this.style.background='rgba(139, 92, 246, 0.2)'" onmouseout="this.style.background='rgba(139, 92, 246, 0.1)'">
                    Interceptar Detalles
                    <svg style="width: 1.2rem; height: 1.2rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        @empty
            <div style="grid-column: 1 / -1; background: rgba(255,255,255,0.02); border: 1px dashed rgba(255,255,255,0.1); padding: 4rem; text-align: center; border-radius: 20px;">
                <p style="color: rgba(255,255,255,0.5); font-size: 1.1rem; margin: 0;">El radar no detecta anomalías ni eventos programados en este cuadrante.</p>
            </div>
        @endforelse
    </div>
</main>

<style>
    .event-card:hover {
        border-color: #8b5cf6 !important;
        box-shadow: 0 15px 40px rgba(0,0,0,0.6), inset 0 0 20px rgba(139, 92, 246, 0.1) !important;
    }
    .hover-lift {
        transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    .hover-lift:hover {
        transform: translateY(-10px);
    }
    @keyframes blink { 0%, 100% { opacity: 1; } 50% { opacity: 0; } }
    @keyframes float { 0% { transform: translateY(0px); } 50% { transform: translateY(-15px); } 100% { transform: translateY(0px); } }
</style>
@endsection
