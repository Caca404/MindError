<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagensProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagens_produtos', function (Blueprint $table) {
            $table->id();
            $table->string('imagem');
            $table->string('data_type');
            $table->foreignId('id_produto')->constrained();
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
        Schema::dropIfExists('imagens_produtos');
        Schema::create('imagens_produtos', function (Blueprint $table) {
            $table->foreignId('id_produto')
            ->constrained()
            ->onDelete('cascade');
        });
    }
}
