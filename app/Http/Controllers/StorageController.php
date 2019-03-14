<?php
namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Documento;
use App\Cliente;
use DB;
use Illuminate\Support\Facades\Storage;

class StorageController extends Controller {

    public function subirDocumento(Request $request){
       try {
        //obtenemos el campo file definido en el formulario
        $documento = $request->file('file');
       
        //obtenemos el tipo de archivo
        $tipo = $request->Input("tipo");

        //creamos el nombre del archivo
        $nombre = $id . "_" . $tipo . "_" . date('YmdHis', time()) . "." . $documento->getClientOriginalExtension();

        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('public')->put($nombre, file_get_contents($documento));
    
        //guardamos el nuevo Documento en la base de datos
        $documento = new Archivo;
        $documento->Tipo = $tipo;
        $documento->Ruta = $nombre;
        $documento->Num_venta = $id;
        $documento->save();

        return redirect()->back();
       }
       catch(Exception $e) {
            return redirect()->to('/error')->withErrors(['Error'=>'Error del servidor']);
       }

   }
}