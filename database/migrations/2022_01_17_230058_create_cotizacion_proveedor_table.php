<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacion_proveedor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cotizacion_id')->nullable();
            $table->unsignedBigInteger('proveedor_id')->nullable();
            

            $table->foreign('cotizacion_id')
            ->references('id')
            ->on('cotizacions')->onDelete('set null');

            $table->foreign('proveedor_id')
            ->references('id')
            ->on('proveedors')->onDelete('set null');
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
        Schema::dropIfExists('cotizacion_proveedor');
    }
}
