<?php
namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Documento;
use DB;
use App\Venta;

class DocumentosController extends Controller
{
    public function getDocumentos($id){
        //try {
            $DocumentosA = Documento::where('Num_venta',$id AND 'Tipo','Albaran')->get(['Id','Tipo','Num_Venta','Fecha_subida','Estado','Fecha_aprovacion']);
            $DocumentosB = Documento::where('Num_venta',$id AND 'Tipo','Albaran')->get(['Id','Tipo','Num_Venta','Fecha_subida','Estado','Fecha_aprovacion']);
            $DocumentosC = Documento::where('Num_venta',$id AND 'Tipo','Albaran')->get(['Id','Tipo','Num_Venta','Fecha_subida','Estado','Fecha_aprovacion']);
            $DocumentosD = Documento::where('Num_venta',$id AND 'Tipo','Albaran')->get(['Id','Tipo','Num_Venta','Fecha_subida','Estado','Fecha_aprovacion']);
            $DocumentosE = Documento::where('Num_venta',$id AND 'Tipo','Albaran')->get(['Id','Tipo','Num_Venta','Fecha_subida','Estado','Fecha_aprovacion']);
            $venta = Venta::where('Cliente',$id)->get(['Id','Fecha_venta','Estado']);

            return view("layouts.listaDetalleVentas", compact('DocumentosA','DocumentosB','DocumentosC','DocumentosD','DocumentosE','venta'));
       /* }
        catch(Exception $e){
            return redirect()->to('/error')->withErrors(['Error'=>'Error del servidor']);
		}*/
    }
}