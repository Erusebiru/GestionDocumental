<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/validaciones.js') }}"></script>

<form name="form" method="post" id="form">
    @csrf <!-- {{ csrf_field() }} -->
</form>
<script>

    var cliente = {!! json_encode($cliente->toArray(), JSON_HEX_TAG) !!};
    for (var i = 0; i < cliente.length; i++){
    var obj = cliente[i];
    var num = 0;
    var form = $("<form>").attr("method","post").attr("name","form").attr("id","formModificarCliente").attr("action","/cliente/guardaCambios/",cliente[i].Id);
    var control = 0;
    for (var key in obj){
        if(control == 0){
            var form = $("#form");
            $(form).attr("action","/cliente/guardarCambios/"+obj[key]);
            control = 1;
        }else{
            if(num%2==0){
                var linia = $("<div>").attr("class","row");
            }
            var seccion = $("<div>").attr("class","col-md-6");
            var etiqueta = $("<label>").attr("for",key).text(key);
            if (key == "Telefono" || key == "CP"){
                var data = $("<input>").attr("type","number").attr("name",key).attr("id",key).attr("class","form-control").attr("value",obj[key]);
            }else{
                var data = $("<input>").attr("type","text").attr("name",key).attr("id",key).attr("class","form-control").attr("value",obj[key]);
            }
            $(seccion).append(etiqueta);
            $(seccion).append(data);
            $(linia).append(seccion)
            num++;
            if(num%2==0){
                $(form).append(linia);
            }
        }
    }
    var boton = $("<button>").attr('onclick','validarFormulario();return false;').text("Guardar cambios");
    $(form).append(boton);
    $("#formulario").append(form);
}

function validarFormulario(){
        if (validarCliente()==true){
            submit();
        }
    }
</script>