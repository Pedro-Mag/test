<?php

namespace App\Observers\Main\Config;

use Illuminate\Http\Request;
use App\Helpers\MainUserHelper;
use App\Helpers\MainEventHelper;
use App\Helpers\MainConfigHelper;
use App\Models\Main\Config\MainUser;
use Illuminate\Support\Facades\Auth;
use App\Models\Main\Config\MainEvent;


class MainUserObserver
{
    protected $request;

    /**
     * Handle the construct event.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the MainUser "created" event.
     *
     * @param  \App\Models\Main\Config\MainUser  $mainUser
     * @return void
     */
    public function created(MainUser $mainUser)
    {

        $mainUser->departamentos()->attach($this->request->main_departamentos);
        $mainUser->permissoes()->attach($mainUser->usergroup()->first()->modules()->get(['module_id'])->pluck('module_id')->flatten());

        MainUserHelper::setUserPassword($mainUser, $this->request->clienteDomain, 'new');

        if ($this->request->avatar) {
            $mainUser->update(['avatar' => MainUserHelper::saveAvatar($this->request->avatar, $this->request->clienteDomain)]);
        }

        MainEventHelper::create(2, $mainUser->id);
    }

    /**
     * Handle the MainUser "updated" event.
     *
     * @param  \App\Models\Main\Config\MainUser  $mainUser
     * @return void
     */
    public function updated(MainUser $mainUser)
    {
        $mainUser->departamentos()->sync($this->request->main_departamentos);

        MainUser::withoutEvents(function () use ($mainUser) {
            if ($this->request->avatar) {
                if ($mainUser->avatar) MainUserHelper::deleteFile($mainUser->avatar, $this->request->clienteDomain);
                $mainUser->update(['avatar' => MainUserHelper::saveAvatar($this->request->avatar, $this->request->clienteDomain)]);
            }
        });

        MainEventHelper::create(3, $mainUser->id);
    }

    /**
     * Handle the MainUser "deleted" event.
     *
     * @param  \App\Models\Main\Config\MainUser  $mainUser
     * @return void
     */
    public function deleted(MainUser $mainUser)
    {
        MainEventHelper::create(6, $mainUser->id);
    }

    /**
     * Handle the MainUser "passwordReseted" event.
     *
     * @param  \App\Models\Main\Config\MainUser  $mainUser
     * @return void
     */
    public function passwordReseted(MainUser $mainUser)
    {
        MainUserHelper::setUserPassword($mainUser, $this->request->clienteDomain);

        MainEventHelper::create(4, $mainUser->id);
    }

    /**
     * Handle the MainUser "PermissionChanged" event.
     *
     * @param  \App\Models\Main\Config\MainUser  $mainUser
     * @return void
     */
    public function PermissionChanged(MainUser $mainUser)
    {
        $value = filter_var($this->request->value, FILTER_VALIDATE_BOOLEAN);

        if ($value) {
            $mainUser->permissoes()->attach($this->request->id);
            MainConfigHelper::toggleUserChilds($this->request->id, $mainUser, $value);
            MainConfigHelper::toggleUserParent($this->request->id, $mainUser);
        } else {
            $mainUser->permissoes()->detach($this->request->id);
            MainConfigHelper::toggleUserChilds($this->request->id, $mainUser, $value);
        }

        $lastEvent = MainEvent::latest()->first();
        if($lastEvent->user->id != Auth::id() || $lastEvent->main_events_message_id != 5 || $lastEvent->model_id != $mainUser->id) MainEventHelper::create(5, $mainUser->id);
    }
}
