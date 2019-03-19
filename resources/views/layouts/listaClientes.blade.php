<!-- resources/views/layouts/app.blade.php -->
@include('base')
@include('components.user')
<div class="container">
    <div class="row">
        <!-- Titulo  -->
        <h1>GestionDocumental/Ventas</h1>
    </div>
    <div class="row">
            {{ Breadcrumbs::render('Clientes') }}
    </div>
    <div class="row">
        <div class="col-md-12">
            <div id="filtro">
                @include('components.filtroCliente')
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            @include('data.listadoClientes')
            <br>
            {{$clientes->links()}}
        </div>
        <div class="col-md-1"></div>

        <div class="col-md-3"  id="errores"></div>

    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="container" align="center">
                <a type="button" class="btn" href="{{ URL::to('/create') }}">Nuevo Cliente</a>
            </div>
        </div>
    </div>
</div>