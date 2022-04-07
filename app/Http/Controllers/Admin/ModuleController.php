<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Module;
use Illuminate\Http\Request;
use App\Models\Admin\AdminUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\ModuleRequest;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return inertia('Admin/Modulos/Index', [
            'modules' => Module::BaseModules()
                ->orderBy('order')
                ->with('childModules')
                ->get(),
            'can' => [
                'edit' => Auth::user()->admin_role_id === 1
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModuleRequest $request)
    {
        $count = Module::CountSiblings($request->parent_id) + 1;
        $data = array_merge($request->validated(), ['order' => $count]);
        Module::create($data);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $modulo)
    {
        abort(403, 'Unauthorized action.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Module  $modulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $modulo)
    {
        return $modulo->only(['id', 'name', 'text', 'icon', 'url', 'parent_id']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Module  $modulo
     * @return \Illuminate\Http\Response
     */
    public function update(ModuleRequest $request, Module $modulo)
    {
        $modulo->update($request->validated());

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Module  $modulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $modulo)
    {
        $parent_id = $modulo->parent_id;
        $old_order = $modulo->order;
        $modulo->delete();
        $this->reorderModules($parent_id, $old_order);

        return redirect()->back();
    }

    public function getVariable(Module $modulo, $variable)
    {
        return $modulo->{$variable};
    }

    public function reorder(Request $request, Module $modulo)
    {

        $parent = $modulo->parent_id;
        $old_order = $modulo->order;
        $new_order = $old_order + ($request->direction);

        $count_siblings = Module::CountSiblings($parent);

        if ($new_order > 0 && $new_order <= $count_siblings) {

            $other_modulo = Module::siblings($parent)->where('order', $new_order)->first();
            $other_modulo->update(['order' => $old_order]);

            $modulo->update(['order' => $new_order]);
        }

        return redirect()->back();
    }

    private function reorderModules($parent_id, $old_order)
    {
        $modules_to_reorder = Module::Siblings($parent_id)->where('order', '>', $old_order)->get();
        foreach ($modules_to_reorder as $module) {
            $module->update(['order' => ($module->order - 1)]);
        }
    }
}
