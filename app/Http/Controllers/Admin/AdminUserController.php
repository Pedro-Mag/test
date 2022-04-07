<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\AdminUser;
use App\Helpers\AdminUserHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Admin\UtilizadorCreated;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use App\Mail\Admin\ResetUtilizadorPassword;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $utilizadores = $this->getAllUsers($request);

        $search = (object) request()->only(['search']);

        return inertia('Admin/Utilizadores/Index', [
            'utilizadores' => $utilizadores,
            'filters' => $search,
            'can' => [
                'edit' => Auth::user()->can('edit', AdminUser::class)
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
        if (!Auth::user()->can('edit', AdminUser::class)) abort(403);

        return inertia('Admin/Utilizadores/CreateUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('edit', AdminUser::class)) abort(403);

        $request->validate([
            'name' => 'required|min:8',
            'email' => 'required|email|unique:admin_users',
            'admin_role_id' => 'required|exists:admin_roles,id',
        ]);

        $utilizador = AdminUser::create($request->except([
            'avatar'
        ]));

        $this->setUserpassword($utilizador, 'new');

        if ($request->avatar) {
            $utilizador->update(['avatar' => AdminUserHelper::saveAvatar($request->avatar)]);
        }

        return redirect()->action([AdminUserController::class, 'show'], ['utilizador' => $utilizador->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(AdminUser $utilizador)
    {

        $filteredUser = $this->getFilteredUser($utilizador);

        return inertia('Admin/Utilizadores/ShowUser', [
            'utilizador' => $filteredUser,
            'can' => [
                'edit' => Auth::user()->can('edit', AdminUser::class)
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminUser $utilizador)
    {
        if (!Auth::user()->can('edit', AdminUser::class)) abort(403);

        $filteredUser = $this->getFilteredUser($utilizador);

        return inertia('Admin/Utilizadores/EditUser', [
            'utilizador' => $filteredUser,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminUser $utilizador)
    {
        if (!Auth::user()->can('edit', AdminUser::class)) abort(403);

        $request->validate([
            'name' => 'required|min:8',
            'email' => 'required|email|unique:admin_users,email,' . $utilizador->id,
            'admin_role_id' => 'required|exists:admin_roles,id',
        ]);

        $utilizador->update($request->except([
            'avatar'
        ]));

        if ($request->avatar) {
            if ($utilizador->avatar) AdminUserHelper::deleteFile($utilizador->avatar);
            $utilizador->update(['avatar' => AdminUserHelper::saveAvatar( $request->avatar)]);
        }

        return redirect()->action([AdminUserController::class, 'show'], ['utilizador' => $utilizador->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminUser $utilizador)
    {

        if (!Auth::user()->can('edit', AdminUser::class)) abort(403);

        if ($utilizador->avatar) AdminUserHelper::deleteFile($utilizador->avatar);
        $utilizador->delete();

        return redirect()->action([AdminUserController::class, 'index']);

    }

    public function resetPassword(AdminUser $utilizador)
    {
        if (!Auth::user()->can('edit', AdminUser::class)) abort(403);

        $this->setUserpassword($utilizador);

        return redirect()->action([AdminUserController::class, 'show'], ['utilizador' => $utilizador->slug]);

    }

    public function displayImage(AdminUser $utilizador)
    {

        $path = file_get_contents(public_path() . '/images/johndoe.png');
        if ($utilizador->avatar) $path = Storage::disk('admin')->get('users/' . $utilizador->avatar);

        $response = Response::make($path, 200);
        $response->header("Content-Type", 'image/png');

        return $response;
    }

    private function getAllUsers(request $request = null)
    {
        $utilizadores = AdminUser::query()
            ->with('admin_role')
            ->when(request()->input('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(9)
            ->withQueryString()
            ->through(fn ($utilizadores) => [
                'id' => $utilizadores->id,
                'name' => $utilizadores->name,
                'iniciais' => $utilizadores->iniciais,
                'slug' => $utilizadores->slug,
                'email' => $utilizadores->email,
                'thumbnail' => $utilizadores->avatar ? "images/admin/min-{$utilizadores->avatar}" : null,
                'admin_design' => $utilizadores->admin_role->design,
                'admin_role_id' => $utilizadores->admin_role_id,
            ]);

        return $utilizadores;
    }

    private function getFilteredUser(AdminUser $utilizador)
    {
        $utilizador = [
            'name' => $utilizador->name,
            'iniciais' => $utilizador->iniciais,
            'slug' => $utilizador->slug,
            'email' => $utilizador->email,
            'avatar' => $utilizador->avatar,
            'admin_role_id' => $utilizador->admin_role_id,
        ];

        return $utilizador;
    }

    private function setUserpassword(AdminUser $utilizador, $new = null)
    {
        $password = bin2hex(openssl_random_pseudo_bytes(4));

        $utilizador->update(['password' => $password]);

        if ($new) {
            Mail::to($utilizador->email)->send(new UtilizadorCreated($utilizador, $password));
        } else {
            Mail::to($utilizador->email)->send(new ResetUtilizadorPassword($utilizador, $password));
        }
    }

}
