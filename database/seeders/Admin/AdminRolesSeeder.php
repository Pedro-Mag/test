<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\AdminRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class AdminRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('admin_roles') && !AdminRole::exists()) {
            AdminRole::create(['design' => 'admin']);
            AdminRole::create(['design' => 'user']);
        };
    }
}
