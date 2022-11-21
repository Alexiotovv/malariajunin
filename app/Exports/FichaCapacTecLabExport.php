<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class FichaCapacTecLabExport implements FromCollection,WithHeadings
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
        $obj=DB::table("capacitaciones")
        ->leftjoin('reds','reds.id','=','capacitaciones.Idred')
        ->leftjoin('microreds','microreds.id','=','capacitaciones.Idmicrored')
        ->leftjoin('provincias','provincias.id','=','capacitaciones.IdProvincia')
        ->leftjoin('distritos','distritos.id','=','capacitaciones.IdDistrito')
        ->leftjoin('establecimientos','establecimientos.id','=','capacitaciones.Ipress')
        ->leftjoin('capacitaciones_detalles','capacitaciones_detalles.IdCapacitaciones','=','capacitaciones.id')
        ->leftjoin('users','users.id','=','capacitaciones.Usuario')
        ->select(
        'capacitaciones.id as ID_FICHA',
        'provincias.nombre_provincia AS PROVINCIA',
        'distritos.nombre_distrito AS DISTRITO',
        'reds.nombre_red AS RED',
        'microreds.nombre_microred AS MICRORED',
        'establecimientos.nombre_establecimiento AS IPRESS',
        'capacitaciones_detalles.NombreMicroscopista AS NOMBRE_MICROSCOPISTA',
        'capacitaciones_detalles.ApellidoMicroscopista AS APELLIDO_MICROSCOPISTA',
        'capacitaciones_detalles.Concordancia AS CONCORDANCIA',        
        'capacitaciones_detalles.UltimaCapacitacion AS ULTIMA_CAPACITACIÓN',
        'capacitaciones_detalles.FechaUltEvalPanelLam AS FECHA_ULT_EVAL_PANEL_LAM',
        'users.name AS USUARIO',
        )
        ->where('users.id',$simbolo,$id_usuario)
        ->where('capacitaciones.delete','=',0)

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
            'NOMBRE_MICROSCOPISTA',
            'APELLIDO_MICROSCOPISTA',
            'CONCORDANCIA',        
            'ULTIMA_CAPACITACIÓN',
            'FECHA_ULT_EVAL_PANEL_LAM',
            'USUARIO',
       ];
    }
}
