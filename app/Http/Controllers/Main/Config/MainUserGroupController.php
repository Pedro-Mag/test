<?php

namespace App\Http\Controllers\Main\Config;

use Illuminate\Http\Request;
use App\Helpers\MainConfigHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Main\Config\MainUserGroup;
use App\Http\Requests\Main\Config\MainUserGroupRequest;

class MainUserGroupController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(MainUserGroup::class, 'mainUserGroup');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $groups = MainUserGroup::orderBy('name')
            ->get()
            ->map(function ($group) {
                return [
                    'id' => $group->id,
                    'name' => $group->name,
                    'descricao' => $group->descricao,
                ];
            });

        return inertia('Main/Config/UsersGroup/Index', [
            'groups' => $groups,
            'can' => [
                'view' => Auth::user()->can('view', MainUserGroup::class),
                'create' => Auth::user()->can('create', MainUserGroup::class)
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('Main/Config/UsersGroup/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MainUserGroupRequest $request)
    {
        MainUserGroup::create($request->validated());

        return redirect()->action([MainUserGroupController::class, 'index'], ['clienteDomain' => $request->clienteDomain]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Main\Config\MainUserGroup  $mainUserGroup
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $clienteDomain, MainUserGroup $mainUserGroup)
    {
        return inertia('Main/Config/UsersGroup/Edit', [
            'permissoes' => MainConfigHelper::getModulesByUserGroup($request->adminCliente, $mainUserGroup),
            'group' => [
                'id' => $mainUserGroup->id,
                'name' => $mainUserGroup->name,
                'descricao' => $mainUserGroup->descricao,
            ],
            'can' => [
                'edit' => Auth::user()->can('update', MainUserGroup::class),
                'delete' => Auth::user()->can('delete', MainUserGroup::class),
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Main\Config\MainUserGroup  $mainUserGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $clienteDomain, MainUserGroup $mainUserGroup)
    {
        return redirect()->action([MainUserGroupController::class, 'show'], ['mainUserGroup' => $mainUserGroup, $clienteDomain]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Main\Config\MainUserGroup  $mainUserGroup
     * @return \Illuminate\Http\Response
     */
    public function update(MainUserGroupRequest $request, $clienteDomain, MainUserGroup $mainUserGroup)
    {
        $mainUserGroup->update($request->validated());

        return redirect()->action([MainUserGroupController::class, 'index'], ['clienteDomain' => $request->clienteDomain]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Main\Config\MainUserGroup  $mainUserGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($clienteDomain, MainUserGroup $mainUserGroup)
    {
        if ($mainUserGroup->id == 1) return redirect()->back()->withErrors(['delete' => 'Este grupo não pode ser eliminado!']);
        if ($mainUserGroup->users()->count()) return redirect()->back()->withErrors(['delete' => 'Existem utilizadores associados a este grupo. Para o eliminar altere aqueles registos.']);
        $mainUserGroup->delete();

        return redirect()->action([MainUserGroupController::class, 'index'], ['clienteDomain' => $clienteDomain]);
    }

    public function updatePermissao(Request $request, $clienteDomain, MainUserGroup $mainUserGroup)
    {
        if(!Auth::User()->can('update', MainUserGroup::class)) abort(403);

        $mainUserGroup->updatePermissions();
        return redirect()->back()->with('permissoes', MainConfigHelper::getModulesByUserGroup($request->adminCliente, $mainUserGroup));
    }
}
