<?php

namespace App\Models\Admin;

use App\Models\Main\Config\MainEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainEventsMessage extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $connection = 'admin';
    protected $table_name = 'Sigo_admin.main_events_messages';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'message',
        'model',
        'name',
        'href',
        'reference'
    ];

    public function event()
    {
        return $this->belongsToMany(MainEvent::class);
    }
}
