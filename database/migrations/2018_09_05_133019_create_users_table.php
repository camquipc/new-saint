<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('usuario', 10)->unique();
            $table->string('password');
            $table->boolean('status');

            //admin= 1, soporte tecnico = 2 usuario = 3 secretaria= 4
            $table->enum('tipo' , [1,2,3,4,5]);

            $table->integer('departamento_id')->unsigned();
            $table->foreign('departamento_id')
            ->references('id')
            ->on('departamentos')
            ->onUpdate('cascade');
            

            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')
            ->references('id')
            ->on('categorias')
            ->onUpdate('cascade');
            
            $table->integer('persona_id')->unsigned();
            $table->foreign('persona_id')
            ->references('id')
            ->on('personas')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->rememberToken();
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
         Schema::drop('users');
    }
}
