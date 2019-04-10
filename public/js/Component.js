function createLiWithSpan(parent,text,attributes){
    var li = $('<li>')
                .attr(attributes.li)
                .appendTo(parent);
    $('<span>')
        .attr(attributes.span)
        .text(text)
        .appendTo(li);
}

function createLiWithLink(parent,text,attributes){
    var li = $('<li>')
                .attr(attributes.li)
                .appendTo(parent);
    var a = $('<a>')
        .attr(attributes.a)
        .text(text)
        .appendTo(li);
}

function createPaginationLinks(data){
    $('#links').empty();
    var ul = $('<ul>').attr({'class':'pagination','role':'navigation'}).appendTo('#links');

    if (data.current_page == 1) {
        createLiWithSpan(ul,'‹‹',{'li':{'class':'page-item disabled','aria-disabled':'true','aria-label':'« Previous'},'span':{'class':'page-link','aria-label':'« Previous'}},data)
    }else {
        let previousPage = data.current_page - 1;
        createLiWithLink(ul,'‹‹',{'li':{'class':'page-item'},'a':{'href':data.path+'?page=' + previousPage,'class':'page-link'}},data)
    }

    for (var i = 1; i <= data.total; i++) {
        if(data.current_page == i){
            createLiWithSpan(ul,i,{li:{'class':'page-item active'},span:{'class':'page-link'}},data)
        }else{
            createLiWithLink(ul,i,{li:{'class':'page-item'},a:{'href':data.path + '?page=' + i ,'class':'page-link'}},data)
        }
    }

    if (data.current_page == data.last_page) {
        createLiWithSpan(ul,'››',{li:{'class':'page-item disabled'},span:{'class':'page-link'}},data)
    }else {
        let nextPage = data.current_page + 1;
        createLiWithLink(ul,'››',{li:{'class':'page-item'},a:{'href':data.path+'?page=' + nextPage,'class':'page-link'}},data)
    }
}

function getData(target,url,data) {
    $.ajax({
        url : url,
        data: data,
        beforeSend: function(){
            $(target).empty();
            $('<div class="loader"><div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>').appendTo(target);
        },
        success: function(result){
            $(target).empty();
            generarTablas(target,result.data,"/cliente/");
            createPaginationLinks(result)
        },
        error: function(result){
            return false;
            console.log('Ha ocurrido un error.');
        }
    });
}