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

        $qFactura = ['Num_venta'=>$id , 'Tipo'=>'Factura'];
        $qAlbaran = ['Num_venta'=>$id , 'Tipo'=>'Albaran'];
        $qPedido = ['Num_venta'=>$id , 'Tipo'=>'Pedido'];
        $qDocumentoY = ['Num_venta'=>$id , 'Tipo'=>'DocumentoY'];
        $qDocumentoX = ['Num_venta'=>$id , 'Tipo'=>'DocumentoX'];

        try {

            $venta = Venta::where('Id',$id)->get(['Id','Fecha_venta','Estado','Cliente'])[0];
            
        /*  $DocumentosA = Documento::where($qAlbaran)->get(['Id','Tipo','Num_Venta','Fecha_subida','Estado','Fecha_aprovacion']);
            $DocumentosF = Documento::where($qFactura)->get(['Id','Tipo','Num_Venta','Fecha_subida','Estado','Fecha_aprovacion']);
            $DocumentosP = Documento::where($qPedido)->get(['Id','Tipo','Num_Venta','Fecha_subida','Estado','Fecha_aprovacion']);
            $DocumentosY = Documento::where($qDocumentoY)->get(['Id','Tipo','Num_Venta','Fecha_subida','Estado','Fecha_aprovacion']);
            $DocumentosX = Documento::where($qDocumentoX)->get(['Id','Tipo','Num_Venta','Fecha_subida','Estado','Fecha_aprovacion']);
*/
            $DocumentosA = Documento::where($qAlbaran)->get(['Id','Tipo','Num_Venta','Ruta','Nombre']);
            $DocumentosF = Documento::where($qFactura)->get(['Id','Tipo','Num_Venta','Ruta','Nombre']);
            $DocumentosP = Documento::where($qPedido)->get(['Id','Tipo','Num_Venta','Ruta','Nombre']);
            $DocumentosY = Documento::where($qDocumentoY)->get(['Id','Tipo','Num_Venta','Ruta','Nombre']);
            $DocumentosX = Documento::where($qDocumentoX)->get(['Id','Tipo','Num_Venta','Ruta','Nombre']);
            return view("layouts.listaDetalleVentas", compact('venta','DocumentosA','DocumentosF','DocumentosP','DocumentosY','DocumentosX'));
        }
        catch(Exception $e){
            return redirect()->to('/error')->withErrors(['Error'=>'Error del servidor']);
		}
    }

}