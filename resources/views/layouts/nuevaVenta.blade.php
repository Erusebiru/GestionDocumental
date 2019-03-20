@include('base')
@include('components.user')


<div class="container-fluid">
    <div class="row">
        <h1 class="containerfluidmargen">GestionDocumental/Ventas</h1>
    </div>
    {{ Breadcrumbs::render('Nueva_Venta',$id) }}

    <div class="row">
        <h2 class="containerfluidmargen">Nueva Venta</h2>
    </div>
    <div class="row">
        <div class="col-md-7 col-lg-7 containerfluidmargen">
        <form method="post" name="form" id="formVenta" action="{{action('ClientesController@guardarVenta')}}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="Fecha_Venta">Fecha Venta:</label>
                        <input type="date" class="form-control" name="Fecha_Venta" id="Fecha_Venta">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Descripcion">Descripcion:</label>
                        <input type="text" class="form-control" name="Descripcion" maxlength='100'>
                </div>
                <input hidden type="text" name="Id" value={{$id}}>
                <input type="submit" class="btn btn-primary" value="Crear venta">
            </form> 
        </div>
    </div>
</div>
            