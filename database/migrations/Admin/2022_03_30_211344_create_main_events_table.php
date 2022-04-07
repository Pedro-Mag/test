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
        Schema::create('main_events_messages', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->tinyText('model')->nullable();
            $table->tinyText('name')->nullable();
            $table->string('href')->nullable();
            $table->tinyText('reference')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('main_events_messages');
    }
};
