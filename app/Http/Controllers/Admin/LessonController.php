<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = \App\Models\Lesson::with('level')->get();
        return view('admin.lessons.index', compact('lessons'));
    }

    public function create()
    {
        $levels = \App\Models\Level::all();
        return view('admin.lessons.create', compact('levels'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'level_id' => 'required|exists:levels,id',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:lessons',
            'content' => 'nullable|string',
            'type' => 'required|string|in:text,video,quiz',
            'order' => 'required|integer'
        ]);

        \App\Models\Lesson::create($validated);

        return redirect()->route('admin.lessons.index')->with('success', 'Lección Creada Exitosamente.');
    }

    public function show($id)
    {
        // Not necessary
    }

    public function edit(\App\Models\Lesson $lesson)
    {
        $levels = \App\Models\Level::all();
        return view('admin.lessons.edit', compact('lesson', 'levels'));
    }

    public function update(Request $request, \App\Models\Lesson $lesson)
    {
        $validated = $request->validate([
            'level_id' => 'required|exists:levels,id',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:lessons,slug,'.$lesson->id,
            'content' => 'nullable|string',
            'type' => 'required|string|in:text,video,quiz',
            'order' => 'required|integer'
        ]);

        $lesson->update($validated);

        return redirect()->route('admin.lessons.index')->with('success', 'Lección Actualizada Correctamente.');
    }

    public function destroy(\App\Models\Lesson $lesson)
    {
        $lesson->delete();
        return redirect()->route('admin.lessons.index')->with('success', 'La lección ha sido eliminada.');
    }
}
