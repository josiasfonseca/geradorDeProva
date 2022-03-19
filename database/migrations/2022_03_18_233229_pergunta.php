<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pergunta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perguntas', function (Blueprint $table) {
            $table->unsignedInteger('idperguntas')->autoIncrement();
            $table->string('pergunta', 255);
            $table->unsignedInteger('dificuldade');
            $table->json('respostas');
            $table->unsignedInteger('tipo_pergunta');
            $table->string('rotulo', 255);

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
        //
    }
}
