@extends('layouts.master')

@section('title', 'Fenómeno Cósmico - NovaCore')

@section('content')
<div style="padding: 100px 5%; max-width: 1200px; margin: 0 auto; min-height: 70vh;">
    
    <div style="display: flex; gap: 40px; flex-wrap: wrap; align-items: flex-start;">
        
        <!-- Columna Izquierda: Información Principal -->
        <div class="info-column" style="flex: 2; min-width: 300px;">
            <div class="cosmic-card" style="background: rgba(16, 26, 43, 0.7); backdrop-filter: blur(15px); border: 1px solid rgba(255,255,255,0.1); border-radius: 20px; padding: 40px; box-shadow: 0 10px 40px rgba(0,0,0,0.5);">
                <div style="display: inline-block; background: rgba(89,222,160,0.1); border: 1px solid rgba(89,222,160,0.3); color: var(--menta); padding: 5px 15px; border-radius: 20px; font-size: 0.8rem; font-weight: bold; text-transform: uppercase; margin-bottom: 20px;">
                    Anomalía Detectada
                </div>

                <h1 style="color: white; text-transform: capitalize; margin-top: 0; font-size: 3rem; margin-bottom: 20px; background: -webkit-linear-gradient(#fff, #1cc88a); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                    {{ str_replace('-', ' ', $slug) }}
                </h1>
                
                <p style="color: #cbd5e1; font-size: 1.15rem; line-height: 1.9; margin-bottom: 25px;">
                    Has detectado una anomalía fascinante en los sensores de largo alcance de la nave. 
                    Actualmente, nuestras sondas de investigación tipo Vanguard se encuentran viajando a velocidad warp hacia estas coordenadas para recopilar datos espectrométricos sobre el fenómeno clasificado como <strong>{{ strtoupper(str_replace('-', ' ', $slug)) }}</strong>.
                </p>

                <div style="background: rgba(0,0,0,0.3); border-left: 4px solid var(--azul); padding: 20px; border-radius: 0 10px 10px 0; margin-bottom: 30px;">
                    <p style="color: #94a3b8; font-size: 1rem; margin: 0; line-height: 1.6;">
                        <em>Dato Base del Ordenador:</em> Se cree que las emisiones electromagnéticas de este cuadrante alteran las leyes de la física gravitacional estándar. Vuelve más tarde cuando la base de datos central de NovaCore logre desencriptar la transmisión completa.
                    </p>
                </div>
                
                <div style="margin-top: 40px;">
                    <a href="{{ route('inicio') }}" class="btn-login" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.2); margin-left: 0; transition: all 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.1)'" onmouseout="this.style.background='rgba(255,255,255,0.05)'">
                        ← Retornar al puente de mando
                    </a>
                </div>
            </div>
        </div>

        <!-- Columna Derecha: Telemetría (Panel Interfaz) -->
        <div class="telemetry-column" style="flex: 1; min-width: 300px;">
            <div class="cosmic-card" style="background: rgba(10, 15, 25, 0.8); backdrop-filter: blur(15px); border: 1px solid rgba(78, 115, 223, 0.3); border-radius: 20px; padding: 30px; box-shadow: inset 0 0 30px rgba(78,115,223,0.1);">
                <h3 style="color: var(--lavanda); border-bottom: 1px solid rgba(78, 115, 223, 0.3); padding-bottom: 15px; margin-top: 0; font-family: monospace; text-transform: uppercase; font-size: 1.1rem;">
                    Terminal de Rastreó
                </h3>

                <div style="font-family: monospace; color: #4e73df; font-size: 0.9rem;">
                    <!-- Stat 1 -->
                    <div style="margin-bottom: 20px;">
                        <span style="display: block; color: white; margin-bottom: 5px;">Distancia Relativa</span>
                        <div style="color: var(--menta); font-weight: bold; font-size: 1.2rem;">45,800 Años Luz</div>
                    </div>

                    <!-- Progreso -->
                    <div style="margin-bottom: 20px;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                            <span style="color: rgba(255,255,255,0.7);">Sonda de Exploración</span>
                            <span style="color: #f6c23e;">Rastreando...</span>
                        </div>
                        <div style="width: 100%; height: 8px; background: rgba(255,255,255,0.1); border-radius: 4px; overflow: hidden; position: relative;">
                            <!-- Progress animate -->
                            <div style="position: absolute; top: 0; left: 0; height: 100%; width: 68%; background: linear-gradient(90deg, #4e73df, #59DEA0); animation: pulseWidth 2s infinite alternate;"></div>
                        </div>
                    </div>

                    <!-- Data logs -->
                    <div style="background: rgba(0,0,0,0.5); border: 1px solid rgba(255,255,255,0.05); border-radius: 8px; padding: 15px; margin-top: 30px;">
                        <div style="color: #f6c23e; margin-bottom: 8px;">> INICIANDO SECUENCIA_</div>
                        <div style="color: #94a3b8; margin-bottom: 8px;">> Recibiendo paquetes XYZ...</div>
                        <div style="color: #94a3b8; margin-bottom: 8px;">> Espectro EM detectado.</div>
                        <div style="color: var(--error);">> ALERTA: Interferencia Radial.</div>
                        <i style="color: #4e73df; display: inline-block; margin-top: 10px; animation: blink 1s infinite;">_</i>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Animaciones para telemetría -->
<style>
    @keyframes pulseWidth {
        0% { opacity: 0.7; }
        100% { opacity: 1; box-shadow: 0 0 10px #59DEA0; }
    }
    @keyframes blink {
        0%, 100% { opacity: 1; }
        50% { opacity: 0; }
    }
</style>
@endsection
