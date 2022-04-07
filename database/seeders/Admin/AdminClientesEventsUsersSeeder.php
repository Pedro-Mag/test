<?php

namespace Database\Seeders\Admin;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminClientesEventsUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('admin_events') && empty(DB::connection('admin')->table('admin_cliente_admin_event_admin_user')->count())) {
            DB::connection('admin')->table('admin_cliente_admin_event_admin_user')->insert([
                [
                    'admin_cliente_id' => 1,
                    'admin_event_id' => 1,
                    'admin_user_id' => 1,
                    'created_at' => Carbon::now()->subDays(5)
                ],
                [
                    'admin_cliente_id' => 1,
                    'admin_event_id' => 2,
                    'admin_user_id' => 4,
                    'created_at' => Carbon::now()->subDays(4)
                ],
                [
                    'admin_cliente_id' => 1,
                    'admin_event_id' => 3,
                    'admin_user_id' => 2,
                    'created_at' => Carbon::now()->subDays(3)
                ],
                [
                    'admin_cliente_id' => 1,
                    'admin_event_id' => 4,
                    'admin_user_id' => 3,
                    'created_at' => Carbon::now()
                ],
                [
                    'admin_cliente_id' => 1,
                    'admin_event_id' => 3,
                    'admin_user_id' => 1,
                    'created_at' => Carbon::now()
                ],
            ]);
        }
    }
}
