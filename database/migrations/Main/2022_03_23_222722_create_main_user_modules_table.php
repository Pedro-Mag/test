<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('clientes')->create('main_user_modules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('main_user_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('module_id');
            $table->foreign('module_id')->references('id')->on('Sigo_admin.modules')->constrained()->cascadeOnDelete();
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
        Schema::connection('clientes')->dropIfExists('main_user_modules');
    }
};
