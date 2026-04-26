@extends('layouts.master')

@section('title', 'Observatorio | NovaCore')

@section('content')
    <!-- Elementos decorativos de fondo (Fixed) - Observatorio (Rojo Carmesí) -->
    <div style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; overflow: hidden; pointer-events: none; z-index: -1;">
        <div style="position: absolute; top: -10%; left: -10%; width: 50vw; height: 50vw; background: radial-gradient(circle, #e11d48 0%, transparent 70%); filter: blur(100px); opacity: 0.15; animation: pulseGlow 8s infinite alternate;"></div>
        <div style="position: absolute; top: 30%; right: -15%; width: 60vw; height: 60vw; background: radial-gradient(circle, #9f1239 0%, transparent 70%); filter: blur(120px); opacity: 0.15; animation: pulseGlow 10s infinite alternate-reverse;"></div>
        <div style="position: absolute; bottom: -20%; left: 10%; width: 50vw; height: 50vw; background: radial-gradient(circle, #ef4444 0%, transparent 70%); filter: blur(100px); opacity: 0.1; animation: pulseGlow 12s infinite alternate;"></div>
        
        <div style="position: absolute; top: 0; left: 4%; width: 1px; height: 100%; background: linear-gradient(to bottom, transparent, rgba(225,29,72,0.15), transparent);"></div>
        <div style="position: absolute; top: 0; right: 4%; width: 1px; height: 100%; background: linear-gradient(to bottom, transparent, rgba(239,68,68,0.15), transparent);"></div>
    </div>

<div style="padding: 100px 5%; max-width: 1300px; margin: 0 auto; min-height: 70vh;">
    
    <!-- Texto de Introducción Estilizado -->
    <section style="text-align: center; margin-bottom: 4rem;">
        <div style="display: inline-flex; align-items: center; gap: 6px; background: rgba(225, 29, 72, 0.1); border: 1px solid rgba(225, 29, 72, 0.3); color: #fb7185; padding: 6px 18px; border-radius: 20px; font-size: 0.85rem; font-weight: bold; text-transform: uppercase; margin-bottom: 20px; letter-spacing: 2px;">
            <svg style="width: 1rem; height: 1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
            Centro de Observación
        </div>
        <h2 style="font-size: 3.5rem; margin-top: 0; margin-bottom: 20px; font-weight: 800; background: -webkit-linear-gradient(135deg, #fff, #e11d48); -webkit-background-clip: text; -webkit-text-fill-color: transparent; text-shadow: 0 0 30px rgba(225, 29, 72, 0.3);">
            Observatorio de Fenómenos
        </h2>
        <div style="background: rgba(16, 26, 43, 0.6); backdrop-filter: blur(15px); border: 1px solid rgba(255,255,255,0.05); padding: 30px 40px; border-radius: 20px; max-width: 750px; margin: 0 auto; box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
            <p style="font-size: 1.15rem; color: #cbd5e1; line-height: 1.8; margin: 0;">
                Accede a la red de telescopios y sondas de espacio profundo. Descubre cada día una nueva anomalía, estrella o galaxia capturada y analizada por los instrumentos ópticos de la NASA.
            </p>
        </div>
    </section>

    <!-- Cambiado align-items: stretch a flex-start para que las columnas respeten su altura natural -->
    <div style="display: flex; gap: 40px; flex-wrap: wrap; align-items: flex-start;">
        
        <!-- Columna Izquierda: Información Principal -->
        <div class="info-column" style="flex: 1; min-width: 400px; display: flex; flex-direction: column;">
            <div class="cosmic-card" style="background: rgba(16, 26, 43, 0.8); backdrop-filter: blur(15px); border: 1px solid rgba(225, 29, 72, 0.2); border-radius: 24px; padding: 50px; box-shadow: 0 15px 50px rgba(0,0,0,0.6), inset 0 0 20px rgba(225, 29, 72, 0.05); position: relative; overflow: hidden;">
                
                <!-- Brillo superior rojo carmesí -->
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 4px; background: linear-gradient(90deg, transparent, #e11d48, transparent); opacity: 0.8;"></div>

                <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(225, 29, 72, 0.1); border: 1px solid rgba(225, 29, 72, 0.3); color: #fb7185; padding: 6px 16px; border-radius: 20px; font-size: 0.85rem; font-weight: bold; text-transform: uppercase; margin-bottom: 25px; letter-spacing: 1px;">
                    <svg style="width: 1.2rem; height: 1.2rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    Transmisión Diaria NASA
                </div>

                <h1 style="color: white; margin-top: 0; font-size: 3.2rem; font-weight: 900; margin-bottom: 15px; background: -webkit-linear-gradient(135deg, #fff, #e11d48); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                    {{ $apod['title'] ?? 'Fenómeno Desconocido' }}
                </h1>
                
                <div style="display: flex; align-items: center; gap: 10px; color: #94a3b8; font-size: 0.95rem; margin-bottom: 30px; font-family: monospace; background: rgba(255,255,255,0.05); padding: 8px 15px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.1); display: inline-flex;">
                    <svg style="width: 1.2rem; height: 1.2rem; color: #fb7185;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Fecha de Captura: <span style="color: white; font-weight: bold;">{{ $apod['date'] ?? now()->toDateString() }}</span>
                </div>
                
                <p style="color: #cbd5e1; font-size: 1.15rem; line-height: 1.9; margin-bottom: 40px; text-align: justify;">
                    {{ $apod['explanation'] ?? 'Buscando datos en la matriz principal...' }}
                </p>

                <div style="margin-top: auto;">
                    <a href="{{ route('inicio') }}" class="btn-login" style="display: inline-flex; align-items: center; gap: 10px; background: rgba(225, 29, 72, 0.1); border: 1px solid rgba(225, 29, 72, 0.3); color: #fb7185; padding: 12px 25px; border-radius: 12px; text-decoration: none; font-weight: bold; transition: all 0.3s;" onmouseover="this.style.background='rgba(225, 29, 72, 0.2)'; this.style.transform='translateX(-5px)';" onmouseout="this.style.background='rgba(225, 29, 72, 0.1)'; this.style.transform='translateX(0)';">
                        &larr; Retornar al puente de mando
                    </a>
                </div>
            </div>
        </div>

        <!-- Columna Derecha: Multimedia APOD -->
        <div class="telemetry-column" style="flex: 1; min-width: 400px; display: flex; flex-direction: column;">
            <!-- Eliminamos el flex-grow para que la tarjeta abrace a la imagen sin forzar la altura -->
            <div class="cosmic-card" style="background: rgba(10, 15, 25, 0.9); border: 1px solid rgba(225, 29, 72, 0.3); border-radius: 24px; overflow: hidden; box-shadow: 0 15px 50px rgba(0,0,0,0.6), inset 0 0 30px rgba(225, 29, 72, 0.1); text-align: center; display: flex; flex-direction: column;">
                
                <div style="background: rgba(225, 29, 72, 0.1); border-bottom: 1px solid rgba(225, 29, 72, 0.3); padding: 12px 20px; display: flex; justify-content: space-between; align-items: center;">
                    <span style="color: #fda4af; font-family: monospace; font-size: 0.85rem; font-weight: bold; letter-spacing: 1px; display: flex; align-items: center; gap: 8px;">
                        <svg style="width: 1rem; height: 1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        VISOR ÓPTICO PRINCIPAL
                    </span>
                    <span style="display: inline-block; width: 10px; height: 10px; background: #e11d48; border-radius: 50%; box-shadow: 0 0 10px #e11d48; animation: blink 1.5s infinite;"></span>
                </div>

                <!-- Fondo negro para letterboxing. object-fit: contain muestra la imagen entera sin recortar -->
                <div style="display: flex; align-items: center; justify-content: center; background: #000; position: relative;">
                    @if(isset($apod['media_type']) && $apod['media_type'] === 'video')
                        <iframe src="{{ $apod['url'] }}" frameborder="0" allowfullscreen style="width: 100%; aspect-ratio: 16/9; border: none;"></iframe>
                    @else
                        <a href="{{ $apod['hdurl'] ?? ($apod['url'] ?? '#') }}" target="_blank" style="display: block; width: 100%;">
                            <!-- Usamos object-fit: contain para NO recortar. max-height limita lo alto que puede ser -->
                            <img src="{{ $apod['url'] ?? 'https://images.unsplash.com/photo-1462331940025-496dfbfc7564?q=80&w=2000&auto=format&fit=crop' }}" alt="{{ $apod['title'] ?? 'Nasa APOD' }}" style="width: 100%; height: auto; max-height: 600px; object-fit: contain; transition: filter 0.3s ease;" onmouseover="this.style.filter='brightness(1.1)'" onmouseout="this.style.filter='brightness(1)'">
                        </a>
                    @endif
                </div>
                
                <div style="padding: 20px; background: rgba(0,0,0,0.8); text-align: left; border-top: 1px solid rgba(225, 29, 72, 0.3);">
                    <div style="color: #fda4af; font-family: monospace; font-size: 0.95rem; margin-bottom: 8px;">> INICIANDO_SECUENCIA_VISUAL... [OK]</div>
                    <div style="color: #94a3b8; font-family: monospace; font-size: 0.85rem; margin-bottom: 5px;">> FUENTE_TELEMETRÍA: API PÚBLICA NASA</div>
                    @if(isset($apod['media_type']) && $apod['media_type'] !== 'video')
                        <div style="color: #f87171; font-family: monospace; font-size: 0.85rem;">> ESTADO: RESOLUCIÓN HD DISPONIBLE (CLICK EN LA IMAGEN)</div>
                    @endif
                    <i style="color: #e11d48; display: inline-block; margin-top: 5px; font-weight: bold; animation: blink 1s infinite;">_</i>
                </div>
                
            </div>
        </div>

    </div>

    <!-- Galería de Fenómenos Documentados (Manuales) -->
    @if(isset($fenomenosLocales) && $fenomenosLocales->count() > 0)
    <section style="margin-top: 5rem;">
        <div style="display: inline-flex; align-items: center; gap: 6px; background: rgba(225, 29, 72, 0.1); border: 1px solid rgba(225, 29, 72, 0.3); color: #fb7185; padding: 6px 18px; border-radius: 20px; font-size: 0.85rem; font-weight: bold; text-transform: uppercase; margin-bottom: 20px; letter-spacing: 2px;">
            <svg style="width: 1rem; height: 1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            Archivos Clasificados
        </div>
        <h2 style="font-size: 2.5rem; margin-top: 0; margin-bottom: 30px; font-weight: 800; color: white;">
            Galería de Fenómenos Documentados
        </h2>

        <div class="bento-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 30px;">
            @foreach($fenomenosLocales as $fenomeno)
            <div class="cosmic-card fenomeno-card" style="background: rgba(16, 26, 43, 0.8); backdrop-filter: blur(15px); border: 1px solid rgba(225, 29, 72, 0.2); border-radius: 20px; overflow: hidden; display: flex; flex-direction: column;" onclick="toggleExpand(this)">
                
                @if($fenomeno->image_path)
                <div style="width: 100%; height: 220px; overflow: hidden; background: #050510; display: flex; align-items: center; justify-content: center; transition: height 0.5s cubic-bezier(0.4, 0, 0.2, 1);" class="fenomeno-img-container">
                    <img src="{{ asset('storage/' . $fenomeno->image_path) }}" alt="{{ $fenomeno->title }}" style="width: 100%; height: 100%; object-fit: cover; transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);" class="fenomeno-img">
                </div>
                @else
                <div style="width: 100%; height: 220px; background: rgba(0,0,0,0.5); display: flex; align-items: center; justify-content: center; color: #64748b; font-family: monospace; transition: height 0.5s cubic-bezier(0.4, 0, 0.2, 1);" class="fenomeno-img-container">
                    [ IMAGEN NO DISPONIBLE ]
                </div>
                @endif
                
                <div style="padding: 25px; flex-grow: 1; display: flex; flex-direction: column;">
                    <div style="color: #fb7185; font-family: monospace; font-size: 0.8rem; margin-bottom: 10px; display: flex; align-items: center; gap: 8px;">
                        <span style="display: inline-block; width: 6px; height: 6px; background: #e11d48; border-radius: 50%;"></span>
                        REGISTRO: {{ $fenomeno->date ? $fenomeno->date->format('d/m/Y') : 'DESCONOCIDO' }}
                    </div>
                    <h3 style="margin-top: 0; font-size: 1.5rem; font-weight: 800; line-height: 1.3; background: -webkit-linear-gradient(135deg, #fff, #fda4af); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 15px;">{{ $fenomeno->title }}</h3>
                    <div class="fenomeno-desc-wrapper" style="position: relative; max-height: 4.8em; overflow: hidden; transition: max-height 1s cubic-bezier(0.25, 1, 0.5, 1);">
                        <p class="fenomeno-desc" style="color: #94a3b8; font-size: 0.95rem; line-height: 1.6; margin-bottom: 0;">
                            {{ $fenomeno->description }}
                        </p>
                        <div class="desc-fade" style="position: absolute; bottom: 0; left: 0; width: 100%; height: 35px; background: linear-gradient(to bottom, transparent, rgba(16, 26, 43, 0.9)); transition: opacity 0.8s ease;"></div>
                    </div>
                    <div class="expand-hint" style="color: #e11d48; font-size: 0.85rem; font-weight: bold; margin-top: 15px; display: flex; align-items: center; gap: 5px;">
                        <span>Ver registro completo</span> <svg style="width: 16px; height: 16px; transition: transform 0.3s ease;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif
</div>

<style>
    .fenomeno-card {
        transition: transform 1s cubic-bezier(0.25, 1, 0.5, 1), box-shadow 1s ease, background 1s ease;
        cursor: pointer;
    }
    .fenomeno-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.6), inset 0 0 20px rgba(225, 29, 72, 0.1);
    }
    .fenomeno-card:hover .fenomeno-img {
        transform: scale(1.05);
    }

    /* Estilos cuando se expande */
    .fenomeno-card.expanded {
        transform: none !important;
        box-shadow: 0 25px 60px rgba(0,0,0,0.9), inset 0 0 40px rgba(225, 29, 72, 0.2);
        z-index: 10;
        background: rgba(15, 20, 35, 0.98) !important;
        cursor: default;
    }
    
    .fenomeno-card.expanded .fenomeno-img-container {
        height: 350px; /* Reducido para que no sea inmenso en formato vertical */
        transition: height 1s cubic-bezier(0.25, 1, 0.5, 1);
    }
    
    .fenomeno-card.expanded .fenomeno-img {
        object-fit: contain;
        transform: none !important;
    }
    
    .fenomeno-card.expanded .desc-fade {
        opacity: 0;
        pointer-events: none;
    }
    
    .fenomeno-card.expanded .fenomeno-desc {
        color: #cbd5e1 !important; /* Texto un poco más claro al expandir */
        transition: color 1s ease;
    }
    
    .fenomeno-card.expanded .expand-hint {
        cursor: pointer;
    }
    .fenomeno-card.expanded .expand-hint span {
        display: none;
    }
    .fenomeno-card.expanded .expand-hint::before {
        content: "Cerrar registro";
    }
    .fenomeno-card.expanded .expand-hint svg {
        transform: rotate(180deg);
    }
</style>

<script>
    function toggleExpand(element) {
        const isExpanded = element.classList.contains('expanded');
        
        // Cerrar todos los demás
        document.querySelectorAll('.fenomeno-card').forEach(card => {
            if (card !== element && card.classList.contains('expanded')) {
                card.classList.remove('expanded');
                const wrapper = card.querySelector('.fenomeno-desc-wrapper');
                if(wrapper) wrapper.style.maxHeight = '4.8em';
            }
        });

        // Alternar el actual
        if (!isExpanded) {
            element.classList.add('expanded');
            const wrapper = element.querySelector('.fenomeno-desc-wrapper');
            const desc = element.querySelector('.fenomeno-desc');
            // Damos margen extra por si el texto cambia de ancho al expandir y ocupa más líneas
            wrapper.style.maxHeight = (desc.scrollHeight + 80) + 'px';
        } else {
            element.classList.remove('expanded');
            const wrapper = element.querySelector('.fenomeno-desc-wrapper');
            wrapper.style.maxHeight = '4.8em';
        }
    }
</script>

<style>
    @keyframes blink {
        0%, 100% { opacity: 1; }
        50% { opacity: 0; }
    }
</style>
@endsection
