<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RewardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        $achievements = [
            'pionero_lunar' => $user->hasCompletedAnyLesson(),
            'cazador_estelar' => $user->attendedEventsCount() >= 5,
            'vuelo_inaugural' => $user->attendedEventsCount() >= 1,
            'rey_anillos' => $user->completedLessonsCount() >= 5,
            'leyenda_nova' => $user->user_level_number === 'MAX',
        ];

        return view('pages.recompensas', compact('user', 'achievements'));
    }

    public function equip($achievement)
    {
        $user = Auth::user();
        
        $achievements = [
            'pionero_lunar' => $user->hasCompletedAnyLesson(),
            'cazador_estelar' => $user->attendedEventsCount() >= 5,
            'vuelo_inaugural' => $user->attendedEventsCount() >= 1,
            'rey_anillos' => $user->completedLessonsCount() >= 5,
            'leyenda_nova' => $user->user_level_number === 'MAX',
        ];

        if (isset($achievements[$achievement]) && $achievements[$achievement]) {
            $user->current_title = $achievement;
            $user->save();
            return redirect()->back()->with('success', 'Título equipado exitosamente.');
        }

        return redirect()->back()->withErrors('No puedes equipar este título aún.');
    }
}
