<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\AdminEvent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminEventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('admin_events') && !AdminEvent::exists())
        {
            AdminEvent::create([
                'descricao' => 'Cliente criado'
            ]);
            AdminEvent::create([
                'descricao' => 'Base de dados criada'
            ]);
            AdminEvent::create([
                'descricao' => 'Migração realizada'
            ]);
            AdminEvent::create([
                'descricao' => 'Cliente modificado'
            ]);
        }
    }
}
