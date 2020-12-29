<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('idventa')->unsigned();
            $table->foreign('idventa')->references('id')->on('ventas')->onDelete('cascade');
            $table->integer('idarticulo')->unsigned();
            $table->foreign('idarticulo')->references('id')->on('articulos');

            $table->integer('cantidad');
            $table->decimal('precio',11,2);
            $table->integer('idDescuento')->unsigned();
            $table->foreign('idDescuento')->references('id')->on('descuentos_rebajas');
            $table->decimal('exonerado',11,2);
            $table->decimal('exento',11,2);
            $table->decimal('gravado_quince',11,2);
            $table->decimal('gravado_dieciocho',11,2);




           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_ventas');
    }
}
