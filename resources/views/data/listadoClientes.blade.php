<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
<meta name="csrf-token" content="{{csrf_token()}}">
<style>
    .lds-spinner {
        color: black !important;
        display: inline-block;
        position: relative;
        width: 32px;
        height: 32px;
    }
    .lds-spinner div {
        transform-origin: 32px 32px;
        animation: lds-spinner 1.2s linear infinite;
        color: black !important;
    }
    .lds-spinner div:after {
    content: " ";
    display: block;
    position: absolute;
    top: 3px;
    left: 29px;
    width: 5px;
    height: 14px;
    border-radius: 20%;
    background: black;
    }
    .lds-spinner div:nth-child(1) {
    transform: rotate(0deg);
    animation-delay: -1.1s;
    }
    .lds-spinner div:nth-child(2) {
    transform: rotate(30deg);
    animation-delay: -1s;
    }
    .lds-spinner div:nth-child(3) {
    transform: rotate(60deg);
    animation-delay: -0.9s;
    }
    .lds-spinner div:nth-child(4) {
    transform: rotate(90deg);
    animation-delay: -0.8s;
    }
    .lds-spinner div:nth-child(5) {
    transform: rotate(120deg);
    animation-delay: -0.7s;
    }
    .lds-spinner div:nth-child(6) {
    transform: rotate(150deg);
    animation-delay: -0.6s;
    }
    .lds-spinner div:nth-child(7) {
    transform: rotate(180deg);
    animation-delay: -0.5s;
    }
    .lds-spinner div:nth-child(8) {
    transform: rotate(210deg);
    animation-delay: -0.4s;
    }
    .lds-spinner div:nth-child(9) {
    transform: rotate(240deg);
    animation-delay: -0.3s;
    }
    .lds-spinner div:nth-child(10) {
    transform: rotate(270deg);
    animation-delay: -0.2s;
    }
    .lds-spinner div:nth-child(11) {
    transform: rotate(300deg);
    animation-delay: -0.1s;
    }
    .lds-spinner div:nth-child(12) {
    transform: rotate(330deg);
    animation-delay: 0s;
    }
    @keyframes lds-spinner {
        0% {
            opacity: 1;
        }
        100% {
            opacity: 0;
        }
    }
    .loader{
        display: flex;
        justify-content: center;
    }
</style>

<div id="prueba"></div>

<script>

    $('#prueba').text(Math.random(1,20))

    function createLiWithSpan(parent,text,params,data){
        var li = $('<li>')
                    .attr(params.li)
                    .appendTo(parent);
        $('<span>')
            .attr(params.span)
            .text(text)
            .appendTo(li);
    }

    function createLiWithLink(parent,text,params,data){
        var li = $('<li>')
                    .attr(params.li)
                    .appendTo(parent);
        var a = $('<a>')
            .attr(params.a)
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
    
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            var page =  $(this).attr('href').split('page=')[1];
            getData('#usuarios','/api/clientes',page,{'consulta':'','page':page,"_token": "{{ csrf_token() }}"});
        });

        $(document).on('click','.filtro',function(e){
            e.preventDefault();
            var consulta = $('[name="consulta"]').val();
            getData('#usuarios','/api/clientes',1,{'consulta':consulta,'page':page,"_token": "{{ csrf_token() }}"});
        });

        $(document).on('click','.resetFiltro',function(e){
            e.preventDefault();
            getData('#usuarios','/api/clientes',1,{'consulta':'','page':page,"_token": "{{ csrf_token() }}"});
        });

        $(document).on('click','.btn.create',function(e){
            e.preventDefault();
            window.location.href = '/create';
        });
        
        var clientes = {!! json_encode($clientes, JSON_HEX_TAG) !!} ;
        generarTablas("#usuarios",clientes.data,"/cliente/");
        createPaginationLinks(clientes);

    });

    function getData(target,url,page,data) {
        $.ajax({
            url : url,
            data: data,
            beforeSend: function(){
                $(target).empty();
                $('<div class="loader"><div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>').appendTo(target);
            },
            success: function(result){
                console.log(result)
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
    </script>