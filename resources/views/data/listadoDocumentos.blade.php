<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>	


<div id="prueba3"></div>
<script>
    var Albaran = {!! json_encode($DocumentosA->toArray(), JSON_HEX_TAG) !!} ;
    console.log(Albaran)
    generarTablas("#prueba3",Albaran,undefined,"Si");

    

</script>