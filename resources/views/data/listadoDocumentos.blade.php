<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>	
 
    <div class="col-md-8">
        <h3>Pedido</h3>
        <span class="file-input btn btn-primary btn-file">
            <input name="documento" tipo="Pedido" type="file">Añadir pedido
        </span>
        <div id="Pedido"></div>
        <script>
            var Pedido = {!! json_encode($DocumentosP->toArray(), JSON_HEX_TAG) !!} ;
            generarTablas("#Pedido",Pedido, undefined ,"Si");
        </script>
    </div>

    <div class="col-md-8">
        <h3>Albaran</h3>
        <span class="file-input btn btn-primary btn-file">
            <input name="documento" tipo="Albaran" type="file">Añadir albaran
        </span>
        <div id="Albaran"></div>
        <script>
            var Albaran = {!! json_encode($DocumentosA->toArray(), JSON_HEX_TAG) !!} ;
            generarTablas("#Albaran",Albaran, undefined ,"Si");
        </script>
    </div>

    <div class="col-md-8">
        <h3>Factura</h3>
        <span class="file-input btn btn-primary btn-file">
            <input name="documento" tipo="Factura" type="file">Añadir factura
        </span>
        <div id="Factura"></div>
        <script>
            var Factura = {!! json_encode($DocumentosF->toArray(), JSON_HEX_TAG) !!} ;
            generarTablas("#Factura",Factura, undefined ,"Si");
        </script>
    </div>

    <div class="col-md-8">
        <h3>DocumentoY</h3>
        <span class="file-input btn btn-primary btn-file">
            <input name="documento" tipo="DocumentoY" type="file">Añadir documentoY
        </span>
        <div id="DocumentoY"></div>
        <script>
            var DocumentoY = {!! json_encode($DocumentosY->toArray(), JSON_HEX_TAG) !!} ;
            generarTablas("#DocumentoY",DocumentoY, undefined ,"Si");
        </script>
    </div>

    <div class="col-md-8">
        <h3>DocumentoX</h3>
        <span class="file-input btn btn-primary btn-file">
            <input name="documento" tipo="DocumentoX" type="file">Añadir documentoX
        </span>
        <div id="DocumentoX"></div>
        <script>
            var DocumentoX = {!! json_encode($DocumentosX->toArray(), JSON_HEX_TAG) !!} ;
            generarTablas("#DocumentoX",DocumentoX, undefined ,"Si");
        </script>
        </div>   
    </div>

    <!-- divs utilizados para subir / reemplazar archivos -->
    <div id="subirArchivos"></div>
    <div id="reemplazarArchivo"></div>
    
    <!-- div utilizado para el componente de visualizacion de errores -->
    <div class="col-md-3"  id="errores"></div>
        
    </div>

   <script>
       //Recoge los datos de $venta y los convierte en un array
        var venta = {!! json_encode($venta->toArray(), JSON_HEX_TAG) !!} ;

        /* Al cambiar el input de clase btn-file nos recoge el nuevo archivo y 
        los datos necesarios en un nuevo formulario y los pasa a la ruta para 
        guardar el nuevo archivo. */
        $(document).on('change', '.btn-file :file', function() {
            var file = $(this).prop('files')[0];
            if(validarPDF(file)){
                var form = $('<form action="/subirDocumento/{{ $venta->Id }}" enctype="multipart/form-data" method="POST" id="subidaDocumento"></form>').appendTo("#subirArchivos");
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                form.append("<input name='_token' value='" + csrfToken + "' type='hidden'>");
                var file = $(this).prop('files')[0];
                var tipo = $(this).attr("tipo");
                crearElemento(form,"input",undefined,{"type":"hidden","name":"tipo","value":tipo});
                var newDocument = $(this).clone().appendTo(form);
                form.submit();
                $('input').hide();
            }
            else {
                generarErrores("El archivo debe estar en formato PDF");
            }   
        }) 

        /*Al cambiar el input de reemplazar archivo recoge el nuevo archivo para poder
        hacer la inserción y también recoge los datos necesarios en un nuevo formulario
        para poder eliminar el archivo antiguo (nombre antiguo, tipo, id de cliente...)
        y pasa estos datos a la ruta de reemplazar archivo con estos parametros */
        $(document).on('change', '.reemplazarFile :file', function() {
            var file = $(this).prop('files')[0];
            if(validarPDF(file)){
                var tipo = $(this).attr("tipo");
                var nombreAntiguo = $("input[name=nombreDocReemplazar]").val();
                var form = $('<form action="/reemplazarDocumento/{{ $venta->Id }}/'+tipo+'/'+nombreAntiguo+'" enctype="multipart/form-data" method="POST" id="reemplazarDocumento"></form>').appendTo("#reemplazarArchivo");
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                form.append("<input name='_token' value='" + csrfToken + "' type='hidden'>");
                var file = $(this).prop('files')[0];
                crearElemento(form,"input",undefined,{"type":"hidden","name":"tipo","value":tipo});
                var newDocument = $(this).clone().appendTo(form);
                form.submit();
                $('input').hide();
            }
            else {
                generarErrores("El archivo debe estar en formato PDF");
            }   
        }) 
        
        //funcion que recibe un archivo y valida si su extensión es .pdf
        function validarPDF(file){ 
            var extension = file.name.substr(-4);
            if(extension === ".pdf") {
                return true;
            }
            else {
                return false;
            }   
        }


        
    </script>
