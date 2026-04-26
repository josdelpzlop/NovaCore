<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Lesson;
use App\Models\Suggestion;
use App\Models\Event;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'total_lessons_completed' => \DB::table('lesson_user')->count(),
            'pending_suggestions' => Suggestion::where('status', 'pending')->count(),
            'upcoming_events' => Event::where('event_date', '>', now())->count(),
        ];

        $latest_users = User::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('stats', 'latest_users'));
    }
}
