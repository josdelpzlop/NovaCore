@extends('layouts.master')

@section('title', 'Inicio | NovaCore')

@section('content')
    <!-- Elementos decorativos de fondo (Fixed) -->
    <div
        style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; overflow: hidden; pointer-events: none; z-index: -1;">
        <!-- Nebulosas de colores -->
        <div
            style="position: absolute; top: -10%; left: -10%; width: 50vw; height: 50vw; background: radial-gradient(circle, #4e73df 0%, transparent 70%); filter: blur(100px); opacity: 0.2; animation: pulseGlow 8s infinite alternate;">
        </div>
        <div
            style="position: absolute; top: 30%; right: -15%; width: 60vw; height: 60vw; background: radial-gradient(circle, #1cc88a 0%, transparent 70%); filter: blur(120px); opacity: 0.15; animation: pulseGlow 10s infinite alternate-reverse;">
        </div>
        <div
            style="position: absolute; bottom: -20%; left: 10%; width: 50vw; height: 50vw; background: radial-gradient(circle, #8767eb 0%, transparent 70%); filter: blur(100px); opacity: 0.15; animation: pulseGlow 12s infinite alternate;">
        </div>

        <!-- Líneas HUD Laterales (Mallas Tecnológicas) -->
        <div
            style="position: absolute; top: 0; left: 4%; width: 1px; height: 100%; background: linear-gradient(to bottom, transparent, rgba(255,255,255,0.1), transparent);">
        </div>
        <div
            style="position: absolute; top: 20vh; left: calc(4% - 4px); width: 9px; height: 1px; background: rgba(255,255,255,0.3);">
        </div>
        <div
            style="position: absolute; top: 60vh; left: calc(4% - 4px); width: 9px; height: 1px; background: rgba(255,255,255,0.3);">
        </div>

        <div
            style="position: absolute; top: 0; right: 4%; width: 1px; height: 100%; background: linear-gradient(to bottom, transparent, rgba(255,255,255,0.1), transparent);">
        </div>
        <div
            style="position: absolute; top: 30vh; right: calc(4% - 4px); width: 9px; height: 1px; background: rgba(255,255,255,0.3);">
        </div>
        <div
            style="position: absolute; top: 70vh; right: calc(4% - 4px); width: 9px; height: 1px; background: rgba(255,255,255,0.3);">
        </div>
    </div>

    <div class="hero">
        <section class="intro-text" style="animation: fadeUp 1s ease-out;">
            <h2
                style="font-size: 3rem; background: -webkit-linear-gradient(#fff, #1cc88a); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                Explora lo desconocido,<br>domina el cosmos.</h2>
            <p style="font-size: 1.2rem;">
                NovaCore es un espacio de divulgación astronómica diseñado para mentes curiosas.
                Sumérgete en un viaje educativo donde la ciencia se encuentra con la interactividad
                y el juego.
            </p>
        </section>

        <section class="fenomenos-box"
            style="animation: fadeUp 1s ease-out 0.3s backwards; background: rgba(16, 26, 43, 0.6); backdrop-filter: blur(10px); border: 1px solid rgba(135, 103, 235, 0.3); border-radius: 20px; padding: 25px; box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
            <h3
                style="margin-top: 0; margin-bottom: 5px; color: white; display: flex; align-items: center; gap: 10px; font-size: 1.4rem;">
                <svg style="width: 1.5rem; height: 1.5rem; color: var(--lavanda);" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5">
                    </path>
                </svg>
                Transmisión Espacial
            </h3>
            <ul style="display: flex; flex-direction: column; gap: 15px; margin-top: 20px;">
                <li>
                    <a href="{{ route('fenomenos.index') }}"
                        style="background: rgba(89, 222, 160, 0.1); border: 1px solid rgba(89, 222, 160, 0.3); padding: 15px; border-radius: 12px; display: block; color: white; transition: all 0.3s;"
                        onmouseover="this.style.background='rgba(89, 222, 160, 0.2)'; this.style.transform='translateX(5px)';"
                        onmouseout="this.style.background='rgba(89, 222, 160, 0.1)'; this.style.transform='translateX(0)';">
                        <svg style="width: 1.4rem; height: 1.4rem; vertical-align: text-bottom; margin-right: 10px; color: var(--menta);"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                            </path>
                        </svg>Fenómeno del Día (NASA)
                    </a>
                </li>
                <li>
                    <a href="{{ route('events.index') }}"
                        style="background: rgba(135, 103, 235, 0.1); border: 1px solid rgba(135, 103, 235, 0.3); padding: 15px; border-radius: 12px; display: block; color: white; transition: all 0.3s;"
                        onmouseover="this.style.background='rgba(135, 103, 235, 0.2)'; this.style.transform='translateX(5px)';"
                        onmouseout="this.style.background='rgba(135, 103, 235, 0.1)'; this.style.transform='translateX(0)';">
                        <svg style="width: 1.4rem; height: 1.4rem; vertical-align: text-bottom; margin-right: 10px; color: var(--lavanda);"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>Eventos Astronómicos
                    </a>
                </li>
            </ul>
        </section>
    </div>

    <section class="info-section"
        style="max-width: 1200px; margin: 0 auto 50px auto; padding: 0 5%; animation: fadeUp 1s ease-out 0.4s backwards; display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
        <div
            style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); padding: 25px; border-radius: 15px;">
            <h3 style="color: var(--menta); margin-top: 0; display: flex; align-items: center; gap: 10px;">
                <svg style="width: 1.5rem; height: 1.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                    </path>
                </svg>
                ¿Qué puedes hacer en NovaCore?
            </h3>
            <p style="color: #cbd5e1; font-size: 0.95rem; line-height: 1.6;">En NovaCore puedes formarte en ciencias
                espaciales, asistir a eventos astronómicos reales y hacer un seguimiento en directo de fenómenos del
                universo. Todo tu progreso se guarda en tu perfil: ¡Sube de nivel, obtén experiencia (XP) y colecciona
                títulos equipables!</p>
        </div>
        <div
            style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); padding: 25px; border-radius: 15px;">
            <h3 style="color: var(--lavanda); margin-top: 0; display: flex; align-items: center; gap: 10px;">
                <svg style="width: 1.5rem; height: 1.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                El COM-LINK (Tracker ISS)
            </h3>
            <p style="color: #cbd5e1; font-size: 0.95rem; line-height: 1.6;">Justo abajo encontrarás el panel
                <strong>COM-LINK</strong>. Es nuestro radar conectado a las redes de telemetría espaciales. Te permite
                rastrear en directo la ubicación, altitud y velocidad exacta de la <em>Estación Espacial Internacional
                    (ISS)</em> mientras viaja alrededor de la Tierra a más de 28.000 km/h.</p>
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
            <div
                style="display: flex; justify-content: space-between; border-bottom: 1px solid rgba(89, 222, 160, 0.3); padding-bottom: 10px; margin-bottom: 20px; flex-wrap: wrap; gap: 10px;">
                <span
                    style="color: var(--menta); font-weight: bold; letter-spacing: 1px; display: flex; align-items: center; gap: 8px;">
                    <svg style="width: 1.2rem; height: 1.2rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                    COM-LINK: ESTACIÓN ESPACIAL INTERNACIONAL
                </span>
                <span style="color: #f6c23e; animation: blink 1.5s infinite; font-weight: bold;">● RASTREANDO EN VIVO</span>
            </div>

            <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; width: 100%;">
                <div
                    style="flex: 1 1 180px; background: rgba(0,0,0,0.4); padding: 20px; border-radius: 8px; border-left: 4px solid #4e73df;">
                    <span style="color: #64748b; font-size: 0.95rem; display: block; margin-bottom: 8px; font-weight: bold; letter-spacing: 1px;">LATITUD</span>
                    <span id="iss-lat" style="color: white; font-size: 1.6rem; font-weight: bold;">--.----</span>
                </div>
                <div
                    style="flex: 1 1 180px; background: rgba(0,0,0,0.4); padding: 20px; border-radius: 8px; border-left: 4px solid #4e73df;">
                    <span style="color: #64748b; font-size: 0.95rem; display: block; margin-bottom: 8px; font-weight: bold; letter-spacing: 1px;">LONGITUD</span>
                    <span id="iss-lon" style="color: white; font-size: 1.6rem; font-weight: bold;">--.----</span>
                </div>
                <div
                    style="flex: 1 1 180px; background: rgba(0,0,0,0.4); padding: 20px; border-radius: 8px; border-left: 4px solid #1cc88a;">
                    <span style="color: #64748b; font-size: 0.95rem; display: block; margin-bottom: 8px; font-weight: bold; letter-spacing: 1px;">ALTITUD</span>
                    <span id="iss-alt" style="color: white; font-size: 1.6rem; font-weight: bold;">---.--</span> <span
                        style="color: #64748b; font-size: 0.9rem;">KM</span>
                </div>
                <div
                    style="flex: 1 1 180px; background: rgba(0,0,0,0.4); padding: 20px; border-radius: 8px; border-left: 4px solid var(--lavanda);">
                    <span style="color: #64748b; font-size: 0.95rem; display: block; margin-bottom: 8px; font-weight: bold; letter-spacing: 1px;">VELOCIDAD</span>
                    <span id="iss-vel" style="color: var(--lavanda); font-size: 1.6rem; font-weight: bold;">-----</span>
                    <span style="color: #64748b; font-size: 0.9rem;">KM/H</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Módulos Principales (Bento Grid) - Llevado al final como Call To Action -->
    <section class="modules-section"
        style="max-width: 1200px; margin: 0 auto 60px auto; padding: 0 5%; animation: fadeUp 1s ease-out 0.8s backwards;">
        <h2
            style="text-align: center; font-size: 2.5rem; margin-bottom: 40px; font-weight: 700; background: -webkit-linear-gradient(135deg, #fff, #1cc88a); -webkit-background-clip: text; -webkit-text-fill-color: transparent; text-shadow: 0 0 20px rgba(28, 200, 138, 0.2);">
            ¡Tu aventura espacial comienza aquí!</h2>
        <div class="bento-grid"
            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 25px;">

            <!-- Aprender -->
            <a href="{{ route('aprende') }}" class="module-card hover-lift"
                style="text-decoration: none; display: flex; flex-direction: column; justify-content: space-between; background: linear-gradient(145deg, rgba(78, 115, 223, 0.1), rgba(10, 15, 25, 0.9)); border: 1px solid rgba(78, 115, 223, 0.3); border-radius: 20px; padding: 30px; transition: all 0.3s; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
                <div>
                    <div
                        style="background: rgba(78, 115, 223, 0.2); width: 60px; height: 60px; border-radius: 15px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px; border: 1px solid rgba(78, 115, 223, 0.4);">
                        <svg style="width: 2rem; height: 2rem; color: #4e73df;" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                    </div>
                    <h3 style="color: white; font-size: 1.5rem; margin-top: 0; margin-bottom: 10px;">Academia Estelar</h3>
                    <p style="color: #cbd5e1; font-size: 0.95rem; line-height: 1.5;">Sumérgete en lecciones interactivas
                        sobre el sistema solar y agujeros negros. Gana experiencia completando misiones.</p>
                </div>
                <div
                    style="margin-top: 20px; color: #4e73df; font-weight: bold; display: flex; align-items: center; gap: 5px;">
                    Empezar Misión <svg style="width: 1.2rem; height: 1.2rem;" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                        </path>
                    </svg>
                </div>
            </a>

            <!-- Recompensas -->
            <a href="{{ route('recompensas') }}" class="module-card hover-lift"
                style="text-decoration: none; display: flex; flex-direction: column; justify-content: space-between; background: linear-gradient(145deg, rgba(246, 194, 62, 0.1), rgba(10, 15, 25, 0.9)); border: 1px solid rgba(246, 194, 62, 0.3); border-radius: 20px; padding: 30px; transition: all 0.3s; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
                <div>
                    <div
                        style="background: rgba(246, 194, 62, 0.2); width: 60px; height: 60px; border-radius: 15px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px; border: 1px solid rgba(246, 194, 62, 0.4);">
                        <svg style="width: 2rem; height: 2rem; color: #f6c23e;" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                            </path>
                        </svg>
                    </div>
                    <h3 style="color: white; font-size: 1.5rem; margin-top: 0; margin-bottom: 10px;">Logros y Títulos</h3>
                    <p style="color: #cbd5e1; font-size: 0.95rem; line-height: 1.5;">Tus descubrimientos son recompensados.
                        Sube de rango, obtén XP y colecciona títulos equipables para lucir tu experiencia.</p>
                </div>
                <div
                    style="margin-top: 20px; color: #f6c23e; font-weight: bold; display: flex; align-items: center; gap: 5px;">
                    Ver Inventario <svg style="width: 1.2rem; height: 1.2rem;" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                        </path>
                    </svg>
                </div>
            </a>

            <!-- Fenómenos -->
            <a href="{{ route('fenomenos.index') }}" class="module-card hover-lift"
                style="text-decoration: none; display: flex; flex-direction: column; justify-content: space-between; background: linear-gradient(145deg, rgba(28, 200, 138, 0.1), rgba(10, 15, 25, 0.9)); border: 1px solid rgba(28, 200, 138, 0.3); border-radius: 20px; padding: 30px; transition: all 0.3s; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
                <div>
                    <div
                        style="background: rgba(28, 200, 138, 0.2); width: 60px; height: 60px; border-radius: 15px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px; border: 1px solid rgba(28, 200, 138, 0.4);">
                        <svg style="width: 2rem; height: 2rem; color: #1cc88a;" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                    </div>
                    <h3 style="color: white; font-size: 1.5rem; margin-top: 0; margin-bottom: 10px;">Observatorio</h3>
                    <p style="color: #cbd5e1; font-size: 0.95rem; line-height: 1.5;">Explora la Imagen Astronómica del Día
                        (NASA). Cada día, una nueva maravilla visual del cosmos con información detallada.</p>
                </div>
                <div
                    style="margin-top: 20px; color: #1cc88a; font-weight: bold; display: flex; align-items: center; gap: 5px;">
                    Acceder al Telescopio <svg style="width: 1.2rem; height: 1.2rem;" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                        </path>
                    </svg>
                </div>
            </a>

            <!-- Eventos -->
            <a href="{{ route('events.index') }}" class="module-card hover-lift"
                style="text-decoration: none; display: flex; flex-direction: column; justify-content: space-between; background: linear-gradient(145deg, rgba(135, 103, 235, 0.1), rgba(10, 15, 25, 0.9)); border: 1px solid rgba(135, 103, 235, 0.3); border-radius: 20px; padding: 30px; transition: all 0.3s; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
                <div>
                    <div
                        style="background: rgba(135, 103, 235, 0.2); width: 60px; height: 60px; border-radius: 15px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px; border: 1px solid rgba(135, 103, 235, 0.4);">
                        <svg style="width: 2rem; height: 2rem; color: #8767eb;" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 style="color: white; font-size: 1.5rem; margin-top: 0; margin-bottom: 10px;">Radar de Eventos</h3>
                    <p style="color: #cbd5e1; font-size: 0.95rem; line-height: 1.5;">Mantente al día con los próximos
                        lanzamientos orbitales. Obtén información de misiones espaciales en vivo y no te pierdas ningún
                        evento.</p>
                </div>
                <div
                    style="margin-top: 20px; color: #8767eb; font-weight: bold; display: flex; align-items: center; gap: 5px;">
                    Ver Calendario <svg style="width: 1.2rem; height: 1.2rem;" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                        </path>
                    </svg>
                </div>
            </a>

        </div>
    </section>

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
        document.addEventListener('DOMContentLoaded', function () {
            fetchISSData();
            setInterval(fetchISSData, 2000);
        });
    </script>
    <!-- Animaciones Base CSS -->
    <style>
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes blink {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }
        }

        .hover-lift:hover {
            transform: translateY(-10px) !important;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.6) !important;
        }
    </style>
@endsection