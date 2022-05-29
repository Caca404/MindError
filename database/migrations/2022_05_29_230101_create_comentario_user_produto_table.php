<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentarioUserProdutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentario_user_produto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained();
            $table->foreignId('id_produto')->constrained();
            $table->foreignId('id_comentario')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentario_user_produto');
        Schema::create('comentario_user_produto', function (Blueprint $table) {
            $table->foreignId('id_user')
            ->constrained()
            ->onDelete('cascade');
            $table->foreignId('id_produto')
            ->constrained()
            ->onDelete('cascade');
            $table->foreignId('id_comentario')
            ->constrained()
            ->onDelete('cascade');
        });
    }
}
