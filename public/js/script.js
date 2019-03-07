
/* 	funcion para visualizar datos en forma de tabla
    nombreColumnas sera una lista con el nombre de las columnas;
	padre sera la referencia al lugar/elemento donde se creara el elemento;
	listaDatos sera una lista de datos;
    iconos será una lista de imagenes;
*/

//en un futuro habra que cambiar el Id_cliente de bbdd por ID para que esta funcion pueda ser mas generica
function visualizarDatos(nombreColumnas, padre, listaDatos, iconos){	
    var tabla = "<table>";
	
    for(nombre in nombreColumnas){
	    tabla += "<th>"+nombreColumnas[nombre]+"</th>";
	}

    for (data in listaDatos){
        tabla += "<tr class='fila' onclick='vistaCliente("+listaDatos[data].Id_cliente+")'>";
        for (x in listaDatos[data]){
            tabla += "<td>"+listaDatos[data][x]+"</td>";
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

function vistaCliente(id){
    window.location = "/cliente/"+id ;
}

function visualizarDatos2(nombreColumnas, padre, listaDatos, iconos){	
    var tabla = "<table>";
	
    for(nombre in nombreColumnas){
	    tabla += "<th>"+nombreColumnas[nombre]+"</th>";
	}

    for (data in listaDatos){
        tabla += "<tr class='fila'>";
        for (x in listaDatos[data]){
            tabla += "<td>"+listaDatos[data][x]+"</td>";
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
