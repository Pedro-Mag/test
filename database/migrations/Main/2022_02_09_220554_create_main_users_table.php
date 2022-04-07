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
        Schema::connection('clientes')->create('main_users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique;
            $table->string('iniciais')->unique;
            $table->string('slug')->unique;
            $table->string('avatar')->nullable();
            $table->foreignId('main_user_group_id')->constrained()->restrictOnDelete();
            $table->boolean('rgpd');
            $table->boolean('gestor');
            $table->string('password')->default('$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('clientes')->dropIfExists('main_users');
    }
};
