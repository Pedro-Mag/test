<?php

namespace Database\Seeders\Clientes;

use App\Models\Main\Diversos\Iva;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IvaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Iva::create(['name' => 'Isento', 'taxa' => 0]);
        Iva::create(['name' => 'Reduzida', 'taxa' => 6]);
        Iva::create(['name' => 'Normal', 'taxa' => 23]);
    }
}
