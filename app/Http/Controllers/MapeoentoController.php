<?php

namespace App\Http\Controllers;

use App\Models\mapeoento;
use App\Models\mapeoento_indicepicadura;
use Illuminate\Http\Request;
use DB;
class MapeoentoController extends Controller
{

    public function EditaIndicePicadura($id)
    {
        $obj= DB::table('mapeoento_indicepicaduras')
        ->select('mapeoento_indicepicaduras.*')
        ->where('mapeoento_indicepicaduras.id','=',$id)
        ->get();
        return response()->json($obj);
    }

    public function EliminaIndicePicadura($id)
    {
        $obj = mapeoento_indicepicadura::findOrFail($id);
        $obj->delete();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }
    
    public function EliminaMapeoEnto($id)
    {
        $obj = mapeoento::findOrFail($id);
        $obj->delete=1;
        $obj->save();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }

    public function ActualizaIndicePicadura(Request $request)
    {
        $id=request('IdIndicePicadura');
        $obj = mapeoento_indicepicadura::findOrFail($id);
        $obj->fecha=request('fecha');
        $obj->indicehombrehora=request('indicehombrehora');
        $obj->indicehombrenoche=request('indicehombrenoche');
        $obj->save();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }

    public function GuardaIndicePicadura(Request $request)
    {
        $obj = new mapeoento_indicepicadura();
        $obj->IdMapeoEnto=request('IdIndicePicaduraMapeoEnto');
        $obj->fecha=request('fecha');
        $obj->indicehombrehora=request('indicehombrehora');
        $obj->indicehombrenoche=request('indicehombrenoche');
        $obj->save();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }

    public function ListaIndicePicadura($id)
    {
        $lista=DB::table('mapeoento_indicepicaduras')
        ->select('mapeoento_indicepicaduras.*')
        ->where('mapeoento_indicepicaduras.IdMapeoEnto','=',$id)
        ->get();
        return datatables()->of($lista)->toJson();
    }

    public function EditaMapeoEnto($id)
    {
        $obj= DB::table('mapeoentos')
        ->select('mapeoentos.*')
        ->where('mapeoentos.id','=',$id)
        ->get();
        return response()->json($obj);
    }

    public function ActualizaMapeoEnto(Request $request)
    {
        $id=request('IdMapeoEnto');
        $obj= mapeoento::findOrFail($id);
        $obj->Idred=request('Idred');
        $obj->Idmicrored=request('Idmicrored');
        $obj->IdProvincia=request('Provincia');
        $obj->IdDistrito=request('Distrito');
        $obj->Localidad=request('Localidad');
        $obj->save();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }

    public function GuardaMapeoEnto(Request $request)
    {
        $obj= new mapeoento();
        $obj->Idred=request('Idred');
        $obj->Idmicrored=request('Idmicrored');
        $obj->IdProvincia=request('Provincia');
        $obj->IdDistrito=request('Distrito');
        $obj->Localidad=request('Localidad');
        $obj->Usuario=auth()->user()->id;
        $obj->save();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }

    public function ListarMapeoEnto(Request $request)
    {
        $lista=DB::table('mapeoentos')
        ->leftjoin('provincias','provincias.id','=','mapeoentos.IdProvincia')
        ->leftjoin('distritos','distritos.id','=','mapeoentos.IdDistrito')
        ->leftjoin('reds','reds.id','=','mapeoentos.Idred')
        ->leftjoin('microreds','microreds.id','=','mapeoentos.Idmicrored')
        ->leftjoin('users','users.id','=','mapeoentos.Usuario')
        ->select('mapeoentos.*','provincias.nombre_provincia as Provincia',
        'reds.nombre_red as Red','microreds.nombre_microred as Microred',
        'distritos.nombre_distrito as Distrito','users.name as Usuario')
        ->where('mapeoentos.delete','=',0)
        ->get();
        return datatables()->of($lista)->toJson();
    }


    public function MapeoEnto(Request $request)
    {
        $prov=DB::table('provincias')
        ->leftjoin('departamentos','departamentos.id','=','provincias.dptoId')
        ->select('provincias.id as id','provincias.nombre_provincia as nombre_prov')
        ->where('departamentos.nombre_departamento','=','JUNIN')
        ->get();

        $dist=DB::table('distritos')
        ->leftjoin('provincias','provincias.id','=','distritos.provId')
        ->leftjoin('departamentos','departamentos.id','=','provincias.dptoId')
        ->select('distritos.codigo as codigo','distritos.id as id','distritos.nombre_distrito as nombre_dist' )
        ->where('departamentos.nombre_departamento','=','JUNIN')
        ->get();
        
        $red=DB::table('reds')
        ->select('reds.codigo_red as codigo','reds.id as id','reds.nombre_red')
        ->get();

        $microred=DB::table('microreds')
        ->select('microreds.codigo_microred as codigo','microreds.id as id','microreds.nombre_microred')
        ->get();

        return view('Mapeoento',compact('prov','dist','red','microred'));
    }
}
