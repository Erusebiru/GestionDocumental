
function redirigir(event){
    window.location = event.data.url;
}

function generarTablas(padre,data,ruta,iconos){
    console.log(data);
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
                    //console.log(cabecera[z])
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
                if (y=="Tipo"){
                    var tipo = data[x][y];
                }
           }
            // Fin Cuerpo
        }
        if (iconos=="Si"){

            generarIconos(fila,data[x]["Ruta"],tipo);    
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

function generarIconos(fila,nombre,tipo){
    
    var columnas = $("<td>");
    var input = $("<input>").attr("type","file").attr("name",nombre).attr("tipo",tipo).prop('hidden', true);;
    var formReemplazar = $("<span>").attr("class","reemplazarFile file-input");
    $(formReemplazar).append(input);

    var reemplazar = $("<i>").attr("class","fas fa-edit icono-margen iconoReemplazar");
    //console.log(nombre);
    reemplazar.on("click", inputVisible(nombre));
    $(columnas).append(reemplazar);
    var search = $("<a>").attr("href","/storage/"+nombre).attr("target","_blank").attr("class","fas fa-search icono-margen");
    $(columnas).append(search);
    var download = $("<a>").attr("href","/download/"+nombre).attr("target","_blank").attr("class","fas fa-file-download icono-margen");
    $(columnas).append(download);
    $(columnas).append(formReemplazar);
    $(fila).append(columnas);
}

function inputVisible(nombre) {
    console.log("hola");
    //$("input[name='"+nombre+"']").prop('hidden', false);
 };