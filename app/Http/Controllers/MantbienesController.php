<?php

namespace App\Http\Controllers;

use App\Models\mantbienes;
use App\Models\mantbienes_detalle;
use Illuminate\Http\Request;
use DB;

class MantbienesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function EditaMantBienesDetalle($id)
    {
        $obj= DB::table('mantbienes_detalles')
        ->select('mantbienes_detalles.*')
        ->where('mantbienes_detalles.id','=',$id)
        ->get();
        return response()->json($obj);
    }

    public function EliminaMantbienesDetalle($id)
    {
        $obj = mantbienes_detalle::findOrFail($id);
        $obj->delete();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }
    
    public function EliminaMantBienes($id)
    {
        $obj = mantbienes::findOrFail($id);
        $obj->delete=1;
        $obj->save();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }

    public function ActualizaMantbienesDetalle(Request $request)
    {
        $id=request('IdDetalle');
        $obj = mantbienes_detalle::findOrFail($id);
        $obj->Descripcion=request('Descripcion');
        $obj->NumeroSerie=request('NumeroSerie');
        $obj->Modelo=request('Modelo');
        $obj->Marca=request('Marca');
        $obj->AnoFab=request('AnoFab');
        $obj->AnoCompra=request('AnoCompra');
        $obj->Estado=request('Estado');
        $obj->Observaciones=request('Observaciones');
        $obj->MPreventivo=request('MPreventivo');
        $obj->MCorrectivo=request('MCorrectivo');
        $obj->save();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }

    public function GuardaMantBienesDetalle(Request $request)
    {
        $obj = new mantbienes_detalle();
        $obj->IdMantbienes=request('IdMantbienesDetalle');
        $obj->Descripcion=request('Descripcion');
        $obj->NumeroSerie=request('NumeroSerie');
        $obj->Modelo=request('Modelo');
        $obj->Marca=request('Marca');
        $obj->AnoFab=request('AnoFab');
        $obj->AnoCompra=request('AnoCompra');
        $obj->Estado=request('Estado');
        $obj->Observaciones=request('Observaciones');
        $obj->MPreventivo=request('MPreventivo');
        $obj->MCorrectivo=request('MCorrectivo');

        $obj->save();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }

    public function ListaMantBienesDetalle($id)
    {
        $lista=DB::table('mantbienes_detalles')
        ->select('mantbienes_detalles.*')
        ->where('mantbienes_detalles.IdMantbienes','=',$id)
        ->get();
        return datatables()->of($lista)->toJson();
    }

    public function EditaMantBienes($id)
    {
        $obj= DB::table('mantbienes')
        ->select('mantbienes.*')
        ->where('mantbienes.id','=',$id)
        ->get();
        return response()->json($obj);
    }

    public function ActualizaMantBienes(Request $request)
    {
        $id=request('IdMantBienes');
        $obj= mantbienes::findOrFail($id);
        $obj->Idred=request('Idred');
        $obj->Idmicrored=request('Idmicrored');
        $obj->IdProvincia=request('Provincia');
        $obj->IdDistrito=request('Distrito');
        $obj->Ipress=request('Ipress');
        $obj->save();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }

    public function GuardaMantBienes(Request $request)
    {
        $obj= new mantbienes();
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

    public function ListarMantBienes(Request $request)
    {
        $lista=DB::table('mantbienes')
        ->leftjoin('provincias','provincias.id','=','mantbienes.IdProvincia')
        ->leftjoin('distritos','distritos.id','=','mantbienes.IdDistrito')
        ->leftjoin('reds','reds.id','=','mantbienes.Idred')
        ->leftjoin('microreds','microreds.id','=','mantbienes.Idmicrored')
        ->leftjoin('establecimientos','establecimientos.id','=','mantbienes.Ipress')
        ->leftjoin('users','users.id','=','mantbienes.Usuario')
        ->select('mantbienes.*','provincias.nombre_provincia as Provincia',
        'reds.nombre_red as Red','microreds.nombre_microred as Microred',
        'establecimientos.nombre_establecimiento as Ipress',
        'distritos.nombre_distrito as Distrito','users.name as Usuario')
        ->where('mantbienes.delete','=',0)
        ->get();
        return datatables()->of($lista)->toJson();
    }


    public function MantBienes(Request $request)
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

        return view('mantbienes',compact('prov','dist','red','microred','ests'));
    }
}



