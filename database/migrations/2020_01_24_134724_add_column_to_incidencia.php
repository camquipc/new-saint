<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToIncidencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('incidencias', function (Blueprint $table) {
         
            $table->string('codigo', 4)->nullable();  
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('incidencias', function (Blueprint $table) {
         
            $table->dropColumn('codigo');  
        });
    }
}
