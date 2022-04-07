<?php

namespace App\Models\Main\Config;

use App\Models\Admin\MainEventsMessage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MainEvent extends Model
{
    use HasFactory;

    protected $connection = 'clientes';

    protected $fillable = [
        'main_user_id',
        'main_events_message_id',
        'model_id',
    ];

    public function user()
    {
        return $this->hasOne(MainUser::class, 'id', 'main_user_id');
    }

    public function message()
    {
        return $this->hasOne(MainEventsMessage::class, 'id', 'main_events_message_id');
    }
}
