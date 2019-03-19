<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/filtro.js') }}"></script>

<script>
    var cliente = {!! json_encode($cliente->toArray(), JSON_HEX_TAG) !!} ;
    var Id = cliente[0]['Id'];
    generarFiltro('#filtro','/cliente/'+Id)
</script>