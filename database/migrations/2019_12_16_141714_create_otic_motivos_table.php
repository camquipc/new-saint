<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOticMotivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motivos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');

            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')
            ->references('id')
            ->on('categorias')
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
       Schema::drop('motivos');
    }
}
