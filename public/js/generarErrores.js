

function tiempoErrores(){
	setTimeout(eliminarErrores,10000);
}

function eliminarErrores(){
	var divErrores = $("#errores").children();
	var NumHijos = divErrores.length;
	if (NumHijos >0){
		$(".error").remove();
	}
}

function generarErrores(error){
	var divError = $("<div>").attr('class','error row');
	var div1 = $("<div>").text(error).attr('class','col m8');
	var div2 = $("<div>").attr('class','col m4');
	var icon = $("<i>").attr('class','fas fa-exclamation-triangle');
	$(divError).append(div1);
	$(div2).append(icon);
	$(divError).append(div2);
	$("#errores").append(divError);
	tiempoErrores();
}