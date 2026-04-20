@extends('layouts.master')

@section('title', 'NASA APOD - Fenómeno Cósmico')

@section('content')
<div style="padding: 100px 5%; max-width: 1200px; margin: 0 auto; min-height: 70vh;">
    
    <div style="display: flex; gap: 40px; flex-wrap: wrap; align-items: flex-start;">
        
        <!-- Columna Izquierda: Información Principal -->
        <div class="info-column" style="flex: 2; min-width: 300px;">
            <div class="cosmic-card" style="background: rgba(16, 26, 43, 0.7); backdrop-filter: blur(15px); border: 1px solid rgba(255,255,255,0.1); border-radius: 20px; padding: 40px; box-shadow: 0 10px 40px rgba(0,0,0,0.5);">
                <div style="display: inline-block; background: rgba(89,222,160,0.1); border: 1px solid rgba(89,222,160,0.3); color: var(--menta); padding: 5px 15px; border-radius: 20px; font-size: 0.8rem; font-weight: bold; text-transform: uppercase; margin-bottom: 20px;">
                    Transmisión Diaria NASA
                </div>

                <h1 style="color: white; margin-top: 0; font-size: 2.5rem; margin-bottom: 10px; background: -webkit-linear-gradient(#fff, #1cc88a); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                    {{ $apod['title'] ?? 'Fenómeno Desconocido' }}
                </h1>
                
                <p style="color: #64748b; font-size: 0.95rem; margin-bottom: 25px;">
                    Fecha de Captura Estelar: {{ $apod['date'] ?? now()->toDateString() }}
                </p>
                
                <p style="color: #cbd5e1; font-size: 1.1rem; line-height: 1.9; margin-bottom: 25px;">
                    {{ $apod['explanation'] ?? 'Buscando datos en la matriz principal...' }}
                </p>

                <div style="margin-top: 40px;">
                    <a href="{{ route('inicio') }}" class="btn-login" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.2); margin-left: 0; transition: all 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.1)'" onmouseout="this.style.background='rgba(255,255,255,0.05)'">
                        ← Retornar al puente de mando
                    </a>
                </div>
            </div>
        </div>

        <!-- Columna Derecha: Multimedia APOD -->
        <div class="telemetry-column" style="flex: 2; min-width: 300px;">
            <div class="cosmic-card" style="background: rgba(10, 15, 25, 0.8); border: 1px solid rgba(78, 115, 223, 0.3); border-radius: 20px; overflow: hidden; box-shadow: inset 0 0 30px rgba(78,115,223,0.1); text-align: center;">
                
                @if(isset($apod['media_type']) && $apod['media_type'] === 'video')
                    <iframe src="{{ $apod['url'] }}" frameborder="0" allowfullscreen style="width: 100%; height: 350px; border-bottom: 1px solid rgba(78, 115, 223, 0.3);"></iframe>
                @else
                    <a href="{{ $apod['hdurl'] ?? ($apod['url'] ?? '#') }}" target="_blank">
                        <!-- Mantenemos la imagen estática de respaldo en el asset default si la API falla -->
                        <img src="{{ $apod['url'] ?? 'https://images.unsplash.com/photo-1462331940025-496dfbfc7564?q=80&w=2000&auto=format&fit=crop' }}" alt="{{ $apod['title'] ?? 'Nasa APOD' }}" style="width: 100%; height: auto; object-fit: cover; border-bottom: 1px solid rgba(78, 115, 223, 0.3); transition: transform 0.5s ease;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
                    </a>
                @endif
                
                <div style="padding: 15px; background: rgba(0,0,0,0.5); text-align: left;">
                    <div style="color: #f6c23e; font-family: monospace; font-size: 0.9rem; margin-bottom: 8px;">> INICIANDO SECUENCIA VISUAL_</div>
                    <div style="color: #94a3b8; font-family: monospace; font-size: 0.85rem;">> Fuente de telemetría: API Pública de la NASA.</div>
                    <div style="color: #94a3b8; font-family: monospace; font-size: 0.85rem;">> Resolución HD Disponible al hacer click.</div>
                    <i style="color: #4e73df; display: inline-block; margin-top: 5px; animation: blink 1s infinite;">_</i>
                </div>
                
            </div>
        </div>

    </div>
</div>

<style>
    @keyframes blink {
        0%, 100% { opacity: 1; }
        50% { opacity: 0; }
    }
</style>
@endsection
