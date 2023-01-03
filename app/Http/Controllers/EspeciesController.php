<?php

namespace App\Http\Controllers;

use App\Models\especies;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;

class EspeciesController extends Controller
{
    public function GuardaEspecie(Request $request)
    {
        $nombre_especie=request('nombre_especie');
        $list= DB::table('especies')
        ->where('especies.nombre_especie','=',$nombre_especie)
        ->exists();
        
        if ($list){
            $data=['Mensaje'=>'Ya existe esta especie','Icono'=>'warning'];
        }else{
            $obj = new especies ();
            $obj->nombre_especie=Str::upper($nombre_especie);
            $obj->save();
            //obteniendo otra vez todos los registros para mostrar
            $especies=DB::table('especies')
            ->select('especies.id','especies.nombre_especie')
            ->get();
            $data=['Mensaje'=>'Registro Guardado','Icono'=>'success','especies'=>$especies];
            
        }
        return response()->json($data);
    }
    
}
