<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
var venta = {!! json_encode($venta->toArray(), JSON_HEX_TAG) !!} ;
    if (venta.length==0){
        $("#ventas").append($("<tr>").text("Este cliente no tiene ventas aun"));
    }
</script>