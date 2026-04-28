@extends('layouts.admin')

@section('title', 'Nueva Lección')

@section('content')
<div class="cosmic-card" style="max-width: 600px; margin: auto;">
    <h2 style="color: var(--menta); margin-top: 0;">Añadir Lección</h2>
    <p style="color: rgba(255,255,255,0.6); margin-bottom: 2rem;">Asigna nuevo material a un nivel existente.</p>

    @if ($errors->any())
        <div style="color: var(--error); margin-bottom: 1.5rem; background: rgba(255, 77, 77, 0.1); padding: 10px; border-radius: 8px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="lesson-form" method="POST" action="{{ route('admin.lessons.store') }}">
        @csrf
        
        <div class="form-group">
            <label for="level_id">Nivel Correspondiente</label>
            <select id="level_id" name="level_id" required>
                <option value="">-- Selecciona un Nivel --</option>
                @foreach($levels as $level)
                    <option value="{{ $level->id }}" {{ old('level_id') == $level->id ? 'selected' : '' }}>
                        {{ $level->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="title">Título de Lección</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
            <label for="slug">URL Amigable (Ej: que-es-el-sol)</label>
            <input type="text" id="slug" name="slug" value="{{ old('slug') }}" required>
        </div>

        <div class="form-group">
            <label for="type">Tipo de Lección</label>
            <select id="type" name="type" required onchange="toggleQuizBuilder()">
                <option value="text" {{ old('type') == 'text' ? 'selected' : '' }}>Texto</option>
                <option value="video" {{ old('type') == 'video' ? 'selected' : '' }}>Video</option>
                <option value="quiz" {{ old('type') == 'quiz' ? 'selected' : '' }}>Quiz / Cuestionario</option>
            </select>
        </div>

        <div class="form-group">
            <label for="order">Orden (Número para ordenar)</label>
            <input type="number" id="order" name="order" value="{{ old('order', 0) }}" required>
        </div>

        <!-- Content Area (Hidden for Quizzes/Videos) -->
        <div class="form-group" id="content-group">
            <label for="content" id="content-label">Contenido / HTML</label>
            <textarea id="content" name="content" rows="6">{{ old('content') }}</textarea>
        </div>

        <!-- Video Builder Area (Shown only for Videos) -->
        <div id="video-builder" style="display: none; border-top: 2px solid var(--azul); padding-top: 2rem; margin-top: 2rem;">
            <h3 style="color: var(--menta);">Configuración de Video</h3>
            <div class="form-group">
                <label for="video-url">Iframe o URL de Video</label>
                <input type="text" id="video-url" placeholder="<iframe ...></iframe> o enlace de Youtube">
            </div>
            <div class="form-group">
                <label for="video-description">Descripción de la Lección</label>
                <textarea id="video-description" rows="4" placeholder="Explica de qué trata este video..."></textarea>
            </div>
        </div>

        <!-- Quiz Builder Area (Shown only for Quizzes) -->
        <div id="quiz-builder" style="display: none; border-top: 2px solid var(--lavanda); padding-top: 2rem; margin-top: 2rem;">
            <h3 style="color: var(--menta);">Constructor de Quiz</h3>
            <div id="questions-container">
                <!-- Questions will be added here -->
            </div>
            <button type="button" class="cosmic-btn-sec" onclick="addQuestion()" style="margin-top: 1rem; width: 100%;">+ Añadir Pregunta</button>
        </div>

        <div style="display: flex; gap: 15px; margin-top: 2rem;">
            <button type="submit" class="cosmic-btn">Guardar Lección</button>
            <a href="{{ route('admin.lessons.index') }}" class="cosmic-btn-sec">Cancelar</a>
        </div>
    </form>
</div>

<script>
    function toggleQuizBuilder() {
        const type = document.getElementById('type').value;
        const quizBuilder = document.getElementById('quiz-builder');
        const videoBuilder = document.getElementById('video-builder');
        const contentGroup = document.getElementById('content-group');
        const contentLabel = document.getElementById('content-label');

        // Reset displays
        quizBuilder.style.display = 'none';
        videoBuilder.style.display = 'none';
        contentGroup.style.display = 'none';

        if (type === 'quiz') {
            quizBuilder.style.display = 'block';
        } else if (type === 'video') {
            videoBuilder.style.display = 'block';
        } else {
            contentGroup.style.display = 'block';
            contentLabel.innerText = 'Contenido / HTML';
        }
    }

    let questionCount = 0;

    function addQuestion(data = null) {
        questionCount++;
        const container = document.getElementById('questions-container');
        const qId = `q-${questionCount}`;
        
        const qHtml = `
            <div class="cosmic-card question-block" id="${qId}" style="margin-top: 1.5rem; padding: 1.5rem; background: rgba(255,255,255,0.03); border-style: dashed;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                    <h4 style="margin: 0; color: var(--lavanda);">Pregunta #${questionCount}</h4>
                    <button type="button" onclick="removeElement('${qId}')" style="background: none; border: none; color: var(--error); cursor: pointer; font-weight: bold;">Eliminar</button>
                </div>
                <div class="form-group">
                    <input type="text" class="q-text" placeholder="¿Cuál es el planeta rojo?" value="${data ? data.question : ''}" required>
                </div>
                <div class="options-container">
                    <label style="font-size: 0.75rem; color: rgba(255,255,255,0.5); margin-bottom: 10px; display: block;">OPCIONES (Marca la correcta)</label>
                    <div class="options-list"></div>
                    <button type="button" class="cosmic-btn-sec" onclick="addOption('${qId}')" style="font-size: 0.8rem; padding: 5px 10px;">+ Añadir Opción</button>
                </div>
            </div>
        `;
        
        container.insertAdjacentHTML('beforeend', qHtml);
        
        if (data && data.options) {
            data.options.forEach((opt, idx) => {
                addOption(qId, opt, idx === data.correct);
            });
        } else {
            // Add 2 default options
            addOption(qId);
            addOption(qId);
        }
    }

    function addOption(qId, text = '', isCorrect = false) {
        const qBlock = document.getElementById(qId);
        const list = qBlock.querySelector('.options-list');
        const optId = `opt-${Date.now()}-${Math.random().toString(36).substr(2, 9)}`;
        
        const optHtml = `
            <div id="${optId}" style="display: flex; gap: 10px; align-items: center; margin-bottom: 10px;">
                <input type="radio" name="correct-${qId}" class="opt-correct" ${isCorrect ? 'checked' : ''} required>
                <input type="text" class="opt-text" placeholder="Respuesta..." value="${text}" style="flex: 1;" required>
                <button type="button" onclick="removeElement('${optId}')" style="color: var(--error); background: none; border: none; cursor: pointer;">&times;</button>
            </div>
        `;
        list.insertAdjacentHTML('beforeend', optHtml);
    }

    function removeElement(id) {
        document.getElementById(id).remove();
    }

    // Sync before submit
    document.getElementById('lesson-form').onsubmit = function(e) {
        const type = document.getElementById('type').value;
        if (type === 'quiz') {
            const questions = [];
            document.querySelectorAll('.question-block').forEach(qBlock => {
                const questionText = qBlock.querySelector('.q-text').value;
                const options = [];
                let correctIndex = 0;
                
                qBlock.querySelectorAll('.opt-text').forEach((optInput, idx) => {
                    options.push(optInput.value);
                    if (optInput.parentElement.querySelector('.opt-correct').checked) {
                        correctIndex = idx;
                    }
                });
                
                questions.push({
                    question: questionText,
                    options: options,
                    correct: correctIndex
                });
            });
            document.getElementById('content').value = JSON.stringify(questions);
        } else if (type === 'video') {
            const videoData = {
                video: document.getElementById('video-url').value,
                description: document.getElementById('video-description').value
            };
            document.getElementById('content').value = JSON.stringify(videoData);
        }
    };

    // Initialize
    window.onload = function() {
        toggleQuizBuilder();
        @if(old('type') == 'quiz' && old('content'))
            try {
                const data = JSON.parse({!! json_encode(old('content')) !!});
                data.forEach(q => addQuestion(q));
            } catch(e) {}
        @endif
        @if(old('type') == 'video' && old('content'))
            try {
                const data = JSON.parse({!! json_encode(old('content')) !!});
                document.getElementById('video-url').value = data.video || '';
                document.getElementById('video-description').value = data.description || '';
            } catch(e) {}
        @endif
    };
</script>
@endsection
