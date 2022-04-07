<?php

namespace Database\Seeders\Admin;

use Illuminate\Support\Str;
use App\Models\Admin\AdminRole;
use App\Models\Admin\AdminUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('admin_users') && !AdminUser::exists()) {
            AdminUser::create([
                'name' => 'Pedro Magalhães',
                'iniciais' => 'PM',
                'slug' => 'pedro-magalhaes',
                'avatar' => 'user_1419916287-1644058870.png',
                'email' => 'pedromiguelmmagalhaes@gmail.com',
                'email_verified_at' => now(),
                'admin_role_id' => AdminRole::first()->id,
                'password' => 'password', // password
                'remember_token' => Str::random(10),
            ]);

            AdminUser::factory()->count(10)->create();
        }
    }
}
