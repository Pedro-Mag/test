<?php

namespace Database\Seeders\Admin;

use Illuminate\Database\Seeder;
use App\Models\Admin\MainEventsMessage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MainEventsMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MainEventsMessage::create( [
            'id'=>1,
            'message'=>'fez login na aplicação',
            'model'=>NULL,
            'name'=>NULL,
            'href'=>NULL,
            'reference'=>NULL
            ] );

            MainEventsMessage::create( [
            'id'=>2,
            'message'=>'criou o utilizador',
            'model'=>'App\\Models\\Main\\Config\\MainUser',
            'name'=>'name',
            'href'=>'/config/utilizadores/',
            'reference'=>'slug'
            ] );

            MainEventsMessage::create( [
            'id'=>3,
            'message'=>'editou os dados do utilizador',
            'model'=>'App\\Models\\Main\\Config\\MainUser',
            'name'=>'name',
            'href'=>'/config/utilizadores/',
            'reference'=>'slug'
            ] );

            MainEventsMessage::create( [
            'id'=>4,
            'message'=>'solicitou o reenvio da password do utilizador',
            'model'=>'App\\Models\\Main\\Config\\MainUser',
            'name'=>'name',
            'href'=>'/config/utilizadores/',
            'reference'=>'slug'
            ] );

            MainEventsMessage::create( [
            'id'=>5,
            'message'=>'alterou as permissões do utilizador',
            'model'=>'App\\Models\\Main\\Config\\MainUser',
            'name'=>'name',
            'href'=>'/config/utilizadores/',
            'reference'=>'slug'
            ] );

            MainEventsMessage::create( [
            'id'=>6,
            'message'=>'eliminou um utilizador',
            'model'=>NULL,
            'name'=>NULL,
            'href'=>NULL,
            'reference'=>NULL
            ] );

            MainEventsMessage::create( [
            'id'=>7,
            'message'=>'criou o grupo de utilizadores',
            'model'=>'App\\Models\\Main\\Config\\MainUserGroup',
            'name'=>'name',
            'href'=>'/config/grupos_utilizadores/',
            'reference'=>'id'
            ] );

            MainEventsMessage::create( [
            'id'=>8,
            'message'=>'editou o grupo de utilizadores',
            'model'=>'App\\Models\\Main\\Config\\MainUserGroup',
            'name'=>'name',
            'href'=>'/config/grupos_utilizadores/',
            'reference'=>'id'
            ] );

            MainEventsMessage::create( [
            'id'=>9,
            'message'=>'alterou as permissões do grupo de utilizadores',
            'model'=>'App\\Models\\Main\\Config\\MainUserGroup',
            'name'=>'name',
            'href'=>'/config/grupos_utilizadores/',
            'reference'=>'id'
            ] );

            MainEventsMessage::create( [
            'id'=>10,
            'message'=>'eliminou um grupo de utilizadores',
            'model'=>NULL,
            'name'=>NULL,
            'href'=>NULL,
            'reference'=>NULL
            ] );

            MainEventsMessage::create( [
            'id'=>11,
            'message'=>'criou o departamento',
            'model'=>'App\\Models\\Main\\Config\\MainDepartamento',
            'name'=>'name',
            'href'=>'/config/departamentos/',
            'reference'=>'slug'
            ] );

            MainEventsMessage::create( [
            'id'=>12,
            'message'=>'editou o departamento',
            'model'=>'App\\Models\\Main\\Config\\MainDepartamento',
            'name'=>'name',
            'href'=>'/config/departamentos/',
            'reference'=>'slug'
            ] );

            MainEventsMessage::create( [
            'id'=>13,
            'message'=>'eliminou um departamento',
            'model'=>NULL,
            'name'=>NULL,
            'href'=>NULL,
            'reference'=>NULL
            ] );

            MainEventsMessage::create( [
            'id'=>14,
            'message'=>'editou os dados da empresa',
            'model'=>NULL,
            'name'=>NULL,
            'href'=>NULL,
            'reference'=>NULL
            ] );
    }
}
