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
        <div class="col-md-8 fila">
            <h3>Pedido</h3>
            @include('data.listadoDocumentos')
            <span class="file-input btn btn-primary btn-file">
                <input type="file">Añadir pedido
            </span>
        </div>
        <div class="col-md-8 fila">
            <h3>Albaran</h3>
            <span class="file-input btn btn-primary btn-file">
                <input type="file">Añadir albaran
            </span>
        </div>
        <div class="col-md-8 fila">
            <h3>Factura</h3>
            <span class="file-input btn btn-primary btn-file">
                <input type="file">Añadir factura
            </span>
        </div>
        <div class="col-md-8 fila">
            <h3>DocumentoY</h3>
            <span class="file-input btn btn-primary btn-file">
                <input type="file">Añadir documentoY
            </span>
        </div>
        <div class="col-md-8 fila">
            <h3>DocumentoX</h3>
            <span class="file-input btn btn-primary btn-file">
                <input type="file">Añadir documentoX
            </span>
        </div>
        <div id="subirArchivos"></div>

    <script>
		$(document).on('change', '.btn-file :file', function() {
			var file = $(this).prop('files')[0];
			if(validarPDF(file)){
				var form = $('<form action="/subirDocumento/{{ $venta->id }}" enctype="multipart/form-data" method="POST" id="subidaDocumento"></form>').appendTo("#subirArchivos");
				var csrfToken = $('meta[name="csrf-token"]').attr('content');
				form.append("<input name='_token' value='" + csrfToken + "' type='hidden'>");
				var file = $(this).prop('files')[0];
				var tipo = $(this).attr("tipo");
				crearElemento(form,"input",undefined,{"type":"hidden","name":"tipo","value":tipo});
				var newDocument = $(this).clone().appendTo(form);
				form.submit();
				$('input').hide();
			}
			
        }) 
        
        function validarPDF(file){ 
            var extension = file.name.substr(-4);
            if(extension === ".pdf") {
                return true;
            }
            else {
                generarErrores("El archivo debe estar en formato PDF");
                return false;
            }	
        }

        var ventas = {!! json_encode($venta->toArray(), JSON_HEX_TAG) !!};

        
    </script>

        </div>
        <div class="col-md-1"></div>
        <div class="col-md-3"  id="errores"></div>
    </div>
</div>