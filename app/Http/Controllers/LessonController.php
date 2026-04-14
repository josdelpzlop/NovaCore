<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Level;
use App\Models\Lesson;

class LessonController extends Controller
{
    public function show(Level $level, Lesson $lesson)
    {
        // Verificar si la lección pertenece al nivel, de lo contrario abortar
        if ($lesson->level_id !== $level->id) {
            abort(404);
        }

        // Obtener IDs de la lección para saber si ya la completó
        $isCompleted = auth()->user()->completedLessons()->where('lesson_id', $lesson->id)->exists();

        return view('lessons.show', compact('level', 'lesson', 'isCompleted'));
    }

    public function complete(Request $request, Lesson $lesson)
    {
        $user = auth()->user();

        // Evitar duplicar el registro si ya la superó
        if (!$user->completedLessons()->where('lesson_id', $lesson->id)->exists()) {
            $user->completedLessons()->attach($lesson->id);
        }

        // Buscar siguiente lección
        $nextLesson = Lesson::where('level_id', $lesson->level_id)
                            ->where('order', '>', $lesson->order)
                            ->orderBy('order', 'asc')
                            ->first();

        if ($nextLesson) {
            return redirect()->route('lessons.show', [$lesson->level, $nextLesson])->with('status', '¡Felicidades! Avanzando a la siguiente sección.');
        }

        // Si no hay más, devolver al nivel principal
        return redirect()->route('levels.show', $lesson->level)->with('status', '¡Impresionante! Has terminado todas las lecciones del módulo.');
    }
}
