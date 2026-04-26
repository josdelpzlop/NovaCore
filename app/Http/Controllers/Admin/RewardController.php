<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reward;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RewardController extends Controller
{
    public function index()
    {
        $rewards = Reward::all();
        return view('admin.rewards.index', compact('rewards'));
    }

    public function create()
    {
        return view('admin.rewards.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'color' => 'required|string|max:7', // HEX
            'text_color' => 'required|string|max:7', // HEX
            'icon' => 'required|string', // SVG Code
            'requirement_type' => 'required|in:lessons,events,level_max',
            'requirement_value' => 'required|integer|min:0',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        // Ensure unique slug
        if (Reward::where('slug', $data['slug'])->exists()) {
            $data['slug'] .= '-' . uniqid();
        }

        Reward::create($data);

        return redirect()->route('admin.rewards.index')->with('success', 'Recompensa creada con éxito.');
    }

    public function edit(Reward $reward)
    {
        return view('admin.rewards.edit', compact('reward'));
    }

    public function update(Request $request, Reward $reward)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'color' => 'required|string|max:7',
            'text_color' => 'required|string|max:7',
            'icon' => 'required|string',
            'requirement_type' => 'required|in:lessons,events,level_max',
            'requirement_value' => 'required|integer|min:0',
        ]);

        $data = $request->all();
        if ($request->name !== $reward->name) {
            $data['slug'] = Str::slug($request->name);
            if (Reward::where('slug', $data['slug'])->where('id', '!=', $reward->id)->exists()) {
                $data['slug'] .= '-' . uniqid();
            }
        }

        $reward->update($data);

        return redirect()->route('admin.rewards.index')->with('success', 'Recompensa actualizada con éxito.');
    }

    public function destroy(Reward $reward)
    {
        $reward->delete();
        return redirect()->route('admin.rewards.index')->with('success', 'Recompensa eliminada con éxito.');
    }
}
