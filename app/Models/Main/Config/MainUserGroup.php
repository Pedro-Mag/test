<?php

namespace App\Models\Main\Config;

use App\Models\Admin\Module;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MainUserGroup extends Model
{
    use HasFactory;

    protected $connection = 'clientes';

    protected $fillable = [
        'name',
        'descricao',
    ];

    protected $observables = ['PermissionChanged'];

    public function updatePermissions()
    {
        $this->fireModelEvent('PermissionChanged', false);
    }

    public function users()
    {
        return $this->hasMany(MainUser::class);
    }

    public function modules()
    {
        $database = $this->getConnection()->getDatabaseName();
        return $this->belongsToMany(Module::class, "$database.main_user_groups_modules");
    }
}
