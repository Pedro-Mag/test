<?php

namespace App\Http\Controllers\Main\Config;

use Throwable;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Helpers\MainHeadHelper;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Main\Config\MainDepartamento;
use App\Models\Main\Config\MainEstabelecimento;
use App\Http\Requests\Main\Config\MainDepartamentoRequest;

class MainDepartamentoController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(MainDepartamento::class, 'mainDepartamento');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return inertia('Main/Config/Departamentos/Index', [
            'departamentos' => MainDepartamento::all(['id', 'name', 'slug', 'descricao']),
            'can' => [
                'view' => Auth::user()->can('view', MainDepartamento::class),
                'create' => Auth::user()->can('create', MainDepartamento::class)
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return inertia('Main/Config/Departamentos/Create', [
            'mapCenter' => MainHeadHelper::getCenter(),
            'can' => [
                'create' => Auth::user()->can('create', MainDepartamento::class)
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MainDepartamentoRequest $request)
    {
        $slug = Str::slug($request->name);

        Validator::make(['slug' => $slug], ['slug' => ['required', Rule::unique('clientes.main_departamentos')]]);
        $validated =  $request->validated();

        $estabelecimento = MainEstabelecimento::create([]);

        $validated['slug'] = $slug;
        $validated['main_estabelecimentos_id'] = $estabelecimento->id;

        $departamento = MainDepartamento::create($validated);

        return redirect()->action([MainDepartamentoController::class, 'index'], ['clienteDomain' => $request->clienteDomain]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Main\Config\MainDepartamento  $mainDepartamento
     * @return \Illuminate\Http\Response
     */
    public function show($clienteDomain, MainDepartamento $mainDepartamento)
    {
        return inertia('Main/Config/Departamentos/Edit', [
            'departamento' => [
                'id' => $mainDepartamento->id,
                'name' => $mainDepartamento->name,
                'slug' => $mainDepartamento->slug,
                'descricao' => $mainDepartamento->descricao,
                'address' => $mainDepartamento->address,
                'latitude' => $mainDepartamento->latitude,
                'longitude' => $mainDepartamento->longitude,
            ],
            'can' => [
                'edit' => Auth::user()->can('update', MainDepartamento::class),
                'delete' => Auth::user()->can('delete', MainDepartamento::class),
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Main\Config\MainDepartamento  $mainDepartamento
     * @return \Illuminate\Http\Response
     */
    public function edit($clienteDomain, MainDepartamento $mainDepartamento)
    {
        return redirect()->action([MainDepartamentoController::class, 'show'], ['mainDepartamento' => $mainDepartamento, $clienteDomain]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Main\Config\MainDepartamento  $mainDepartamento
     * @return \Illuminate\Http\Response
     */
    public function update(MainDepartamentoRequest $request, $clienteDomain, MainDepartamento $mainDepartamento)
    {
        $mainDepartamento->update($request->validated());

        return redirect()->action([MainDepartamentoController::class, 'index'], ['clienteDomain' => $request->clienteDomain]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Main\Config\MainDepartamento  $mainDepartamento
     * @return \Illuminate\Http\Response
     */
    public function destroy($clienteDomain, MainDepartamento $mainDepartamento)
    {
        if ($mainDepartamento->id < 2) return redirect()->back()->withErrors(['delete' => 'Este departamento não pode ser eliminado!']);

        try {
            MainEstabelecimento::find($mainDepartamento->main_estabelecimentos_id)->delete();
            $mainDepartamento->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['delete' => 'Existem dados associados a este departamento. Para o eliminar altere aqueles registos.']);
        }
        return redirect()->action([MainDepartamentoController::class, 'index'], ['clienteDomain' => $clienteDomain]);
    }
}
