@extends('layouts.master')

@section('title', $lesson->title . ' | NovaCore')

@section('content')
    <!-- Fondo decorativo estático - Academia (Azul) -->
    <div style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; overflow: hidden; pointer-events: none; z-index: -1;">
        <div style="position: absolute; top: -10%; left: -10%; width: 50vw; height: 50vw; background: radial-gradient(circle, #1e3a8a 0%, transparent 70%); filter: blur(100px); opacity: 0.15;"></div>
        <div style="position: absolute; top: 30%; right: -15%; width: 60vw; height: 60vw; background: radial-gradient(circle, #0284c7 0%, transparent 70%); filter: blur(120px); opacity: 0.1;"></div>
        <div style="position: absolute; bottom: -20%; left: 10%; width: 50vw; height: 50vw; background: radial-gradient(circle, #3b82f6 0%, transparent 70%); filter: blur(100px); opacity: 0.1;"></div>
    </div>

<main style="padding: 100px 5% 50px; max-width: 850px; margin: auto; min-height: 80vh; display: flex; flex-direction: column;">
    
    <div style="margin-bottom: 2rem;">
        <a href="{{ route('levels.show', $level) }}" style="color: #60a5fa; text-decoration: none; font-size: 0.95rem; font-weight: bold; display: flex; align-items: center; gap: 8px; transition: color 0.3s;" onmouseover="this.style.color='#93c5fd'" onmouseout="this.style.color='#60a5fa'">
            ← Volver a {{ $level->title }}
        </a>
    </div>

    <!-- Lesson Header -->
    <div style="margin-bottom: 3rem; border-bottom: 1px solid rgba(59, 130, 246, 0.2); padding-bottom: 2rem;">
        <span style="display: inline-block; background: rgba(59, 130, 246, 0.15); color: #60a5fa; padding: 4px 12px; border-radius: 6px; font-weight: bold; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 1px; border: 1px solid rgba(59, 130, 246, 0.3); margin-bottom: 10px;">
            Lección {{ $lesson->order }}
        </span>
        <h1 style="font-size: 3rem; margin: 0 0 1rem 0; font-weight: 800; background: -webkit-linear-gradient(135deg, #fff, #3b82f6); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">{{ $lesson->title }}</h1>
        
        @if($isCompleted)
            <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(16, 185, 129, 0.1); color: #34d399; padding: 6px 14px; border-radius: 8px; font-size: 0.85rem; border: 1px solid rgba(16, 185, 129, 0.3); font-weight: bold;">
                <svg style="width: 1rem; height: 1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                Conocimiento Asimilado
            </div>
        @endif
    </div>

    <!-- Lesson Content Area -->
    <div style="flex-grow: 1; font-size: 1.15rem; line-height: 1.9; color: #cbd5e1; background: rgba(16, 26, 43, 0.8); padding: 40px; border-radius: 20px; border: 1px solid rgba(255,255,255,0.05); box-shadow: 0 10px 40px rgba(0,0,0,0.3); position: relative;" class="lesson-content">
        @if($lesson->type == 'video')
            @php
                $videoData = json_decode($lesson->content, true);
                $isVideoJson = json_last_error() === JSON_ERROR_NONE && is_array($videoData);
            @endphp

            @if($isVideoJson)
                <div style="background: rgba(0,0,0,0.8); border-radius: 15px; overflow: hidden; margin-bottom: 2rem; border: 1px solid rgba(59, 130, 246, 0.3); box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
                    @if(str_contains($videoData['video'], '<iframe'))
                        {!! $videoData['video'] !!}
                    @else
                        <iframe width="100%" height="450" src="{{ str_contains($videoData['video'], 'youtube.com/embed/') ? $videoData['video'] : 'https://www.youtube.com/embed/'.explode('v=', $videoData['video'])[1] }}" frameborder="0" allowfullscreen></iframe>
                    @endif
                </div>
                <div class="video-description">
                    {!! $videoData['description'] !!}
                </div>
            @else
                <div style="background: rgba(0,0,0,0.8); border-radius: 15px; overflow: hidden; margin-bottom: 2rem; border: 1px solid rgba(59, 130, 246, 0.3); box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
                    {!! $lesson->content !!}
                </div>
            @endif
        @elseif($lesson->type == 'quiz')
            <div id="quiz-container">
                <div id="quiz-intro">
                    <h2 style="color: #60a5fa; margin-top: 0;">Prueba de Conocimientos</h2>
                    <p>Demuestra lo que has aprendido para completar esta misión. Debes acertar todas las preguntas.</p>
                    <button onclick="startQuiz()" style="background: #3b82f6; color: white; border: none; padding: 12px 25px; border-radius: 10px; font-weight: bold; cursor: pointer; margin-top: 1rem;">Empezar Prueba</button>
                </div>
                <div id="quiz-active" style="display: none;">
                    <div id="quiz-progress" style="height: 4px; background: rgba(255,255,255,0.1); border-radius: 2px; margin-bottom: 2rem;">
                        <div id="quiz-progress-bar" style="height: 100%; background: #3b82f6; width: 0%; transition: width 0.3s;"></div>
                    </div>
                    <div id="question-area">
                        <h3 id="current-question-text" style="margin-bottom: 1.5rem;"></h3>
                        <div id="options-area" style="display: grid; gap: 10px;"></div>
                    </div>
                </div>
                <div id="quiz-result" style="display: none; text-align: center;">
                    <div id="result-icon" style="font-size: 3rem; margin-bottom: 1rem;"></div>
                    <h3 id="result-title"></h3>
                    <p id="result-text"></p>
                    <button id="retry-btn" onclick="startQuiz()" style="background: rgba(255,255,255,0.1); color: white; border: 1px solid rgba(255,255,255,0.2); padding: 10px 20px; border-radius: 10px; cursor: pointer; display: none;">Reintentar</button>
                </div>
            </div>
        @else
            {!! $lesson->content !!}
        @endif
    </div>

    <!-- Action Bar -->
    <div id="action-bar" style="margin-top: 3rem; padding-top: 2rem; border-top: 1px dashed rgba(59, 130, 246, 0.3); text-align: center; {{ $lesson->type == 'quiz' ? 'display: none;' : '' }}">
        <form method="POST" action="{{ route('lessons.complete', $lesson) }}">
            @csrf
            
            <button type="submit" 
                    style="background: linear-gradient(45deg, #1e3a8a, #3b82f6); color: white; border: 1px solid #60a5fa; padding: 15px 40px; border-radius: 30px; font-weight: 800; font-size: 1.1rem; cursor: pointer; transition: all 0.3s; box-shadow: 0 10px 20px rgba(59, 130, 246, 0.2);"
                    onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 15px 25px rgba(59, 130, 246, 0.4)'"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 20px rgba(59, 130, 246, 0.2)'">
                {{ $isCompleted ? 'Volver a Confirmar Conocimiento' : 'Misión Cumplida: Continuar' }}
            </button>
            <p style="color: #64748b; font-size: 0.85rem; margin-top: 15px;">Al continuar, tu progreso quedará guardado permanentemente en los registros estelares.</p>
        </form>
    </div>

</main>

@if($lesson->type == 'quiz')
<script>
    const quizData = JSON.parse({!! json_encode($lesson->content) !!});
    let currentQuestion = 0;
    let score = 0;

    function startQuiz() {
        currentQuestion = 0;
        score = 0;
        document.getElementById('quiz-intro').style.display = 'none';
        document.getElementById('quiz-result').style.display = 'none';
        document.getElementById('quiz-active').style.display = 'block';
        document.getElementById('retry-btn').style.display = 'none';
        showQuestion();
    }

    function showQuestion() {
        const q = quizData[currentQuestion];
        document.getElementById('current-question-text').innerText = q.question;
        const optionsArea = document.getElementById('options-area');
        optionsArea.innerHTML = '';
        
        q.options.forEach((opt, idx) => {
            const btn = document.createElement('button');
            btn.innerText = opt;
            btn.style.cssText = "padding: 15px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 12px; color: white; text-align: left; cursor: pointer; transition: all 0.2s; font-size: 1rem;";
            btn.onmouseover = () => btn.style.background = 'rgba(59, 130, 246, 0.2)';
            btn.onmouseout = () => btn.style.background = 'rgba(255,255,255,0.05)';
            btn.onclick = () => selectOption(idx);
            optionsArea.appendChild(btn);
        });

        const progress = ((currentQuestion) / quizData.length) * 100;
        document.getElementById('quiz-progress-bar').style.width = `${progress}%`;
    }

    function selectOption(idx) {
        const q = quizData[currentQuestion];
        const options = document.getElementById('options-area').children;
        
        // Disable all buttons
        for (let btn of options) btn.disabled = true;

        if (idx === q.correct) {
            options[idx].style.background = 'rgba(16, 185, 129, 0.2)';
            options[idx].style.borderColor = '#10b981';
            score++;
        } else {
            options[idx].style.background = 'rgba(239, 68, 68, 0.2)';
            options[idx].style.borderColor = '#ef4444';
            options[q.correct].style.background = 'rgba(16, 185, 129, 0.1)';
            options[q.correct].style.borderColor = '#10b981';
        }

        setTimeout(() => {
            currentQuestion++;
            if (currentQuestion < quizData.length) {
                showQuestion();
            } else {
                showResult();
            }
        }, 1500);
    }

    function showResult() {
        document.getElementById('quiz-active').style.display = 'none';
        document.getElementById('quiz-result').style.display = 'block';
        
        const success = score === quizData.length;
        const icon = document.getElementById('result-icon');
        const title = document.getElementById('result-title');
        const text = document.getElementById('result-text');
        
        if (success) {
            icon.innerText = '🚀';
            title.innerText = '¡Excelente Trabajo!';
            text.innerText = 'Has respondido correctamente a todas las preguntas. Tu conocimiento ha sido validado.';
            document.getElementById('action-bar').style.display = 'block';
            document.getElementById('quiz-progress-bar').style.width = '100%';
        } else {
            icon.innerText = '⚠️';
            title.innerText = 'Misión Fallida';
            text.innerText = `Has acertado ${score} de ${quizData.length} preguntas. Necesitas un 100% para continuar.`;
            document.getElementById('retry-btn').style.display = 'inline-block';
        }
    }
</script>
@endif
@endsection
