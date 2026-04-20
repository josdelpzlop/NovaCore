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

        <section class="fenomenos-box" style="animation: fadeUp 1s ease-out 0.3s backwards;">
            <h3 style="border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 10px;">Transmisión Espacial</h3>
            <ul style="display: flex; flex-direction: column; gap: 10px; margin-top: 20px;">
                <li>
                    <a href="{{ route('fenomenos.index') }}" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); padding: 15px; border-radius: 12px; display: block;">🪐 Fenómeno del Día (NASA)</a>
                </li>
                <li>
                    <a href="{{ route('events.index') }}" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); padding: 15px; border-radius: 12px; display: block;">🚀 Eventos Astronómicos</a>
                </li>
            </ul>
        </section>
    </div>

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
                <span style="color: var(--menta); font-weight: bold; letter-spacing: 1px;">[📡] COM-LINK: ESTACIÓN ESPACIAL INTERNACIONAL</span>
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