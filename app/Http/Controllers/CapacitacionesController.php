<?php

namespace App\Http\Controllers;

use App\Models\capacitaciones;
use App\Models\capacitaciones_detalle;
use Illuminate\Http\Request;
use DB;

class CapacitacionesController extends Controller
{
    
    public function EditaCapacitacionesDetalle($id)
    {
        $obj= DB::table('capacitaciones_detalles')
        ->select('capacitaciones_detalles.*')
        ->where('capacitaciones_detalles.id','=',$id)
        ->get();
        return response()->json($obj);
    }

    public function EliminaCapacitacionesDetalle($id)
    {
        $obj = capacitaciones_detalle::findOrFail($id);
        $obj->delete();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }
    
    public function EliminaCapacitaciones($id)
    {
        $obj = capacitaciones::findOrFail($id);
        $obj->delete=1;
        $obj->save();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }

    public function ActualizaCapacitacionesDetalle(Request $request)
    {
        $id=request('IdDetalle');
        $obj = capacitaciones_detalle::findOrFail($id);
        $obj->NombreMicroscopista=request('NombreMicroscopista');
        $obj->ApellidoMicroscopista=request('ApellidoMicroscopista');
        $obj->Concordancia=request('Concordancia');
        $obj->UltimaCapacitacion=request('UltimaCapacitacion');
        $obj->FechaUltEvalPanelLam=request('FechaUltEvalPanelLam');
        $obj->save();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }

    public function GuardaCapacitacionesDetalle(Request $request)
    {
        $obj = new capacitaciones_detalle();
        $obj->IdCapacitaciones=request('IdCapacitacionesDetalle');
        $obj->NombreMicroscopista=request('NombreMicroscopista');
        $obj->ApellidoMicroscopista=request('ApellidoMicroscopista');
        $obj->Concordancia=request('Concordancia');
        $obj->UltimaCapacitacion=request('UltimaCapacitacion');
        $obj->FechaUltEvalPanelLam=request('FechaUltEvalPanelLam');
        $obj->save();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }

    public function ListaCapacitacionesDetalle($id)
    {
        $lista=DB::table('capacitaciones_detalles')
        ->select('capacitaciones_detalles.*')
        ->where('capacitaciones_detalles.IdCapacitaciones','=',$id)
        ->get();
        return datatables()->of($lista)->toJson();
    }

    public function EditaCapacitaciones($id)
    {
        $obj= DB::table('capacitaciones')
        ->select('capacitaciones.*')
        ->where('capacitaciones.id','=',$id)
        ->get();
        return response()->json($obj);
    }

    public function ActualizaCapacitaciones(Request $request)
    {
        $id=request('IdCapacitaciones');
        $obj= capacitaciones::findOrFail($id);
        $obj->Idred=request('Idred');
        $obj->Idmicrored=request('Idmicrored');
        $obj->IdProvincia=request('Provincia');
        $obj->IdDistrito=request('Distrito');
        $obj->Ipress=request('Ipress');
        $obj->save();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }

    public function GuardaCapacitaciones(Request $request)
    {
        $obj= new capacitaciones();
        $obj->Idred=request('Idred');
        $obj->Idmicrored=request('Idmicrored');
        $obj->IdProvincia=request('Provincia');
        $obj->IdDistrito=request('Distrito');
        $obj->Ipress=request('Ipress');
        $obj->Usuario=auth()->user()->id;
        $obj->save();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }

    public function ListarCapacitaciones(Request $request)
    {
        $lista=DB::table('capacitaciones')
        ->leftjoin('provincias','provincias.id','=','capacitaciones.IdProvincia')
        ->leftjoin('distritos','distritos.id','=','capacitaciones.IdDistrito')
        ->leftjoin('reds','reds.id','=','capacitaciones.Idred')
        ->leftjoin('microreds','microreds.id','=','capacitaciones.Idmicrored')
        ->leftjoin('establecimientos','establecimientos.id','=','capacitaciones.Ipress')
        ->leftjoin('users','users.id','=','capacitaciones.Usuario')
        ->select('capacitaciones.*','provincias.nombre_provincia as Provincia',
        'reds.nombre_red as Red','microreds.nombre_microred as Microred',
        'establecimientos.nombre_establecimiento as Ipress',
        'distritos.nombre_distrito as Distrito','users.name as Usuario')
        ->where('capacitaciones.delete','=',0)
        ->get();
        return datatables()->of($lista)->toJson();
    }


    public function Capacitaciones(Request $request)
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

        $ests=DB::table('establecimientos')
        ->select('establecimientos.id as id','establecimientos.codigo','establecimientos.nombre_establecimiento')
        ->get();

        return view('capacitaciones',compact('prov','dist','red','microred','ests'));
    }

}
