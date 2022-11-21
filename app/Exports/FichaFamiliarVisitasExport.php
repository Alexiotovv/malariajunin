<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class FichaFamiliarVisitasExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
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
        $obj=DB::table("ficha_familiars")
        ->leftjoin('visita_familiars','visita_familiars.IdFichaFamiliar','=','ficha_familiars.id')
        ->leftjoin('reds','reds.id','=','ficha_familiars.Idred')
        ->leftjoin('microreds','microreds.id','=','ficha_familiars.Idmicrored')
        ->leftjoin('establecimientos','establecimientos.id','=','ficha_familiars.IdEstablecimiento')
        ->leftjoin('provincias','provincias.id','=','ficha_familiars.IdProvincia')
        ->leftjoin('distritos','distritos.id','=','ficha_familiars.IdDistrito')
        ->leftjoin('users','users.id','=','ficha_familiars.Usuario')
        ->select('ficha_familiars.id as ID_FICHA_FAMILIAR',
        'ficha_familiars.Multifamiliar AS CASA_MULTIFAMILIAR',
        'ficha_familiars.Gerencia AS DIRESA',
        'reds.nombre_red AS RED',
        'microreds.nombre_microred AS MICRORED',
        'establecimientos.nombre_establecimiento AS ESTABLECIMIENTO',
        'provincias.nombre_provincia AS PROVINCIA',
        'distritos.nombre_distrito AS DISTRITO',
        'ficha_familiars.Localidad AS LOCALIDAD',
        'ficha_familiars.Sector AS SECTOR',
        'ficha_familiars.Arearesidencia AS AREA_RESI.',
        'ficha_familiars.Telefonocelular AS TEL.CELULAR',
        'ficha_familiars.Direccionvivienda AS DIR.VIVIENDA',
        'ficha_familiars.TelefoOtrapersona AS TEL.OTRA_PERSONA',
        'ficha_familiars.TiempoEESSCercano AS TIEMPO_EESS_CERCANO',
        'ficha_familiars.MedioTransporte AS MEDIO_TRANSPORTE',
        'ficha_familiars.TiempoResidencia AS TIEMPO_RESI',
        'ficha_familiars.ResidenciasAnteriores AS RESIDENCIA_ANTERIORES',
        'ficha_familiars.DisponibilidadProximasVisitas AS DISP.PROX.VISITAS',
        'ficha_familiars.CorreoElectronico AS CORREO',
        'ficha_familiars.Referencia AS REFERENCIA',
        'ficha_familiars.FechaUltimoRociadoResidual AS FECH.ULTIMO_ROCIADO_RES.',
        'ficha_familiars.Ninos AS NIÑOS',
        'ficha_familiars.Adolescentes AS ADOLESCENTE',
        'ficha_familiars.Jovenes AS JOVENES',
        'ficha_familiars.Adultos AS ADULTOS',
        'ficha_familiars.AdultosMayores AS ADULTOS_MAYORES',
        'ficha_familiars.EtniaRaza AS ETNIA_RAZA',
        'ficha_familiars.IdiomaPredominante AS IDIOMA_PRED.',
        'ficha_familiars.Religion AS RELIGION',
        'visita_familiars.FechaVisita AS FECHA_VISITA',
        'visita_familiars.ResponsableVisita AS RESPONSABLE_VISITA',
        'visita_familiars.ResultadoVisita AS RESULTADO_VISITA',
        'visita_familiars.ProximaVisita AS PROXIMA_VISITA',
        'users.name AS USUARIO',
        )
        ->where('users.id',$simbolo,$id_usuario)
        ->where('ficha_familiars.delete','=',0)

        ->get();
        return ($obj);
    }
    
    public function headings(): array
    {
        return [
        'ID_FICHA_FAMILIAR',
        'CASA_MULTIFAMILIAR',
        'DIRESA',
        'RED',
        'MICRORED',
        'ESTABLECIMIENTO',
        'PROVINCIA',
        'DISTRITO',
        'LOCALIDAD',
        'SECTOR',
        'AREA_RESI.',
        'TEL.CELULAR',
        'DIR.VIVIENDA',
        'TEL.OTRA_PERSONA',
        'TIEMPO_EESS_CERCANO',
        'MEDIO_TRANSPORTE',
        'TIEMPO_RESI',
        'RESIDENCIA_ANTERIORES',
        'DISP.PROX.VISITAS',
        'CORREO',
        'REFERENCIA',
        'FECH.ULTIMO_ROCIADO_RES.',
        'NIÑOS',
        'ADOLESCENTE',
        'JOVENES',
        'ADULTOS',
        'ADULTOS_MAYORES',
        'ETNIA_RAZA',
        'IDIOMA_PRED.',
        'RELIGION',
        'FECHA_VISITA',
        'RESPONSABLE_VISITA',
        'RESULTADO_VISITA',
        'PROXIMA_VISITA',
        'USUARIO',
       ];
    }
    
}
