<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Reward;

class RewardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $rewards = Reward::all();
        
        $unlockedRewards = [];
        foreach ($rewards as $reward) {
            $unlockedRewards[$reward->slug] = $this->checkRequirement($user, $reward);
        }

        return view('pages.recompensas', compact('user', 'rewards', 'unlockedRewards'));
    }

    public function equip($achievement)
    {
        $user = Auth::user();
        $reward = Reward::where('slug', $achievement)->first();

        if ($reward && $this->checkRequirement($user, $reward)) {
            $user->current_title = $reward->slug;
            $user->save();
            return redirect()->back()->with('success', 'Título equipado exitosamente.');
        }

        return redirect()->back()->withErrors('No puedes equipar este título aún.');
    }

    private function checkRequirement($user, $reward)
    {
        switch ($reward->requirement_type) {
            case 'lessons':
                return $user->completedLessonsCount() >= $reward->requirement_value;
            case 'events':
                return $user->attendedEventsCount() >= $reward->requirement_value;
            case 'level_max':
                return $user->user_level_number === 'MAX';
            default:
                return false;
        }
    }
}
