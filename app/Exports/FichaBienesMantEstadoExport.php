<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class FichaBienesMantEstadoExport implements FromCollection,WithHeadings
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
        $obj=DB::table("mantbienes")
        ->leftjoin('reds','reds.id','=','mantbienes.Idred')
        ->leftjoin('microreds','microreds.id','=','mantbienes.Idmicrored')
        ->leftjoin('provincias','provincias.id','=','mantbienes.IdProvincia')
        ->leftjoin('distritos','distritos.id','=','mantbienes.IdDistrito')
        ->leftjoin('establecimientos','establecimientos.id','=','mantbienes.Ipress')
        ->leftjoin('mantbienes_detalles','mantbienes_detalles.IdMantbienes','=','mantbienes.id')
        ->leftjoin('users','users.id','=','mantbienes.Usuario')
        ->select(
        'mantbienes.id as ID_FICHA',
        'provincias.nombre_provincia AS PROVINCIA',
        'distritos.nombre_distrito AS DISTRITO',
        'reds.nombre_red AS RED',
        'microreds.nombre_microred AS MICRORED',
        'establecimientos.nombre_establecimiento AS IPRESS',
        'mantbienes_detalles.Descripcion AS DESCRIPCION',
        'mantbienes_detalles.NumeroSerie AS NUMERO_SERIE',
        'mantbienes_detalles.Modelo AS MODELO',
        'mantbienes_detalles.Marca AS MARCA',
        'mantbienes_detalles.AnoFab AS AÑO_FAB',        
        'mantbienes_detalles.AnoCompra AS AÑO_COMPRA',
        'mantbienes_detalles.Estado AS ESTADO',
        'mantbienes_detalles.Observaciones AS OBSERVACIONES',
        'mantbienes_detalles.MPreventivo AS FECHA_MANT_PREVENTIVO',
        'mantbienes_detalles.MCorrectivo AS FECHA_MANT_CORRECTIVO',
        'users.name AS USUARIO',
        )
        ->where('users.id',$simbolo,$id_usuario)
        ->where('mantbienes.delete','=',0)

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
            'IPRESS',
            'DESCRIPCION',
            'NUMERO_SERIE',
            'MODELO',
            'MARCA',
            'AÑO_FAB',
            'AÑO_COMPRA',
            'ESTADO',
            'OBSERVACIONES',
            'FECHA_MANT_PREVENTIVO',
            'FECHA_MANT_CORRECTIVO',
            'USUARIO',
       ];
    }
}
