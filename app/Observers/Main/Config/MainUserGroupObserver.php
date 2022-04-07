<?php

namespace App\Observers\Main\Config;

use Illuminate\Http\Request;
use App\Helpers\MainEventHelper;
use App\Helpers\MainConfigHelper;
use Illuminate\Support\Facades\Auth;
use App\Models\Main\Config\MainEvent;
use App\Models\Main\Config\MainUserGroup;

class MainUserGroupObserver
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
     * Handle the MainUserGroup "created" event.
     *
     * @param  \App\Models\Main\Config\MainUserGroup  $mainUserGroup
     * @return void
     */
    public function created(MainUserGroup $mainUserGroup)
    {
        MainEventHelper::create(7, $mainUserGroup->id);
    }

    /**
     * Handle the MainUserGroup "updated" event.
     *
     * @param  \App\Models\Main\Config\MainUserGroup  $mainUserGroup
     * @return void
     */
    public function updated(MainUserGroup $mainUserGroup)
    {
        MainEventHelper::create(8, $mainUserGroup->id);
    }

    /**
     * Handle the MainUserGroup "deleted" event.
     *
     * @param  \App\Models\Main\Config\MainUserGroup  $mainUserGroup
     * @return void
     */
    public function deleted(MainUserGroup $mainUserGroup)
    {
        MainEventHelper::create(10, $mainUserGroup->id);
    }

    /**
     * Handle the MainUser "PermissionChanged" event.
     *
     * @param  \App\Models\Main\Config\MainUserGroup $mainUserGroup
     * @return void
     */
    public function PermissionChanged(MainUserGroup $mainUserGroup)
    {
        $value = filter_var($this->request->value, FILTER_VALIDATE_BOOLEAN);

        if ($value) {
            $mainUserGroup->modules()->attach($this->request->id);
            MainConfigHelper::toggleUserGroupChilds($this->request->id, $mainUserGroup, $value);
            MainConfigHelper::toggleUserGroupParent($this->request->id, $mainUserGroup);
        } else {
            $mainUserGroup->modules()->detach($this->request->id);
            MainConfigHelper::toggleUserGroupChilds($this->request->id, $mainUserGroup, $value);
        }

        $lastEvent = MainEvent::latest()->first();
        if($lastEvent->user->id != Auth::id() || $lastEvent->main_events_message_id != 9 || $lastEvent->model_id != $mainUserGroup->id) MainEventHelper::create(9, $mainUserGroup->id);
    }
}
