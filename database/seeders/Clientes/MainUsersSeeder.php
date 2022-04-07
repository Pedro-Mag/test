<?php

namespace Database\Seeders\Clientes;

use Illuminate\Database\Seeder;
use App\Models\Main\Config\MainUser;
use Illuminate\Support\Facades\Schema;

class MainUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('main_users') && !MainUser::exists()) {
            MainUser::create([
                'name' => 'Pedro Magalhães',
                'email' => 'pedromagalhaes@caridades.pt',
                'iniciais' => 'PM',
                'avatar' => 'user_1419916287-1644058870.png',
                'slug' => 'pedro_magalhaes',
                'password' => 'password',
                'main_user_group_id' => 2,
                'rgpd' => 1,
                'gestor' => 1,
            ]);
            MainUser::create([
                'name' => 'Vitor Soares',
                'email' => 'vitorsoares@caridades.pt',
                'iniciais' => 'VS',
                'slug' => 'vitor_soares',
                'avatar' => null,
                'password' => 'password',
                'main_user_group_id' => 3,
                'rgpd' => 1,
                'gestor' => 0,
            ]);
            MainUser::create([
                'name' => 'Joaquim Rodrigues',
                'slug' => 'joaquim_rodrigues',
                'iniciais' => 'JR',
                'email' => 'joaquimsrodrigues@gmail.com',
                'avatar' => null,
                'password' => 'password',
                'main_user_group_id' => 3,
                'rgpd' => 1,
                'gestor' => 1,
            ]);
            MainUser::create([
                'name' => 'Ruben Vieira',
                'slug' => 'ruvamovi',
                'iniciais' => 'RV',
                'email' => 'ruben.vieira@caridades.pt',
                'avatar' => null,
                'password' => 'password',
                'main_user_group_id' => 4,
                'rgpd' => 0,
                'gestor' => 1,
            ]);
            MainUser::create([
                'name' => 'Geraldo Ribeiro',
                'slug' => 'gerrab',
                'iniciais' => 'GR',
                'email' => 'geraldo.ribeiro@caridades.pt',
                'avatar' => null,
                'password' => 'password',
                'main_user_group_id' => 4,
                'rgpd' => 0,
                'gestor' => 0,
            ]);
            MainUser::create([
                'name' => 'Luis Ribeiro',
                'slug' => 'luiRib',
                'iniciais' => 'LR',
                'email' => 'geral@caridades.pt',
                'avatar' => null,
                'password' => 'password',
                'main_user_group_id' => 7,
                'rgpd' => 1,
                'gestor' => 0,
            ]);
            MainUser::create([
                'name' => 'Sara Ferreira',
                'slug' => 'sarFer',
                'iniciais' => 'SF',
                'email' => 'sara.ferreira@caridades.pt',
                'avatar' => null,
                'password' => 'password',
                'main_user_group_id' => 7,
                'rgpd' => 1,
                'gestor' => 0,
            ]);
            MainUser::create([
                'name' => 'Manuela Sousa',
                'slug' => 'manSou',
                'iniciais' => 'MS',
                'email' => 'manuela@caridades.pt',
                'avatar' => null,
                'password' => 'password',
                'main_user_group_id' => 6,
                'rgpd' => 0,
                'gestor' => 0,
            ]);
            MainUser::create([
                'name' => 'Nuno Teixeira',
                'slug' => 'nunTeix',
                'iniciais' => 'NT',
                'email' => 'Nuno.teixeira@caridades.pt',
                'avatar' => null,
                'password' => 'password',
                'main_user_group_id' => 6,
                'rgpd' => 0,
                'gestor' => 0,
            ]);
            MainUser::create([
                'name' => 'Carlos Assunção',
                'slug' => 'carlAssu',
                'iniciais' => 'CA',
                'email' => 'carlosassuncao@caridades.pt',
                'avatar' => null,
                'password' => 'password',
                'main_user_group_id' => 5,
                'rgpd' => 0,
                'gestor' => 0,
            ]);
        }
    }
}
