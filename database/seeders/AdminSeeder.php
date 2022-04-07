<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Admin\AdminUserSeeder;
use Database\Seeders\Admin\AdminRolesSeeder;
use Database\Seeders\Admin\AdminEventsSeeder;
use Database\Seeders\Admin\AdminModulesSeeder;
use Database\Seeders\Admin\AdminClientesSeeder;
use Database\Seeders\Admin\AdminClienteModuleSeeder;
use Database\Seeders\Admin\AdminClientesEventsUsersSeeder;
use Database\Seeders\Admin\MainEventsMessageSeeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminRolesSeeder::class,
            AdminUserSeeder::class,
            AdminModulesSeeder::class,
            AdminClientesSeeder::class,
            AdminClienteModuleSeeder::class,
            AdminEventsSeeder::class,
            AdminClientesEventsUsersSeeder::class,
            MainEventsMessageSeeder::class
        ]);
    }
}
