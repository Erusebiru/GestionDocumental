<?php

// Inicio (Clientes)
Breadcrumbs::for('Clientes',function($trail){
    $trail->push('Home',route('/'));
});

//Detalle del cliente
Breadcrumbs::for('Detalle_Cliente',function($trail,$cliente){
    $trail->parent('Clientes');
    $trail->push('Cliente',route('cliente',$cliente));
});
//Nuevo Cliente
Breadcrumbs::for('Nuevo_Cliente',function($trail){
    $trail->parent('Clientes');
    $trail->push('Nuevo Cliente',route('nuevoCliente'));
});
//Nueva Venta
Breadcrumbs::for('Nueva_Venta', function ($trail,$cliente) {
	$trail->parent('Detalle_Cliente',$cliente);
    $trail->push('Nueva Venta', route('nuevaVenta',$cliente));
});
//Venta del cliente
Breadcrumbs::for('Venta', function ($trail,$cliente, $venta) {
	$trail->parent('Detalle_Cliente',$cliente);
    $trail->push('Venta', route('detalle', $venta));
});