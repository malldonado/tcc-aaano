<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bairro', 50);
            $table->string('numero', 5);
            $table->string('rua', 100);
            $table->string('cidade', 50);
            $table->char('estado', 2);
            $table->string('resumo', 200);
            $table->string('cep', 9);
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
        Schema::dropIfExists('enderecos');
    }
}
