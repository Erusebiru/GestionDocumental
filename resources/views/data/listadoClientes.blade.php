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

<div id="divClientes"></div>
<div id="prueba"></div>

<script>
    $('#prueba').text(Math.random(1,20))

    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            } else {
                //getPosts(page);
            }
        }
    });

    function createPaginationLinks(data){
        var pagination_links = '<ul class="pagination" role="navigation">';

        if (data.current_page == 1) {
            pagination_links = pagination_links + '<li class="page-item disabled" aria-disabled="true" aria-label="« Previous"><span class="page-link">&laquo;</span></li>';
        }else {
            pagination_links = pagination_links + '<li class="page-item"><a href="'+ data.path +'?page=1" rel="prev" class="page-link"><span >&laquo;</span></a></li>';
        }

        var activeLink;
        for (var i = 1; i <= data.total; i++) {

            if(data.current_page == i){
                activeLink = 'class="page-item active"';
            }else{
                activeLink = 'class="page-item"';
            }

            pagination_links = pagination_links + '<li '+ activeLink +'><a href="'+ data.path +'?page='+ i +'" class="page-link">'+ i +'</a></li>';
        }

        if (data.current_page == data.last_page) {
            pagination_links = pagination_links + '<li class="page-item disabled"><span class="page-link">&raquo;</span></li>';
        }else {
            pagination_links = pagination_links + '<li class="page-item"><a href="'+ data.path +'?page='+ data.last_page +'" rel="next"><span class="page-link">&raquo;</span></a></li>';
        }

        pagination_links = pagination_links + '</ul>';
        $('#links').html(pagination_links);
    }
    
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            var page =  $(this).attr('href').split('page=')[1];
            getData('/',page,'get');
        });

        $(document).on('click','.filtro',function(e){
            e.preventDefault();
            getData('/',undefined,'post');

        });

        $(document).on('click','.btn.create',function(e){
            e.preventDefault();
            window.location.href = '/create';
        });

        
        var numPagina = 1;
        getData('/',numPagina,'get');
    });

    function getData(url,page,method) {
        var consulta = $('[name="consulta"]').val();

        if(page === undefined){
            page = location.hash.split('#')[1]
        }

        $.ajax({
            url : url + '#' + page,
            data: {'consulta':consulta,'page':page,"_token": "{{ csrf_token() }}"},
            beforeSend: function(){
                $('#usuarios').empty();
                $('<div class="loader"><div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>').appendTo('#usuarios');
            },
            success: function(result){
                location.hash = page;
                
                $('#usuarios').empty();
                generarTablas("#usuarios",result.data,"/cliente/");

                createPaginationLinks(result)
                
            },
            error: function(result){
                return false;
                alert('Posts could not be loaded.');
            }
        });
    }
    </script>