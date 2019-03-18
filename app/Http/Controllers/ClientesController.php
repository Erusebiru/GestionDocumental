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
		try{
            $clientes = DB::table('clientes')->select('Id', 'Nombre','NIF_CIF','Localidad')->paginate(10);
            return view("layouts.listaClientes", compact('clientes'));
        }
        catch (Exception $e){ 
            return redirect()->to('/error')->withErrors(['Error'=>'Error del servidor']);
        }
    
    }
    
    public function getFiltroCliente(Request $request){
        $clientes = Cliente::select('Id', 'Nombre','NIF_CIF','Localidad')
        ->where('Nombre','like','%'.$request->input('consulta').'%')
        ->orWhere('Localidad','like','%'.$request->input('consulta').'%')
        ->orWhere('NIF_CIF','like','%'.$request->input('consulta').'%')
        ->paginate(10);
        return view("layouts.listaClientes", compact('clientes'));
    }
    public function getFiltroVenta(Request $request,$id){
        $cliente = Cliente::where('Id',$id)->get(['Id','Nombre','Email','NIF_CIF','Telefono','Direccion','Localidad','CP','Provincia']);
        
        $venta = Venta::select('Id','Fecha_venta','Estado')
        ->where('Cliente',$id)
        ->where('Estado','like','%'.$request->input('consulta').'%')
        ->orWhere('Fecha_venta','like','%'.$request->input('consulta').'%')
        ->paginate(5);
        return view("layouts.listaDetalleClientes", compact('cliente','venta'));
    }

    public function getCliente($id){
        try {

            $cliente = Cliente::where('Id',$id)->get(['Id','Nombre','Email','NIF_CIF','Telefono','Direccion','Localidad','CP','Provincia']);
            $venta = Venta::select('Id','Fecha_venta','Estado')->where('Cliente',$id)->paginate(5);
            return view("layouts.listaDetalleClientes", compact('cliente','venta'));
        }
        catch(Exception $e){
            return redirect()->to('/error')->withErrors(['Error'=>'Error del servidor']);
		}
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
            
            $clientes = DB::table('clientes')->select('Id', 'Nombre','NIF_CIF','Localidad')->get();
            return view("layouts.listaClientes", compact('clientes'));
        }
        catch (Exception $e){ 
            return redirect()->to('/error')->withErrors(['Error'=>'Error del servidor']);
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
            return redirect()->to('/error')->withErrors(['Error'=>'Error del servidor']);
        }
    }
}