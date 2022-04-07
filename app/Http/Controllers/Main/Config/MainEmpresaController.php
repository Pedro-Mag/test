<?php

namespace App\Http\Controllers\Main\Config;

use Illuminate\Http\Request;
use App\Models\Admin\AdminCliente;
use App\Helpers\AdminClienteHelper;
use App\Helpers\MainEventHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ClienteRequest;
use Illuminate\Support\Facades\Auth;

class MainEmpresaController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(AdminCliente::class, 'adminCliente');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $empresa = $request->adminCliente;
        return inertia('Main/Config/Empresa/Index', [
            'empresa' => [
                'id' => $empresa->id,
                'name' => $empresa->name,
                'designacao' => $empresa->designacao,
                'account' => $empresa->account,
                'contact' => $empresa->contact,
                'email' => $empresa->email,
                'address' => $empresa->address,
                'latitude' => $empresa->latitude,
                'longitude' => $empresa->longitude,
                'nif' => $empresa->nif,
                'image' => $empresa->realimage,
            ],
            'can' => [
                'edit' => Auth::user()->can('create', AdminCliente::class)
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        $empresa = $request->adminCliente;
        $empresa->update($request->validated());

        if ($request->image) {
            if ($empresa->image) AdminClienteHelper::deleteFile($empresa->image);
            $empresa->update(['image' => AdminClienteHelper::saveimage($request->image)]);
        }

        MainEventHelper::create(14);

        return redirect()->back();
    }
}
