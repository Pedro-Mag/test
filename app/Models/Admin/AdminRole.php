<?php

namespace App\Models\Admin;

use App\Models\Admin\AdminUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminRole extends Model
{
    use HasFactory;

    protected $connection = 'admin';

    public function users()
    {
        return $this->hasMany(AdminUser::class);
    }

    public function getDesignAttribute($value)
    {
        return ucfirst($value);
    }
}
