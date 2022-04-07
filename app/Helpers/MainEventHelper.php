<?php

namespace App\Helpers;

use App\Models\Main\Config\MainEvent;
use Illuminate\Support\Facades\Auth;

class MainEventHelper
{
    /**
     * Creates event.
     *
     * @param  int  $messageId
     * @param  int  $modelId
     */
    static public function create( $messageId = null, $modelId = null)
    {
        MainEvent::create(['main_user_id' => Auth::id(), 'main_events_message_id' => $messageId, 'model_id' => $modelId]);
    }
}
