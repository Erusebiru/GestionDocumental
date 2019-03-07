<!-- resources/views/layouts/app.blade.php -->
@extends('base')
@include('components.user')
<div class="container">
    <div class="row">
        <!-- Titulo  -->
        <h1>GestionDocumental/Ventas</h1>
    </div>
    <div class="row">
        <h2>Clientes</h2>
    </div>
    <div class="row">
        <div class="col-md-8">
            @include('data.listadoClientes')
            <br><br>
        </div>
        <div class="col-md-1"></div>

        <div class="col-md-3"  id="errores">
            @include('components.errores')
        </div>

    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="container" align="center">
                <a type="button" class="btn" href="{{ URL::to('/create') }}">Nuevo Cliente</a>
            </div>
        </div>
    </div>
</div>