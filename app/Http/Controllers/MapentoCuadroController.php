<?php
namespace App\Http\Controllers;

use App\Models\MapentoCuadro;
use Illuminate\Http\Request;
use DB;

class MapentoCuadroController extends Controller
{

    public function EliminaMapeoEntoCuadro($id)
    {
        $obj=MapentoCuadro::findOrFail($id);
        $obj->delete=1;
        $obj->save();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }

    public function ActualizaMapeoEntoCuadro(Request $request)
    {
        $id=request('IdMapeoEntoCuadro');
        $obj= MapentoCuadro::findOrFail($id);
        $obj->Idmicrored=request('Idmicrored');
        $obj->IdProvincia=request('Provincia');
        $obj->IdDistrito=request('Distrito');
        $obj->idLocalidad=request('Localidad');
        $obj->idEspecies=request('Especies');
        $obj->cantidad=request('Cantidad');
        $obj->tipo_mapeo=request('tipo_mapeo');
        $obj->mes=request('mes');
        $obj->ano=request('ano');
        // $obj->delete=request('');
        // $obj->Usuario=auth()->user()->id;;
        $obj->save();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }

    public function EditaMapeoEntoCuadro($id)
    {
        $lista=DB::table('mapento_cuadros')
        ->select('mapento_cuadros.*')
        ->where('mapento_cuadros.id','=',$id)
        ->get();
        return response()->json($lista);
    }

    public function GuardaMapeoEntoCuadro(Request $request)
    {

        $obj=new MapentoCuadro();
        $obj->Idred=request('Idred');
        $obj->Idmicrored=request('Idmicrored');
        $obj->IdProvincia=request('Provincia');
        $obj->IdDistrito=request('Distrito');
        $obj->idLocalidad=request('Localidad');
        $obj->idEspecies=request('Especies');
        $obj->cantidad=request('Cantidad');
        $obj->tipo_mapeo=request('tipo_mapeo');
        $obj->mes=request('mes');
        $obj->ano=request('ano');
        // $obj->delete=request('');
        $obj->Usuario=auth()->user()->id;;
        $obj->save();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }

    public function ListarMapeoEntoCuadro(Request $request)
    {
        $lista=DB::table('mapento_cuadros')
        ->leftjoin('provincias','provincias.id','=','mapento_cuadros.IdProvincia')
        ->leftjoin('distritos','distritos.id','=','mapento_cuadros.IdDistrito')
        ->leftjoin('reds','reds.id','=','mapento_cuadros.Idred')
        ->leftjoin('microreds','microreds.id','=','mapento_cuadros.Idmicrored')
        ->leftjoin('users','users.id','=','mapento_cuadros.Usuario')
        ->leftjoin('localidades','localidades.id','=','mapento_cuadros.idLocalidad')
        ->leftjoin('especies','especies.id','=','mapento_cuadros.idEspecies')
        ->select('mapento_cuadros.*','provincias.nombre_provincia as Provincia',
        'reds.nombre_red as Red','microreds.nombre_microred as Microred',
        'distritos.nombre_distrito as Distrito','users.name as Usuario',
        'localidades.nombre_localidad as NombreLocalidad','especies.nombre_especie')
        ->where('mapento_cuadros.delete','=',0)
        ->get();
        return datatables()->of($lista)->toJson();
    }

    public function MapeoEntoCuadro(Request $request)
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

        $localidades=DB::table('localidades')
        ->select('localidades.id as id','localidades.nombre_localidad')
        ->get();
        $especies=DB::table('especies')
        ->select('especies.id','especies.nombre_especie')
        ->get();
        return view('MapeoentoCuadro',compact('prov','dist','red','microred','localidades','especies'));
    }
}