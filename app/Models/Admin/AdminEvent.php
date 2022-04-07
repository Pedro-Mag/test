<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminEvent extends Model
{
    use HasFactory;

    protected $connection = 'admin';

    public function clientes()
    {
        return $this->belongsToMany(AdminCliente::class, 'admin_cliente_admin_event_admin_user')
            ->withPivot('admin_user_id')
            ->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany(AdminUser::class, 'admin_cliente_admin_event_admin_user')
            ->withPivot('admin_cliente_id')
            ->withTimestamps();
    }
}
