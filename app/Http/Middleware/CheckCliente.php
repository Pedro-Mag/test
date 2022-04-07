<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Admin\AdminCliente;
use App\Models\Main\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class CheckCliente
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if($request->route()->domain() != "{clienteDomain}.sigo.test") return $next($request);

        $cliente = AdminCliente::where('account', $request->clienteDomain)->first();

        if ($cliente) {
            if ($cliente->status) {
                Config::set('database.connections.clientes.database', $cliente->table_id);
                DB::purge('clientes');

                $request->merge(array("adminCliente" => $cliente));

                return $next($request);
            } else {
                return inertia('Auth/ContaSuspensa', ['account' => $request->clienteDomain]);
            };
        };

        //Abort(404);
        return inertia('Main/NotFound');

    }
}
