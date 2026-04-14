<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::all();
        return view('learn.index', compact('levels'));
    }

    public function show(Level $level)
    {
        $lessons = $level->lessons()->orderBy('order', 'asc')->get();
        // Cargar IDs de lecciones completadas por el usuario actual para verificar el estatus
        $completedLessonIds = auth()->user()->completedLessons()->pluck('lessons.id')->toArray();
        
        return view('learn.show', compact('level', 'lessons', 'completedLessonIds'));
    }
}
