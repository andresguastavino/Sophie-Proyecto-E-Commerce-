<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompraUsuarioTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra_usuario', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('compra_id')->unsigned()->index();
          $table->foreign('compra_id')->references('id')->on('compras');
          $table->bigInteger('user_id')->unsigned()->index();
          $table->foreign('user_id')->references('id')->on('users');
          $table->rememberToken();
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
        Schema::dropIfExists('compra_usuario');
    }
}
