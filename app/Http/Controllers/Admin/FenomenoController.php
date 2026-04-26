<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fenomeno;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FenomenoController extends Controller
{
    public function index()
    {
        $fenomenos = Fenomeno::orderBy('date', 'desc')->get();
        return view('admin.fenomenos.index', compact('fenomenos'));
    }

    public function create()
    {
        return view('admin.fenomenos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Required for new phenomena
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title) . '-' . uniqid();

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('fenomenos', 'public');
        }

        Fenomeno::create($data);

        return redirect()->route('admin.fenomenos.index')->with('success', 'Fenómeno creado con éxito.');
    }

    public function edit(Fenomeno $fenomeno)
    {
        return view('admin.fenomenos.edit', compact('fenomeno'));
    }

    public function update(Request $request, Fenomeno $fenomeno)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        
        if ($request->title !== $fenomeno->title) {
            $data['slug'] = Str::slug($request->title) . '-' . uniqid();
        }

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('fenomenos', 'public');
        }

        $fenomeno->update($data);

        return redirect()->route('admin.fenomenos.index')->with('success', 'Fenómeno actualizado con éxito.');
    }

    public function destroy(Fenomeno $fenomeno)
    {
        $fenomeno->delete();
        return redirect()->route('admin.fenomenos.index')->with('success', 'Fenómeno eliminado.');
    }
}
