<?php

namespace App\Http\Controllers;

use App\Models\FichaFamiliars;
use App\Models\VisitaFamiliars;
use App\Models\MiembrosFamiliars;
use App\Models\CaracteristicaFamiliars;
use Illuminate\Http\Request;
use DB;

class FichaFamiliarsController extends Controller
{
    public function EliminarCaracterísticaFamiliar($id)
    {
        $obj=CaracteristicaFamiliars::findOrFail($id);
        $obj->delete();
        $data=['Mensaje'=>'ok'];
        return response()->json($data);
    }
    public function EditarCaracterísticaFamiliar($id)
    {
        $data=DB::table('caracteristica_familiars')
        ->select('caracteristica_familiars.*')
        ->where('caracteristica_familiars.id','=',$id)
        ->get();
        return response()->json($data);
    }

    public function ActualizaCaracteristicaFamiliar(Request $request)
    {
        $id = request('IdCaracteristica');
        $obj =  CaracteristicaFamiliars::findOrFail($id);
        $obj->IdFichaFamiliar=request('CaracteristicaIdFichaFamiliar');
        $obj->IngresoMensual=request('IngresoMensual');
        $obj->AguaTratamiento=$this->EstadoCheckBox(request('AguaTratamiento'));
        $obj->AguaSinTratamiento=$this->EstadoCheckBox(request('AguaSinTratamiento'));
        $obj->RedPublicaDentro=$this->EstadoCheckBox(request('RedPublicaDentro'));
        $obj->RedPublicaFuera=$this->EstadoCheckBox(request('RedPublicaFuera'));
        $obj->PozoCisterna=$this->EstadoCheckBox(request('PozoCisterna'));
        $obj->RioAcequia=$this->EstadoCheckBox(request('RioAcequia'));
        $obj->PisoMadera=$this->EstadoCheckBox(request('PisoMadera'));
        $obj->PisoParquet=$this->EstadoCheckBox(request('PisoParquet'));
        $obj->PisoLosetas=$this->EstadoCheckBox(request('PisoLosetas'));
        $obj->PisoCementLadrillo=$this->EstadoCheckBox(request('PisoCementLadrillo'));
        $obj->PisoTierra=$this->EstadoCheckBox(request('PisoTierra'));
        $obj->PisoOtros=$this->EstadoCheckBox(request('PisoOtros'));
        $obj->CombustibleLena=$this->EstadoCheckBox(request('CombustibleLena'));
        $obj->CombustibleCarbon=$this->EstadoCheckBox(request('CombustibleCarbon'));
        $obj->CombustibleBosta=$this->EstadoCheckBox(request('CombustibleBosta'));
        $obj->CombustibleGasElectricidad=$this->EstadoCheckBox(request('CombustibleGasElectricidad'));
        $obj->PersonasHabitacion3Miembros=$this->EstadoCheckBox(request('PersonasHabitacion3Miembros'));
        $obj->PersonasHabitacion4Mas=$this->EstadoCheckBox(request('PersonasHabitacion4Mas'));
        $obj->PersonasHabitacion4MasNumero=request('PersonasHabitacion4MasNumero');
        $obj->PersonasHabitacion3MiembroNumero=request('PersonasHabitacion3MiembroNumero');
        $obj->ParedMaderaEstera=$this->EstadoCheckBox(request('ParedMaderaEstera'));
        $obj->ParedAdobeTapia=$this->EstadoCheckBox(request('ParedAdobeTapia'));
        $obj->ParedCementoLadrillo=$this->EstadoCheckBox(request('ParedCementoLadrillo'));
        $obj->ParedQuincha=$this->EstadoCheckBox(request('ParedQuincha'));
        $obj->ParedOtros=$this->EstadoCheckBox(request('ParedOtros'));
        $obj->ConseAlimTemperaturaAmbiente=$this->EstadoCheckBox(request('ConseAlimTemperaturaAmbiente'));
        $obj->ConseAlimRefrigeradora=$this->EstadoCheckBox(request('ConseAlimRefrigeradora'));
        $obj->ConseAlimRecipienteConTapa=$this->EstadoCheckBox(request('ConseAlimRecipienteConTapa'));
        $obj->ConseAlimRecipienteSinTapa=$this->EstadoCheckBox(request('ConseAlimRecipienteSinTapa'));
        $obj->TransporteAutomovil=$this->EstadoCheckBox(request('TransporteAutomovil'));
        $obj->TransporteBicicleta=$this->EstadoCheckBox(request('TransporteBicicleta'));
        $obj->TransporteMotoBicicleta=$this->EstadoCheckBox(request('TransporteMotoBicicleta'));
        $obj->TransporteOtros=$this->EstadoCheckBox(request('TransporteOtros'));
        $obj->TechoCalamina=$this->EstadoCheckBox(request('TechoCalamina'));
        $obj->TechoMaderaTeja=$this->EstadoCheckBox(request('TechoMaderaTeja'));
        $obj->TechoNoble=$this->EstadoCheckBox(request('TechoNoble'));
        $obj->TechoEthernit=$this->EstadoCheckBox(request('TechoEthernit'));
        $obj->TechoPajasHojas=$this->EstadoCheckBox(request('TechoPajasHojas'));
        $obj->TechoCanaEstera=$this->EstadoCheckBox(request('TechoCanaEstera'));
        $obj->ExcretasAireLibre=$this->EstadoCheckBox(request('ExcretasAireLibre'));
        $obj->ExcretasAcequiaCanal=$this->EstadoCheckBox(request('ExcretasAcequiaCanal'));
        $obj->ExcretasRedPublica=$this->EstadoCheckBox(request('ExcretasRedPublica'));
        $obj->ExcretasLetrina=$this->EstadoCheckBox(request('ExcretasLetrina'));
        $obj->ExcretasPozoSeptico=$this->EstadoCheckBox(request('ExcretasPozoSeptico'));
        $obj->ExcretasOtros=$this->EstadoCheckBox(request('ExcretasOtros'));
        $obj->BasuraCarroRecolector=$this->EstadoCheckBox(request('BasuraCarroRecolector'));
        $obj->BasuraCampoAbierto=$this->EstadoCheckBox(request('BasuraCampoAbierto'));
        $obj->BasuraRio=$this->EstadoCheckBox(request('BasuraRio'));
        $obj->BasuraEntierraQuema=$this->EstadoCheckBox(request('BasuraEntierraQuema'));
        $obj->BasuraPozo=$this->EstadoCheckBox(request('BasuraPozo'));
        $obj->BasuraOtros=$this->EstadoCheckBox(request('BasuraOtros'));
        $obj->ServDomicilioTelefono=$this->EstadoCheckBox(request('ServDomicilioTelefono'));
        $obj->ServDomicilioInternet=$this->EstadoCheckBox(request('ServDomicilioInternet'));
        $obj->ServDomicilioCable=$this->EstadoCheckBox(request('ServDomicilioCable'));
        $obj->ServDomicilioElectricidad=$this->EstadoCheckBox(request('ServDomicilioElectricidad'));
        $obj->ServDomicilioAgua=$this->EstadoCheckBox(request('ServDomicilioAgua'));
        $obj->ServDomicilioDesague=$this->EstadoCheckBox(request('ServDomicilioDesague'));
        $obj->RiesgoLluviasInundaciones=$this->EstadoCheckBox(request('RiesgoLluviasInundaciones'));
        $obj->RiesgoBasuraJuntoVivienda=$this->EstadoCheckBox(request('RiesgoBasuraJuntoVivienda'));
        $obj->RiesgoInserviblesJuntoVivienda=$this->EstadoCheckBox(request('RiesgoInserviblesJuntoVivienda'));
        $obj->RiesgoHumosVaporesFabricas=$this->EstadoCheckBox(request('RiesgoHumosVaporesFabricas'));
        $obj->RiesgoDerrumbesHuaycos=$this->EstadoCheckBox(request('RiesgoDerrumbesHuaycos'));
        $obj->RiesgoPandillajeDelincuencia=$this->EstadoCheckBox(request('RiesgoPandillajeDelincuencia'));
        $obj->RiesgoAlcoholismoDrogadiccion=$this->EstadoCheckBox(request('RiesgoAlcoholismoDrogadiccion'));
        $obj->RiesgoSinAlumbradoPublico=$this->EstadoCheckBox(request('RiesgoSinAlumbradoPublico'));
        $obj->RiesgoPistasNoAsfaltadas=$this->EstadoCheckBox(request('RiesgoPistasNoAsfaltadas'));
        $obj->RiesgoVectores=$this->EstadoCheckBox(request('RiesgoVectores'));
        $obj->RiesgoOtros=$this->EstadoCheckBox(request('RiesgoOtros'));
        $obj->AnimalPerroGato=$this->EstadoCheckBox(request('AnimalPerroGato'));
        $obj->AnimalCabrasCarneros=$this->EstadoCheckBox(request('AnimalCabrasCarneros'));
        $obj->AnimalConvive=$this->EstadoCheckBox(request('AnimalConvive'));
        $obj->AnimalPerroGatoVacuna=request('AnimalPerroGatoVacuna');
        $obj->AnimalCabrasCarnerosVacuna=request('AnimalCabrasCarnerosVacuna');
        $obj->AnimalConviveVacuna=request('AnimalConviveVacuna');
        $obj->ViviendasInfraRiesgo=request('ViviendasInfraRiesgo');
        $obj->ViviendasInfraRiesgoDescribir=request('ViviendasInfraRiesgoDescribir');
        $obj->ViviendaPresenciaVectores=request('ViviendaPresenciaVectores');
        $obj->ViviendaPresenciaVectoresDescribir=request('ViviendaPresenciaVectoresDescribir');
        $obj->MochilaEmergencia=request('MochilaEmergencia');
        $obj->BotiquinEmergencia=request('BotiquinEmergencia');
        $obj->ViviendaEspacioAlimentos=request('ViviendaEspacioAlimentos');
        $obj->CocinaVentilacionHumo=request('CocinaVentilacionHumo');
        $obj->Television=request('Television');
        $obj->Radio=request('Radio');
        $obj->TelevisionPorque=request('TelevisionPorque');
        $obj->RadioPorque=request('RadioPorque');
        $obj->save();
        $data=['Mensaje'=>'ok'];
        return response()->json($data);

    }

    public function RegistraCaracteristicaFamiliar(Request $request)
    {
        
        $obj =  new CaracteristicaFamiliars();
        $obj->IdFichaFamiliar=request('CaracteristicaIdFichaFamiliar');
        $obj->IngresoMensual=request('IngresoMensual');
        $obj->AguaTratamiento=$this->EstadoCheckBox(request('AguaTratamiento'));
        $obj->AguaSinTratamiento=$this->EstadoCheckBox(request('AguaSinTratamiento'));
        $obj->RedPublicaDentro=$this->EstadoCheckBox(request('RedPublicaDentro'));
        $obj->RedPublicaFuera=$this->EstadoCheckBox(request('RedPublicaFuera'));
        $obj->PozoCisterna=$this->EstadoCheckBox(request('PozoCisterna'));
        $obj->RioAcequia=$this->EstadoCheckBox(request('RioAcequia'));
        $obj->PisoMadera=$this->EstadoCheckBox(request('PisoMadera'));
        $obj->PisoParquet=$this->EstadoCheckBox(request('PisoParquet'));
        $obj->PisoLosetas=$this->EstadoCheckBox(request('PisoLosetas'));
        $obj->PisoCementLadrillo=$this->EstadoCheckBox(request('PisoCementLadrillo'));
        $obj->PisoTierra=$this->EstadoCheckBox(request('PisoTierra'));
        $obj->PisoOtros=$this->EstadoCheckBox(request('PisoOtros'));
        $obj->CombustibleLena=$this->EstadoCheckBox(request('CombustibleLena'));
        $obj->CombustibleCarbon=$this->EstadoCheckBox(request('CombustibleCarbon'));
        $obj->CombustibleBosta=$this->EstadoCheckBox(request('CombustibleBosta'));
        $obj->CombustibleGasElectricidad=$this->EstadoCheckBox(request('CombustibleGasElectricidad'));
        $obj->PersonasHabitacion3Miembros=$this->EstadoCheckBox(request('PersonasHabitacion3Miembros'));
        $obj->PersonasHabitacion4Mas=$this->EstadoCheckBox(request('PersonasHabitacion4Mas'));
        $obj->PersonasHabitacion4MasNumero=request('PersonasHabitacion4MasNumero');
        $obj->PersonasHabitacion3MiembroNumero=request('PersonasHabitacion3MiembroNumero');
        $obj->ParedMaderaEstera=$this->EstadoCheckBox(request('ParedMaderaEstera'));
        $obj->ParedAdobeTapia=$this->EstadoCheckBox(request('ParedAdobeTapia'));
        $obj->ParedCementoLadrillo=$this->EstadoCheckBox(request('ParedCementoLadrillo'));
        $obj->ParedQuincha=$this->EstadoCheckBox(request('ParedQuincha'));
        $obj->ParedOtros=$this->EstadoCheckBox(request('ParedOtros'));
        $obj->ConseAlimTemperaturaAmbiente=$this->EstadoCheckBox(request('ConseAlimTemperaturaAmbiente'));
        $obj->ConseAlimRefrigeradora=$this->EstadoCheckBox(request('ConseAlimRefrigeradora'));
        $obj->ConseAlimRecipienteConTapa=$this->EstadoCheckBox(request('ConseAlimRecipienteConTapa'));
        $obj->ConseAlimRecipienteSinTapa=$this->EstadoCheckBox(request('ConseAlimRecipienteSinTapa'));
        $obj->TransporteAutomovil=$this->EstadoCheckBox(request('TransporteAutomovil'));
        $obj->TransporteBicicleta=$this->EstadoCheckBox(request('TransporteBicicleta'));
        $obj->TransporteMotoBicicleta=$this->EstadoCheckBox(request('TransporteMotoBicicleta'));
        $obj->TransporteOtros=$this->EstadoCheckBox(request('TransporteOtros'));
        $obj->TechoCalamina=$this->EstadoCheckBox(request('TechoCalamina'));
        $obj->TechoMaderaTeja=$this->EstadoCheckBox(request('TechoMaderaTeja'));
        $obj->TechoNoble=$this->EstadoCheckBox(request('TechoNoble'));
        $obj->TechoEthernit=$this->EstadoCheckBox(request('TechoEthernit'));
        $obj->TechoPajasHojas=$this->EstadoCheckBox(request('TechoPajasHojas'));
        $obj->TechoCanaEstera=$this->EstadoCheckBox(request('TechoCanaEstera'));
        $obj->ExcretasAireLibre=$this->EstadoCheckBox(request('ExcretasAireLibre'));
        $obj->ExcretasAcequiaCanal=$this->EstadoCheckBox(request('ExcretasAcequiaCanal'));
        $obj->ExcretasRedPublica=$this->EstadoCheckBox(request('ExcretasRedPublica'));
        $obj->ExcretasLetrina=$this->EstadoCheckBox(request('ExcretasLetrina'));
        $obj->ExcretasPozoSeptico=$this->EstadoCheckBox(request('ExcretasPozoSeptico'));
        $obj->ExcretasOtros=$this->EstadoCheckBox(request('ExcretasOtros'));
        $obj->BasuraCarroRecolector=$this->EstadoCheckBox(request('BasuraCarroRecolector'));
        $obj->BasuraCampoAbierto=$this->EstadoCheckBox(request('BasuraCampoAbierto'));
        $obj->BasuraRio=$this->EstadoCheckBox(request('BasuraRio'));
        $obj->BasuraEntierraQuema=$this->EstadoCheckBox(request('BasuraEntierraQuema'));
        $obj->BasuraPozo=$this->EstadoCheckBox(request('BasuraPozo'));
        $obj->BasuraOtros=$this->EstadoCheckBox(request('BasuraOtros'));
        $obj->ServDomicilioTelefono=$this->EstadoCheckBox(request('ServDomicilioTelefono'));
        $obj->ServDomicilioInternet=$this->EstadoCheckBox(request('ServDomicilioInternet'));
        $obj->ServDomicilioCable=$this->EstadoCheckBox(request('ServDomicilioCable'));
        $obj->ServDomicilioElectricidad=$this->EstadoCheckBox(request('ServDomicilioElectricidad'));
        $obj->ServDomicilioAgua=$this->EstadoCheckBox(request('ServDomicilioAgua'));
        $obj->ServDomicilioDesague=$this->EstadoCheckBox(request('ServDomicilioDesague'));
        $obj->RiesgoLluviasInundaciones=$this->EstadoCheckBox(request('RiesgoLluviasInundaciones'));
        $obj->RiesgoBasuraJuntoVivienda=$this->EstadoCheckBox(request('RiesgoBasuraJuntoVivienda'));
        $obj->RiesgoInserviblesJuntoVivienda=$this->EstadoCheckBox(request('RiesgoInserviblesJuntoVivienda'));
        $obj->RiesgoHumosVaporesFabricas=$this->EstadoCheckBox(request('RiesgoHumosVaporesFabricas'));
        $obj->RiesgoDerrumbesHuaycos=$this->EstadoCheckBox(request('RiesgoDerrumbesHuaycos'));
        $obj->RiesgoPandillajeDelincuencia=$this->EstadoCheckBox(request('RiesgoPandillajeDelincuencia'));
        $obj->RiesgoAlcoholismoDrogadiccion=$this->EstadoCheckBox(request('RiesgoAlcoholismoDrogadiccion'));
        $obj->RiesgoSinAlumbradoPublico=$this->EstadoCheckBox(request('RiesgoSinAlumbradoPublico'));
        $obj->RiesgoPistasNoAsfaltadas=$this->EstadoCheckBox(request('RiesgoPistasNoAsfaltadas'));
        $obj->RiesgoVectores=$this->EstadoCheckBox(request('RiesgoVectores'));
        $obj->RiesgoOtros=$this->EstadoCheckBox(request('RiesgoOtros'));
        $obj->AnimalPerroGato=$this->EstadoCheckBox(request('AnimalPerroGato'));
        $obj->AnimalCabrasCarneros=$this->EstadoCheckBox(request('AnimalCabrasCarneros'));
        $obj->AnimalConvive=$this->EstadoCheckBox(request('AnimalConvive'));
        $obj->AnimalPerroGatoVacuna=request('AnimalPerroGatoVacuna');
        $obj->AnimalCabrasCarnerosVacuna=request('AnimalCabrasCarnerosVacuna');
        $obj->AnimalConviveVacuna=request('AnimalConviveVacuna');
        $obj->ViviendasInfraRiesgo=request('ViviendasInfraRiesgo');
        $obj->ViviendasInfraRiesgoDescribir=request('ViviendasInfraRiesgoDescribir');
        $obj->ViviendaPresenciaVectores=request('ViviendaPresenciaVectores');
        $obj->ViviendaPresenciaVectoresDescribir=request('ViviendaPresenciaVectoresDescribir');
        $obj->MochilaEmergencia=request('MochilaEmergencia');
        $obj->BotiquinEmergencia=request('BotiquinEmergencia');
        $obj->ViviendaEspacioAlimentos=request('ViviendaEspacioAlimentos');
        $obj->CocinaVentilacionHumo=request('CocinaVentilacionHumo');
        $obj->Television=request('Television');
        $obj->Radio=request('Radio');
        $obj->TelevisionPorque=request('TelevisionPorque');
        $obj->RadioPorque=request('RadioPorque');
        $obj->save();
        $data=['Mensaje'=>'ok'];
        return response()->json($data);

    }

    public function ListarCaracteristicaFamiliar($id)
    {
        $lista=DB::table('caracteristica_familiars')
        ->select('caracteristica_familiars.*')
        ->where('caracteristica_familiars.IdFichaFamiliar','=',$id)
        ->get();
        return datatables()->of($lista)->toJson();
    }

    public function EliminaMiembroFamiliar($id)
    {
        $obj=MiembrosFamiliars::findOrFail($id);
        $obj->delete();
        $data=['Mensaje'=>'ok'];
        return response()->json($data);
    }

    public function ActualizaMiembroFamiliar(Request $request)
    {
        $id = request('IdMiembro');
        $obj=MiembrosFamiliars::findOrFail($id);
        $obj->Nombres=request('Nombres');
        $obj->Apellidos=request('Apellidos');
        $obj->Edad=request('Edad');
        $obj->TipoEdad=request('TipoEdad');
        $obj->Sexo=request('Sexo');
        $obj->NumeroDocumento=request('NumeroDocumento');
        $obj->TipoDocumento=request('TipoDocumento');
        $obj->FechaNacimiento=request('FechaNacimiento');
        $obj->Parentesco=request('Parentesco');
        $obj->EstadoCivil=request('EstadoCivil');
        $obj->GradoInstruccion=request('GradoInstruccion');
        $obj->Ocupacion=request('Ocupacion');
        $obj->CondicionOcupacion=request('CondicionOcupacion');
        $obj->SeguroSalud=request('SeguroSalud');
        $obj->save();
        $data=['Mensaje'=>'ok'];
        return response()->json($data);
    }

    public function RegistraMiembroFamiliar(Request $request)
    {
        $obj=new MiembrosFamiliars();
        $obj->IdFichaFamiliar=request('MiembroIdFichaFamiliar');
        $obj->Nombres=request('Nombres');
        $obj->Apellidos=request('Apellidos');
        $obj->Edad=request('Edad');
        $obj->TipoEdad=request('TipoEdad');
        $obj->Sexo=request('Sexo');
        $obj->NumeroDocumento=request('NumeroDocumento');
        $obj->TipoDocumento=request('TipoDocumento');
        $obj->FechaNacimiento=request('FechaNacimiento');
        $obj->Parentesco=request('Parentesco');
        $obj->EstadoCivil=request('EstadoCivil');
        $obj->GradoInstruccion=request('GradoInstruccion');
        $obj->Ocupacion=request('Ocupacion');
        $obj->CondicionOcupacion=request('CondicionOcupacion');
        $obj->SeguroSalud=request('SeguroSalud');
        $obj->save();
        $data=['Mensaje'=>'ok'];
        return response()->json($data);

    }

    public function ListarMiembroFamiliar($id)
    {
        $lista=DB::table('miembros_familiars')
        ->select('miembros_familiars.*')
        ->where('miembros_familiars.IdFichaFamiliar','=',$id)
        ->get();
        return datatables()->of($lista)->toJson();
    }

    public function RegistraVisitaFamiliar(Request $request)
    {
        $obj = new VisitaFamiliars();
        $obj->IdFichaFamiliar=request('VisitaIdFichaFamiliar');        
        $obj->FechaVisita=request('FechaVisita');
        $obj->ResponsableVisita=request('ResponsableVisita');
        $obj->ResultadoVisita=request('ResultadoVisita');
        $obj->ProximaVisita=request('ProximaVisita');
        $obj->save();
        $data=['Resultado'=>'ok'];
        return response()->json($data);
    }

    public function EliminaVisitaFamiliar($id)
    {
        $obj=VisitaFamiliars::findOrFail($id);
        $obj->delete();
        $data=['Respuesta'=>'ok'];
        return response()->json($data);
    }

    public function ActualizaVisitaFamiliar(Request $request)
    {

        $id = request('IdVisita');
        $obj = VisitaFamiliars::findOrFail($id);
        $obj->FechaVisita=request('FechaVisita');
        $obj->ResponsableVisita=request('ResponsableVisita');
        $obj->ResultadoVisita=request('ResultadoVisita');
        $obj->ProximaVisita=request('ProximaVisita');
        $obj->save();
        $data=['Resultado'=>'ok'];
        return response()->json($data);

    }
    
    public function ListarVisitaFamiliar($id)
    {
        $lista=DB::table('visita_familiars')
        ->select('visita_familiars.*')
        ->where('visita_familiars.IdFichaFamiliar','=',$id)
        ->get();
        return datatables()->of($lista)->toJson();

    }

    public function EliminaFichaFamiliar($id)
    {
        $obj=FichaFamiliars::findOrFail($id);
        $obj->delete=1;
        $obj->save();
        $data=['Respuesta'=>'ok'];
        return response()->json($data);
    }

    public function ListarFichaFamiliar()
    {
        $idUsuario='%';
        if (auth()->user()->is_admin) {
            $idUsuario=0;
            $simbolo='>=';
        }else{
            $simbolo='=';
            $idUsuario=auth()->user()->id;
        }

        $lista=DB::table('ficha_familiars')
        ->leftjoin('reds','reds.id','=','ficha_familiars.Idred')
        ->leftjoin('microreds','microreds.id','=','ficha_familiars.Idmicrored')
        ->leftjoin('establecimientos','establecimientos.id','=','ficha_familiars.IdEstablecimiento')
        ->leftjoin('provincias','provincias.id','=','ficha_familiars.IdProvincia')
        ->leftjoin('distritos','distritos.id','=','ficha_familiars.IdDistrito')
        ->select('reds.codigo_red', 'reds.nombre_red','microreds.codigo_microred','microreds.nombre_microred',
                'establecimientos.codigo','establecimientos.nombre_establecimiento',
                'provincias.nombre_provincia','distritos.codigo','distritos.nombre_distrito',
                'ficha_familiars.*')
        ->where('usuario',$simbolo,$idUsuario)
        ->where('delete','=',0)
        ->get();

        return datatables()->of($lista)->toJson();

    }

    public function ActualizaFichaFamiliar(Request $request)
    {
        $id=request('idFichaFamiliar');

        $obj = FichaFamiliars::findOrFail($id);
        $obj->Multifamiliar=request('Multifamiliar');
        $obj->Gerencia=request('Gerencia');
        $obj->Idred=request('Idred');
        $obj->Idmicrored=request('Idmicrored');
        $obj->IdEstablecimiento=request('Establecimiento');
        $obj->IdProvincia=request('Provincia');
        $obj->IdDistrito=request('Distrito');
        $obj->Localidad=request('Localidad');
        $obj->Sector=request('Sector');
        $obj->Arearesidencia=request('Arearesidencia');
        $obj->Telefonocelular=request('Telefonocelular');
        $obj->Direccionvivienda=request('Direccionvivienda');
        $obj->TelefoOtrapersona=request('TelefoOtrapersona');
        $obj->TiempoEESSCercano=request('TiempoEESSCercano');
        $obj->MedioTransporte=request('MedioTransporte');
        $obj->TiempoResidencia=request('TiempoResidencia');
        $obj->ResidenciasAnteriores=request('ResidenciasAnteriores');
        $obj->DisponibilidadProximasVisitas=request('DisponibilidadProximasVisitas');
        $obj->CorreoElectronico=request('CorreoElectronico');
        $obj->Referencia=request('Referencia');
        $obj->FechaUltimoRociadoResidual=request('FechaUltimoRociadoResidual');
        $obj->Ninos=request('Ninos');
        $obj->Adolescentes=request('Adolescentes');
        $obj->Jovenes=request('Jovenes');
        $obj->Adultos=request('Adultos');
        $obj->AdultosMayores=request('AdultosMayores');
        $obj->EtniaRaza=request('EtniaRaza');
        $obj->IdiomaPredominante=request('IdiomaPredominante');
        $obj->Religion=request('Religion');
        // $obj->Usuario=auth()->user()->id;
        $obj->save();
        $data=['Guardado'=>'ok'];                                                                                                       
        return response()->json($data);
    }

    function EditarFichaFamiliar($id)
    {
        $lista=DB::table('ficha_familiars')
        ->leftjoin('reds','reds.id','=','ficha_familiars.Idred')
        ->leftjoin('microreds','microreds.id','=','ficha_familiars.Idmicrored')
        ->leftjoin('establecimientos','establecimientos.id','=','ficha_familiars.IdEstablecimiento')
        ->leftjoin('provincias','provincias.id','=','ficha_familiars.IdProvincia')
        ->leftjoin('distritos','distritos.id','=','ficha_familiars.IdDistrito')
        ->select('reds.codigo_red', 'reds.nombre_red','microreds.codigo_microred','microreds.nombre_microred',
                'establecimientos.codigo','establecimientos.nombre_establecimiento',
                'provincias.nombre_provincia','distritos.codigo','distritos.nombre_distrito',
                'ficha_familiars.*')
        ->where('ficha_familiars.id','=',$id)
        ->get();
        return response()->json($lista);
    }

    public function GuardaFichaFamiliar(Request $request)
    {
        $obj = new FichaFamiliars();
        $obj->Multifamiliar=request('Multifamiliar');
        $obj->Gerencia=request('Gerencia');
        $obj->Idred=request('Idred');
        $obj->Idmicrored=request('Idmicrored');
        $obj->IdEstablecimiento=request('Establecimiento');
        $obj->IdProvincia=request('Provincia');
        $obj->IdDistrito=request('Distrito');
        $obj->Localidad=request('Localidad');
        $obj->Sector=request('Sector');
        $obj->Arearesidencia=request('Arearesidencia');
        $obj->Telefonocelular=request('Telefonocelular');
        $obj->Direccionvivienda=request('Direccionvivienda');
        $obj->TelefoOtrapersona=request('TelefoOtrapersona');
        $obj->TiempoEESSCercano=request('TiempoEESSCercano');
        $obj->MedioTransporte=request('MedioTransporte');
        $obj->TiempoResidencia=request('TiempoResidencia');
        $obj->ResidenciasAnteriores=request('ResidenciasAnteriores');
        $obj->DisponibilidadProximasVisitas=request('DisponibilidadProximasVisitas');
        $obj->CorreoElectronico=request('CorreoElectronico');
        $obj->Referencia=request('Referencia');
        $obj->FechaUltimoRociadoResidual=request('FechaUltimoRociadoResidual');
        $obj->Ninos=request('Ninos');
        $obj->Adolescentes=request('Adolescentes');
        $obj->Jovenes=request('Jovenes');
        $obj->Adultos=request('Adultos');
        $obj->AdultosMayores=request('AdultosMayores');
        $obj->EtniaRaza=request('EtniaRaza');
        $obj->IdiomaPredominante=request('IdiomaPredominante');
        $obj->Religion=request('Religion');
        $obj->Usuario=auth()->user()->id;
        $obj->save();
        $data=['Guardado'=>'ok'];

        $id_ficha_familiar = DB::table('ficha_familiars')
        ->select("id")->latest()->first();//ultimo id registrado

        for ($i=1; $i < 150; $i++) {
            $existe =$request->has('responsable_visita'.$i);
            if ($existe) {
                $obj_visita= new VisitaFamiliars();
                $obj_visita->IdFichaFamiliar=$id_ficha_familiar->id;
                $obj_visita->FechaVisita=request('fecha_visita'.$i);
                $obj_visita->ResponsableVisita=request('responsable_visita'.$i);
                $obj_visita->ResultadoVisita=request('resultado_visita'.$i);
                $obj_visita->ProximaVisita=request('proxima_visita'.$i);
                $obj_visita->save();
            }
        }
        return response()->json($data);
    }
    
    public function ListarRegiones($id)
    {
        $lista_regiones=DB::table('provincias')
        ->leftjoin('distritos','provincias.id','=','distritos.provId')
        ->select('provincias.id as provId','provincias.nombre_provincia','distritos.id as distId',
        'distritos.nombre_distrito')
        ->where('distritos.id','=',$id)
        ->get();
        return response()->json(['lista_regiones'=>$lista_regiones]);
    }

    public function ListarRedes($id)
    {
        $lista_redes=DB::table('reds')
        ->leftjoin('microreds','microreds.Idred','=','reds.id')
        ->leftjoin('establecimientos','establecimientos.IdMicrored','=','microreds.id')
        ->select('reds.id as Idred','microreds.id as Idmicrored','establecimientos.id as Idests')
        ->where('establecimientos.id','=',$id)
        ->get();
        return response()->json(['lista_redes'=>$lista_redes]);
    }
    public function ListarRed($id)
    {
        $lista_red=DB::table('reds')
        ->leftjoin('microreds','microreds.Idred','=','reds.id')
        ->select('reds.id as idRed','microreds.id as Idmicrored')
        ->where('microreds.id','=',$id)
        ->get();
        return response()->json(['lista_red'=>$lista_red]);
    }


    public function FichaFamiliar()
    {
        $dpto=DB::table('departamentos')
        ->select('departamentos.id as id','departamentos.nombre_departamento as nombre_dpto')
        ->where('departamentos.nombre_departamento','=','JUNIN') 
        ->get();
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

        $ests=DB::table('establecimientos')
        ->select('establecimientos.id as id','establecimientos.codigo','establecimientos.nombre_establecimiento')
        ->get();

        // $data=['dpto'=>dpto,'prov'=>prov,'dist'=>dist,'ests'=>ests];

        return view('FichaFamiliar',compact('dpto','prov','dist','red','microred','ests'));
    }

    public function EstadoCheckBox($checkbox)
    {
        if ($checkbox==true) {
            return (1);
        }else{
            return (0);
        }
    }
}
