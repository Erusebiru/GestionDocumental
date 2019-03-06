<!-- resources/views/layouts/app.blade.php -->
@extends('base')
@include('components.user')
<div class="container">
    <div class="row">
        <!-- Titulo  -->
        <h1>GestionDocumental/Ventas</h1>
    </div>
    <div class="row">
        <h2>Detalle<!-- Pasar por POST el nombre del cliente--></h2>
    </div>
    <div class="row">
        <div class="col-md-12" id="formulario">
        @include('components.formulario')
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <table id="ventas">
                <th>ID</th>
                <th>Fecha de creacion</th>
                <th>Estado</th>
            </table>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-3"  id="errores">
            @include('components.errores')
        </div>
    </div>
</div>