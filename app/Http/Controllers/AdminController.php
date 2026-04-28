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
        
        $recent_activity = \DB::table('lesson_user')
            ->join('users', 'lesson_user.user_id', '=', 'users.id')
            ->join('lessons', 'lesson_user.lesson_id', '=', 'lessons.id')
            ->select('users.name as user_name', 'lessons.title as lesson_title', 'lesson_user.created_at')
            ->orderBy('lesson_user.created_at', 'desc')
            ->take(5)
            ->get();

        $recent_suggestions = Suggestion::with('user')->orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('stats', 'latest_users', 'recent_activity', 'recent_suggestions'));
    }
}
