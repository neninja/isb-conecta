<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaAtendimentosTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimentos', function (Blueprint $table) {
            $table->id();
            // $table->increments('id');
            $table->foreignId('id_usuario')
                  ->constrained('users');
            $table->date('data');
            $table->foreignId('id_localAtendimento')
                  ->constrained('locaisAtendimento');
            $table->string('nomePessoaAtendida');
            $table->string('telefone');
            $table->string('relato');
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
        Schema::dropIfExists('atendimentos');
    }
}
