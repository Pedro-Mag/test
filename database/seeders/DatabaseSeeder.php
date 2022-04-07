<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Admin\AdminUserSeeder;
use Database\Seeders\Admin\AdminRolesSeeder;
use Database\Seeders\Admin\AdminModulesSeeder;
use Database\Seeders\Clientes\MainUsersSeeder;
use Database\Seeders\Admin\AdminClientesSeeder;
use Database\Seeders\Clientes\MainUserGroupsSeeder;
use Database\Seeders\Admin\AdminClienteModuleSeeder;
use Database\Seeders\Clientes\MainDepartamentosSeeder;
use Database\Seeders\Clientes\MainEstabelecimentosSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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
            MainUserGroupsSeeder::class,
            MainUsersSeeder::class,
            MainEstabelecimentosSeeder::class,
            MainDepartamentosSeeder::class
        ]);


    }
}
