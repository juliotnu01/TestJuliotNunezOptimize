<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
//     (nombre,
// apellido, cedula, correo, lenguajes y fecha de creación)
    public function up()
    {
        Schema::create('programadors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique()->nullable();
            $table->string('apellido')->nullable();
            $table->string('cedula')->unique()->nullable();
            $table->string('correo')->unique()->nullable();
            $table->string('lenguajes')->nullable();
            $table->string('fecha_creacion')->nullable();
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
        Schema::dropIfExists('programadors');
    }
}
