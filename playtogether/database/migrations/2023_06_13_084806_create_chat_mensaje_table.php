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
        Schema::create('chat_mensaje', function (Blueprint $table) {
            $table->id();

            $table->string('user_send');
            $table->string('user_recive');
            $table->string('user_send_name');
            $table->string('user_send_foto');
            $table->string('text');

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
        Schema::dropIfExists('chat_mensaje');
    }
};
