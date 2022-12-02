<?php

namespace App\Http\Controllers;

use App\Models\MosquiterosEntregados;
use App\Models\EncuestadoMosqs;
use Illuminate\Http\Request;
use DB;
class MosquiterosEntregadosController extends Controller
{
    public function EliminaCensoEncuestados($id)
    {
        $obj=EncuestadoMosqs::findOrFail($id);
        $obj->delete();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }

    public function EliminaFichMosqEntregado($id)
    {
        $obj=MosquiterosEntregados::findOrFail($id);
        $obj->delete=1;
        $obj->save();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }
    public function ActualizarEncuestado(Request $request)
    {
        $id=request('idEncuestado');
        $obj=EncuestadoMosqs::findOrFail($id);
        $obj->update($request->all());
        $obj->save();
        $data=['Mensaje'=>'ok'];
        return response()->json($data);
    }
    
    public function EditarEncuestado($id)
    {
        $lista=DB::table('encuestado_mosqs')
        ->where('encuestado_mosqs.id','=',$id)
        ->select('encuestado_mosqs.*')
        ->get();
        return response()->json($lista);
    }

    public function GuardarEncuestado(Request $request)
    {
        $obj = new EncuestadoMosqs();
        $obj->create($request->all());
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);

    }

    public function ListaCensoEncuestados($id)
    {
        $lista=DB::table('encuestado_mosqs')
        ->where('encuestado_mosqs.idMonitoreo','=',$id)
        ->select('encuestado_mosqs.id as IdEncuestado','encuestado_mosqs.*')
        ->get();
        return datatables()->of($lista)->toJson();
    }

    public function ActualizaFichMosqEntregado(Request $request)
    {
        $id=request('idEntregaMosquitero');
        $obj=MosquiterosEntregados::findOrFail($id);
        $obj->Departamento=request('Departamento');
        $obj->Provincia=request('Provincia');
        $obj->Distrito=request('Distrito');
        $obj->Ipress=request('Ipress');
        $obj->idLocalidad=request('Localidad');
        $obj->FechaEntrega=request('FechaEntrega');
        $obj->FechaMonitoreo=request('FechaMonitoreo');
        $obj->NumeroMonitoreo=request('NumeroMonitoreo');
        $obj->Responsable=request('Responsable');
        $obj->CargoResponsable=request('CargoResponsable');
        $obj->save();
        $data=['Mensaje'=>'ok'];
        return response()->json($data);
    }

    public function EditarMosquiteroEntregado($id)
    {
        $lista=DB::table('mosquiteros_entregados')
        ->select('mosquiteros_entregados.*')
        ->where('mosquiteros_entregados.id','=',$id)
        ->get();
        return response()->json($lista);
    }

    public function GuardaFichMosqEntregado(Request $request)
    {
        $obj=new MosquiterosEntregados();
        $obj->Departamento=request('Departamento');
        $obj->Provincia=request('Provincia');
        $obj->Distrito=request('Distrito');
        $obj->Ipress=request('Ipress');
        $obj->idLocalidad=request('Localidad');
        $obj->FechaEntrega=request('FechaEntrega');
        $obj->FechaMonitoreo=request('FechaMonitoreo');
        $obj->NumeroMonitoreo=request('NumeroMonitoreo');
        $obj->Responsable=request('Responsable');
        $obj->CargoResponsable=request('CargoResponsable');
        $obj->Usuario=auth()->user()->id;
        $obj->save();
        $data=['Mensaje'=>'ok'];
        return response()->json($data);
        
    }

    public function ListarFichaMosquiteroEntregado()
    {
        $lista=DB::table('mosquiteros_entregados')
        ->leftjoin('departamentos','departamentos.id','=','mosquiteros_entregados.Departamento')
        ->leftjoin('provincias','provincias.id','=','mosquiteros_entregados.Provincia')
        ->leftjoin('distritos','distritos.id','=','mosquiteros_entregados.Distrito')
        ->leftjoin('establecimientos','establecimientos.id','=','mosquiteros_entregados.Ipress')
        ->leftjoin('users','users.id','=','mosquiteros_entregados.Usuario')
        ->leftjoin('localidades','localidades.id','=','mosquiteros_entregados.idLocalidad')
        ->select('mosquiteros_entregados.id as Id','mosquiteros_entregados.*',
        'departamentos.*','provincias.*','distritos.*','users.name as usuario',
        'establecimientos.nombre_establecimiento','localidades.nombre_localidad')
        ->where('mosquiteros_entregados.delete','=',0)
        ->where('mosquiteros_entregados.Usuario','=',auth()->user()->id)
        ->get();
        return datatables()->of($lista)->toJson();
    }

    public function MosquiteroEntregado(){
        $dpto=DB::table('departamentos')
        ->select('departamentos.id as id','departamentos.nombre_departamento as nombre_dpto')
        ->where('departamentos.nombre_departamento','=','JUNIN') 
        ->get();

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

        $ests=DB::table('establecimientos')
        ->select('establecimientos.id as id','establecimientos.codigo','establecimientos.nombre_establecimiento')
        ->get();

        $localidades=DB::table('localidades')
        ->select('localidades.id as id','localidades.nombre_localidad')
        ->get();

        return view('EntregaMosquitero',compact('dpto','prov','dist','ests','localidades'));

    }

}
