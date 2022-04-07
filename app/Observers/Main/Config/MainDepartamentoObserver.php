<?php

namespace App\Observers\Main\Config;

use App\Helpers\MainEventHelper;
use App\Models\Main\Config\MainDepartamento;

class MainDepartamentoObserver
{
    /**
     * Handle the Departamento "created" event.
     *
     * @param  \App\Models\Main\Config\MainDepartamento  $mainDepartamento
     * @return void
     */
    public function created(MainDepartamento $mainDepartamento)
    {
        MainEventHelper::create(11, $mainDepartamento->id);
    }

    /**
     * Handle the Departamento "updated" event.
     *
     * @param  \App\Models\Main\Config\MainDepartamento  $mainDepartamento
     * @return void
     */
    public function updated(MainDepartamento $mainDepartamento)
    {
        MainEventHelper::create(12, $mainDepartamento->id);
    }

    /**
     * Handle the Departamento "deleted" event.
     *
     * @param  \App\Models\Main\Config\MainDepartamento  $mainDepartamento
     * @return void
     */
    public function deleted(MainDepartamento $mainDepartamento)
    {
        MainEventHelper::create(13, $mainDepartamento->id);
    }
}
