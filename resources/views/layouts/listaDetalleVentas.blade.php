<!-- resources/views/layouts/app.blade.php -->
@extends('base')
@include('components.user')
<div class="container">
    <div class="row">
        <!-- Titulo  -->
        <h1>GestionDocumental/Ventas</h1>
    </div>
    <div class="row">
        <h2>Detalle<!-- Pasar por POST el nombre del cliente + el id del pedido--></h2>
    </div>
    <div class="row">
        <div class="col-md-8">
            <h3>Pedido</h3>
            <table>
                <th>Nombre</th>
            </table>
            <h3>Albaran</h3>
            <table>
                <th>Nombre</th>
            </table>
            <h3>Factura</h3>
            <table>
                <th>Nombre</th>
            </table>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-3"> 
            @include('components.errores')
        </div>
    </div>
</div>