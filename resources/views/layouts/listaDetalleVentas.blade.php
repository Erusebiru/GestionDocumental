<!-- resources/views/layouts/app.blade.php -->
@include('base')
@include('components.user')
<div class="container-fluid">
    <div class="row">
        <!-- Titulo  -->
        <h1 class="containerfluidmargen">GestionDocumental/Ventas</h1>
    </div>
    <div class="row">
        <h2 class="containerfluidmargen">Detalle<!-- Pasar por POST el nombre del cliente + el id del pedido--></h2>
    </div>
    {{ Breadcrumbs::render('Venta',$venta['Cliente'],$venta['Id'] ) }}
    
    <div class="row">

        <div class="col-md-8 containerfluidmargen">
            @include('data.listadoDocumentos')            
            
        </div>
        <div class="col-md-1 containerfluidmargen"></div>
        <div class="col-md-3 containerfluidmargen"  id="errores"></div>
    </div>
</div>