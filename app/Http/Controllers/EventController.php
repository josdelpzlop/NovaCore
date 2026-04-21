<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Traits\TranslatesText;

class EventController extends Controller
{
    use TranslatesText;

    /**
     * Display a listing of upcoming and ongoing events.
     */
    public function index()
    {
        // Caché del próximo lanzamiento espacial (usamos TheSpaceDevs API que está siempre al día)
        $spacex = Cache::remember('space_next_es_v2', 7200, function () {
            // Nota: SpaceX v5 está deprecated, usamos lldev.thespacedevs para lanzamientos globales 100% actualizados
            $response = Http::get('https://lldev.thespacedevs.com/2.2.0/launch/upcoming/?limit=1');
            if ($response->successful()) {
                $payload = $response->json();
                if (isset($payload['results'][0])) {
                    $data = $payload['results'][0];
                    
                    // Extraemos detalles o ponemos uno por defecto
                    $details = $data['mission']['description'] ?? 'La agencia espacial aún no ha revelado detalles operacionales sobre esta misión estelar.';
                    $data['details_es'] = $this->translateToSpanish($details);
                    
                    // Formateamos fecha
                    if (isset($data['net'])) {
                        $data['formatted_date'] = \Carbon\Carbon::parse($data['net'])->format('d/m/Y - H:i') . ' UTC';
                    }
                    
                    return $data;
                }
            }
            return null;
        });

        // Ordenamos los eventos próximos primero, y completados al final
        $events = Event::orderBy('event_date', 'asc')->get();
        return view('events.index', compact('events', 'spacex'));
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
        $user->addXP($event->xp_reward ?? 0);

        return redirect()->back()->with('success', '¡Te has inscrito al evento exitosamente!');
    }
}
