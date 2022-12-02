<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class FichaMosquiterosEntregadosExport implements FromCollection,WithHeadings
{
    
    public function collection()
    {
        //FICHA_FAMILIAR_Y_VISITA_FAMILIAR
        $id_usuario=0;
        $simbolo="";
        if (auth()->user()->is_admin) {
            $id_usuario=0;
            $simbolo=">";
        }else{
            $id_usuario=auth()->user()->id;
            $simbolo="=";
        }
        
        $obj=DB::table("mosquiteros_entregados")
        ->leftjoin('departamentos','departamentos.id','=','mosquiteros_entregados.Departamento')
        ->leftjoin('provincias','provincias.id','=','mosquiteros_entregados.Provincia')
        ->leftjoin('distritos','distritos.id','=','mosquiteros_entregados.Distrito')
        ->leftjoin('establecimientos','establecimientos.id','=','mosquiteros_entregados.Ipress')
        ->leftjoin('users','users.id','=','mosquiteros_entregados.Usuario')
        ->leftjoin('encuestado_mosqs','encuestado_mosqs.idMonitoreo','=','mosquiteros_entregados.id')
        ->leftjoin('localidades','localidades.id','=','mosquiteros_entregados.idLocalidad')
        ->select(
            'departamentos.nombre_departamento as DEPARTAMENTO',
            'provincias.nombre_provincia as PROVINCIA',
            'distritos.nombre_distrito as DISTRITO',
            'establecimientos.nombre_establecimiento as IPRESS',
            'localidades.nombre_localidad AS COMUNIDAD',
            'mosquiteros_entregados.FechaEntrega AS FECHA_ENTREGA',
            'mosquiteros_entregados.FechaMonitoreo AS FECHA_MONITOREO',
            'mosquiteros_entregados.NumeroMonitoreo AS NUMERO_MONITOREO',
            'mosquiteros_entregados.Responsable AS RESPONSABLE',
            'mosquiteros_entregados.CargoResponsable AS CARGO_RESPONSABLE',
            //la segunda hoja de los censados
            'encuestado_mosqs.Nombre as NOMBRE',
            'encuestado_mosqs.Apellido as APELLIDO',
            'encuestado_mosqs.Edad as EDAD',
            'encuestado_mosqs.DNI as DNI',
            'encuestado_mosqs.NPersonasFemenino as NPERSONAS_FEMENINO',
            'encuestado_mosqs.NPersonasMasculino as NPERSONAS_MASCULINO',
            'encuestado_mosqs.NEmbarazadas as NEMBARAZADAS',
            'encuestado_mosqs.NNinosMenor5 as NNINOS_MENOR5',
            'encuestado_mosqs.NCamasDormir as NCAMAS_DORMIR',
            'encuestado_mosqs.NMosqTela as as NMOSQ_TELA',
            'encuestado_mosqs.NMosqMTILDAntiguo as NMOSQ_MTILD_ANTIGUO',
            'encuestado_mosqs.NMTILDEntregados as NMOSQ_MTILD_ENTREGADOS',
            'encuestado_mosqs.NMTILDUso as NMTILD_USO',
            'encuestado_mosqs.NPersonasUsanMosqFemenino as NPERSONAS_USAN_MOSQ_FEMENINO',
            'encuestado_mosqs.NPersonasUsanMosqMasculino as NPERSONAS_USAN_MOSQ_MASCULINO',
            'encuestado_mosqs.NEmbarazadasUsanMosq as NEMBARAZADAS_USAN_MOSQ',
            'encuestado_mosqs.NNinosMenor5UsanMosq as NNINOS_MENOR_5USAN_MOSQ',
            'encuestado_mosqs.NMTILDSinUso as NMTILD_SIN_USO',
            'encuestado_mosqs.RazonNoUso as RAZON_NO_USO',
            'encuestado_mosqs.NLimpios as NLIMPIOS',
            'encuestado_mosqs.NSucios as NSUCIOS',
            'encuestado_mosqs.NRotos as NROTOS',
            'encuestado_mosqs.N6_7Noches as N6_7NOCHES',
            'encuestado_mosqs.N1_5Noches as N1_5NOCHES',
            'encuestado_mosqs.N0Noches as N0NOCHES',
            'encuestado_mosqs.NMTILDLavados as NMTILD_LAVADOS',
            'encuestado_mosqs.NLavadoCorrecto as NLAVADO_CORRECTO',
            'encuestado_mosqs.NLavadoIncorrecto as NLAVADO_INCORRECTO',
            'encuestado_mosqs.RioLago as RIO_LAGO',
            'encuestado_mosqs.BandejaOtro as BANDEJA_OTRO',
            'encuestado_mosqs.Sol as SOL',
            'encuestado_mosqs.Sombra as SOMBRA',
            'encuestado_mosqs.Colgado as COLGADO',
            'encuestado_mosqs.RecogidoDia as RECOGIDO_DIA',
            'encuestado_mosqs.GuardadoDia as GUARDADO_DIA',
            'encuestado_mosqs.Embarazadas as EMBARAZADAS',
            'encuestado_mosqs.NinosMenor5 as NINOS_MENOR5',
            'encuestado_mosqs.OtrasPersonas as OTRAS_PERSONAS',
            'encuestado_mosqs.TipoReaccion1 as TIPO_REACCION1',
            'encuestado_mosqs.TipoReaccion2 as TIPO_REACCION2',
            'encuestado_mosqs.TipoReaccion3 as TIPO_REACCION3',
            'encuestado_mosqs.TipoReaccion4 as TIPO_REACCION4',
            'encuestado_mosqs.TipoReaccion5 as TIPO_REACCION5',
            'encuestado_mosqs.TipoReaccion6 as TIPO_REACCION6',
            'encuestado_mosqs.Informante as INFORMANTE',
            'encuestado_mosqs.Observaciones as OBSERVACIONES',
            'users.name AS USUARIO',
        )
        ->where('users.id',$simbolo,$id_usuario)
        ->where('mosquiteros_entregados.delete','=',0)
        ->get();
        return ($obj);
    }
    
    public function headings(): array
    {
        return [
            'DEPARTAMENTO',
            'PROVINCIA',
            'DISTRITO',
            'IPRESS',
            'COMUNIDAD',
            'FECHA_ENTREGA',
            'FECHA_MONITOREO',
            'NUMERO_MONITOREO',
            'RESPONSABLE',
            'CARGO_RESPONSABLE',
            //la segunda hoja de los censados
            'NOMBRE',
            'APELLIDO',
            'EDAD',
            'DNI',
            'NPERSONAS_FEMENINO',
            'NPERSONAS_MASCULINO',
            'NEMBARAZADAS',
            'NNINOS_MENOR5',
            'NCAMAS_DORMIR',
            'NMOSQ_TELA',
            'NMOSQ_MTILD_ANTIGUO',
            'NMOSQ_MTILD_ENTREGADOS',
            'NMTILD_USO',
            'NPERSONAS_USAN_MOSQ_FEMENINO',
            'NPERSONAS_USAN_MOSQ_MASCULINO',
            'NEMBARAZADAS_USAN_MOSQ',
            'NNINOS_MENOR_5USAN_MOSQ',
            'NMTILD_SIN_USO',
            'RAZON_NO_USO',
            'NLIMPIOS',
            'NSUCIOS',
            'NROTOS',
            'N6_7NOCHES',
            'N1_5NOCHES',
            'N0NOCHES',
            'NMTILD_LAVADOS',
            'NLAVADO_CORRECTO',
            'NLAVADO_INCORRECTO',
            'RIO_LAGO',
            'BANDEJA_OTRO',
            'SOL',
            'SOMBRA',
            'COLGADO',
            'RECOGIDO_DIA',
            'GUARDADO_DIA',
            'EMBARAZADAS',
            'NINOS_MENOR5',
            'OTRAS_PERSONAS',
            'TIPO_REACCION1',
            'TIPO_REACCION2',
            'TIPO_REACCION3',
            'TIPO_REACCION4',
            'TIPO_REACCION5',
            'TIPO_REACCION6',
            'INFORMANTE',
            'OBSERVACIONES',
            'USUARIO',
       ];
    }
}
