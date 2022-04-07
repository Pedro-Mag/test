<?php

namespace Database\Seeders\Clientes;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Main\Config\MainUserGroup;

class MainUserGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('main_user_groups') && !MainUserGroup::exists()) {
            MainUserGroup::create([
                'name' => 'Sem grupo',
                'descricao' => 'Deverão ser definidas individualmente as permissões a atribuir ao utilizador'
            ]);
            MainUserGroup::create([
                'name' => 'Administrador de sistema',
                'descricao' => 'Grupo que serve para referenciar todos aqueles que têm controlo total sobre a aplicação.
                Usar com parcimónia!'
            ]);
            MainUserGroup::create([
                'name' => 'Administração',
                'descricao' => 'Elementos integrantes da estrutura de gestão da empresa!'
            ]);
            MainUserGroup::create([
                'name' => 'Gestor de obras',
                'descricao' => 'Agrupa todos os elementos da organização que terão acesso à gestão geral da obra.
                Não podem editar o pessoal, criar obras ou orçamentos.'
            ]);
            MainUserGroup::create([
                'name' => 'Gestor de pedreira',
                'descricao' => 'Agrupa todos os elementos da organização com responsabilidades na pedreira.
                Não podem editar o pessoal, gerir obras ou orçamentos.'
            ]);
            MainUserGroup::create([
                'name' => 'Administrativo',
                'descricao' => 'Pessoal de escritório.'
            ]);
            MainUserGroup::create([
                'name' => 'Contabilidade',
                'descricao' => 'Agrupa todos os elementos da organização que terão acesso à gestão geral da empresa.'
            ]);
        }
    }
}
