<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuggestionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Suggestion::create([
            'user_id' => Auth::id(),
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Tu transmisión ha sido recibida. El alto mando revisará tu reporte pronto.');
    }
}
