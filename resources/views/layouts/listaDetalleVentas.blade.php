<!-- resources/views/layouts/app.blade.php -->
@include('base')
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
            @include('data.listadoDocumentos')            
            <h3>Albaran</h3>
            
            <h3>Factura</h3>

            <h3>DocumentoY</h3>

            <h3>DocumentoX</h3>
            
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-3"  id="errores"></div>
    </div>
</div>