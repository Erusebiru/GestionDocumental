<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>	


<div id="divClientes"></div>
<div id="prueba"></div>
<script>
    var clientes = {!! json_encode($clientes->toArray(), JSON_HEX_TAG) !!} ;
    generarTablas("#prueba",clientes,"/cliente/");
  

</script>