<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->increments('id');
            $table->text('detalle')->nullable();
            $table->date('fecha');
            $table->time('hora');

            $table->boolean('asignada')->default('false');
            $table->boolean('verificada')->default('false');
            $table->text('nota')->nullable();

            //ID del usuario tecnico al cual se le asigna el incidente para su solución...
            $table->integer('user_id_asignado')->unsigned()->nullable();
            $table->date('fecha_asignada')->nullable();


            $table->integer('estado_id')->unsigned();
            $table->foreign('estado_id')
            ->references('id')
            ->on('estados')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            //ID del usuario que reporta la incidencia
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->integer('motivo_id')->unsigned();
            $table->foreign('motivo_id')
            ->references('id')
            ->on('motivos')
            ->onUpdate('cascade');
        

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
        Schema::drop('incidencias');
    }
}
