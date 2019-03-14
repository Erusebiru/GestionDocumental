<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>	


<div id="Pedido"></div>
<div id="Albaran"></div>
<div id="Factura"></div>
<div id="DocumentoY"></div>
<div id="DocumentoX"></div>

<script>
    var Documento = {!! json_encode($DocumentosA->toArray(), JSON_HEX_TAG) !!} ;
    console.log(Albaran)
    generarTablas("#Pedido",Pedido); 
    generarTablas("#Albaran",Albaran); 
    generarTablas("#Factura",Factura); 
    generarTablas("#DocumentoY",DocumentoY); 
    generarTablas("#DocumentoX",DocumentoX); 

</script>