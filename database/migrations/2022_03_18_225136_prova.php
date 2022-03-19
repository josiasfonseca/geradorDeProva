<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Prova extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prova', function (Blueprint $table) {
            $table->unsignedInteger('idprova')->autoIncrement();
            $table->unsignedInteger('aplicante_idaplicante');

            //$table->foreign('aplicante_idaplicante')->references('idaplicante')->on('aplicante');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::down('prova');
    }
}
