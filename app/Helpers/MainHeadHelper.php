<?php

namespace App\Helpers;

use stdClass;
use App\Models\Admin\Module;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class MainHeadHelper
{

    static function getCenter()
    {
        $head = Request::instance()->adminCliente;

        $mapCenter = new stdClass;
        $mapCenter->lat = (float) $head->latitude;
        $mapCenter->lng = (float) $head->longitude;

        return $mapCenter;
    }

    static function getMenuModules()
    {
        $cliente =  Request::instance()->adminCliente;

        $modules = Module::BaseModules()
            ->getByCliente($cliente->id)
            ->getUser(Auth::id())
            ->getUserFirstChilds($cliente->id, Auth::id())
            ->orderBy('order')
            ->get();

        return $modules;
    }

    static function getModules()
    {
        $cliente =  Request::instance()->adminCliente;

        $modules = Module::BaseModules()
            ->getByCliente($cliente->id)
            ->getChildsByCliente($cliente->id)
            ->orderBy('order')
            ->get();

        return $modules;
    }
}
