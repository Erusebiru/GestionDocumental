
@include('base')
@include('components.user')
<div class="container-fluid">
    <div class="row">
        <h1 class="containerfluidmargen">GestionDocumental/Ventas</h1>
    </div>
    {{ Breadcrumbs::render('Nuevo_Cliente') }}
    <div class="row">
        <h2 class="containerfluidmargen">Nuevo Cliente</h2>
    </div>
    <div class="row">
        <div class="col-md-7 col-lg-7 containerfluidmargen">
            <form method="post" name="form" id="formCliente" action="{{action('ClientesController@guardarCliente')}}">

                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" name="Nombre" id="Nombre">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="Email" id="Email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nifcif">NIF/CIF:</label>
                        <input type="text" class="form-control" name="NIF_CIF" id="NIF_CIF">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="telefono">Teléfono:</label>
                        <input type="text" class="form-control" name="Telefono" id="Telefono">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="direccion">Dirección:</label>
                        <input type="text" class="form-control" name="Direccion" id="Direccion">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="localidad">Localidad:</label>
                        <input type="text" class="form-control" name="Localidad" id="Localidad">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="cp">Código Postal:</label>
                        <input type="text" class="form-control" name="CP" id="CP">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="provincia">Provincia:</label>
                        <input type="text" class="form-control" name="Provincia" id="Provincia">
                    </div>
                </div>
            </form>
                <div class="row">
                    <div class="col-md-6">
                        <a type="button" class="btn btn-dark" href="{{ URL::to('/') }}">Cancelar</a>
                    </div>
                    <div class="col-md-3 text-right">
                        <button onclick="validarFormulario()" class="btn btn-dark">Guardar</button>
                    </div>
                </div>
            
            </div>
            <div class="col-md-4"  id="errores"></div>
        </div>
        
    </div>
    
    <script type="text/javascript">
    function validarFormulario(){
        if (validarCliente()==true){
            $("#formCliente").submit();
        }
    }
    </script>

</body>
</html>