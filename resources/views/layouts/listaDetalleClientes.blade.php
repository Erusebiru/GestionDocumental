<!-- resources/views/layouts/app.blade.php -->
@include('base')
@include('components.user')
<div class="container">
    <div class="row">
        <h1>GestionDocumental/Ventas</h1>
    </div>
    <div class="row">
        <h2>Detalle</h2>
    </div>
    {{ Breadcrumbs::render('Detalle_Cliente',$cliente[0]['Id']) }}
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
            <br>
            <div id="links">
                {{$venta->links()}}
            </div>
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