<?php

namespace Database\Seeders\Clientes;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Main\Config\MainEstabelecimento;

class MainEstabelecimentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('main_estabelecimentos') && !MainEstabelecimento::exists()) {
            for ($i = 1; $i < 5; $i++) {
                MainEstabelecimento::create([]);
            }
        }
    }
}
