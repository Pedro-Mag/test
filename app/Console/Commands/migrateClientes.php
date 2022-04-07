<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class migrateClientes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:clientes {fresh?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrar as tabelas de clientes';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $fresh = $this->argument('fresh');

        if($fresh == "fresh") {
            Artisan::call('migrate:fresh', ['--database'=>'clientes', '--path'=>'/database/migrations/main']);
            $this->info('Deleted and migrated all the clientes tables');
        } else {
            Artisan::call('migrate', ['--seed'=>true, '--database'=>'clientes', '--path'=>'/database/migrations/main']);
            $this->info('Migrated all the clientes tables missing.');
        }

        Artisan::call('db:seed', ['--database'=>'clientes', '--class'=>'clientesSeeder']);
        $this->info('Seeded all the clientes tables missing!');
    }
}
