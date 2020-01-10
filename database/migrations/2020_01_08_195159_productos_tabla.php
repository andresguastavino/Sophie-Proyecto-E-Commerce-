<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductosTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('nombre');
          $table->string('imagen');
          $table->bigInteger('precio');
          $table->longText('descripcion');
          $table->integer('descuento')->default(0);
          $table->bigInteger('categoria_id')->unsigned()->index();
          $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
          $table->bigInteger('marca_id')->unsigned()->index();
          $table->foreign('marca_id')->references('id')->on('marcas')->onDelete('cascade');
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
        Schema::dropIfExists('productos');
    }
}
