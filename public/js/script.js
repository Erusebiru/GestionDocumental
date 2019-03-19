
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

    var reemplazar = $("<a>").attr("href","#").attr("class","fas fa-edit icono-margen iconoReemplazar pull-right");
    //console.log(nombre);
    reemplazar.on("click",{nombre: nombre, tipo: tipo},reemplazarVisible);
    //reemplazar.attr("data-toggle", "modal").attr("data-target", "#modalReemplazar");
    $(columnas).append(reemplazar);
    var visualizar = $("<a>").attr("href","/storage/"+nombre).attr("target","_blank").attr("class","fas fa-search icono-margen");
    $(columnas).append(visualizar);
    var download = $("<a>").attr("href","/download/"+nombre).attr("target","_blank").attr("class","fas fa-file-download icono-margen");
    $(columnas).append(download);
    $(columnas).append(formReemplazar);
    $(fila).append(columnas);
}

function reemplazarVisible(event) {
//function crearElemento(padre, tipoElemento, texto, atributos) {

    var padre = $("#reemplazarDocumento");
    var div = $("<div>").attr("class","col-md-8 falsomodal");
    var title = $("<h1>").text("Reemplazar Documento");
    var span = $("<span>").attr("class","file-input btn btn-primary btn-file").text("Seleccionar archivo...");;
    var input = $("<input>").attr("type","file").attr("tipo",event.data.tipo).attr("name","docReemplazar");
    var nombre_input = $("<input>").attr("value",event.data.nombre).prop("hidden",true);

    span.append(input);
    span.append(nombre_input);
    div.append(title);
    div.append(span);
    padre.append(div);
 };

 