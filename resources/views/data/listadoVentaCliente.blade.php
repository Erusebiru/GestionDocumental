<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>	
<div>
    <br>
</div>
<div id="divNuevaVenta" class="col-md-8">
       <script>  function createPaginationLinks(data){
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

      		$(document).ready(function(){

       			$(document).on('click', '.pagination a', function (e) {
		            e.preventDefault();
		            var page =  $(this).attr('href').split('page=')[1];
		            getData('/api/cliente/1',page,"");
		        });
	       		$(document).on('click','.filtro',function(e){
	            e.preventDefault();
	            var consulta = $('[name="consulta"]').val();
	            getData('/api/cliente/',1,consulta);
	        });

		        $(document).on('click','.resetFiltro',function(e){
		            e.preventDefault();
		            getData('/api/cliente/',1,"");
		        });
    		});

       	function getData(url,page,consulta) {

        if(page === undefined){
            page = location.hash.split('#')[1];
        }

        $.ajax({
            url : url + '#' + page,
            data: {'consulta':consulta,'page':page,"_token": "{{ csrf_token() }}"},
            beforeSend: function(){
                $('#prueba2').empty();
                $('<div class="loader"><div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>').appendTo('#prueba2');
            },
            success: function(result){
            	
                location.hash = page;
                
                $('#prueba2').empty();
                generarTablas("#prueba2",result.data,"/cliente/1");

                   createPaginationLinks(result)
                
            },
            error: function(result){
            	console.log(result);
                return false;
                alert('Ha ocurrido un error.');
            }
        });
  }
            var cliente = {!! json_encode($cliente->toArray(), JSON_HEX_TAG) !!}[0] ;
            var link = $("<a>").attr("href","/nuevaVenta/"+cliente["Id"]).text("Nueva Venta").attr("class","btn btn-primary nuevaVentaBtn");
            $("#divNuevaVenta").append(link);
       </script>
       <div class="col-md-8"><br></div>
</div>
<div id="divVentaCliente"></div>
<div id="prueba2"></div>
<script>
    var ventas = {!! json_encode($venta->toArray(), JSON_HEX_TAG) !!}['data'];
    generarTablas("#prueba2",ventas,"/cliente/detalle/");
</script>


    