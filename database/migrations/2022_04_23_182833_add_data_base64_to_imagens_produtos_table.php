<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataBase64ToImagensProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imagens_produtos', function (Blueprint $table) {
            $table->text('dataBase64');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('imagens_produtos', function (Blueprint $table) {
            $table->dropColumn('dataBase64');
        });
    }
}
