<?php

namespace App\Http\Controllers\Main\Config;

use App\Helpers\MainHeadHelper;
use App\Models\Admin\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MainConfigController extends Controller
{
    public function index(Request $request)
    {

        $cliente =  $request->adminCliente;

        $modules = Module::where('icon', 'cogs')
            ->getUserChilds($cliente->id, Auth::id())
            ->first();

        $itens = [];
        foreach ($modules->ChildModule as $module) {
            if ($module->users->count()) {
                $childItens = [];

                foreach ($module->ChildModule as $childModule) {
                    if ($childModule->url && $childModule->users->count()) {
                        $childItens[] = [
                            'text' => $childModule->text,
                            'icon' => $childModule->icon,
                            'url' => $childModule->url,
                        ];
                    }
                }

                $itens[] = [
                    'text' => $module->text,
                    'icon' => $module->icon,
                    'url' => $module->url,
                    'childItens' => $childItens,
                ];
            }
        }

        return inertia('Main/Config/Index', [
            'itens' => $itens,
        ]);
    }
}
