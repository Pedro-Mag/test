<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_clientes', function (Blueprint $table) {
            $table->id();
            $table->string('account')->unique();
            $table->string('name')->unique();
            $table->string('designacao')->unique();
            $table->string('slug')->unique();
            $table->string('contact');
            $table->string('email');
            $table->string('address');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('nif')->unique()->nullable();
            $table->string('image')->nullable();
            $table->foreignId('admin_user_id')->constrained();
            $table->string('table_id')->unique();
            $table->smallInteger('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_clientes');
    }
}
