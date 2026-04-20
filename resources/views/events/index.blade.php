@extends('layouts.master')

@section('title', 'Eventos - NovaCore')

@section('content')
<section class="aprende-section" style="padding: 100px 20px 50px; min-height: 80vh;">
    <h2 style="text-align: center; color: var(--menta); font-size: 2.8rem; margin-top: 0; font-weight: 800; letter-spacing: -1px; text-shadow: 0 0 20px rgba(89, 222, 160, 0.2);">Misiones y Eventos</h2>
    <p style="text-align: center; color: #cbd5e1; font-size: 1.15rem; max-width: 650px; margin: 0 auto 3.5rem; line-height: 1.7; background: rgba(0,0,0,0.3); padding: 15px 20px; border-radius: 12px; border: 1px solid rgba(255,255,255,0.05);">
        Únete a transmisiones en vivo, talleres interactivos y eventos especiales de la academia. Consigue experiencia extra y domina el cosmos.
    </p>

    @if(isset($spacex) && $spacex)
    <div style="max-width: 1200px; margin: 0 auto 50px auto;">
        <div style="background: linear-gradient(135deg, rgba(39, 70, 255, 0.15), rgba(104, 14, 188, 0.2)); border: 1px solid rgba(89, 222, 160, 0.4); border-radius: 20px; padding: 40px; box-shadow: 0 10px 40px rgba(0,0,0,0.4), inset 0 0 20px rgba(89, 222, 160, 0.1); display: flex; flex-wrap: wrap; gap: 30px; align-items: center;">
            <div style="flex: 1; min-width: 300px;">
                <div style="display: inline-block; background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.3); color: white; padding: 5px 15px; border-radius: 20px; font-size: 0.8rem; font-weight: bold; text-transform: uppercase; margin-bottom: 20px; letter-spacing: 2px;">
                    🛰️ Telemetría Espacial en Vivo
                </div>
                <h3 style="color: white; font-size: 2.2rem; margin-top: 0; margin-bottom: 10px;">{{ $spacex['name'] ?? 'Misión Clasificada' }}</h3>
                <p style="color: var(--menta); font-weight: bold; font-size: 1.1rem; margin-bottom: 20px;">Lanzamiento: {{ $spacex['formatted_date'] ?? 'Fecha por determinar' }}</p>
                <p style="color: #cbd5e1; font-size: 1rem; line-height: 1.8; margin-bottom: 0;">
                    {{ $spacex['details_es'] ?? 'Esperando confirmación.' }}
                </p>
            </div>
            
            <div style="flex: 1; min-width: 300px; text-align: center;">
                @if(isset($spacex['image']) && $spacex['image'])
                    <img src="{{ $spacex['image'] }}" alt="Launch Image" style="width: 100%; max-height: 250px; object-fit: cover; border-radius: 15px; filter: drop-shadow(0 0 20px rgba(255,255,255,0.2)); border: 1px solid rgba(255,255,255,0.1);">
                @else
                    <div style="font-size: 8rem; animation: float 6s ease-in-out infinite;">🚀</div>
                @endif
                <div style="margin-top: 20px;">
                    <a href="https://www.youtube.com/results?search_query=live+launch+{{ urlencode($spacex['name'] ?? 'space') }}" target="_blank" class="btn-login" style="background: var(--menta); color: var(--negro); font-weight: bold;">Ver Transmisión</a>
                </div>
            </div>
        </div>
    </div>
    <style>@keyframes float { 0% { transform: translateY(0px); } 50% { transform: translateY(-15px); } 100% { transform: translateY(0px); } }</style>
    @endif

    <div class="levels-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; max-width: 1200px; margin: 0 auto;">
        @forelse($events as $event)
            <div class="level-card" style="
                background: rgba(16, 26, 43, 0.6);
                border: 1px solid rgba(255, 255, 255, 0.1);
                border-radius: 15px;
                padding: 25px;
                transition: transform 0.3s, box-shadow 0.3s;
                position: relative;
                overflow: hidden;
            " onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 15px 30px rgba(0,0,0,0.5), inset 0 0 15px rgba(28,200,138,0.2)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">

                <div style="position: absolute; top: 15px; right: 15px; background: rgba(28,200,138,0.2); border: 1px solid rgba(28,200,138,0.5); color: #1cc88a; padding: 5px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: bold; text-transform: uppercase;">
                    {{ $event->status == 'upcoming' ? 'Próximo' : ($event->status == 'ongoing' ? 'En Vivo' : 'Completado') }}
                </div>

                <div class="level-icon" style="font-size: 3rem; margin-bottom: 15px; color: #4e73df;">📅</div>
                <h3 style="font-size: 1.5rem; margin-bottom: 10px; color: white;">{{ $event->title }}</h3>
                <p style="color: #cbd5e1; font-size: 0.95rem; margin-bottom: 15px;">{{ Str::limit($event->description, 100) }}</p>
                
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; color: var(--lavanda); font-size: 0.9rem;">
                    <span><i style="color: #f6c23e;">✨</i> {{ $event->xp_reward }} XP</span>
                    <span>⏱️ {{ $event->event_date->format('d/m/Y') }}</span>
                </div>

                <a href="{{ route('events.show', $event) }}" class="btn-login" style="display: block; text-align: center; text-decoration: none; padding: 10px; background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.3); border-radius: 8px; transition: background 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'">
                    Ver Detalles
                </a>
            </div>
        @empty
            <p style="color: rgba(255,255,255,0.5); text-align: center; grid-column: 1 / -1;">No hay eventos programados en este cuadrante del universo.</p>
        @endforelse
    </div>
</section>
@endsection
