<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Events\Admin\MakeLogin;
use App\Helpers\MainHeadHelper;
use App\Helpers\MainUserHelper;
use Illuminate\Validation\Rule;
use App\Models\Admin\AdminCliente;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\Rules\Password;

class MainAuthController extends Controller
{

    public function index()
    {
        return inertia('Auth/Login', ['sessionType' => "cliente"]);
    }

    public function login(Request $request)
    {

        $cliente = AdminCliente::where('account', $request->clienteDomain)->first();

        if ($cliente) {
            if ($cliente->status) {
                Config::set('database.connections.clientes.database', $cliente->table_id);
                DB::purge('clientes');
            } else {
                return back()->withErrors([
                    'name' => 'Utilizador não encontrado.',
                ]);
            };
        };

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if (Auth::guard('clientes')->attempt($credentials, $request->get('remember'))) {
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
                'avatar' => Auth::user()->image,
                'email' => Auth::user()->email,
            ],
        ]);
    }

    public function edit(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:5', 'regex:/(.+ .+)\w+/i'],
            'email' => ['required', 'email', Rule::unique('clientes.main_users')->ignore(Auth::user()->id)],
            'password' => ['nullable', 'confirmed', Password::min(8)->numbers()->mixedCase()],
        ]);

        $utilizador = Auth::user();

        if ($request->avatar) {
            if ($utilizador->avatar) MainUserHelper::deleteFile($utilizador->avatar, $request->clienteDomain);
            $filename = MainUserHelper::saveAvatar($request->avatar, $request->clienteDomain);
        }

        $saveArray = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if (isset($filename)) $saveArray['avatar'] = $filename;
        if (isset($request->password)) $saveArray['password'] = $request->password;

        $utilizador->update($saveArray);

        return redirect()->route('clientes.home', $request->clienteDomain);
    }

    public function menu()
    {
        $sidebarMenu = (object) [];

        $sidebarMenu->menu = [];

        $modules = MainHeadHelper::getMenuModules();

        //Link para o inicio
        array_push($sidebarMenu->menu, [
            'href' => '',
            'icon' => 'home',
            'text' => 'Home',
            'activeLink' => 'Home'
        ]);
        array_push($sidebarMenu->menu, [
            null
        ]);

        foreach ($modules as $module) {

            //Adicionar separador para as configurações
            if ($module->icon == 'cogs' && $module->users->count()) {
                array_push($sidebarMenu->menu, [
                    null
                ]);
            }

            if ($module->users->count()) {
                //modulos secundarios
                $childModules = [];
                if (is_null($module->url)) {
                    foreach ($module->ChildModule as $childModule) {
                        if ($childModule->users->count()) {
                            array_push($childModules, [
                                'href' => $childModule->url,
                                'icon' => null,
                                'text' => $childModule->text,
                                'activeLink' => null
                            ]);
                        }
                    }
                }

                array_push($sidebarMenu->menu, [
                    'href' => $module->url,
                    'icon' => $module->icon,
                    'text' => $module->text,
                    'activeLink' => $module->name,
                    'childModules' => $childModules
                ]);
            }
        }

        $sidebarMenu->session = "cliente";

        app('debugbar')->info($sidebarMenu);

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
                'admin' => true,
            ];
        }

        return $user;
    }
}
