<?php

namespace App\Http\Controllers;

use App\Models\viviendasconrri;
use App\Models\viviendasrociadas;
use Illuminate\Http\Request;
use DB;
class ViviendasconrriController extends Controller
{
    
    public function EditaViviendaRociada($id)
    {
        $obj= DB::table('viviendasrociadas')
        ->select('viviendasrociadas.*')
        ->where('viviendasrociadas.id','=',$id)
        ->get();
        return response()->json($obj);
    }

    public function EliminaViviendasRociadas($id)
    {
        $obj = viviendasrociadas::findOrFail($id);
        $obj->delete();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }
    
    public function EliminaViviendaRRI($id)
    {
        $obj = viviendasconrri::findOrFail($id);
        $obj->delete=1;
        $obj->save();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }

    public function ActualizaViviendaRociada(Request $request)
    {
        $id=request('IdViviendasRociadas');
        $obj = viviendasrociadas::findOrFail($id);
        $obj->NumeroViviendasRociadas=request('NumeroViviendasRociadas');
        $obj->FechaPrimerCiclo=request('FechaPrimerCiclo');
        $obj->FechaSegundoCiclo=request('FechaSegundoCiclo');
        $obj->save();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }

    public function GuardaViviendaRociada(Request $request)
    {
        $obj = new viviendasrociadas();
        $obj->IdViviendasIRR=request('IdViviendasRociadasIRR');
        $obj->NumeroViviendasRociadas=request('NumeroViviendasRociadas');
        $obj->FechaPrimerCiclo=request('FechaPrimerCiclo');
        $obj->FechaSegundoCiclo=request('FechaSegundoCiclo');
        $obj->save();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }

    public function ListaViviendasRociadas($id)
    {
        $lista=DB::table('viviendasrociadas')
        ->select('viviendasrociadas.*')
        ->where('viviendasrociadas.IdViviendasIRR','=',$id)
        ->get();
        return datatables()->of($lista)->toJson();
    }

    public function EditaViviendaRRI($id)
    {
        $obj= DB::table('viviendasconrris')
        ->select('viviendasconrris.*')
        ->where('viviendasconrris.id','=',$id)
        ->get();
        return response()->json($obj);
    }

    public function ActualizaViviendaRRI(Request $request)
    {
        $id=request('IdViviendasRRI');
        $obj= viviendasconrri::findOrFail($id);
        $obj->Idred=request('Idred');
        $obj->Idmicrored=request('Idmicrored');
        $obj->IdProvincia=request('Provincia');
        $obj->IdDistrito=request('Distrito');
        $obj->Localidad=request('Localidad');
        $obj->save();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }

    public function GuardaViviendaRRI(Request $request)
    {
        $obj= new viviendasconrri();
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

    public function ListarViviendaRRI(Request $request)
    {
        $lista=DB::table('viviendasconrris')
        ->leftjoin('provincias','provincias.id','=','viviendasconrris.IdProvincia')
        ->leftjoin('distritos','distritos.id','=','viviendasconrris.IdDistrito')
        ->leftjoin('reds','reds.id','=','viviendasconrris.Idred')
        ->leftjoin('microreds','microreds.id','=','viviendasconrris.Idmicrored')
        ->leftjoin('users','users.id','=','viviendasconrris.Usuario')
        ->select('viviendasconrris.*','provincias.nombre_provincia as Provincia',
        'reds.nombre_red as Red','microreds.nombre_microred as Microred',
        'distritos.nombre_distrito as Distrito','users.name as Usuario')
        ->where('viviendasconrris.delete','=',0)
        ->get();
        return datatables()->of($lista)->toJson();
    }

    public function ViviendasRRI(Request $request)
    {
        // $dpto=DB::table('departamentos')
        // ->select('departamentos.id as id','departamentos.nombre_departamento as nombre_dpto')
        // ->where('departamentos.nombre_departamento','=','JUNIN') 
        // ->get();
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

        return view('viviendasrri',compact('prov','dist','red','microred'));
    }
}
