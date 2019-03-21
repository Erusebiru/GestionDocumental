
function redirigir(event){
    window.location = event.data.url;
}

function generarTablas(padre,data,ruta,iconos){
    console.log(data);
    var cabecera = obtenerCabecera(data);
    //console.log(cabecera)
    var controlDeCabecera = 0;
    var tabla = $("<table>").attr("class","table");
    var thead = $("<thead>").attr("class","thead-dark");
    $(tabla).append(thead);
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
                        $(thead).append($("<th>").text(cabecera[z]))
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
            $(thead).append($("<th>").text(" "));
            generarIconos(fila,data[x]["Ruta"],tipo,data[x]["Nombre"]);    
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

function generarIconos(fila,nombre,tipo,nombreReal){
    
    var columnas = $("<td>");
    var input = $("<input>").attr("type","file").attr("name",nombre).attr("tipo",tipo).prop('hidden', true);;
    var formReemplazar = $("<span>").attr("class","reemplazarFile file-input");
    $(formReemplazar).append(input);

    var reemplazar = $("<a>").attr("href","#").attr("class","fas fa-edit icono-margen iconoReemplazar pull-right").attr("name","iconoReemplazar");
    //console.log(nombre);
    reemplazar.on("click",{nombre: nombre, tipo: tipo},reemplazarVisible);
    //reemplazar.attr("data-toggle", "modal").attr("data-target", "#modalReemplazar");
    $(columnas).append(reemplazar);
    var visualizar = $("<a>").attr("href","/storage/"+nombre).attr("target","_blank").attr("class","fas fa-search icono-margen");
    $(columnas).append(visualizar);
    var download = $("<a>").attr("href","/download/"+nombre+"/"+nombreReal).attr("target","_blank").attr("class","fas fa-file-download icono-margen");
    $(columnas).append(download);
    $(columnas).append(formReemplazar);
    $(fila).append(columnas);
}

/*Función que crea un nuevo div para reemplazar el documento indicado.
Dentro del div crearemos dos input, uno con el tipo del documento indicado
de tipo file, con el que seleccionaremos el nuevo documento para substituir,
y otro oculto donde guardaremos el valor de la ruta del antiguo documento
para así poder borrarlo más tarde. */
function reemplazarVisible(event) {
    eliminar();
    var padre = $("#reemplazarDocumento");
    var div = $("<div>").attr("class","col-md-8 falsomodal");
    var cerrar = $("<span>").text("x").attr("class","cerrarModal").attr("align","right").on("click",eliminar);
    var title = $("<h1>").text("Reemplazar Documento").attr("class","titulomodal").attr("align","center");
    var span = $("<span>").attr("class","file-input btn btn-primary reemplazarFile").attr("align","center");
    var input = $("<input>").attr("type","file").attr("tipo",event.data.tipo).attr("name","docReemplazar").attr("align","center").attr("class","elementModal");
    var nombre_input = $("<input>").attr("value",event.data.nombre).attr("name","nombreDocReemplazar").prop("hidden",true).attr("align","center");
    span.append(input);
    span.append(nombre_input);
    div.append(cerrar);
    div.append(title);
    div.append(span);
    padre.append(div);
 };

 function eliminar() {
    $(".falsomodal").remove();
 }