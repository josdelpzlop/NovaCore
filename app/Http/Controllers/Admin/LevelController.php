<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = \App\Models\Level::all();
        return view('admin.levels.index', compact('levels'));
    }

    public function create()
    {
        return view('admin.levels.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:levels',
            'badge' => 'required|string|max:50',
            'description' => 'required|string',
            'url' => 'nullable|string'
        ]);

        \App\Models\Level::create($validated);

        return redirect()->route('admin.levels.index')->with('success', 'Nivel Creado Exitosamente.');
    }

    public function show($id)
    {
        // Not necessary for admin
    }

    public function edit(\App\Models\Level $level)
    {
        return view('admin.levels.edit', compact('level'));
    }

    public function update(Request $request, \App\Models\Level $level)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:levels,slug,'.$level->id,
            'badge' => 'required|string|max:50',
            'description' => 'required|string',
            'url' => 'nullable|string'
        ]);

        $level->update($validated);

        return redirect()->route('admin.levels.index')->with('success', 'Nivel Actualizado Correctamente.');
    }

    public function destroy(\App\Models\Level $level)
    {
        $level->delete();
        return redirect()->route('admin.levels.index')->with('success', 'El nivel y todas sus lecciones han sido erradicados.');
    }
}
