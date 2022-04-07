<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\AdminUserHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AdminAuthController extends Controller
{
    public function index()
    {
        return inertia('Auth/Login', ['sessionType' => "admin"]);
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if (Auth::guard('admins')->attempt($credentials, $request->get('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended();
        }

        return back()->withErrors([
            'email' => 'A combinação de credenciais de acesso não foram detectadas.',
        ]);
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function show()
    {
        return Inertia('Auth/EditLoggedUser', [
            'utilizador' => [
                'name' => Auth::user()->name,
                'slug' => Auth::user()->slug,
                'avatar' => "/utilizadores/" . Auth::user()->slug . '/displayImage',
                'email' => Auth::user()->email,
            ],
        ]);
    }

    public function edit(Request $request)
    {
        $request->validate([
            'name' => 'required|min:8',
            'email' => 'required|email|unique:admin_users,email,' . Auth::user()->id,
            'password' => ['nullable', 'confirmed', Password::min(8)->numbers()->mixedCase()],
        ]);

        $utilizador = Auth::user();

        if ($request->avatar) {
            if ($utilizador->avatar) AdminUserHelper::deleteFile($utilizador->avatar);
            $filename = AdminUserHelper::saveAvatar($request->avatar);
        }

        $saveArray = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if (isset($filename)) $saveArray['avatar'] = $filename;
        if (isset($request->password)) $saveArray['password'] = $request->password;

        $utilizador->update($saveArray);

        return redirect()->back();
    }

    public function menu ()
    {
        $sidebarMenu = (object) [];

        $sidebarMenu->menu = [];

        array_push($sidebarMenu->menu, [
            'href' => '',
            'icon' => 'home',
            'text' => 'Início',
            'activeLink' => 'Home'
        ]);
        array_push($sidebarMenu->menu, [
            null
        ]);
        array_push($sidebarMenu->menu, [
            'href' => 'clientes',
            'icon' => 'card-account-details',
            'text' => 'Clientes',
            'activeLink' => 'Clientes'
        ]);
        array_push($sidebarMenu->menu, [
            null
        ]);
        array_push($sidebarMenu->menu, [
            'href' => 'utilizadores',
            'icon' => 'account-cog',
            'text' => 'Utilizadores',
            'activeLink' => 'Utilizadores'
        ]);
        array_push($sidebarMenu->menu, [
            'href' => 'modulos',
            'icon' => 'view-module',
            'text' => 'Módulos e permissões',
            'activeLink' => 'Modulos'
        ]);
        array_push($sidebarMenu->menu, [
            'href' => 'eventos',
            'icon' => 'calendar-text',
            'text' => 'Mensagens de eventos',
            'activeLink' => 'Eventos'
        ]);

        $sidebarMenu->session = "admin";

        return $sidebarMenu;
    }

    public function user()
    {
        $user = [];

        if (Auth::check()) {
            $user = [
                'name' => Auth::user()->name,
                'iniciais' => Auth::user()->iniciais,
                'slug' => Auth::user()->slug,
                'avatar' => Auth::user()->thumbnail,
                'admin' => Auth::user()->isAdmin,
            ];
        }

        return $user;
    }
}
