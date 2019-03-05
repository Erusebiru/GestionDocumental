<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    var clientes = {!! json_encode($clientes->toArray(), JSON_HEX_TAG) !!} ;

    for (var i=0; i<clientes.length; i++){
        var tr = $("<tr>").append($("<td>").text(clientes[i].Nombre));
        tr.append($("<td>").text(clientes[i].NIF_CIF));
        tr.append($("<td>").text(clientes[i].CP));
        tr.appendTo($("table[name=listadeclientes]"));
    }
    </script>

