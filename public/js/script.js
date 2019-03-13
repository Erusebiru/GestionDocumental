
/* 	funcion para visualizar datos en forma de tabla
    nombreColumnas sera una lista con el nombre de las columnas;
	padre sera la referencia al lugar/elemento donde se creara el elemento;
	listaDatos sera una lista de datos;
    iconos será una lista de imagenes;
*/

//en un futuro habra que cambiar el Id_cliente de bbdd por ID para que esta funcion pueda ser mas generica
/*function visualizarDatos(nombreColumnas, padre, listaDatos, iconos){	
    var tabla = "<table>";
	
    for(nombre in nombreColumnas){
	    tabla += "<th>"+nombreColumnas[nombre]+"</th>";
	}

    for (data in listaDatos){
        tabla += "<tr class='fila' onclick='vistaCliente("+listaDatos[data].Id+")'>";
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
}*/

function redirigir(event){
    window.location = event.data.url;
}

function generarTablas(padre,data,ruta,iconos){

    var cabecera = obtenerCabecera(data);
    //console.log(cabecera)
    var controlDeCabecera = 0;
    var tabla = $("<table>");

    for (x in data){
        var fila = $("<tr>").attr("class","fila");
        for(y in data[x]){
            //console.log(data[x][y]);
            // Generar cabecera de la tabla de datos
            if(controlDeCabecera==0){
                //console.log(cabecera)
                for(z in cabecera){
                    //console.log(z)
                    $(tabla).append($("<th>").text(cabecera[z]))
                }

                controlDeCabecera++;
            }
            // Fin de la cabecera
            // Cuerpo
            if (y=="Id" && ruta!=undefined){
                $(fila).on("click",{url: ruta+data[x][y]},redirigir);
            }
            $(fila).append($("<td>").text(data[x][y]))
            // Fin Cuerpo
        }
        /*if (iconos=="Si"){
            generarIconos(fila);    
        }*/
        $(tabla).append(fila);
    }
    $(padre).append(tabla)
}

function obtenerCabecera(data){
    
    var cabecera =[];

    for (x in data[0]){
        cabecera.push(x)
    }
    return cabecera;
}

/*
function generarIconos(fila){
    
    var columnas = $("<td>");
    $(columnas).append($("<i>").attr("class","fas fa-edit icono-margen"));
    $(columnas).append($("<i>").attr("class","fas fa-search icono-margen"));
    $(fila).append(columnas);
}
*/