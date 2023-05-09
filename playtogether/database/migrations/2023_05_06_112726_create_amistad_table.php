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
        Schema::create('amistad', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_1')->constrained('users')
                                        ->cascadeOnUpdate()
                                        ->nullOnDelete();
            $table->foreignId('user_2')->constrained('users')
                                        ->cascadeOnUpdate()
                                        ->nullOnDelete();


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
        Schema::dropIfExists('amistad');
    }
};
