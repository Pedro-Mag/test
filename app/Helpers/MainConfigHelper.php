<?php

namespace App\Helpers;

use App\Models\Admin\Module;
use App\Models\Admin\AdminCliente;
use App\Models\Main\Config\MainUser;
use App\Models\Main\Config\MainUserGroup;
use App\Models\Main\Config\MainDepartamento;

class MainConfigHelper
{

    static public function getModulesByUserGroup(AdminCliente $cliente, MainUserGroup $mainUserGroup)
    {
        $modules = Module::BaseModules()
            ->getByCliente($cliente->id)
            ->getUserGroup($mainUserGroup->id)
            ->getUserGroupChilds($cliente->id, $mainUserGroup->id)
            ->orderBy('order')
            ->get();
            return self::filterModules($modules,"userGroups");
        }

        static public function getModulesByUser(AdminCliente $cliente, MainUser $mainUser)
        {
            $modules = Module::BaseModules()
            ->getByCliente($cliente->id)
            ->getUser($mainUser->id)
            ->getUserChilds($cliente->id, $mainUser->id)
            ->orderBy('order')
            ->get();

        return self::filterModules($modules,"users");
    }

    static private function filterModules($modules, $filter)
    {
        $filteredModules = [];

        if (is_null($modules)) return null;

        foreach ($modules as $module) {
            $filteredModules[] = [
                'id' => $module->id,
                'text' => $module->text,
                'value' => boolval(count($module->$filter)),
                'childs' => self::filterModules($module->ChildModule, $filter),
            ];
        };


        return $filteredModules;
    }

    static public function toggleUserGroupChilds($id, MainUserGroup $mainUserGroup, $value)
    {
        $childs = Module::find($id)->childModules()->get();
        foreach ($childs as $child) {
            if ($value) {
                $mainUserGroup->modules()->attach($child);
            } else {
                $mainUserGroup->modules()->detach($child);
            }
            self::toggleUserGroupChilds($child->id, $mainUserGroup, $value);
        }
    }


    public static function toggleUserGroupParent($id, MainUserGroup $mainUserGroup)
    {

        $modulo = Module::find($id);
        $parent = Module::parent($modulo->parent_id)->first();

        if (!is_null($parent)) {
            $mainUserGroup->modules()->attach($parent->id);
            self::toggleUserGroupParent($parent->id, $mainUserGroup);
        }
    }

    static public function toggleUserChilds($id, MainUser $mainUser, $value)
    {
        $childs = Module::find($id)->childModules()->get();
        foreach ($childs as $child) {
            if ($value) {
                $mainUser->permissoes()->attach($child);
            } else {
                $mainUser->permissoes()->detach($child);
            }
            self::toggleUserChilds($child->id, $mainUser, $value);
        }
    }


    public static function toggleUserParent($id, MainUser $mainUser)
    {

        $modulo = Module::find($id);
        $parent = Module::parent($modulo->parent_id)->first();

        if (!is_null($parent)) {
            $mainUser->permissoes()->attach($parent->id);
            self::toggleUserParent($parent->id, $mainUser);
        }
    }
}
