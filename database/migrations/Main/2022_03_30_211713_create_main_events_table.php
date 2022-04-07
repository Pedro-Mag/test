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
        Schema::connection('clientes')->create('main_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('main_user_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('main_events_message_id');
            $table->foreign('main_events_message_id')->references('id')->on('Sigo_admin.main_events_messages')->constrained()->cascadeOnDelete();
            $table->integer('model_id')->nullable();
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
        Schema::connection('clientes')->dropIfExists('main_events');
    }
};
