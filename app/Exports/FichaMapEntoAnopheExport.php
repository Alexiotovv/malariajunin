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
        ->select(
        'mapento_cuadros.id as ID_FICHA',
        'provincias.nombre_provincia AS PROVINCIA',
        'distritos.nombre_distrito AS DISTRITO',
        'reds.nombre_red AS RED',
        'microreds.nombre_microred AS MICRORED',
        'localidades.nombre_localidad AS LOCALIDAD',
        'mapento_cuadros.intra_Apseudopun',
        'mapento_cuadros.intra_Anuneztovari',
        'mapento_cuadros.intra_Arangeli',
        'mapento_cuadros.intra_Anodefinido',
        'mapento_cuadros.peri_Apseudopun',
        'mapento_cuadros.peri_Anuneztovari',
        'mapento_cuadros.peri_Arangeli',
        'mapento_cuadros.peri_Anodefinido',
        'mapento_cuadros.extra_Apseudopun',
        'mapento_cuadros.extra_Anuneztovari',
        'mapento_cuadros.extra_Arangeli',
        'mapento_cuadros.extra_Anodefinido',
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
            'intra_Apseudopun',
            'intra_Anuneztovari',
            'intra_Arangeli',
            'intra_Anodefinido',
            'peri_Apseudopun',
            'peri_Anuneztovari',
            'peri_Arangeli',
            'peri_Anodefinido',
            'extra_Apseudopun',
            'extra_Anuneztovari',
            'extra_Arangeli',
            'extra_Anodefinido',
            'MES',
            'AÑO',
            'USUARIO',
       ];
    }
}
