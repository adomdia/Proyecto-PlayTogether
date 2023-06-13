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
        Schema::create('comentarios_temas_foro', function (Blueprint $table) {
            $table->id();

            $table->string('user_id');
            $table->string('user_name');
            $table->string('tema_id');
            $table->string('comentario');
            $table->string('valoracion');

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
        Schema::dropIfExists('comentarios_temas_foro');
    }
};
