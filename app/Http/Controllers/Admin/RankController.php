<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rank;
use Illuminate\Http\Request;

class RankController extends Controller
{
    public function index()
    {
        $ranks = Rank::orderBy('min_xp', 'asc')->get();
        return view('admin.ranks.index', compact('ranks'));
    }

    public function create()
    {
        return view('admin.ranks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'min_xp' => 'required|integer|min:0',
            'color' => 'required|string|max:7',
            'number' => 'required|string|max:10',
        ]);

        Rank::create($request->all());

        return redirect()->route('admin.ranks.index')->with('success', 'Rango de prestigio creado.');
    }

    public function edit(Rank $rank)
    {
        return view('admin.ranks.edit', compact('rank'));
    }

    public function update(Request $request, Rank $rank)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'min_xp' => 'required|integer|min:0',
            'color' => 'required|string|max:7',
            'number' => 'required|string|max:10',
        ]);

        $rank->update($request->all());

        return redirect()->route('admin.ranks.index')->with('success', 'Rango actualizado.');
    }

    public function destroy(Rank $rank)
    {
        $rank->delete();
        return redirect()->route('admin.ranks.index')->with('success', 'Rango eliminado.');
    }
}
