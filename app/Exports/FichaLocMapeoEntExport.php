<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class FichaLocMapeoEntExport implements FromCollection,WithHeadings
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
        $obj=DB::table("mapeoentos")
        ->leftjoin('reds','reds.id','=','mapeoentos.Idred')
        ->leftjoin('microreds','microreds.id','=','mapeoentos.Idmicrored')
        ->leftjoin('provincias','provincias.id','=','mapeoentos.IdProvincia')
        ->leftjoin('distritos','distritos.id','=','mapeoentos.IdDistrito')
        ->leftjoin('mapeoento_indicepicaduras','mapeoento_indicepicaduras.IdMapeoEnto','=','mapeoentos.id')
        ->leftjoin('users','users.id','=','mapeoentos.Usuario')
        ->leftjoin('localidades','localidades.id','=','mapeoentos.idLocalidad')
        ->select(
        'mapeoentos.id as ID_FICHA',
        'provincias.nombre_provincia AS PROVINCIA',
        'distritos.nombre_distrito AS DISTRITO',
        'reds.nombre_red AS RED',
        'microreds.nombre_microred AS MICRORED',
        'localidades.nombre_localidad AS LOCALIDAD',
        'mapeoento_indicepicaduras.fecha AS FECHA',
        'mapeoento_indicepicaduras.indicehombrehora AS INDICE_HOMBRE_HORA',
        'mapeoento_indicepicaduras.indicehombrenoche AS INDICE_HOMBRE_NOCHE',
        'users.name AS USUARIO',
        )
        ->where('users.id',$simbolo,$id_usuario)
        ->where('mapeoentos.delete','=',0)

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
            'FECHA',
            'INDICE_HOMBRE_HORA',
            'INDICE_HOMBRE_NOCHE',
            'USUARIO',
       ];
    }
}
