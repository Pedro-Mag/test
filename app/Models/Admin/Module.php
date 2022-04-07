<?php

namespace App\Models\Admin;

use App\Models\Main\Config\MainUser;
use Illuminate\Database\Eloquent\Model;
use App\Models\Main\Config\MainUserGroup;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;

    protected $connection = 'admin';

    protected $fillable = [
        'name',
        'text',
        'icon',
        'url',
        'parent_id',
        'order'
    ];


    public function parentModule()
    {
        return $this->belongsTo(Module::class, 'parent_id');
    }

    public function childModule()
    {
        return $this->hasMany(Module::class, 'parent_id')->orderBy('order');
    }

    public function childModules()
    {
        return $this->hasMany(Module::class, 'parent_id')->with('childModules')->orderBy('order');
    }

    public function scopeParent($query, $parent_id)
    {
        return $query->where('id', $parent_id);
    }

    public function scopeBaseModules($query)
    {
        return $query->whereNull('parent_id');
    }

    public function scopeSiblings($query, $parent_id)
    {
        return $query->where('parent_id', $parent_id);
    }

    public function scopeCountSiblings($query, $parent_id)
    {
        return $query->where('parent_id', $parent_id)->count();
    }

    public function clientes()
    {
        return $this->belongsToMany(AdminCliente::class, 'admin_cliente_module', 'module_id', 'admin_cliente_id');
    }

    public function scopeGetByCliente($query, $cliente_id)
    {
        return $query->whereHas('clientes', function ($q) use ($cliente_id) {
            $q->where('admin_clientes.id', $cliente_id);
        });
    }

    public function scopeGetChildsByCliente($query, $cliente_id)
    {
        return $query->with(['ChildModule' => function ($q) use ($cliente_id) {
                $q->whereHas('clientes', function ($q) use ($cliente_id) {
                    $q->where('admin_clientes.id', $cliente_id);
                })
                ->getChildsByCliente($cliente_id);
        }]);
    }

    public function userGroups()
    {
        return $this->belongsToMany(MainUserGroup::class, "main_user_groups_modules");
    }

    public function childUserGroups()
    {
        return $this->hasMany(Module::class, 'parent_id')->with('userGroups')->with('childModules.userGroups')->orderBy('order');
    }

    public function scopeGetUserGroup($query, $mainUserGroup_id)
    {
        return $query->with(['userGroups' => function ($q) use ($mainUserGroup_id) {
            $q->where('main_user_group_id',  $mainUserGroup_id);
        }]);
    }

    public function scopeGetUserGroupChilds($query, $cliente_id, $mainUserGroup_id)
    {
        return $query->with(['ChildModule' => function ($q) use ($cliente_id, $mainUserGroup_id) {
                $q->whereHas('clientes', function ($q) use ($cliente_id) {
                    $q->where('admin_clientes.id', $cliente_id);
                })
                ->getUserGroup($mainUserGroup_id)
                ->getUserGroupChilds($cliente_id, $mainUserGroup_id);
        }]);
    }

    public function users()
    {
        return $this->belongsToMany(MainUser::class, "main_user_modules");
    }

    public function scopeGetUser($query, $mainUser_id)
    {
        return $query->with(['users' => function ($q) use ($mainUser_id) {
            $q->where('main_user_id',  $mainUser_id);
        }]);
    }

    public function scopeGetUserChilds($query, $cliente_id, $mainUser_id)
    {
        return $query->with(['ChildModule' => function ($q) use ($cliente_id, $mainUser_id) {
                $q->whereHas('clientes', function ($q) use ($cliente_id) {
                    $q->where('admin_clientes.id', $cliente_id);
                })
                ->getUser($mainUser_id)
                ->getUserChilds($cliente_id, $mainUser_id);
        }]);
    }

    public function scopeGetUserFirstChilds($query, $cliente_id, $mainUser_id)
    {
        return $query->with(['ChildModule' => function ($q) use ($cliente_id, $mainUser_id) {
                $q->whereHas('clientes', function ($q) use ($cliente_id) {
                    $q->where('admin_clientes.id', $cliente_id);
                })
                ->getUser($mainUser_id);
        }]);
    }
}
