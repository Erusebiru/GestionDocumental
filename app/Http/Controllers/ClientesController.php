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
		$clientes = DB::table('clientes')->select('Id', 'Nombre','NIF_CIF','CP')->get();
        return view("layouts.listaClientes", compact('clientes'));
        
    
    }
    
    public function guardarCliente(Request $request){
        try{
            $cliente = new Cliente;
			$cliente->Nombre = $request->input('Nombre');
			$cliente->Email = $request->input('Email',false);
            $cliente->NIF_CIF = $request->input('NIF_CIF',false);
            $cliente->Telefono = (int)$request->input('Telefono',false);
			$cliente->Direccion = $request->input('Direccion');
            $cliente->Localidad = $request->input('Localidad');
            $cliente->CP = (int)$request->input('CP');
            $cliente->Provincia = $request->input('Provincia');
            $cliente->save();    
            
            $clientes = DB::table('clientes')->select('Id', 'Nombre','NIF_CIF','CP')->get();
            return view("layouts.listaClientes", compact('clientes'));

           // redirect()->action('ClientesController@getClientes');
        }
        catch (Exception $e){ 
            return redirect()->to('/error')->withErrors(['Error1'=>'Error del servidor']);
        }
    }
    

    public function getCliente($id){
        try {

            $cliente = Cliente::where('Id',$id)->get(['Id','Nombre','Email','NIF_CIF','Telefono','Direccion','Localidad','CP','Provincia']);
            $venta = Venta::where('Cliente',$id)->get(['Id','Fecha_venta','Estado']);
            return view("layouts.listaDetalleClientes", compact('cliente','venta'));
        }
        catch(Exception $e){
            return redirect()->to('/error')->withErrors(['Error1'=>'Error del servidor']);
		}
    }

    public function guardarCambios(Request $request, $id){
        try{
            Cliente::where('Id',$id)
            ->update([
            'Nombre' => $request->input('Nombre'),
            'Email' => $request->input('Email',false),
            'NIF_CIF' => $request->input('NIF_CIF',false),
            'Telefono' => (int)$request->input('Telefono',false),
            'Direccion' => $request->input('Direccion'),
            'Localidad' => $request->input('Localidad'),
            'CP' => (int)$request->input('CP'),
            'Provincia' => $request->input('Provincia')]);
            return redirect()->back();
        }
        catch(Exception $e){
            return redirect()->to('/error')->withErrors(['Error1'=>'Error del servidor']);
        }
    }
}