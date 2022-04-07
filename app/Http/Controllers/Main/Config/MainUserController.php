<?php

namespace App\Http\Controllers\Main\Config;

use Illuminate\Http\Request;
use App\Helpers\MainUserHelper;
use App\Helpers\MainConfigHelper;
use App\Http\Controllers\Controller;
use App\Models\Main\Config\MainUser;
use Illuminate\Support\Facades\Auth;
use App\Models\Main\Config\MainUserGroup;
use App\Models\Main\Config\MainDepartamento;
use App\Http\Requests\Main\Config\MainUserRequest;

class MainUserController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(MainUser::class, 'mainUser');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = MainUser::query()
            ->with('userGroup')
            ->when(request()->input('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })
            ->orderBy('name')
            ->paginate(9)
            ->withQueryString()
            ->through(fn ($users) => [
                'id' => $users->id,
                'name' => $users->name,
                'iniciais' => $users->iniciais,
                'slug' => $users->slug,
                'email' => $users->email,
                'avatar' => $users->avatar ? "/images/clientes/min-{$users->avatar}" : null,
                'group-name' => $users->userGroup->name,
            ]);

        return inertia('Main/Config/Users/Index', [
            'users' => $users,
            'filters' => request()->only(['search']),
            'can' => [
                'view' => Auth::user()->can('view', MainUser::class),
                'create' => Auth::user()->can('create', MainUser::class)
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
        return inertia('Main/Config/Users/Create', [
            'departamentos' => MainDepartamento::orderBy('name')->get(['id', 'name']),
            'userGroups' => MainUserGroup::orderBy('name')->get(['id', 'name']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MainUserRequest $request)
    {
        MainUser::create($request->validated());
        return redirect()->action([MainUserController::class, 'index'], ['clienteDomain' => $request->clienteDomain]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Main\Config\MainUser  $mainUser
     * @param  \App\Models\Main\Config\MainUser  $mainUser
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $clienteDomain, MainUser $mainUser)
    {
        return inertia('Main/Config/Users/Edit', [
            'user' => [
                'id' => $mainUser->id,
                'name' => $mainUser->name,
                'slug' => $mainUser->slug,
                'email' => $mainUser->email,
                'avatar' => $mainUser->image,
                'rgpd' => $mainUser->rgpd,
                'gestor' => $mainUser->gestor,
                'main_user_group_id' => $mainUser->main_user_group_id,
                'main_departamentos' => $mainUser->departamentos()->get(['main_departamento_id'])->pluck('main_departamento_id')->toArray(),
            ],
            'userGroups' => MainUserGroup::orderBy('name')->get(['id', 'name']),
            'departamentos' => MainDepartamento::orderBy('name')->get(['id', 'name']),
            'permissoes' => MainConfigHelper::getModulesByUser($request->adminCliente, $mainUser),
            'can' => [
                'edit' => Auth::user()->can('update', MainUser::class),
                'delete' => Auth::user()->can('delete', MainUser::class),
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Main\Config\MainUser  $mainUser
     * @return \Illuminate\Http\Response
     */
    public function edit($clienteDomain, MainUser $mainUser)
    {
        return redirect()->action([MainUserController::class, 'show'], ['mainUser' => $mainUser, $clienteDomain]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Main\Config\MainUser  $mainUser
     * @return \Illuminate\Http\Response
     */
    public function update($clienteDomain, MainUserRequest $request, MainUser $mainUser)
    {
        $mainUser->update($request->validated());
        return redirect()->action([MainUserController::class, 'index'], ['clienteDomain' => $clienteDomain]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Main\Config\MainUser  $mainUser
     * @return \Illuminate\Http\Response
     */
    public function destroy($clienteDomain, MainUser $mainUser)
    {
        if ($mainUser->avatar) MainUserHelper::deleteFile($mainUser->avatar, $clienteDomain);
        $mainUser->update(['main_user_group_id' => 1]);
        $mainUser->delete();

        return redirect()->action([MainUserController::class, 'index'], ['clienteDomain' => $clienteDomain]);
    }

    public function resetpassword($clienteDomain, MainUser $mainUser)
    {
        if(!Auth::User()->can('update', MainUser::class)) abort(403);

        $mainUser->passwordReset();
        return redirect()->action([MainUserController::class, 'index'], ['clienteDomain' => $clienteDomain]);
    }

    public function updatePermissao(Request $request, $clienteDomain, MainUser $mainUser)
    {
        if(!Auth::User()->can('update', MainUser::class)) abort(403);

        $mainUser->updatePermissions();
        return redirect()->back()->with('permissoes', MainConfigHelper::getModulesByUser($request->adminCliente, $mainUser));
    }
}
