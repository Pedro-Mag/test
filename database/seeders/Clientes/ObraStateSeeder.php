<?php

namespace Database\Seeders\Clientes;

use App\Models\Main\Obras\ObraState;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ObraStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ObraState::create([
            'id' => 0,
            'name' => 'Por iniciar'
        ]);

        ObraState::create([
            'id' => 1,
            'name' => 'Activa'
        ]);

        ObraState::create([
            'id' => 2,
            'name' => 'Suspensa'
        ]);

        ObraState::create([
            'id' => 3,
            'name' => 'Em garantia'
        ]);

        ObraState::create([
            'id' => 4,
            'name' => 'Concluída'
        ]);
    }
}
