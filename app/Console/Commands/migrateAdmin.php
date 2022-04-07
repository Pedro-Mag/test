<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class migrateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:admin {fresh?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrar as tabelas de administração';

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
            Artisan::call('migrate:fresh', ['--database'=>'admin', '--path'=>'/database/migrations/admin']);
            $this->info('Deleted and migrated all the Admin tables');
        } else {
            Artisan::call('migrate', ['--seed'=>true, '--database'=>'admin', '--path'=>'/database/migrations/admin']);
            $this->info('Migrated all the admin tables missing.');
        }

        Artisan::call('db:seed', ['--database'=>'admin', '--class'=>'adminSeeder']);
        $this->info('Seeded all the admin tables missing.');

    }
}
