<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class FichaMapEntoAnopheExport implements FromCollection,WithHeadings
{
    
    public function collection()
    {
        //FICHA_CENSO BIENES CON MANTENIMIENTO Y ESTADO DE LOS MISMOS
        $id_usuario=0;
        $simbolo="";
        if (auth()->user()->is_admin) {
            $id_usuario=0;
            $simbolo=">";
        }else{
            $id_usuario=auth()->user()->id;
            $simbolo="=";
        }
        $obj=DB::table("mapento_cuadros")
        ->leftjoin('reds','reds.id','=','mapento_cuadros.Idred')
        ->leftjoin('microreds','microreds.id','=','mapento_cuadros.Idmicrored')
        ->leftjoin('provincias','provincias.id','=','mapento_cuadros.IdProvincia')
        ->leftjoin('distritos','distritos.id','=','mapento_cuadros.IdDistrito')
        ->leftjoin('users','users.id','=','mapento_cuadros.Usuario')
        ->leftjoin('localidades','localidades.id','=','mapento_cuadros.idLocalidad')
        ->leftjoin('especies','especies.id','=','mapento_cuadros.idEspecies')
        ->select(
        'mapento_cuadros.id as ID_FICHA',
        'provincias.nombre_provincia AS PROVINCIA',
        'distritos.nombre_distrito AS DISTRITO',
        'reds.nombre_red AS RED',
        'microreds.nombre_microred AS MICRORED',
        'localidades.nombre_localidad AS LOCALIDAD',
        'mapento_cuadros.tipo_mapeo AS TIPO',
        'especies.nombre_especie AS NOMBRE_ESPECIE',
        'mapento_cuadros.cantidad as CANTIDAD',
        'mapento_cuadros.mes AS MES',
        'mapento_cuadros.ano AS AÑO',
        'users.name AS USUARIO')
        ->where('users.id',$simbolo,$id_usuario)
        ->where('mapento_cuadros.delete','=',0)
        ->get();
        return ($obj);
    }
    
    public function headings(): array
    {
        return [
            'ID_FICHA',
            'PROVINCIA',
            'DISTRITO',
            'RED',
            'MICRORED',
            'LOCALIDAD',
            'TIPO',
            'NOMBRE_ESPECIE',
            'CANTIDAD',
            'MES',
            'AÑO',
            'USUARIO',
       ];
    }
}
