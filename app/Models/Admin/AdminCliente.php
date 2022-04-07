<?php

namespace App\Models\Admin;

use App\Models\Admin\AdminUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class AdminCliente extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id';

    protected $connection = 'admin';
    protected $table = 'admin_clientes';

    protected $fillable = [
        'name',
        'account',
        'designacao',
        'contact',
        'email',
        'address',
        'latitude',
        'longitude',
        'nif',
        'admin_user_id',
        'slug',
        'table_id',
        'status',
        'image'
    ];

    public function getThumbnailAttribute()
    {
        $image = $this->image ? "/images/admin/min-" . $this->image : null;
        return $image;
    }

    public function getRealImageAttribute()
    {
        $image = $this->image ? "/images/admin/" . $this->image : "/images/no-photo.png";
        return $image;
    }

    public function manager()
    {
        return $this->belongsTo(AdminUser::class, 'admin_user_id', 'id');
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class, 'admin_cliente_module', 'admin_cliente_id', 'module_id');
    }

    public function events()
    {
        return $this->belongsToMany(AdminEvent::class, 'admin_cliente_admin_event_admin_user')
            ->withPivot('admin_event_id','admin_user_id')
            ->withTimestamps();
    }

    public function userEvents()
    {
        return $this->belongsToMany(AdminUser::class, 'admin_cliente_admin_event_admin_user')
            ->withPivot('admin_event_id','admin_user_id')
            ->withTimestamps();
    }
}
