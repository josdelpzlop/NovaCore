<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of upcoming and ongoing events.
     */
    public function index()
    {
        // Ordenamos los eventos próximos primero, y completados al final
        $events = Event::orderBy('event_date', 'asc')->get();
        return view('events.index', compact('events'));
    }

    /**
     * Display the specified event.
     */
    public function show(Event $event)
    {
        $hasAttended = false;
        if (Auth::check()) {
            $hasAttended = Auth::user()->attendedEvents()->where('event_id', $event->id)->exists();
        }

        return view('events.show', compact('event', 'hasAttended'));
    }

    /**
     * Let a user attend the event.
     */
    public function attend(Request $request, Event $event)
    {
        $user = Auth::user();

        if ($user->attendedEvents()->where('event_id', $event->id)->exists()) {
            return redirect()->back()->with('info', 'Ya estás registrado en este evento.');
        }

        $user->attendedEvents()->attach($event->id);

        return redirect()->back()->with('success', '¡Te has inscrito al evento exitosamente!');
    }
}
