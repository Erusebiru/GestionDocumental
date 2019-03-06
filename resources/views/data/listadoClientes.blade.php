<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class="aquimismo"></div>
<script>
    var clientes = {!! json_encode($clientes->toArray(), JSON_HEX_TAG) !!} ;

    /*for (var i=0; i<clientes.length; i++){
        var tr = $("<tr>").append($("<td>").text(clientes[i].Nombre));
        tr.append($("<td>").text(clientes[i].NIF_CIF));
        tr.append($("<td>").text(clientes[i].CP));
        tr.appendTo($("table[name=listadeclientes]"));
    }*/

    probarComponente(clientes);

    function probarComponente(datos){
	var nombreColumnas = ['Nombre', 'NIF_CIF', 'CP'];
	var padre = '#aquimismo';
	
	visualizarDatos(nombreColumnas, padre, clientes, undefined);
	}


/* 	funcion para visualizar datos en forma de tabla
    nombreColumnas sera una lista con el nombre de las columnas;
	padre sera la referencia al lugar/elemento donde se creara el elemento;
	listaDatos sera una lista de datos;
    iconos será una lista de imagenes;
*/
function visualizarDatos(nombreColumnas, padre, listaDatos, iconos){
	var num_columnas = nombreColumnas.lenght;
	
    var tabla = "<table>";
	
    for(nombre in nombreColumnas){
	    tabla += "<th>"+nombreColumnas[nombre]+"</th>";
	}

    /*for (data in listaDatos){
        //console.log(listaDatos[data]);
        for (x in listaDatos[data]){
            console.log(listaDatos[data][x])
        } 
    }*/

    for (data in listaDatos){
        for (x in listaDatos[data]){
            tabla += "<tr>";
            tabla += "<td>"+listaDatos[data][x]+"</td>";
            console.log(listaDatos[data][x])
            if (iconos != undefined && iconos != ""){
                iconos.forEach(function(icono){
                    tabla += "<td>"+icono+"</td>";
                })
            }
        } 
        tabla += "</tr>";
    } 
    tabla += "</table>";       
	$(padre).append(tabla);
}
    </script>



    </script>

