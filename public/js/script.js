
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


// Funcion para validar el formulario
function validarCliente(){
    
    if (($("#Nombre").val())=="" || ($("#Nombre").val())=="undefined"){
        generarErrores("El campo nombre es obligatorio.")
        return false;
    }
    if (!($("#Nombre").val().match("^[a-zç A-ZÇ À-ú]{3,30}$"))){
        generarErrores("Introduzca un nombre correcto.")
        return false;      
    }
        
    if (($("#Email").val())=="" || ($("#Email").val())=="undefined") {
        generarErrores("El campo email es obligatorio.")
        return false;
    }
    if(!($("#Email").val().match("^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$"))){
        generarErrores("Introduzca un email correcto. (correo@ejemplo.com)")
        return false;
    }
    
    if ($("#NIF_CIF").val()=="" && $("#NIF_CIF").val()==undefined){
        generarErrores("El campo DNI-NIF-CIF es obligatorio.")
        return false;
    }

    var documento = $("#NIF_CIF").val();

    if (!(validarCIFoDNI(documento))){
        generarErrores("Introduzca un DNI, NIF o CIF válido (Debe introducirse sin guión ni separación)")
        return false;        
    }
    
    if (($("#Telefono").val())=="" || ($("#Telefono").val())=="undefined"){
        generarErrores("El campo telefono es obligatorio.")
        return false;
    }
    if (!($("#Telefono").val().match("^[0-9]{9}$"))){
        generarErrores("Introduzca un número de teléfono correcto. (9 dígitos)")
        return false;
    }
    
    if(($("#Direccion").val())=="" || ($("#Direccion").val())=="undefined"){
        generarErrores("El campo direccion es obligatorio.")
        return false;
    }
    if (!($("#Direccion").val().match("^[a-zç A-ZÇ À-ú0-9',.]{5,100}$"))){
        generarErrores("Introduzca una dirección válida.")
        return false;
    }

    if (($("#Localidad").val())=="" || ($("#Localidad").val())=="undefined"){
        generarErrores("El campo localidad es obligatorio.")
        return false;
    }
    if (!($("#Localidad").val().match("^[a-zç A-ZÇ À-ú]{3,30}$"))){
        generarErrores("Introduzca una localidad válida.")
        return false;
    }
    
    if (($("#CP").val())=="" || ($("#CP").val())=="undefined"){
        generarErrores("El campo cp es obligatorio.")
        return false;
    }
    if (!($("#CP").val().match("^[0-9]{5}$"))){
        generarErrores("Introduzca un Codigo Postal válido. (5 dígitos)")
        return false;
    }

    if (($("#Provincia").val())=="" || ($("#Provincia").val())=="undefined") {
        generarErrores("El campo provincia es obligatorio.")
        return false;
    }
    if(!($("#Provincia").val().match("[a-zç A-ZÇ À-ú]{3,30}$"))){
        generarErrores("Introduzca una provincia válida. (No se admiten símbolos. La longitud del campo debe ser mayor que 3)")
        return false;
    }
    return true;
}


//Funcion para llamar a las dos validaciones y comprobar si el parametro que se pasa
//es un CIF, NIF o DNI valido
function validarCIFoDNI(documento){
    if (validarCIF(documento)==true || validarDNI(documento)==true){
        return true;
    }
    else {
        return false;
    }
}

/* Tiene que recibir el cif sin espacios ni guiones*/
function validarCIF(cif)
{
   var valueCif=cif.substr(1,cif.length-2);

   var suma=0;

   for(i=1;i<valueCif.length;i=i+2)
   {
       suma=suma+parseInt(valueCif.substr(i,1));
   }

   var suma2=0;

   for(i=0;i<valueCif.length;i=i+2)
   {
       result=parseInt(valueCif.substr(i,1))*2;
       if(String(result).length==1)
       {
           suma2=suma2+parseInt(result);
       }else{
           suma2=suma2+parseInt(String(result).substr(0,1))+parseInt(String(result).substr(1,1));
       }
   }

   suma=suma+suma2;

   var unidad=String(suma).substr(1,1)
   unidad=10-parseInt(unidad);

   var primerCaracter=cif.substr(0,1).toUpperCase();

   if(primerCaracter.match(/^[FJKNPQRSUVW]$/))
   {
       if(String.fromCharCode(64+unidad).toUpperCase()==cif.substr(cif.length-1,1).toUpperCase())
           return true;
   }else if(primerCaracter.match(/^[XYZ]$/)){
       var newcif;
       if(primerCaracter=="X")
           newcif=cif.substr(1);
       else if(primerCaracter=="Y")
           newcif="1"+cif.substr(1);
       else if(primerCaracter=="Z")
           newcif="2"+cif.substr(1);
       return validateDNI(newcif);
   }else if(primerCaracter.match(/^[ABCDEFGHLM]$/)){
       if(unidad==10)
           unidad=0;
       if(cif.substr(cif.length-1,1)==String(unidad))
           return true;
   }
   return false;
}

/*
* Tiene que recibir el dni sin espacios ni guiones
* Esta funcion es llamada
*/
function validarDNI(dni)
{
   var lockup = 'TRWAGMYFPDXBNJZSQVHLCKE';
   var valueDni=dni.substr(0,dni.length-1);
   var letra=dni.substr(dni.length-1,1).toUpperCase();

   if(lockup.charAt(valueDni % 23)==letra)
       return true;
   return false;
}