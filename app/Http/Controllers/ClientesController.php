<?php
namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Cliente;
use App\Venta;
use DB;
 
class ClientesController extends Controller
{

    public function getClientes(){
		$clientes = DB::table('clientes')->select('Nombre','NIF_CIF','CP')->get();
    	return view("layouts.listaClientes", compact('clientes'));
    }
    
    public function guardarCliente(Request $request){
			
            $cliente = new Cliente;
			$cliente->Nombre = $request->input('nombre');
			$cliente->Email = $request->input('email',false);
            $cliente->NIF_CIF = $request->input('nifcif',false);
            $cliente->Telefono = (int)$request->input('telefono',false);
			$cliente->Direccion = $request->input('direccion');
            $cliente->Localidad = $request->input('localidad');
            $cliente->CP = (int)$request->input('cp');
            $cliente->Provincia = $request->input('provincia');
            $cliente->save();         

            $clientes = DB::table('clientes')->select('Nombre','NIF_CIF','CP')->get();
    	    return view("layouts.listaClientes", compact('clientes'));
    }

    public function getCliente($id){
        $cliente = Cliente::where('Id_cliente',$id)->get(['Nombre','Email','NIF_CIF','Telefono','Direccion','Localidad','CP','Provincia']);
        $venta = Venta::where('Cliente',$id)->get(['Id_venta','Fecha_venta','Estado']);
        return view("layouts.listaDetalleClientes", compact('cliente','venta'));
    }
    public function guardarCambios(){
        
    }
}