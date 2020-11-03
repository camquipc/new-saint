<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ci')->unique()->nullable();
            $table->string('p_nombre', 25);
            $table->string('s_nombre', 25)->nullable();
            $table->string('p_apellido', 25);
            $table->string('s_apellido', 25)->nullable();
            $table->date('fecha_n')->default('1999-01-01');
            //$table->string('sexo',1)->nullable();
            $table->enum('sexo' , ['f','m'])->nullable();

            $table->string('correo' , 30)->nullable();
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
        Schema::drop('personas');
    }
}
