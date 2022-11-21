<?php

namespace App\Http\Controllers;

use App\Models\Mosquiteros;
use App\Models\CensoMosquiteros;
use Illuminate\Http\Request;
use DB;
class MosquiterosController extends Controller
{

    public function EliminaCensoMosquitero($id)
    {
        $obj=CensoMosquiteros::findOrFail($id);
        $obj->delete();
        $data=['Mensaje'=>'ok'];
        return response()->json($data);
    }

    public function ActualizaCensoMosquitero(Request $request)
    {
        $id=request('IdCensoMosquitero');
        $obj=CensoMosquiteros::findOrFail($id);
        $obj->NumeroMosquitero=request('NumeroMosquitero');
        $obj->CantidadUsan=request('CantidadUsan');
        $obj->Tamano=request('Tamano');
        $obj->BuenEstado=request('BuenEstado');
        $obj->Impregnado=request('Impregnado');
        $obj->FechaImpregnacion=request('FechaImpregnacion');
        $obj->InsecticidaUsado=request('InsecticidaUsado');
        $obj->Material=request('Material');
        $obj->Color=request('Color');
        $obj->JefeHogar=request('JefeHogar');
        $obj->DniJefeHogar=request('DniJefeHogar');
        $obj->ResponsableCenso=request('ResponsableCenso');
        $obj->DniResponsableCenso=request('DniResponsableCenso');
        $obj->ResponsableCenso2=request('ResponsableCenso2');
        $obj->DniResponsableCenso2=request('DniResponsableCenso2');
        $obj->save();
        $data=['Mensaje'=>'ok'];
        return response()->json($data);
    }

    public function GuardaCensoMosquitero(Request $request)
    {
        $obj = new CensoMosquiteros();
        $obj->IdFichaMosquitero=request('IdFichaMosquitero');
        $obj->NumeroMosquitero=request('NumeroMosquitero');
        $obj->CantidadUsan=request('CantidadUsan');
        $obj->Tamano=request('Tamano');
        $obj->BuenEstado=request('BuenEstado');
        $obj->Impregnado=request('Impregnado');
        $obj->FechaImpregnacion=request('FechaImpregnacion');
        $obj->InsecticidaUsado=request('InsecticidaUsado');
        $obj->Material=request('Material');
        $obj->Color=request('Color');
        $obj->JefeHogar=request('JefeHogar');
        $obj->DniJefeHogar=request('DniJefeHogar');
        $obj->ResponsableCenso=request('ResponsableCenso');
        $obj->DniResponsableCenso=request('DniResponsableCenso');
        $obj->ResponsableCenso2=request('ResponsableCenso2');
        $obj->DniResponsableCenso2=request('DniResponsableCenso2');
        $obj->save();
        $data=['Mensaje'=>'ok'];
        return response()->json($data);
    }

    public function ListarCensoMosquiteros($id)
    {
        $lista=DB::table('censo_mosquiteros')
        ->select('censo_mosquiteros.*')
        ->where('censo_mosquiteros.IdFichaMosquitero','=',$id)
        ->get();
        return datatables()->of($lista)->toJson();
    }

    public function ActualizaMosquitero(Request $request)
    {
        $id=request('IdMosquitero');
        $obj = Mosquiteros::findOrFail($id);
        $obj->Localidad=request('Localidad');
        $obj->IdProvincia=request('Provincia');
        $obj->IdDistrito=request('Distrito');
        $obj->IdEstablecimiento=request('Establecimiento');
        $obj->IdEstablecimientoMicroscopio=request('EstablecimientoMicroscopio');
        $obj->TiempoHorasEESS=request('TiempoHorasEESS');
        $obj->TiempoHorasEESSMicroscopio=request('TiempoHorasEESSMicroscopio');
        $obj->MedioTransporte=request('MedioTransporte');
        $obj->Hombres=request('Hombres');
        $obj->Mujeres=request('Mujeres');
        $obj->Gestantes=request('Gestantes');
        $obj->Menor5anos=request('Menor5anos');
        $obj->Mayor60anos=request('Mayor60anos');
        $obj->NumeroCamas=request('NumeroCamas');
        $obj->MosqImpregnadosBuenEstado=request('MosqImpregnadosBuenEstado');
        $obj->MosqImpregnadosMalEstado=request('MosqImpregnadosMalEstado');
        $obj->MosqNoImpregnadosBuenEstado=request('MosqNoImpregnadosBuenEstado');
        $obj->MosqNoImpregnadosMalEstado=request('MosqNoImpregnadosMalEstado');
        $obj->TamanoPersonal=request('TamanoPersonal');
        $obj->TamanoFamiliar=request('TamanoFamiliar');
        $obj->Usuario=auth()->user()->id;
        $obj->save();
        $data=['Mensaje'=>'OK'];
        return response()->json($data);

    }

    public function EditarMosquitero($id)
    {
        $lista=DB::table('mosquiteros')
        ->select('mosquiteros.*')
        ->where('mosquiteros.id','=',$id)
        ->get();
        return response()->json($lista);
    }

    public function EliminarMosquitero($id)
    {
        $obj=Mosquiteros::findOrFail($id);
        $obj->delete=1;
        $obj->save();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }

    public function GuardaMosquitero(Request $request)
    {
        $obj = new Mosquiteros();
        $obj->Localidad=request('Localidad');
        $obj->IdProvincia=request('Provincia');
        $obj->IdDistrito=request('Distrito');
        $obj->IdEstablecimiento=request('Establecimiento');
        $obj->IdEstablecimientoMicroscopio=request('EstablecimientoMicroscopio');
        $obj->TiempoHorasEESS=request('TiempoHorasEESS');
        $obj->TiempoHorasEESSMicroscopio=request('TiempoHorasEESSMicroscopio');
        $obj->MedioTransporte=request('MedioTransporte');
        $obj->Hombres=request('Hombres');
        $obj->Mujeres=request('Mujeres');
        $obj->Gestantes=request('Gestantes');
        $obj->Menor5anos=request('Menor5anos');
        $obj->Mayor60anos=request('Mayor60anos');
        $obj->NumeroCamas=request('NumeroCamas');
        $obj->MosqImpregnadosBuenEstado=request('MosqImpregnadosBuenEstado');
        $obj->MosqImpregnadosMalEstado=request('MosqImpregnadosMalEstado');
        $obj->MosqNoImpregnadosBuenEstado=request('MosqNoImpregnadosBuenEstado');
        $obj->MosqNoImpregnadosMalEstado=request('MosqNoImpregnadosMalEstado');
        $obj->TamanoPersonal=request('TamanoPersonal');
        $obj->TamanoFamiliar=request('TamanoFamiliar');
        $obj->Usuario=auth()->user()->id;
        $obj->save();
        $data=['Mensaje'=>'OK'];
        return response()->json($data);
    }

public function ListarMosquiteros()
{
    $lista=DB::table('mosquiteros')
    ->leftjoin('establecimientos','establecimientos.id','=','mosquiteros.IdEstablecimiento')
    ->leftjoin('establecimientos as establecimientos2','establecimientos2.id','=','mosquiteros.IdEstablecimientoMicroscopio')
    ->leftjoin('provincias','provincias.id','=','mosquiteros.IdProvincia')
    ->leftjoin('distritos','distritos.id','=','mosquiteros.IdDistrito')
    ->select('mosquiteros.id',
        'provincias.nombre_provincia',
        'distritos.nombre_distrito',
        'establecimientos.nombre_establecimiento',
        'establecimientos2.nombre_establecimiento as nombre_establecimiento2',
        'mosquiteros.TiempoHorasEESS',
        'mosquiteros.TiempoHorasEESSMicroscopio',
        'mosquiteros.Localidad',
        'mosquiteros.MedioTransporte',
        'mosquiteros.Hombres',
        'mosquiteros.Mujeres',
        'mosquiteros.Gestantes',
        'mosquiteros.Menor5anos',
        'mosquiteros.Mayor60anos',
        'mosquiteros.NumeroCamas',
        'mosquiteros.MosqImpregnadosBuenEstado',
        'mosquiteros.MosqImpregnadosMalEstado',
        'mosquiteros.MosqNoImpregnadosBuenEstado',
        'mosquiteros.MosqNoImpregnadosMalEstado',
        'mosquiteros.TamanoPersonal',
        'mosquiteros.TamanoFamiliar')
    ->where('mosquiteros.delete','=',0)
    ->get();
    return datatables()->of($lista)->toJson();
}

public function Mosquiteros(Request $request)
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
    $ests=DB::table('establecimientos')
    ->select('establecimientos.id as id','establecimientos.codigo','establecimientos.nombre_establecimiento')
    ->get();
    return view('mosquiteros',compact('prov','dist','ests'),['estsa'=>$ests]);
}


}
