@extends('base')
@include('components.user')
<div class="container">
    <div class="row">
        <h1>GestionDocumental/Ventas</h1>
    </div>
    <div class="row">
        <h2>Nuevo Cliente</h2>
    </div>
    <div class="row">
        <div class="col-md-10 col-lg-10">
            <form method="post" name=form id=form action="{{action('ClientesController@guardarCliente')}}">

                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nifcif">NIF/CIF:</label>
                        <input type="text" class="form-control" name="nifcif" id="nifcif">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="telefono">Teléfono:</label>
                        <input type="text" class="form-control" name="telefono" id="telefono">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="direccion">Dirección:</label>
                        <input type="text" class="form-control" name="direccion" id="direccion">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="localidad">Localidad:</label>
                        <input type="text" class="form-control" name="localidad" id="localidad">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="cp">Código Postal:</label>
                        <input type="text" class="form-control" name="cp" id="cp">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="provincia">Provincia:</label>
                        <input type="text" class="form-control" name="provincia" id="provincia">
                    </div>
                </div>
               
                <div class="row">

                    <div class="col-md-6">
                        <a type="button" class="btn btn-dark" href="{{ URL::to('/') }}">Cancelar</a>

                    </div>
                    <div class="col-md-6 text-right">
                        <button type="submit" class="btn btn-dark">Guardar</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-1 col-lg-1"></div> 
		</div>
	</div>
	<script type="text/javascript">
		$(function() {
			checkForm("#form");
		});
	</script>
</body>
</html>