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
        Schema::create('cursos_comprados', function (Blueprint $table) {
            $table->id();

            $table->string('user_compra');
            $table->string('id_user');
            $table->string('nombre_user');
            $table->string('foto');
            $table->string('descripcion');
            $table->string('titulo');
            $table->string('id_curso');

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
        Schema::dropIfExists('cursos_comprados');
    }
};
