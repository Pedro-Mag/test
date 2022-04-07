<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Clientes\IvaSeeder;
use Database\Seeders\Clientes\MainUsersSeeder;
use Database\Seeders\Clientes\ObraStateSeeder;
use Database\Seeders\Clientes\MainUserGroupsSeeder;
use Database\Seeders\Clientes\MainDepartamentosSeeder;
use Database\Seeders\Clientes\MainEstabelecimentosSeeder;
use Database\Seeders\Clientes\MainUserGroupsModulesSeeder;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MainUserGroupsSeeder::class,
            MainUsersSeeder::class,
            MainEstabelecimentosSeeder::class,
            MainDepartamentosSeeder::class,
            MainUserGroupsModulesSeeder::class,
            ObraStateSeeder::class,
            IvaSeeder::class,
        ]);
    }
}
