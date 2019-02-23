<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('Id_cliente')->unique();
            $table->date('Fecha_modificacion');
            $table->string('Nombre',20);
            $table->string('Email');
            $table->string('NIF_CIF',9);
            $table->integer('Telefono')->unsigned()->length(9);           
            $table->string('Direccion')->nullable();
            $table->string('Localidad')->nullable();
            $table->integer('CP')->unsigned()->length(5);
            $table->string('Provincia')->nullable();
            $table->timestamps();
        });

        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('Id_usuario')->unique();
            $table->string('Nombre',20);
            $table->string('Contraseña');
            $table->string('Email');
            $table->string('Tipo_usuario');            
            $table->timestamps();
            
        });

        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('Id_venta')->unique();
            $table->date('Fecha_venta');
            $table->string('Estado');
            $table->timestamps();
            $table->integer('Cliente')->unsigned(); 
            $table->foreign('Cliente')->references('Id_cliente')->on('clientes');        
        });

        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('Id_documento')->unique();
            $table->string('Tipo');
            $table->integer('Num_venta')->unsigned();
            $table->date('Fecha_subida');
            $table->string('Estado');
            $table->date('Fecha_aprovacion')->nullable();
            $table->foreign('Num_venta')->references('Id_venta')->on('ventas');
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('documentos');
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('ventas');
    }
}
