<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

<div id="prueba"></div>

<script>

    //$('#prueba').text(Math.random(1,20));

    $(document).ready(function() {
        
        $(document).on('click','.pagination a',function(e) {
            e.preventDefault();
            var page =  $(this).attr('href').split('page=')[1];
            getData('#usuarios','/api/clientes',{'consulta':'','page':page,"_token": "{{ csrf_token() }}"});
        });

        $(document).on('click','.filtro',function(e){
            e.preventDefault();
            var consulta = $('[name="consulta"]').val();
            getData('#usuarios','/api/clientes',{'consulta':consulta,'page':1,"_token": "{{ csrf_token() }}"});
        });

        $(document).on('click','.resetFiltro',function(e){
            e.preventDefault();
            $('[name="consulta"]').val("");
            getData('#usuarios','/api/clientes',{'consulta':'','page':1,"_token": "{{ csrf_token() }}"});
        });

        $(document).on('click','.btn.create',function(e){
            e.preventDefault();
            window.location.href = 'create';
        });
        
        var clientes = {!! json_encode($clientes, JSON_HEX_TAG) !!} ;
        generarTablas("#usuarios",clientes.data,clientes.path+"/cliente/");
        createPaginationLinks(clientes);

    });

</script>