<?php

namespace App\Models\Main\Config;

use App\Models\Admin\Module;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MainDepartamento extends Model
{
    use HasFactory;

    protected $connection = 'clientes';

    protected $fillable = [
        'name',
        'descricao',
        'slug',
        'address',
        'latitude',
        'longitude',
        'main_estabelecimentos_id',
    ];

    public function users()
    {
        return $this->belongsToMany(MainUser::class, 'main_departamentos_main_user');
    }

}
