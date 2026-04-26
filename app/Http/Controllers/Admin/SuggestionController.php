<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Suggestion;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    public function index()
    {
        $suggestions = Suggestion::with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.suggestions.index', compact('suggestions'));
    }

    public function update(Request $request, Suggestion $suggestion)
    {
        $request->validate([
            'status' => 'required|in:pending,reviewed,completed',
        ]);

        $suggestion->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Estado de la sugerencia actualizado.');
    }

    public function destroy(Suggestion $suggestion)
    {
        $suggestion->delete();
        return redirect()->route('admin.suggestions.index')->with('success', 'Sugerencia eliminada.');
    }
}
