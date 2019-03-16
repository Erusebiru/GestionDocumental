<?php
namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Documento;
use App\Cliente;
use DB;
use Illuminate\Support\Facades\Storage;

class StorageController extends Controller {

    public function subirDocumento(Request $request,$id){
      //try {
        //obtenemos el campo file definido en el formulario
        
        $file = $request->file('documento');
       
        //obtenemos el tipo de archivo
        $tipo = $request->Input("tipo");
        
        //creamos el nombre del archivo
        $filename = $tipo . "_" . date('YmdHis', time()) . ".pdf";

        $nombre = $file->getClientOriginalName();
        //indicamos que queremos guardar un nuevo archivo en el disco local
        Storage::disk('public')->put($filename, file_get_contents($file));
        
        //guardamos el nuevo Documento en la base de datos
        $documento = new Documento;
        $documento->Tipo = $tipo;
        $documento->Ruta = $filename;
        $documento->Num_venta = $id;
        $documento->Nombre = $nombre;
        $documento->save();

        return redirect()->back();
      /*}
       catch(Exception $e) {
            return redirect()->to('/error')->withErrors(['Error'=>'Error del servidor']);
       }*/
    }
}