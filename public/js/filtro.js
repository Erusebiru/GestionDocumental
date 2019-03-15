function generarFiltro(padre,action){
    var formulario = $('<form>');
    $(formulario).attr('action',action).attr('method',post);
    var csrf = $('meta[name="csrf-token"]').attr('content');
    $(formulario).append($('<input>').attr('type','hidden').attr('name','_token').attr('value',csrf));
    $(formulario).append($('<input>').attr('type','text').attr('name','consulta'));
    $(formulario).append($('<button>').attr('type','submit').text('Filtrar'));
    $(padre).append(formulario);
}