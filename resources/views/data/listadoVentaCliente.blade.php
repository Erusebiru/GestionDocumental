<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
<div>
    <br>
</div>
<div id="divNuevaVenta" class="col-md-8">
       <script>  
      		$(document).ready(function(){

       			$(document).on('click', '.pagination a', function (e) {
                    var MiId= window.location.pathname;
		            e.preventDefault();
		            var page =  $(this).attr('href').split('page=')[1];
		            getData('#prueba2','/api'+MiId,{'consulta':"",'page':page,"_token": "{{ csrf_token() }}"});
		        });
	       		$(document).on('click','.filtro',function(e){
	            	e.preventDefault();
					var	consulta = $('[name="consulta"]').val();
                	var MiId= window.location.pathname;
                
	            	getData('#prueba2','/api'+MiId,{'consulta':consulta,'page':1,"_token": "{{ csrf_token() }}"});
	       		});

		        $(document).on('click','.resetFiltro',function(e){
                     var MiId= window.location.pathname;
		            e.preventDefault();
					getData('#prueba2','/api'+MiId,{'consulta':"",'page':1,"_token": "{{ csrf_token() }}"});
		        });

            	$('#form').on('submit',function(e){
					e.preventDefault();
					
						var MiId=window.location.pathname;
						var form = $('#form');
						
						UpdateData('#formulario','/api/update'+MiId,$('#form').serialize() );
					
				});
    		});

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


    