<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('animals', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('idade');
            $table->string('raca', 50);
            $table->string('nome', 100);
            $table->string('cor', 20);
            $table->string('porte', 20);
            $table->char('deficiencia', 1);
            $table->char('sexo', 1);
            $table->char('vacinado', 1);
            $table->date('dt_registro');
            $table->char('castrado', 1);
            $table->string('patologia', 200);
            $table->text('situacao');
            $table->string('status', 1);
            $table->text('descricao');
            $table->string('imagem', 200);
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
        Schema::dropIfExists('animals');
    }
}
