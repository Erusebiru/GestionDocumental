<?php
namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Cliente;
use App\Venta;
use DB;
use Illuminate\Support\Facades\Response; 
use View;

class ClientesController extends Controller
{

    /*public function getClientes(Request $request){
		try{
            if ($request->has('consulta')){
                $clientes = Cliente::select('Id', 'Nombre','NIF_CIF','Localidad')
                ->where('Nombre','like','%'.$request->input('consulta').'%')
                ->orWhere('Localidad','like','%'.$request->input('consulta').'%')
                ->orWhere('NIF_CIF','like','%'.$request->input('consulta').'%')
                ->paginate(10)
                ->appends('consulta',$request->Input('consulta'));
            }else{
                $clientes = DB::table('clientes')->select('Id', 'Nombre','NIF_CIF','Localidad')->paginate(10);
            }
            return view("layouts.listaClientes", compact('clientes'));
        }
        catch (Exception $e){ 
            return redirect()->to('/error')->withErrors(['Error'=>'Error del servidor']);
        }

        return view("layouts.listaClientes");
        
    }*/

    public function getClientesApi(Request $request){
        
        if ($request->has('consulta')){
            $clientes = Cliente::select('Id', 'Nombre','NIF_CIF','Localidad')
                ->where('Nombre','like','%'.$request->input('consulta').'%')
                ->orWhere('Localidad','like','%'.$request->input('consulta').'%')
                ->orWhere('NIF_CIF','like','%'.$request->input('consulta').'%')
                ->paginate(1)
                ->appends('consulta',$request->Input('consulta'));
        }else{
            $clientes = DB::table('clientes')->select('Id', 'Nombre','NIF_CIF','Localidad')->paginate(1);
        }
        //return Response::json($clientes);
        if ($request->ajax()) {
            return Response::json($clientes);
        }
       
        return view("layouts.listaClientes", compact('clientes'));
    }

    public function getCliente(Request $request,$id){
        try {
            if ($request->has('consulta')){
                $venta = Venta::select('Id','Fecha_venta','Estado')
                ->where('Cliente',$id)
                ->where('Estado','like','%'.$request->input('consulta').'%')
                ->orwhere('Cliente',$id)
                ->Where('Fecha_venta','like','%'.$request->input('consulta').'%')
                ->paginate(5)
                ->appends('consulta',$request->Input('consulta'));
            }else{
                $venta = Venta::select('Id','Fecha_venta','Estado')->where('Cliente',$id)->paginate(5);
            }
            $cliente = Cliente::where('Id',$id)->get(['Id','Nombre','Email','NIF_CIF','Telefono','Direccion','Localidad','CP','Provincia']);
            if ($request->ajax()) {
                return Response::json($cliente);
                
            }
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
            
            $clientes = DB::table('clientes')->select('Id', 'Nombre','NIF_CIF','Localidad')->paginate(10);
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


    public function guardarVenta(Request $request){
        try{
            $venta = new Venta;
			$venta->Fecha_Venta = $request->input('Fecha_Venta');
            $venta->Estado = "Sin confirmar";
            $venta->Descripcion = $request->input('Descripcion');
            $id= $request->input('Id');
            $venta->Cliente = $id ;
        
            $venta->save();

           return redirect()->back();
        }
        catch (Exception $e){ 
            return redirect()->to('/error')->withErrors(['Error'=>'Error del servidor']);
        }
    }
}