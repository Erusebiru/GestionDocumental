// Inicio (Clientes)
Breadcrumbs::for('Clientes',function($trail)){
    $trail->push('Clientes',route('/'));
}

//Detalle del cliente
Breadcrumbs::for('Detalle_Cliente',function($trail,$cliente)){
    $trail->parent('Clientes')
    $trail->push($cliente->nombre,route('cliente',$cliente->id));
}
//Venta del cliente
Breadcrumbs::for('Venta', function ($trail, $cliente, $venta) {
	$trail->parent('Detalle_Cliente');
    $trail->push($venta->descripcion, route('/cliente/detalle/', $venta->id));
});