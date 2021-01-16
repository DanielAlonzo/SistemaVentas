<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('idcliente')->unsigned();
            $table->foreign('idcliente')->references('id')->on('clientes');
            $table->integer('idusuario')->unsigned();
            $table->foreign('idusuario')->references('id')->on('users');

        
            $table->integer('num_factura');
            $table->string('num_exonerada');
            $table->string('num_exenta');
            $table->string('num_sag');
          
            $table->dateTime('fecha_hora');
            $table->decimal('impuesto',4,2);
            
            $table->decimal('total',11,2);
            $table->string('estado');


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
        Schema::dropIfExists('ventas');
    }
}
