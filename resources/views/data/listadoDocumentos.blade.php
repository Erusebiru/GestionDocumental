<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>	

            <h3>Albaran</h3>
            <div id="Albaran"></div>
            <script>
                var Albaran = {!! json_encode($DocumentosA->toArray(), JSON_HEX_TAG) !!} ;
                generarTablas("#Albaran",Albaran);
            </script>
            <h3>Factura</h3>
            <div id="Factura"></div>
            <script>
                var Factura = {!! json_encode($DocumentosF->toArray(), JSON_HEX_TAG) !!} ;
                generarTablas("#Factura",Factura);
            </script>
            <h3>Pedido</h3>
            <div id="Pedido"></div>
            <script>
                var Pedido = {!! json_encode($DocumentosP->toArray(), JSON_HEX_TAG) !!} ;
                generarTablas("#Pedido",Pedido);
            </script>
            <h3>DocumentoY</h3>
            <div id="DocumentoY"></div>
            <script>
                var DocumentoY = {!! json_encode($DocumentosY->toArray(), JSON_HEX_TAG) !!} ;
                generarTablas("#DocumentoY",DocumentoY);
            </script>
            <h3>DocumentoX</h3>
            <div id="DocumentoX"></div>
            <script>
                var DocumentoX = {!! json_encode($DocumentosX->toArray(), JSON_HEX_TAG) !!} ;
                generarTablas("#DocumentoX",DocumentoX);
            </script>
        </div>