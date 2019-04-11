<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
<div>
    <br>
</div>
<div id="divNuevaVenta" class="col-md-8">
       <script>
       
            var cliente = {!! json_encode($cliente->toArray(), JSON_HEX_TAG) !!}[0] ;
            var link = $("<a>").attr("href",window.location.pathname+"/nuevaVenta/"+cliente["Id"]).text("Nueva Venta").attr("class","btn btn-primary nuevaVentaBtn");
            $("#divNuevaVenta").append(link);
       </script>
       <div class="col-md-8"><br></div>
</div>
<div id="divVentaCliente"></div>
<div id="prueba2"></div>
<script>
    var ventas = {!! json_encode($venta->toArray(), JSON_HEX_TAG) !!}['data'];
    generarTablas("#prueba2",ventas,ventas.path+"/cliente/detalle/");
</script>


    