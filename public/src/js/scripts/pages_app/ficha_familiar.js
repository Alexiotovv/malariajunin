
$(document).on("click",".btnEliminarCaracterísticaFamiliar",function (e){
    e.preventDefault();
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    EliminarRegistro("EliminarCaracterísticaFamiliar/"+id,"Registro Eliminado","#DTListarCaracteristicaFamiliar");
});

$("#btnGuardaCaracteristicaFamiliar").on("click",function(e){
    e.preventDefault();
    var serializedData=$("#formCaracteristicaFamiliar").serialize();
    var tabla="#DTListarCaracteristicaFamiliar";
    
    if ($("#EtiquetaCaracteristicaFamiliar").text()=="Registrar Caracteristica Vivienda") {
        var ruta="RegistraCaracteristicaFamiliar";
        var mje="Registro Guardado";
    }else{
        var ruta="ActualizaCaracteristicaFamiliar";
        var mje="Registro Actualziado";
    }
    GuardarRegistro(serializedData,ruta,mje,tabla);
    LimpiarFormCaracteristicaFamiliar();
    $("#ModalCaracteristicaFamiliar").modal('hide');
});

$(document).on("click",".btnEditarCaracterísticaFamiliar",function(e){
    e.preventDefault();
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    $("#IdCaracteristica").val(id);
    IngresoMensual = (fila).find('td:eq(2)').text();
    AguaTratamiento = (fila).find('td:eq(3)').text();
    AguaSinTratamiento = (fila).find('td:eq(4)').text();
    RedPublicaDentro = (fila).find('td:eq(5)').text();
    RedPublicaFuera = (fila).find('td:eq(6)').text();
    PozoCisterna = (fila).find('td:eq(7)').text();
    RioAcequia = (fila).find('td:eq(8)').text();
    PisoMadera = (fila).find('td:eq(9)').text();
    PisoParquet = (fila).find('td:eq(10)').text();
    PisoLosetas = (fila).find('td:eq(11)').text();
    PisoCementLadrillo = (fila).find('td:eq(12)').text();
    PisoTierra = (fila).find('td:eq(13)').text();
    PisoOtros = (fila).find('td:eq(14)').text();
    CombustibleLena = (fila).find('td:eq(15)').text();
    CombustibleCarbon = (fila).find('td:eq(16)').text();
    CombustibleBosta = (fila).find('td:eq(17)').text();
    CombustibleGasElectricidad = (fila).find('td:eq(18)').text();
    PersonasHabitacion3Miembros = (fila).find('td:eq(19)').text();
    PersonasHabitacion4Mas = (fila).find('td:eq(20)').text();
    PersonasHabitacion4MasNumero = (fila).find('td:eq(21)').text();
    PersonasHabitacion3MiembroNumero = (fila).find('td:eq(22)').text();
    ParedMaderaEstera = (fila).find('td:eq(23)').text();
    ParedAdobeTapia = (fila).find('td:eq(24)').text();
    ParedCementoLadrillo = (fila).find('td:eq(25)').text();
    ParedQuincha = (fila).find('td:eq(26)').text();
    ParedOtros = (fila).find('td:eq(27)').text();
    ConseAlimTemperaturaAmbiente = (fila).find('td:eq(28)').text();
    ConseAlimRefrigeradora = (fila).find('td:eq(29)').text();
    ConseAlimRecipienteConTapa = (fila).find('td:eq(30)').text();
    ConseAlimRecipienteSinTapa = (fila).find('td:eq(31)').text();
    TransporteAutomovil = (fila).find('td:eq(32)').text();
    TransporteBicicleta = (fila).find('td:eq(33)').text();
    TransporteMotoBicicleta = (fila).find('td:eq(34)').text();
    TransporteOtros = (fila).find('td:eq(35)').text();
    TechoCalamina = (fila).find('td:eq(36)').text();
    TechoMaderaTeja = (fila).find('td:eq(37)').text();
    TechoNoble = (fila).find('td:eq(38)').text();
    TechoEthernit = (fila).find('td:eq(39)').text();
    TechoPajasHojas = (fila).find('td:eq(40)').text();
    TechoCanaEstera = (fila).find('td:eq(41)').text();
    ExcretasAireLibre = (fila).find('td:eq(42)').text();
    ExcretasAcequiaCanal = (fila).find('td:eq(43)').text();
    ExcretasRedPublica = (fila).find('td:eq(44)').text();
    ExcretasLetrina = (fila).find('td:eq(45)').text();
    ExcretasPozoSeptico = (fila).find('td:eq(46)').text();
    ExcretasOtros = (fila).find('td:eq(47)').text();
    BasuraCarroRecolector = (fila).find('td:eq(48)').text();
    BasuraCampoAbierto = (fila).find('td:eq(49)').text();
    BasuraRio = (fila).find('td:eq(50)').text();
    BasuraEntierraQuema = (fila).find('td:eq(51)').text();
    BasuraPozo = (fila).find('td:eq(52)').text();
    BasuraOtros = (fila).find('td:eq(53)').text();
    ServDomicilioTelefono = (fila).find('td:eq(54)').text();
    ServDomicilioInternet = (fila).find('td:eq(55)').text();
    ServDomicilioCable = (fila).find('td:eq(56)').text();
    ServDomicilioElectricidad = (fila).find('td:eq(57)').text();
    ServDomicilioAgua = (fila).find('td:eq(58)').text();
    ServDomicilioDesague = (fila).find('td:eq(59)').text();
    RiesgoLluviasInundaciones = (fila).find('td:eq(60)').text();
    RiesgoBasuraJuntoVivienda = (fila).find('td:eq(61)').text();
    RiesgoInserviblesJuntoVivienda = (fila).find('td:eq(62)').text();
    RiesgoHumosVaporesFabricas = (fila).find('td:eq(63)').text();
    RiesgoDerrumbesHuaycos = (fila).find('td:eq(64)').text();
    RiesgoPandillajeDelincuencia = (fila).find('td:eq(65)').text();
    RiesgoAlcoholismoDrogadiccion = (fila).find('td:eq(66)').text();
    RiesgoSinAlumbradoPublico = (fila).find('td:eq(67)').text();
    RiesgoPistasNoAsfaltadas = (fila).find('td:eq(68)').text();
    RiesgoVectores = (fila).find('td:eq(69)').text();
    RiesgoOtros = (fila).find('td:eq(70)').text();
    AnimalPerroGato = (fila).find('td:eq(71)').text();
    AnimalCabrasCarneros = (fila).find('td:eq(72)').text();
    AnimalConvive = (fila).find('td:eq(73)').text();
    AnimalPerroGatoVacuna = (fila).find('td:eq(74)').text();
    AnimalCabrasCarnerosVacuna = (fila).find('td:eq(75)').text();
    AnimalConviveVacuna = (fila).find('td:eq(76)').text();
    ViviendasInfraRiesgo = (fila).find('td:eq(77)').text();
    ViviendasInfraRiesgoDescribir = (fila).find('td:eq(78)').text();
    ViviendaPresenciaVectores = (fila).find('td:eq(79)').text();
    ViviendaPresenciaVectoresDescribir = (fila).find('td:eq(80)').text();
    MochilaEmergencia = (fila).find('td:eq(81)').text();
    BotiquinEmergencia = (fila).find('td:eq(82)').text();
    ViviendaEspacioAlimentos = (fila).find('td:eq(83)').text();
    CocinaVentilacionHumo = (fila).find('td:eq(84)').text();
    Television = (fila).find('td:eq(85)').text();
    Radio = (fila).find('td:eq(86)').text();
    TelevisionPorque = (fila).find('td:eq(87)').text();
    RadioPorque = (fila).find('td:eq(88)').text();

    $("#IngresoMensual").val(IngresoMensual);
    $("#AguaTratamiento").prop("checked", EstadoCheckbox(AguaTratamiento));
    $("#AguaSinTratamiento").prop("checked", EstadoCheckbox(AguaSinTratamiento));
    $("#RedPublicaDentro").prop("checked", EstadoCheckbox(RedPublicaDentro));
    $("#RedPublicaFuera").prop("checked", EstadoCheckbox(RedPublicaFuera));
    $("#PozoCisterna").prop("checked", EstadoCheckbox(PozoCisterna));
    $("#RioAcequia").prop("checked", EstadoCheckbox(RioAcequia));
    $("#PisoMadera").prop("checked", EstadoCheckbox(PisoMadera));
    $("#PisoParquet").prop("checked", EstadoCheckbox(PisoParquet));
    $("#PisoLosetas").prop("checked", EstadoCheckbox(PisoLosetas));
    $("#PisoCementLadrillo").prop("checked", EstadoCheckbox(PisoCementLadrillo));
    $("#PisoTierra").prop("checked", EstadoCheckbox(PisoTierra));
    $("#PisoOtros").prop("checked", EstadoCheckbox(PisoOtros));
    $("#CombustibleLena").prop("checked", EstadoCheckbox(CombustibleLena));
    $("#CombustibleCarbon").prop("checked", EstadoCheckbox(CombustibleCarbon));
    $("#CombustibleBosta").prop("checked", EstadoCheckbox(CombustibleBosta));
    $("#CombustibleGasElectricidad").prop("checked", EstadoCheckbox(CombustibleGasElectricidad));
    $("#PersonasHabitacion3Miembros").prop("checked", EstadoCheckbox(PersonasHabitacion3Miembros));
    $("#PersonasHabitacion4Mas").prop("checked", EstadoCheckbox(PersonasHabitacion4Mas));
    $("#PersonasHabitacion4MasNumero").val(PersonasHabitacion4MasNumero);
    $("#PersonasHabitacion3MiembroNumero").val(PersonasHabitacion3MiembroNumero);
    $("#ParedMaderaEstera").prop("checked", EstadoCheckbox(ParedMaderaEstera));
    $("#ParedAdobeTapia").prop("checked", EstadoCheckbox(ParedAdobeTapia));
    $("#ParedCementoLadrillo").prop("checked", EstadoCheckbox(ParedCementoLadrillo));
    $("#ParedQuincha").prop("checked", EstadoCheckbox(ParedQuincha));
    $("#ParedOtros").prop("checked", EstadoCheckbox(ParedOtros));
    $("#ConseAlimTemperaturaAmbiente").prop("checked", EstadoCheckbox(ConseAlimTemperaturaAmbiente));
    $("#ConseAlimRefrigeradora").prop("checked", EstadoCheckbox(ConseAlimRefrigeradora));
    $("#ConseAlimRecipienteConTapa").prop("checked", EstadoCheckbox(ConseAlimRecipienteConTapa));
    $("#ConseAlimRecipienteSinTapa").prop("checked", EstadoCheckbox(ConseAlimRecipienteSinTapa));
    $("#TransporteAutomovil").prop("checked", EstadoCheckbox(TransporteAutomovil));
    $("#TransporteBicicleta").prop("checked", EstadoCheckbox(TransporteBicicleta));
    $("#TransporteMotoBicicleta").prop("checked", EstadoCheckbox(TransporteMotoBicicleta));
    $("#TransporteOtros").prop("checked", EstadoCheckbox(TransporteOtros));
    $("#TechoCalamina").prop("checked", EstadoCheckbox(TechoCalamina));
    $("#TechoMaderaTeja").prop("checked", EstadoCheckbox(TechoMaderaTeja));
    $("#TechoNoble").prop("checked", EstadoCheckbox(TechoNoble));
    $("#TechoEthernit").prop("checked", EstadoCheckbox(TechoEthernit));
    $("#TechoPajasHojas").prop("checked", EstadoCheckbox(TechoPajasHojas));
    $("#TechoCanaEstera").prop("checked", EstadoCheckbox(TechoCanaEstera));
    $("#ExcretasAireLibre").prop("checked", EstadoCheckbox(ExcretasAireLibre));
    $("#ExcretasAcequiaCanal").prop("checked", EstadoCheckbox(ExcretasAcequiaCanal));
    $("#ExcretasRedPublica").prop("checked", EstadoCheckbox(ExcretasRedPublica));
    $("#ExcretasLetrina").prop("checked", EstadoCheckbox(ExcretasLetrina));
    $("#ExcretasPozoSeptico").prop("checked", EstadoCheckbox(ExcretasPozoSeptico));
    $("#ExcretasOtros").prop("checked", EstadoCheckbox(ExcretasOtros));
    $("#BasuraCarroRecolector").prop("checked", EstadoCheckbox(BasuraCarroRecolector));
    $("#BasuraCampoAbierto").prop("checked", EstadoCheckbox(BasuraCampoAbierto));
    $("#BasuraRio").prop("checked", EstadoCheckbox(BasuraRio));
    $("#BasuraEntierraQuema").prop("checked", EstadoCheckbox(BasuraEntierraQuema));
    $("#BasuraPozo").prop("checked", EstadoCheckbox(BasuraPozo));
    $("#BasuraOtros").prop("checked", EstadoCheckbox(BasuraOtros));
    $("#ServDomicilioTelefono").prop("checked", EstadoCheckbox(ServDomicilioTelefono));
    $("#ServDomicilioInternet").prop("checked", EstadoCheckbox(ServDomicilioInternet));
    $("#ServDomicilioCable").prop("checked", EstadoCheckbox(ServDomicilioCable));
    $("#ServDomicilioElectricidad").prop("checked", EstadoCheckbox(ServDomicilioElectricidad));
    $("#ServDomicilioAgua").prop("checked", EstadoCheckbox(ServDomicilioAgua));
    $("#ServDomicilioDesague").prop("checked", EstadoCheckbox(ServDomicilioDesague));
    $("#RiesgoLluviasInundaciones").prop("checked", EstadoCheckbox(RiesgoLluviasInundaciones));
    $("#RiesgoBasuraJuntoVivienda").prop("checked", EstadoCheckbox(RiesgoBasuraJuntoVivienda));
    $("#RiesgoInserviblesJuntoVivienda").prop("checked", EstadoCheckbox(RiesgoInserviblesJuntoVivienda));
    $("#RiesgoHumosVaporesFabricas").prop("checked", EstadoCheckbox(RiesgoHumosVaporesFabricas));
    $("#RiesgoDerrumbesHuaycos").prop("checked", EstadoCheckbox(RiesgoDerrumbesHuaycos));
    $("#RiesgoPandillajeDelincuencia").prop("checked", EstadoCheckbox(RiesgoPandillajeDelincuencia));
    $("#RiesgoAlcoholismoDrogadiccion").prop("checked", EstadoCheckbox(RiesgoAlcoholismoDrogadiccion));
    $("#RiesgoSinAlumbradoPublico").prop("checked", EstadoCheckbox(RiesgoSinAlumbradoPublico));
    $("#RiesgoPistasNoAsfaltadas").prop("checked", EstadoCheckbox(RiesgoPistasNoAsfaltadas));
    $("#RiesgoVectores").prop("checked", EstadoCheckbox(RiesgoVectores));
    $("#RiesgoOtros").prop("checked", EstadoCheckbox(RiesgoOtros));
    $("#AnimalPerroGato").prop("checked", EstadoCheckbox(AnimalPerroGato));
    $("#AnimalCabrasCarneros").prop("checked", EstadoCheckbox(AnimalCabrasCarneros));
    $("#AnimalConvive").prop("checked", EstadoCheckbox(AnimalConvive));
    $("#AnimalPerroGatoVacuna").val(AnimalPerroGatoVacuna);
    $("#AnimalCabrasCarnerosVacuna").val(AnimalCabrasCarnerosVacuna);
    $("#AnimalConviveVacuna").val(AnimalConviveVacuna);
    $("#ViviendasInfraRiesgo").val(ViviendasInfraRiesgo);
    $("#ViviendasInfraRiesgoDescribir").val(ViviendasInfraRiesgoDescribir);
    $("#ViviendaPresenciaVectores").val(ViviendaPresenciaVectores);
    $("#ViviendaPresenciaVectoresDescribir").val(ViviendaPresenciaVectoresDescribir);
    $("#MochilaEmergencia").val(MochilaEmergencia);
    $("#BotiquinEmergencia").val(BotiquinEmergencia);
    $("#ViviendaEspacioAlimentos").val(ViviendaEspacioAlimentos);
    $("#CocinaVentilacionHumo").val(CocinaVentilacionHumo);
    $("#Television").val(Television);
    $("#Radio").val(Radio);
    $("#TelevisionPorque").val(TelevisionPorque);
    $("#RadioPorque").val(RadioPorque);
    
    $("#EtiquetaCaracteristicaFamiliar").text('Actualizar Caracteristica Vivienda');
    $("#ModalCaracteristicaFamiliar").modal('show');
    
});

$("#btnNuevoCaracteristicaFamiliar").on("click",function(e){
    e.preventDefault();
    
    $("#EtiquetaCaracteristicaFamiliar").text('Registrar Caracteristica Vivienda');
    $("#ModalCaracteristicaFamiliar").modal('show');
});

$(document).on("click",".btnListarCaracteristicaFam",function(e){
    e.preventDefault();
    
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    // ListarDatos(id,"#DTListarCaracteristicaFamiliar");

    $("#CaracteristicaIdFichaFamiliar").val(id);
    $("#DTListarCaracteristicaFamiliar").DataTable({
        "drawCallback": function(settings) {
            feather.replace();
        },
        "destroy":true,
        "ajax": 'ListarCaracteristicaFamiliar/'+id,
        "method": 'GET',
        "columns": [
            {data: "id"},
            {"defaultContent":
                "<button class='btn btn-icon btn-gradient-warning btnEditarCaracterísticaFamiliar'><i data-feather='edit-3'></i></button>\
                <button class='btn btn-icon btn-gradient-danger btnEliminarCaracterísticaFamiliar'><i data-feather='x'></i></button>"},
            {data:"IngresoMensual"},
            {data:"AguaTratamiento"},
            {data:"AguaSinTratamiento"},
            {data:"RedPublicaDentro"},
            {data:"RedPublicaFuera"},
            {data:"PozoCisterna"},
            {data:"RioAcequia"},
            {data:"PisoMadera"},
            {data:"PisoParquet"},
            {data:"PisoLosetas"},
            {data:"PisoCementLadrillo"},
            {data:"PisoTierra"},
            {data:"PisoOtros"},
            {data:"CombustibleLena"},
            {data:"CombustibleCarbon"},
            {data:"CombustibleBosta"},
            {data:"CombustibleGasElectricidad"},
            {data:"PersonasHabitacion3Miembros"},
            {data:"PersonasHabitacion4Mas"},
            {data:"PersonasHabitacion4MasNumero"},
            {data:"PersonasHabitacion3MiembroNumero"},
            {data:"ParedMaderaEstera"},
            {data:"ParedAdobeTapia"},
            {data:"ParedCementoLadrillo"},
            {data:"ParedQuincha"},
            {data:"ParedOtros"},
            {data:"ConseAlimTemperaturaAmbiente"},
            {data:"ConseAlimRefrigeradora"},
            {data:"ConseAlimRecipienteConTapa"},
            {data:"ConseAlimRecipienteSinTapa"},
            {data:"TransporteAutomovil"},
            {data:"TransporteBicicleta"},
            {data:"TransporteMotoBicicleta"},
            {data:"TransporteOtros"},
            {data:"TechoCalamina"},
            {data:"TechoMaderaTeja"},
            {data:"TechoNoble"},
            {data:"TechoEthernit"},
            {data:"TechoPajasHojas"},
            {data:"TechoCanaEstera"},
            {data:"ExcretasAireLibre"},
            {data:"ExcretasAcequiaCanal"},
            {data:"ExcretasRedPublica"},
            {data:"ExcretasLetrina"},
            {data:"ExcretasPozoSeptico"},
            {data:"ExcretasOtros"},
            {data:"BasuraCarroRecolector"},
            {data:"BasuraCampoAbierto"},
            {data:"BasuraRio"},
            {data:"BasuraEntierraQuema"},
            {data:"BasuraPozo"},
            {data:"BasuraOtros"},
            {data:"ServDomicilioTelefono"},
            {data:"ServDomicilioInternet"},
            {data:"ServDomicilioCable"},
            {data:"ServDomicilioElectricidad"},
            {data:"ServDomicilioAgua"},
            {data:"ServDomicilioDesague"},
            {data:"RiesgoLluviasInundaciones"},
            {data:"RiesgoBasuraJuntoVivienda"},
            {data:"RiesgoInserviblesJuntoVivienda"},
            {data:"RiesgoHumosVaporesFabricas"},
            {data:"RiesgoDerrumbesHuaycos"},
            {data:"RiesgoPandillajeDelincuencia"},
            {data:"RiesgoAlcoholismoDrogadiccion"},
            {data:"RiesgoSinAlumbradoPublico"},
            {data:"RiesgoPistasNoAsfaltadas"},
            {data:"RiesgoVectores"},
            {data:"RiesgoOtros"},
            {data:"AnimalPerroGato"},
            {data:"AnimalCabrasCarneros"},
            {data:"AnimalConvive"},
            {data:"AnimalPerroGatoVacuna"},
            {data:"AnimalCabrasCarnerosVacuna"},
            {data:"AnimalConviveVacuna"},
            {data:"ViviendasInfraRiesgo"},
            {data:"ViviendasInfraRiesgoDescribir"},
            {data:"ViviendaPresenciaVectores"},
            {data:"ViviendaPresenciaVectoresDescribir"},
            {data:"MochilaEmergencia"},
            {data:"BotiquinEmergencia"},
            {data:"ViviendaEspacioAlimentos"},
            {data:"CocinaVentilacionHumo"},
            {data:"Television"},
            {data:"Radio"},
            {data:"TelevisionPorque"},
            {data:"RadioPorque"},
                

        ],order:[0],
        
    });
    
    $("#ModalListarCaracteristicaFamiliar").modal('show');


});

function EstadoCheckbox(checkbox){
    if (checkbox==1) {
        return true;
    }else{
        return false;
    }
};
function LimpiarFormCaracteristicaFamiliar(){
    $('input[type=checkbox]').prop('checked',false);

    $("#IngresoMensual").val('');
    $("#PersonasHabitacion4MasNumero").val('');
    $("#PersonasHabitacion3MiembroNumero").val('');
    $("#ViviendasInfraRiesgoDescribir").val('');
    $("#ViviendaPresenciaVectoresDescribir").val('');
    $("#TelevisionPorque").val('');
    $("#RadioPorque").val('');
    //////////////////////////////////////////////
    $("#AnimalPerroGatoVacuna").val("--");
    $("#AnimalCabrasCarnerosVacuna").val("--");
    $("#AnimalConviveVacuna").val("--");
    $("#ViviendasInfraRiesgo").val("--");
    $("#ViviendaPresenciaVectores").val("--");
    $("#MochilaEmergencia").val("--");
    $("#BotiquinEmergencia").val("--");
    $("#ViviendaEspacioAlimentos").val("--");
    $("#CocinaVentilacionHumo").val("--");
    $("#Television").val("--");
    $("#Radio").val("--");


    




}

