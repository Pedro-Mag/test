<?php

namespace Database\Seeders\Admin;

use Illuminate\Database\Seeder;
use App\Models\Admin\AdminCliente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AdminClienteModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('admin_cliente_module') && !AdminCliente::find(1)->modules()->count()) {
            DB::table('admin_cliente_module')->insert([
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 1
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 2
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 3
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 4
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 5
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 6
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 7
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 8
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 9
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 10
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 11
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 12
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 13
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 14
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 15
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 16
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 17
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 18
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 19
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 20
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 21
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 22
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 23
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 24
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 25
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 26
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 27
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 28
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 29
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 30
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 41
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 42
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 43
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 44
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 45
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 46
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 47
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 48
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 49
                ],
                [
                    'admin_clienteid' => 1,
                    'module_id' => 50
                ],
                [
                    'admin_cliente_id' => 1,
                    'module_id' => 51
                ],
                [
                    'admin_clienteid' => 1,
                    'module_id' => 52
                ],
                [
                    'admin_clienteid' => 1,
                    'module_id' => 53
                ],
                [
                    'admin_clienteid' => 1,
                    'module_id' => 54
                ],
                [
                    'admin_clienteid' => 1,
                    'module_id' => 55
                ],
                [
                    'admin_clienteid' => 1,
                    'module_id' => 56
                ],
                [
                    'admin_clienteid' => 1,
                    'module_id' => 57
                ],
                [
                    'admin_clienteid' => 1,
                    'module_id' => 58
                ],
                [
                    'admin_clienteid' => 1,
                    'module_id' => 59
                ],
                [
                    'admin_cliente_id' => 2,
                    'module_id' => 1
                ],
                [
                    'admin_cliente_id' => 2,
                    'module_id' => 2
                ],
                [
                    'admin_cliente_id' => 2,
                    'module_id' => 3
                ],
                [
                    'admin_cliente_id' => 2,
                    'module_id' => 4
                ],
                [
                    'admin_cliente_id' => 2,
                    'module_id' => 5
                ],
                [
                    'admin_cliente_id' => 2,
                    'module_id' => 6
                ],
                [
                    'admin_cliente_id' => 2,
                    'module_id' => 7
                ],
                [
                    'admin_cliente_id' => 2,
                    'module_id' => 8
                ],
                [
                    'admin_cliente_id' => 2,
                    'module_id' => 9
                ],
                [
                    'admin_cliente_id' => 2,
                    'module_id' => 10
                ],
                [
                    'admin_cliente_id' => 2,
                    'module_id' => 11
                ],
                [
                    'admin_cliente_id' => 2,
                    'module_id' => 12
                ],
                [
                    'admin_cliente_id' => 2,
                    'module_id' => 13
                ],
                [
                    'admin_cliente_id' => 2,
                    'module_id' => 14
                ],
                [
                    'admin_cliente_id' => 2,
                    'module_id' => 15
                ],
                [
                    'admin_cliente_id' => 2,
                    'module_id' => 16
                ],
                [
                    'admin_cliente_id' => 2,
                    'module_id' => 17
                ],
                [
                    'admin_cliente_id' => 2,
                    'module_id' => 18
                ],
                [
                    'admin_cliente_id' => 2,
                    'module_id' => 19
                ],
                [
                    'admin_cliente_id' => 2,
                    'module_id' => 20
                ],
                [
                    'admin_cliente_id' => 2,
                    'module_id' => 21
                ],
                [
                    'admin_cliente_id' => 3,
                    'module_id' => 1
                ],
                [
                    'admin_cliente_id' => 3,
                    'module_id' => 3
                ],
                [
                    'admin_cliente_id' => 3,
                    'module_id' => 3
                ],
                [
                    'admin_cliente_id' => 3,
                    'module_id' => 4
                ],
                [
                    'admin_cliente_id' => 3,
                    'module_id' => 5
                ],
                [
                    'admin_cliente_id' => 3,
                    'module_id' => 6
                ],
                [
                    'admin_cliente_id' => 3,
                    'module_id' => 7
                ],
                [
                    'admin_cliente_id' => 3,
                    'module_id' => 8
                ],
                [
                    'admin_cliente_id' => 3,
                    'module_id' => 9
                ],
                [
                    'admin_cliente_id' => 3,
                    'module_id' => 10
                ],
                [
                    'admin_cliente_id' => 3,
                    'module_id' => 11
                ],
                [
                    'admin_cliente_id' => 3,
                    'module_id' => 12
                ],
                [
                    'admin_cliente_id' => 3,
                    'module_id' => 13
                ],
                [
                    'admin_cliente_id' => 3,
                    'module_id' => 14
                ],
                [
                    'admin_cliente_id' => 3,
                    'module_id' => 15
                ],
                [
                    'admin_cliente_id' => 3,
                    'module_id' => 16
                ],
                [
                    'admin_cliente_id' => 3,
                    'module_id' => 17
                ],
                [
                    'admin_cliente_id' => 3,
                    'module_id' => 18
                ],
                [
                    'admin_cliente_id' => 3,
                    'module_id' => 19
                ],
                [
                    'admin_cliente_id' => 3,
                    'module_id' => 20
                ],
                [
                    'admin_cliente_id' => 3,
                    'module_id' => 21
                ],
                [
                    'admin_cliente_id' => 3,
                    'module_id' => 22
                ],
                [
                    'admin_cliente_id' => 3,
                    'module_id' => 23
                ],
                [
                    'admin_cliente_id' => 3,
                    'module_id' => 24
                ],
                [
                    'admin_cliente_id' => 3,
                    'module_id' => 25
                ],
                [
                    'admin_cliente_id' => 3,
                    'module_id' => 26
                ],
                [
                    'admin_cliente_id' => 3,
                    'module_id' => 27
                ],
                [
                    'admin_cliente_id' => 3,
                    'module_id' => 28
                ],
                [
                    'admin_cliente_id' => 3,
                    'module_id' => 29
                ],
                [
                    'admin_cliente_id' => 3,
                    'module_id' => 30
                ],

            ]);
        }
    }
}
