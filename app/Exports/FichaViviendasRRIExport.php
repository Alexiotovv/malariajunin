<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class FichaViviendasRRIExport implements FromCollection,WithHeadings
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
        $obj=DB::table("viviendasconrris")
        ->leftjoin('reds','reds.id','=','viviendasconrris.Idred')
        ->leftjoin('microreds','microreds.id','=','viviendasconrris.Idmicrored')
        ->leftjoin('provincias','provincias.id','=','viviendasconrris.IdProvincia')
        ->leftjoin('distritos','distritos.id','=','viviendasconrris.IdDistrito')
        ->leftjoin('viviendasrociadas','viviendasrociadas.IdViviendasIRR','=','viviendasconrris.id')
        ->leftjoin('users','users.id','=','viviendasconrris.Usuario')
        ->leftjoin('localidades','localidades.id','=','viviendasconrris.idLocalidad')
        ->select(
        'viviendasconrris.id as ID_FICHA',
        'provincias.nombre_provincia AS PROVINCIA',
        'distritos.nombre_distrito AS DISTRITO',
        'reds.nombre_red AS RED',
        'microreds.nombre_microred AS MICRORED',
        'localidades.nombre_localidad AS LOCALIDAD',
        'viviendasrociadas.NumeroViviendasRociadas AS VIVIENDAS_ROCIADAS',
        'viviendasrociadas.FechaPrimerCiclo AS FECHA_PRIMER_CICLO',
        'viviendasrociadas.FechaSegundoCiclo AS FECHA_SEGUNDO_CICLO',
        'users.name AS USUARIO',
        )
        ->where('users.id',$simbolo,$id_usuario)
        ->where('viviendasconrris.delete','=',0)

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
            'VIVIENDAS_ROCIADAS',
            'FECHA_PRIMER_CICLO',
            'FECHA_SEGUNDO_CICLO',
            'USUARIO',
       ];
    }
}
