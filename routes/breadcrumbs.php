<?php

// Inicio (Clientes)
Breadcrumbs::for('Clientes',function($trail){
    $trail->push('Clientes',route('/'));
});

//Detalle del cliente
Breadcrumbs::for('Detalle_Cliente',function($trail,$cliente){
    $trail->parent('Clientes');
    $trail->push('Nombre',route('cliente',$cliente));
});
//Venta del cliente
Breadcrumbs::for('Venta', function ($trail,$cliente, $venta) {
	$trail->parent('Detalle_Cliente',$cliente);
    $trail->push('venta', route('detalle', $venta));
});