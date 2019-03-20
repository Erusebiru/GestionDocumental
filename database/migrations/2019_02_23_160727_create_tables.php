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
            $table->increments('Id')->unique();
            $table->string('Nombre',20);
            $table->string('Email');
            $table->string('NIF_CIF',9);
            $table->integer('Telefono')->unsigned();           
            $table->string('Direccion');
            $table->string('Localidad');
            $table->integer('CP')->unsigned();
            $table->string('Provincia');
            $table->timestamps();
        });

        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('Id')->unique();
            $table->string('Nombre',20);
            $table->string('Contraseña');
            $table->string('Email');
            $table->string('Tipo_usuario');            
            $table->timestamps();
            
        });

        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('Id')->unique();
            $table->date('Fecha_venta');
            $table->string('Estado');
            $table->timestamps();
            $table->integer('Cliente')->unsigned(); 
            $table->foreign('Cliente')->references('Id')->on('clientes');        
        });

        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('Id')->unique();
            $table->string('Tipo');
            $table->integer('Num_venta')->unsigned();
            $table->string('Nombre');
            $table->string('Descripcion');
            $table->foreign('Num_venta')->references('Id')->on('ventas');
            $table->string('Ruta');
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
        Schema::dropIfExists('documentos');
        Schema::dropIfExists('ventas');
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('usuarios');
        
    }
}
