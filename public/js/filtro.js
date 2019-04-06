function generarFiltro(padre,action){
    $(padre).append($('<input>').attr('type','text').attr('name','consulta'));
    $(padre).append($('<button>').attr({"class":"filtro"}).text('Filtrar'));
}