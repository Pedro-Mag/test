<?php

namespace Database\Seeders\Clientes;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Main\Config\MainDepartamento;

class MainDepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('main_departamentos') && !MainDepartamento::exists()) {
            MainDepartamento::create([
                'name' => 'Escritório',
                'slug' => 'escritorio',
                'descricao' => 'Escritórios centrais',
                'childs' => 0,
                'address' => 'Av. Barreiros 101\, 4575\, Portugal',
                'latitude' => '41.119179862770544',
                'longitude' => '-8.281742735479497',
                'main_estabelecimentos_id' => 1
            ]);
            MainDepartamento::create(
                [
                    'name' => 'Obras',
                    'slug' => 'obras',
                    'descricao' => 'Não remover',
                    'childs' => 1,
                    'address' => '',
                    'latitude' => '',
                    'main_estabelecimentos_id' => null
                ]
            );
            MainDepartamento::create(
                [
                    'name' => 'Oficinas',
                    'slug' => 'oficinas',
                    'descricao' => 'Oficinas da empresa',
                    'childs' => 0,
                    'address' => '',
                    'latitude' => '',
                    'main_estabelecimentos_id' => 2
                ]
            );
            MainDepartamento::create(
                [
                    'name' => 'Pedreira',
                    'slug' => 'pedreira',
                    'descricao' => 'Pedreira de Peroselo',
                    'childs' => 0,
                    'address' => 'Rua das Lameiras 281\, 4560\, Portugal',
                    'latitude' => '41.14914423045763',
                    'longitude' => '-8.26089268189753',
                    'main_estabelecimentos_id' => 3
                ]
            );
            MainDepartamento::create(
                [
                    'name' => 'Transportes',
                    'slug' => 'transportes',
                    'descricao' => 'Departamento dedicado aos motoristas de pesados',
                    'childs' => 0,
                    'address' => 'Av. Barreiros 101\, 4575\, Portugal',
                    'latitude' => '41.119213704173745',
                    'longitude' => '-8.281724681661899',
                    'main_estabelecimentos_id' => 4
                ]
            );
        }
    }
}
