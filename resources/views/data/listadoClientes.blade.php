<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
<meta name="csrf-token" content="{{csrf_token()}}">


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
        var url = '/';
        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            var page =  $(this).attr('href').split('page=')[1];
            getData(url,page,'get');
        });

        $(document).on('click','.filtro',function(e){
            e.preventDefault();
            getData("/",undefined,'post');

        });

        $(document).on('click','.btn.create',function(e){
            e.preventDefault();
            window.location.href = '/create';
        });

        
        var numPagina = 1;
        getData(url,numPagina,'get');
    });
    function getData(url,page,method) {
        var consulta = "";
        if($('[name="consulta"]').val() != ""){
            consulta = $('[name="consulta"]').val();
        }
        if(page === undefined){
            page = location.hash.split('#')[1]
        }

        $.ajax({
            url : url + '#' + page,
            dataType: 'json',
            data: {'consulta':consulta,'page':page,"_token": "{{ csrf_token() }}"},
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