@extends('layouts.master')

@section('title', 'NovaCore - Inicio')

@section('content')
    <div class="hero">
        <section class="intro-text" style="animation: fadeUp 1s ease-out;">
            <h2 style="font-size: 3rem; background: -webkit-linear-gradient(#fff, #1cc88a); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Explora lo desconocido,<br>domina el cosmos.</h2>
            <p style="font-size: 1.2rem;">
                NovaCore es un espacio de divulgación astronómica diseñado para mentes curiosas.
                Sumérgete en un viaje educativo donde la ciencia se encuentra con la interactividad
                y el juego.
            </p>
        </section>

        <section class="fenomenos-box" style="animation: fadeUp 1s ease-out 0.3s backwards; background: rgba(16, 26, 43, 0.6); backdrop-filter: blur(10px); border: 1px solid rgba(135, 103, 235, 0.3); border-radius: 20px; padding: 25px; box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
            <h3 style="margin-top: 0; margin-bottom: 5px; color: white; display: flex; align-items: center; gap: 10px; font-size: 1.4rem;">
                <svg style="width: 1.5rem; height: 1.5rem; color: var(--lavanda);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"></path></svg>
                Transmisión Espacial
            </h3>
            <ul style="display: flex; flex-direction: column; gap: 15px; margin-top: 20px;">
                <li>
                    <a href="{{ route('fenomenos.index') }}" style="background: rgba(89, 222, 160, 0.1); border: 1px solid rgba(89, 222, 160, 0.3); padding: 15px; border-radius: 12px; display: block; color: white; transition: all 0.3s;" onmouseover="this.style.background='rgba(89, 222, 160, 0.2)'; this.style.transform='translateX(5px)';" onmouseout="this.style.background='rgba(89, 222, 160, 0.1)'; this.style.transform='translateX(0)';">
                        <svg style="width: 1.4rem; height: 1.4rem; vertical-align: text-bottom; margin-right: 10px; color: var(--menta);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>Fenómeno del Día (NASA)
                    </a>
                </li>
                <li>
                    <a href="{{ route('events.index') }}" style="background: rgba(135, 103, 235, 0.1); border: 1px solid rgba(135, 103, 235, 0.3); padding: 15px; border-radius: 12px; display: block; color: white; transition: all 0.3s;" onmouseover="this.style.background='rgba(135, 103, 235, 0.2)'; this.style.transform='translateX(5px)';" onmouseout="this.style.background='rgba(135, 103, 235, 0.1)'; this.style.transform='translateX(0)';">
                        <svg style="width: 1.4rem; height: 1.4rem; vertical-align: text-bottom; margin-right: 10px; color: var(--lavanda);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>Eventos Astronómicos
                    </a>
                </li>
            </ul>
        </section>
    </div>

    <section class="info-section" style="max-width: 1200px; margin: 0 auto 50px auto; padding: 0 5%; animation: fadeUp 1s ease-out 0.4s backwards; display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
        <div style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); padding: 25px; border-radius: 15px;">
            <h3 style="color: var(--menta); margin-top: 0; display: flex; align-items: center; gap: 10px;">
                <svg style="width: 1.5rem; height: 1.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                ¿Qué puedes hacer en NovaCore?
            </h3>
            <p style="color: #cbd5e1; font-size: 0.95rem; line-height: 1.6;">En NovaCore puedes formarte en ciencias espaciales, asistir a eventos astronómicos reales y hacer un seguimiento en directo de fenómenos del universo. Todo tu progreso se guarda en tu perfil: ¡Sube de nivel, obtén experiencia (XP) y colecciona títulos equipables!</p>
        </div>
        <div style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); padding: 25px; border-radius: 15px;">
            <h3 style="color: var(--lavanda); margin-top: 0; display: flex; align-items: center; gap: 10px;">
                <svg style="width: 1.5rem; height: 1.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                El COM-LINK (Tracker ISS)
            </h3>
            <p style="color: #cbd5e1; font-size: 0.95rem; line-height: 1.6;">Justo abajo encontrarás el panel <strong>COM-LINK</strong>. Es nuestro radar conectado a las redes de telemetría espaciales. Te permite rastrear en directo la ubicación, altitud y velocidad exacta de la <em>Estación Espacial Internacional (ISS)</em> mientras viaja alrededor de la Tierra a más de 28.000 km/h.</p>
        </div>
    </section>

    <!-- CONTENEDOR ISS TERMINAL (REUBICADO) -->
    <div style="max-width: 1200px; margin: 0 auto 50px auto; padding: 0 5%; animation: fadeUp 1s ease-out 0.6s backwards;">
        <div class="iss-terminal" style="
            background: rgba(10, 15, 25, 0.9);
            border: 1px solid rgba(89, 222, 160, 0.3);
            border-radius: 15px;
            padding: 25px;
            box-shadow: inset 0 0 20px rgba(89, 222, 160, 0.05);
            font-family: 'Courier New', Courier, monospace;
        ">
            <div style="display: flex; justify-content: space-between; border-bottom: 1px solid rgba(89, 222, 160, 0.3); padding-bottom: 10px; margin-bottom: 20px; flex-wrap: wrap; gap: 10px;">
                <span style="color: var(--menta); font-weight: bold; letter-spacing: 1px; display: flex; align-items: center; gap: 8px;">
                    <svg style="width: 1.2rem; height: 1.2rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    COM-LINK: ESTACIÓN ESPACIAL INTERNACIONAL
                </span>
                <span style="color: #f6c23e; animation: blink 1.5s infinite; font-weight: bold;">● RASTREANDO EN VIVO</span>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(130px, 1fr)); gap: 15px;">
                <div style="background: rgba(0,0,0,0.4); padding: 10px; border-radius: 8px; border-left: 3px solid #4e73df;">
                    <span style="color: #64748b; font-size: 0.85rem; display: block; margin-bottom: 5px;">LATITUD</span>
                    <span id="iss-lat" style="color: white; font-size: 1.3rem; font-weight: bold;">--.----</span>
                </div>
                <div style="background: rgba(0,0,0,0.4); padding: 10px; border-radius: 8px; border-left: 3px solid #4e73df;">
                    <span style="color: #64748b; font-size: 0.85rem; display: block; margin-bottom: 5px;">LONGITUD</span>
                    <span id="iss-lon" style="color: white; font-size: 1.3rem; font-weight: bold;">--.----</span>
                </div>
                <div style="background: rgba(0,0,0,0.4); padding: 10px; border-radius: 8px; border-left: 3px solid #1cc88a;">
                    <span style="color: #64748b; font-size: 0.85rem; display: block; margin-bottom: 5px;">ALTITUD</span>
                    <span id="iss-alt" style="color: white; font-size: 1.3rem; font-weight: bold;">---.--</span> <span style="color: #64748b; font-size: 0.8rem;">KM</span>
                </div>
                <div style="background: rgba(0,0,0,0.4); padding: 10px; border-radius: 8px; border-left: 3px solid var(--lavanda);">
                    <span style="color: #64748b; font-size: 0.85rem; display: block; margin-bottom: 5px;">VELOCIDAD ORBITAL</span>
                    <span id="iss-vel" style="color: var(--lavanda); font-size: 1.3rem; font-weight: bold;">-----</span> <span style="color: #64748b; font-size: 0.8rem;">KM/H</span>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function fetchISSData() {
            fetch('https://api.wheretheiss.at/v1/satellites/25544')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('iss-lat').innerText = data.latitude.toFixed(4);
                    document.getElementById('iss-lon').innerText = data.longitude.toFixed(4);
                    document.getElementById('iss-alt').innerText = data.altitude.toFixed(2);
                    document.getElementById('iss-vel').innerText = data.velocity.toFixed(0);
                }).catch(error => console.error('Enlace de comunicación perdido con la ISS:', error));
        }
        document.addEventListener('DOMContentLoaded', function() {
            fetchISSData();
            setInterval(fetchISSData, 2000);
        });
    </script>
    <!-- Animaciones Base CSS -->
    <style>
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes blink { 
            0%, 100% { opacity: 1; } 
            50% { opacity: 0; } 
        }
    </style>
@endsection