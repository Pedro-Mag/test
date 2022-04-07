<?php

namespace App\Http\Controllers\Main\Config;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Main\Config\MainUser;
use Illuminate\Support\Facades\Auth;
use App\Models\Main\Config\MainEvent;

class MainEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $seeUsers = Auth::user()->can('view', MainUser::class);

        $events = MainEvent::query()
            ->with('user', 'message')
            ->when(request()->input('search'), function ($query, $search) {
                $query
                    ->whereHas('user',  function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
                // LARAVEL não permite usar o whereHas em tabelas de diferentes
                // ->orWhereHas('message',  function ($q) use ($search) {
                //     $q->where('Sigo_admin.message', 'like', "%{$search}%");
                // });
            })
            ->orderBy('main_events.created_at', 'desc')
            ->paginate(9)
            ->withQueryString()
            ->through(fn ($event) => [
                'date' => [
                    'day' => $event->created_at->format('d/m/Y'),
                    'hour' => $event->created_at->toTimeString()
                ],
                'user' => [
                    'name' => $event->user->name,
                    'href' => "/config/utilizadores/" . $event->user->slug,
                    'can' => $seeUsers,
                ],
                'action' => $event->message->message,
                'object' => $this->getModel($event),
            ]);

        app('debugbar')->info($events);

        return inertia('Main/Config/Eventos/Index', [
            'events' => $events,
            'filters' => [
                'search' => $request['search'],
            ],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\main\MainEvent  $mainEvent
     * @return \Illuminate\Http\Response
     */
    public function show(MainEvent $mainEvent)
    {
        //
    }

    private function getModel($event)
    {
        $array = [
            'name' => null,
            'href' => null,
            'can' => null,
        ];

        if (is_null($event->message->model)) return $array;

        $class = $event->message->model;
        $object = $class::find($event->model_id);
        if (!is_null($object)) {
            $type = $event->message->name;
            $slug = $event->message->reference;

            $array['name'] = $object->{$type};
            $array['href'] = $event->message->href . $object->{$slug};
            $array['can'] = Auth::user()->can('view', $object::class);
        } else {
            $array['name'] = '* Eliminado *';
        }

        return $array;
    }
}
