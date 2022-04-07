<?php

namespace Database\Seeders\Admin;

use Illuminate\Database\Seeder;
use App\Models\Admin\AdminCliente;
use Illuminate\Support\Facades\Schema;

class AdminClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('admin_clientes') && !AdminCliente::exists()) {
            AdminCliente::create([
                'name' => 'Abreu e Nogueira, empreiteiros',
                'account' => 'AbreuNogueira',
                'designacao'  => 'Abreu - Nogueira, Sociedade de Construções, SA',
                'image' => 'cliente_1294565798-1644060783.png',
                'contact' => 943542185,
                'email' => 'oridigitais+fakedata860199@gmail.com',
                'slug' => 'abreu-nogueira-sociedade-de-construcoes-sa',
                'address' => 'R. do Vale do Roubam 221, 2200 Abrantes, Portugal',
                'latitude' => 39.464648796857,
                'longitude' => -8.2173380324158,
                'nif' => 569658166,
                'admin_user_id' => 1,
                'table_id' => 'db_abreunogueira',
                'status' => '1'
            ]);

            AdminCliente::factory()->count(30)->create();
        }
    }
}
