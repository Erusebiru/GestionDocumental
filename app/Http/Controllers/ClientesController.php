<?php
namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Cliente;
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
    
    public function pruebaClientes(){
		$clientes = DB::table('clientes')->select('Nombre', 'NIF_CIF', 'CP')->get();
    	return view("listadoClientes", compact('clientes'));
	}
}