
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
                    console.log(cabecera[z])
                    if (cabecera[z] != "Ruta"){
                        $(tabla).append($("<th>").text(cabecera[z]))
                    }
                }

                controlDeCabecera++;
            }
            // Fin de la cabecera
            // Cuerpo
            if (y=="Id" && ruta!=undefined){
                $(fila).on("click",{url: ruta+data[x][y]},redirigir);
            }
           if( y!="Ruta" ) {
                $(fila).append($("<td>").text(data[x][y]))
           }
            // Fin Cuerpo
        }
        if (iconos=="Si"){

            generarIconos(fila,data[x]["Ruta"]);    
        }
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

function crearElemento(padre, tipoElemento, texto, atributos) {
    if(atributos===undefined || atributos===null){
        atributos={};
    }
    var nuevoElemento = $('<'+tipoElemento+'>').attr(atributos);

    if (texto===undefined || texto===null || texto == ""){
        nuevoElemento.appendTo(padre);
    }
    else {
        nuevoElemento.text(texto).appendTo(padre);
    }
    return nuevoElemento;
}

function generarIconos(fila,id){
    
    var columnas = $("<td>");
    $(columnas).append($("<i>").attr("class","fas fa-edit icono-margen"));
    var search = $("<a>").attr("href","/storage/"+id).attr("target","_blank").attr("class","fas fa-search icono-margen");
    $(columnas).append(search);
    //$(columnas).append($("<i>").attr("class","fas fa-search icono-margen"));
    $(columnas).append($("<i>").attr("class","fas fa-file-download icono-margen"));
    $(fila).append(columnas);
    //<a target="_blank" href="{{asset('files/nombreDeTuPdf.pdf')}}">
    //{{action('ClientesController@guardarCliente')}}
}   //Route::get('/documentos/{id}','DocumentosController@vistaDocumento');
