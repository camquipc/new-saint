<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGenerales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->default('Pedro');
            $table->string('apellido')->default('Pablo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('generales');
    }
}
