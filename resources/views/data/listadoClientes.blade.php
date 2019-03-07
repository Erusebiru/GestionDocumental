<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>	


<div id="divClientes"></div>
<script>
    var clientes = {!! json_encode($clientes->toArray(), JSON_HEX_TAG) !!} ;

    crearListaClientes(clientes);

    function crearListaClientes(datos){
	var nombreColumnas = ['ID','Nombre', 'CIF/NIF', 'Codigo Postal'];
	var padre = '#divClientes';
	
	visualizarDatos(nombreColumnas, padre, clientes, undefined);
    }
    

</script>