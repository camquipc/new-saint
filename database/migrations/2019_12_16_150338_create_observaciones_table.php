<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObservacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->text('observacion')->nullable();
            $table->boolean('visto')->default(false);
            $table->boolean('privacidad')->default(false);
            $table->integer('incidencia_id')->unsigned();
            $table->foreign('incidencia_id')
            ->references('id')
            ->on('incidencias')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');

        
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
       Schema::drop('observaciones');
    }
}
