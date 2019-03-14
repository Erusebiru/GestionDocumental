function vistaCliente(id){
    window.location = "/cliente/"+id ;
}

function redirigir(event){
    window.location = event.data.url;
}

function generarTablas(padre,data,ruta){

    var cabecera = obtenerCabecera(data);
    //console.log(cabecera)
    var controlDeCabecera = 0;
    var tabla = $("<table>");

    for (x in data){
        var fila = $("<tr>").attr("class","fila1");
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