<?php

namespace App\Http\Controllers\Admin;

use stdClass;
use Exception;
use App\Models\Admin\Module;
use Illuminate\Http\Request;
use App\Models\Admin\AdminUser;
use Illuminate\Validation\Rule;
use App\Models\Admin\AdminCliente;
use Illuminate\Support\Facades\DB;
use App\Helpers\AdminClienteHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Admin\ClienteRequest;
use Illuminate\Database\Migrations\Migrator;

class AdminClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $showAll = filter_var(request()->input('showAll'), FILTER_VALIDATE_BOOLEAN);

        $showRestrict = true;
        if (request()->input('showAll') == 'true' && Auth::user()->admin_role_id === 1) $showRestrict = false;

        $clientes = AdminCliente::with('manager')
            ->when(request()->input('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('designacao', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('address', 'like', "%{$search}%");
            })
            ->when($showRestrict, function ($query) {
                $query->where('admin_user_id', Auth()->user()->id);
            })
            ->paginate(9)
            ->withQueryString()
            ->through(fn ($clientes) => [
                'name' => $clientes->name,
                'account' => $clientes->account,
                'designacao' => $clientes->designacao,
                'slug' => $clientes->slug,
                'thumbnail' => $clientes->image ? "/images/admin/min-" . $clientes->image : null,
                'status' => $clientes->status,
                'status_text' => $clientes->status ? "Activo" : 'Suspenso',
                'owner' => $clientes->admin_user_id == Auth()->user()->id,
                'owner_iniciais' => strtoupper($clientes->manager->iniciais),
                'owner_slug' => $clientes->manager->slug
            ]);

        return inertia('Admin/Clientes/Index', [
            'clientes' =>  $clientes,
            'filters' => [
                'search' => $request['search'],
                'showAll' => $showAll,
            ],
            'can' => [
                'edit' => Auth::user()->admin_role_id === 1
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
        if (Auth::user()->admin_role_id != 1) abort(403);

        return inertia('Admin/Clientes/CreateCliente', [
            'admin_users' => AdminUser::all()
                ->map(fn ($adminuser) => [
                    'id' => $adminuser->id,
                    'name' => $adminuser->name,
                    'thumbnail' => $adminuser->thumbnail,
                ])
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
        $validated = $request->validated();

        $slug = strtolower($request->designacao);
        $slug = str_replace('&', '', $slug);
        $slug = preg_replace('~&([a-z]{1,2})(acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($slug, ENT_QUOTES, 'UTF-8'));
        $slug = preg_replace("#[[:punct:]]#", "", $slug);
        $slug = str_replace(' ', '-', $slug);

        $validated['slug'] = $slug;
        $validated['status'] = true;
        $validated['table_id'] = "db_" . $request->account;

        $adminCliente = AdminCliente::create($validated);
        $adminCliente->userEvents()->attach(Auth::id(), ['admin_event_id' => 1]);


        if ($request->image) {
            $image = AdminClienteHelper::saveImage($request->image);
            $adminCliente->update(['image' => $image]);
        }

        return redirect()->action([AdminClienteController::class, 'show'], ['adminCliente' => $adminCliente->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\AdminCliente  $adminCliente
     * @return \Illuminate\Http\Response
     */
    public function show(AdminCliente $adminCliente)
    {
        $owner = [
            'name' => Auth()->User()->name,
            'thumbnail' => Auth()->User()->thumbnail,
        ];

        $adminCliente = $adminCliente->only([
            'name',
            'account',
            'designacao',
            'slug',
            'status',
            'email',
            'address',
            'latitude',
            'longitude',
            'contact',
            'nif',
            'realImage',
        ]);

        return inertia('Admin/Clientes/ShowCliente', [
            'cliente' =>  $adminCliente,
            'owner' => $owner,
            'can' => [
                'edit' => Auth::user()->admin_role_id === 1
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\AdminCliente  $adminCliente
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminCliente $adminCliente)
    {
        if (Auth::user()->admin_role_id != 1) abort(403);

        $adminCliente = [
            'id' => $adminCliente->id,
            'name' => $adminCliente->name,
            'account' => $adminCliente->account,
            'designacao' => $adminCliente->designacao,
            'slug' => $adminCliente->slug,
            'status' => $adminCliente->status,
            'email' => $adminCliente->email,
            'address' => $adminCliente->address,
            'latitude' => strval($adminCliente->latitude),
            'longitude' => strval($adminCliente->longitude),
            'contact' => $adminCliente->contact,
            'nif' => $adminCliente->nif,
            'realImage' => $adminCliente->realImage,
            'admin_user_id' => $adminCliente->admin_user_id,
        ];

        $adminUsers =  AdminUser::all()
            ->map(fn ($adminuser) => [
                'id' => $adminuser->id,
                'name' => $adminuser->name,
                'thumbnail' => $adminuser->thumbnail,
            ]);

        return inertia('Admin/Clientes/EditCliente', [
            'cliente' =>  $adminCliente,
            'admin_users' => $adminUsers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\AdminCliente  $adminCliente
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteRequest $request, AdminCliente $adminCliente)
    {
        if (!Auth::user()->can('edit', AdminUser::class)) abort(403);

        $adminCliente->update($request->validated());
        $adminCliente->userEvents()->attach(Auth::id(), ['admin_event_id' => 3]);

        if ($request->image) {
            if ($adminCliente->image) AdminClienteHelper::deleteFile($adminCliente->image);
            $adminCliente->update(['image' => AdminClienteHelper::saveimage($request->image)]);
        }

        return redirect()->action([AdminClienteController::class, 'show'], ['adminCliente' => $adminCliente->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\AdminCliente  $adminCliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminCliente $adminCliente)
    {
        if (Auth::user()->admin_role_id != 1) abort(403);


        if ($adminCliente->image) AdminClienteHelper::deleteFile($adminCliente->image);
        $adminCliente->delete();

        return redirect()->action([AdminClienteController::class, 'index']);
    }

    public function showDetails(AdminCliente $adminCliente)
    {

        $modules = Module::BaseModules()
            ->orderBy('order')
            ->with('childModules')
            ->get();

        $events = $adminCliente->events;
        $events->load('users');

        $events = $adminCliente->events->map(function ($event) {
            return [
                'event' => "$event->descricao ",
                'date' => $event->pivot->created_at->toDateTimeString(),
                'userName' => $event->users->find($event->pivot->admin_user_id)->name,
                'userThumb' => $event->users->find($event->pivot->admin_user_id)->thumbnail,
            ];
        });

        $database = new stdClass();
        $database->exists = AdminClienteHelper::checkDataBase($adminCliente->table_id);


        //obter o numero e quais as migrações na pasta de cliente
        $folderPath = "./../database/migrations/Main";
        $files = array_map(fn ($x) => pathinfo($x, PATHINFO_FILENAME), array_slice(scandir($folderPath), 2));
        $numFiles = count($files);

        $numMigrations = 0;
        
        app('debugbar')->info("database exists: $database->exists");
        
        if ($database->exists) {
            Config::set('database.connections.clientes.database', $adminCliente->table_id);
            DB::purge('clientes');
            
            app('debugbar')->info("database has table migrations: " . Schema::hasTable('migrations'));
            if (Schema::connection('clientes')->hasTable('migrations')) {
                $migrations = DB::table($adminCliente->table_id . '.migrations')->get();
                $numMigrations = $migrations->count();
            }
        }

        $database->migrationsToRun = $numFiles - $numMigrations;
        
        app('debugbar')->info("isset migrations: " . isset($migrations));
        foreach ($files as $migration) {
            $database->migrations[] = [
                'migration' => $migration,
                'run' => isset($migrations) ? !!$migrations->where('migration', $migration)->count() : false,
            ];
        }


        return inertia('Admin/Clientes/DetailsCliente', [
            'cliente' =>  $adminCliente->only([
                'name',
                'slug',
                'table_id',
            ]),
            'events' => $events,
            'base_dados' => $database,
            'modules' => $modules,
            'own_modules' => array_column($adminCliente->modules->toArray(), 'id'),
            'can' => [
                'edit' => Auth::user()->admin_role_id === 1
            ]
        ]);
    }

    public function toggleModule(AdminCliente $adminCliente, Module $modulo, Request $request)
    {

        if (Auth::user()->admin_role_id != 1) abort(403);

        $value = filter_var($request->value, FILTER_VALIDATE_BOOLEAN);

        if ($value) {
            $adminCliente->modules()->attach($modulo);
        } else {
            $adminCliente->modules()->detach($modulo);
        }

        $childs = $modulo->childModules()->get();

        AdminClienteHelper::toggleChilds($adminCliente, $childs, $value);

        if ($value === true) AdminClienteHelper::toggleParent($adminCliente, $modulo, $request->value);

        return redirect()->back()->with('own_modules', array_column($adminCliente->modules->toArray(), 'id'));
    }

    public function editDatabase(AdminCliente $adminCliente, Request $request)
    {

        if (Auth::user()->admin_role_id != 1) abort(403);

        $request->validate([
            'table_id' => ['required', 'min:8', 'regex:/^[a-zA-Z0-9_]+$/u', Rule::unique('admin_clientes')->ignore($adminCliente->id)]
        ]);

        $adminCliente->update(['table_id' => $request->table_id]);

        return redirect()->back();
    }

    public function createDatabase(AdminCliente $adminCliente)
    {

        if (Auth::user()->admin_role_id != 1) abort(403);

        $input = [
            'table_id' => $adminCliente->table_id,
        ];

        $validator = Validator::make($input, [
            'table_id' => ['required', 'min:8', 'regex:/^[a-zA-Z0-9_]+$/u', Rule::unique('admin_clientes')->ignore($adminCliente->id)]
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors([
                'create' => 'Formato do nome da base de dados inválido!'
            ]);
        }

        try {
            DB::statement("CREATE DATABASE $adminCliente->table_id");
            $adminCliente->userEvents()->attach(Auth::id(), ['admin_event_id' => 2]);
        } catch (Exception $e) {
            return redirect()->back()->withErrors([
                'create' => 'Erro ao criar base de dados.'
            ]);
        }

        return redirect()->action([AdminClienteController::class, 'showDetails'], [$adminCliente->slug]);
    }

    public function migrateDatabase(AdminCliente $adminCliente)
    {

        if (Auth::user()->admin_role_id != 1) abort(403);

        $query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME =  ?";
        $db = DB::select($query, [$adminCliente->table_id]);
        if (empty($db)) {
            return redirect()->back()->withErrors([
                'create' => 'A base de dados não foi encontrada! Verifique se foi criada.'
            ]);
        }

        Config::set('database.connections.clientes.database', $adminCliente->table_id);
        DB::purge('clientes');

        try {
            Artisan::call('migrate', ['--seed' => true, '--database' => 'clientes', '--path' => '/database/migrations/main']);
        } catch (exception $e) {
            return redirect()->back()->withErrors([
                'create' => 'Erro ao realizar migrações em falta.'
            ]);
        }

        try {
            Artisan::call('db:seed', ['--database' => 'clientes', '--class' => 'clientesSeeder']);
        } catch (exception $e) {
            return redirect()->back()->withErrors([
                'create' => 'Erro ao realizar popular as bases de dados.'
            ]);
        }

        $adminCliente->userEvents()->attach(Auth::id(), ['admin_event_id' => 3]);

        return redirect()->back()->with('success', 'Yupi!');
    }
}
