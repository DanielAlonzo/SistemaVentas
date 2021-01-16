<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idcategoria')->unsigned();//llave foranea
            $table->string('codigo',50)->unique();//para codigo de barras
            $table->string('nombre',100)->unique();
            $table->decimal('costo',11,2);
            $table->decimal('precio',11,2);
            $table->integer('stock');
            $table->integer('tipodescuento')->unsigned();
            $table->boolean('isv');
            $table->integer('tipoisv')->unsigned();
            $table->string('descripcion',256)->nullable();
            $table->boolean('estado')->default(1);
            $table->timestamps();

            //relaciones
            $table->foreign('idcategoria')->references('id')->on('categorias');
            $table->foreign('tipoisv')->references('id')->on('isv');
            $table->foreign('tipodescuento')->references('id')->on('descuentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos');
    }
}
