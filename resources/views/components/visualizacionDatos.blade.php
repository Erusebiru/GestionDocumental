<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>


function probarComponente(clientes){
	var nombreColumnas = ['Nombre', 'NIF/CIF', 'CP'];
	var padre = '';
	
	for (var cliente in clientes) {
		var enlace = '/cliente/'+clientes[cliente]["id"];

		
		printLista(nombreColumnas, padre, clientes[cliente], undefined);
	}
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
    tabla += "<tr>";
	for(nombre in nombreColumnas){
	    tabla += "<td>"+nombreColumnas[nombre]+"</td>";
	}
    for (dato in listaDatos){
        tabla += "<td>"+listaDatos[dato]+"</td>";
        if (iconos != undefined && iconos != ""){
            iconos.forEach(function(icono){
                tabla += "<td>"+icono+"</td>";
            })
        }
        tabla += "</td>";
    }
	tabla += "</table>"

	$(padre).append(tabla);
}
    </script>


