<!-- resources/views/layouts/app.blade.php -->
@include('base')
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
        <div class="col-md-12">
            <div id="filtro">
                @include('components.filtroVenta')
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            @include('data.listadoVentaCliente')
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-3"  id="errores"></div>
    </div>
    <div class="row">
        <div class="col-md-12" id="formulario">
        @include('components.formulario')
        </div>
    </div>
</div>