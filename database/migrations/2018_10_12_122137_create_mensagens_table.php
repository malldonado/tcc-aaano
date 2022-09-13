<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('mensagens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_rem')->unsigned();
            $table->foreign('id_rem')->references('id')->on('pessoas');
            $table->integer('id_dest')->unsigned();
            $table->foreign('id_dest')->references('id')->on('pessoas');
            $table->text('mensagem');
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
        Schema::dropIfExists('mensagens');
    }
}
