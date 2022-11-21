<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class FichaEvaluacionMosqRUExport implements FromCollection,WithHeadings
{
    
    public function collection()
    {
        //FICHA_MOSQUITEROS RETENIDOS Y USADOS
        $id_usuario=0;
        $simbolo="";
        if (auth()->user()->is_admin) {
            $id_usuario=0;
            $simbolo=">";
        }else{
            $id_usuario=auth()->user()->id;
            $simbolo="=";
        }
        $obj=DB::table("mosquiteros")
        ->leftjoin('censo_mosquiteros','censo_mosquiteros.IdFichaMosquitero','=','mosquiteros.id')
        ->leftjoin('establecimientos','establecimientos.id','=','mosquiteros.IdEstablecimiento')
        ->leftjoin('establecimientos as establecimientos2','establecimientos2.id','=','mosquiteros.IdEstablecimientoMicroscopio')
        ->leftjoin('provincias','provincias.id','=','mosquiteros.IdProvincia')
        ->leftjoin('distritos','distritos.id','=','mosquiteros.IdDistrito')
        ->leftjoin('users','users.id','=','mosquiteros.Usuario')
        ->select(
        'mosquiteros.id as ID_FICHA_MOSQ',
        'provincias.nombre_provincia AS PROVINCIA',
        'distritos.nombre_distrito AS DISTRITO',
        'mosquiteros.Localidad AS LOCALIDAD',
        'establecimientos.nombre_establecimiento AS ESTABLECIMIENTO_CERCANO',
        'mosquiteros.TiempoHorasEESS AS TIEMPO_HORAS_EESS_CERCANO',
        'establecimientos2.nombre_establecimiento AS ESTABLECIMIENTO_CERCANO_MICROSCOPIO',
        'mosquiteros.TiempoHorasEESSMicroscopio AS TIEMPO_HORAS_EESS_CERCANO_MICROSCOPIO',
        'mosquiteros.MedioTransporte AS MEDIO_TRANSPORTE',
        'mosquiteros.Hombres AS HOMBRES',
        'mosquiteros.Mujeres AS MUJERES',
        'mosquiteros.Gestantes AS GESTANTES',
        'mosquiteros.Menor5anos AS MENORES_5_AÑOS',
        'mosquiteros.Mayor60anos AS MAYOR_60_AÑOS',
        'mosquiteros.NumeroCamas AS NUMERO_CAMAS',
        'mosquiteros.MosqImpregnadosBuenEstado AS MOSQ_IMPR_BUEN_ESTADO',
        'mosquiteros.MosqImpregnadosMalEstado AS MOSQ_IMPR_BUEN_MAL_ESTADO',
        'mosquiteros.MosqNoImpregnadosBuenEstado AS MOSQ_NO_IMPR_BUEN_ESTADO',
        'mosquiteros.MosqNoImpregnadosMalEstado AS MOSQ_NO_IMPR_BUEN_MAL_ESTADO',
        'mosquiteros.TamanoPersonal AS TAMAÑO_PERSONAL',
        'mosquiteros.TamanoFamiliar AS TAMAÑO_FAMILIAR',
        'censo_mosquiteros.NumeroMosquitero AS NUMERO_MOSQUITERO',
        'censo_mosquiteros.CantidadUsan AS CANTIDAD_USAN',
        'censo_mosquiteros.Tamano AS TAMANÑO',
        'censo_mosquiteros.BuenEstado AS BUEN_ESTADO',
        'censo_mosquiteros.Impregnado AS IMPREGNADO',
        'censo_mosquiteros.FechaImpregnacion AS FECHA_IMPREGNACIÓN',
        'censo_mosquiteros.InsecticidaUsado AS INSECTICIDA_USADO',
        'censo_mosquiteros.Material AS MATERIAL',
        'censo_mosquiteros.Color AS COLOR',
        'censo_mosquiteros.JefeHogar AS JEFE_HOGAR',
        'censo_mosquiteros.DniJefeHogar AS DNI_JEFE_HOGAR',
        'censo_mosquiteros.ResponsableCenso AS RESPONSABLE_CENSO',
        'censo_mosquiteros.DniResponsableCenso AS DNI_RESPONSABLE_CENSO',
        'users.name AS USUARIO',
        )
        ->where('users.id',$simbolo,$id_usuario)
        ->where('mosquiteros.delete','=',0)

        ->get();
        return ($obj);
    }
    
    public function headings(): array
    {
        return [
            'ID_FICHA_MOSQ',
            'PROVINCIA',
            'DISTRITO',
            'LOCALIDAD',
            'ESTABLECIMIENTO_CERCANO',
            'TIEMPO_HORAS_EESS_CERCANO',
            'ESTABLECIMIENTO_CERCANO_MICROSCOPIO',
            'TIEMPO_HORAS_EESS_CERCANO_MICROSCOPIO',
            'MEDIO_TRANSPORTE',
            'HOMBRES',
            'MUJERES',
            'GESTANTES',
            'MENORES_5_AÑOS',
            'MAYOR_60_AÑOS',
            'NUMERO_CAMAS',
            'MOSQ_IMPR_BUEN_ESTADO',
            'MOSQ_IMPR_BUEN_MAL_ESTADO',
            'MOSQ_NO_IMPR_BUEN_ESTADO',
            'MOSQ_NO_IMPR_BUEN_MAL_ESTADO',
            'TAMAÑO_PERSONAL',
            'TAMAÑO_FAMILIAR',
            'NUMERO_MOSQUITERO',
            'CANTIDAD_USAN',
            'TAMANÑO',
            'BUEN_ESTADO',
            'IMPREGNADO',
            'FECHA_IMPREGNACIÓN',
            'INSECTICIDA_USADO',
            'MATERIAL',
            'COLOR',
            'JEFE_HOGAR',
            'DNI_JEFE_HOGAR',
            'RESPONSABLE_CENSO',
            'DNI_RESPONSABLE_CENSO',
            'USUARIO',
       ];
    }
}
