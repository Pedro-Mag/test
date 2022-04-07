<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MainEventsMessageRequest;
use App\Models\Admin\MainEventMessage;
use App\Models\Admin\MainEventsMessage;
use Illuminate\Support\Facades\Auth;

class MainEventsMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $messages = MainEventsMessage::query()
                    ->when(request()->input('search'), function ($query, $search) {
                        $query->where('message', 'like', "%{$search}%")
                            ->orWhere('model', 'like', "%{$search}%")
                            ->orWhere('href', 'like', "%{$search}%")
                            ->orWhere('reference', 'like', "%{$search}%");
                    })
                    ->orderBy('id', 'desc')
                    ->paginate(9);


        return inertia(
            'Admin/Messages/Index',
            [
                'messages' => $messages,
                'can' => [
                    'edit' => Auth::user()->isAdmin
                ]

            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::user()->isAdmin) abort(403);
        return inertia('Admin/Messages/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MainEventsMessageRequest $request)
    {
        MainEventsMessage::create($request->validated());

        return redirect()->action([MainEventsMessageController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\MainEventMessage  $mainEventsMessage
     * @return \Illuminate\Http\Response
     */
    public function show(MainEventsMessage $mainEventsMessage)
    {
        return redirect()->action([MainEventsMessageController::class, 'edit'], ['mainEventsMessage' => $mainEventsMessage]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\MainEventMessage  $mainEventsMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(MainEventsMessage $mainEventsMessage)
    {
        return inertia(
            'Admin/Messages/Edit',
            [
                'message' => $mainEventsMessage,
                'can' => [
                    'edit' => Auth::user()->isAdmin
                ]
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\MainEventMessage  $mainEventsMessage
     * @return \Illuminate\Http\Response
     */
    public function update(MainEventsMessageRequest $request, MainEventsMessage $mainEventsMessage)
    {
        $mainEventsMessage->update($request->validated());
        return redirect()->action([MainEventsMessageController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\MainEventMessage  $mainEventsMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(MainEventsMessage $mainEventsMessage)
    {
        if(!Auth::user()->isAdmin) abort(403);
        $mainEventsMessage->delete();

        return redirect()->back();
    }
}
