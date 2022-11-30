$(document).on("click",".btnEliminarCensoMosquitero",function (e) {
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    EliminarRegistro("EliminaCensoMosquitero/"+id,"Registro Eliminado","#DTListaCensoMosquitero");
});
$("#btnGuardaCensoMosquitero").on("click",function (e) { 
    e.preventDefault();
    var ds=$("#formCensoMosquitero").serialize();
    var dt="#DTListaCensoMosquitero";
    var ru="";
    var mje="";

    if ($("#EtiquetaCensoMosquitero").text()=='Registro Censo de Mosquitero'){
        ru="GuardaCensoMosquitero";
        mje="Registro Guardado";
    }else{
        ru="ActualizaCensoMosquitero";
        mje="Registro Actualizado";
    }
    GuardarRegistro(ds,ru,mje,dt);
    $("#ModalCensoMosquitero").modal('hide');
});

$(document).on("click",".btnEditarCensoMosquitero",function (e) { 
    e.preventDefault();
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    NumeroMosquitero=(fila).find('td:eq(2)').text();
    CantidadUsan=(fila).find('td:eq(3)').text();
    Tamano=(fila).find('td:eq(4)').text();
    BuenEstado=(fila).find('td:eq(5)').text();
    Impregnado=(fila).find('td:eq(6)').text();
    FechaImpregnacion=(fila).find('td:eq(7)').text();
    InsecticidaUsado=(fila).find('td:eq(8)').text();
    Material=(fila).find('td:eq(9)').text();
    Color=(fila).find('td:eq(10)').text();
    JefeHogar=(fila).find('td:eq(11)').text();
    DniJefeHogar=(fila).find('td:eq(12)').text();
    ResponsableCenso=(fila).find('td:eq(13)').text();
    DniResponsableCenso=(fila).find('td:eq(14)').text();
    ResponsableCenso2=(fila).find('td:eq(15)').text();
    DniResponsableCenso2=(fila).find('td:eq(16)').text();

    $("#IdCensoMosquitero").val(id);
    $('#NumeroMosquitero').val(NumeroMosquitero).change();
    $('#CantidadUsan').val(CantidadUsan);
    $('#Tamano').val(Tamano).change();
    $('#BuenEstado').val(BuenEstado).change();
    $('#Impregnado').val(Impregnado).change();
    $('#FechaImpregnacion').val(FechaImpregnacion);
    $('#InsecticidaUsado').val(InsecticidaUsado);
    $('#Material').val(Material);
    $('#Color').val(Color);
    $('#JefeHogar').val(JefeHogar);
    $('#DniJefeHogar').val(DniJefeHogar);
    $('#ResponsableCenso').val(ResponsableCenso);
    $('#DniResponsableCenso').val(DniResponsableCenso);
    $('#ResponsableCenso2').val(ResponsableCenso2);
    $('#DniResponsableCenso2').val(DniResponsableCenso2);
    $("#EtiquetaCensoMosquitero").text('Editar Censo de Mosquitero');
    $("#ModalCensoMosquitero").modal('show');
});

$("#btnNuevoCensoMosquitero").on("click",function(e){
    e.preventDefault();
    $("#EtiquetaCensoMosquitero").text('Registro Censo de Mosquitero');
    
    $("#IdCensoMosquitero").val('');
    $("#CantidadUsan").val('');
    $("#Tamano").val('--').change();
    $("#BuenEstado").val('--').change();
    $("#Impregnado").val('--').change();
    $("#InsecticidaUsado").val('');
    $("#Material").val('');
    $("#Color").val('');
    $("#JefeHogar").val('');
    $("#DniJefeHogar").val('');
    $("#ResponsableCenso").val('');
    $("#DniResponsableCenso").val('');
    $("#ResponsableCenso2").val('');
    $("#DniResponsableCenso2").val('');

    $("#ModalCensoMosquitero").modal('show');
});

$(document).on("click",".btnCensoMosquitero",function (e) {
    e.preventDefault();
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    $("#IdFichaMosquitero").val(id);
    $("#DTListaCensoMosquitero").DataTable({
        "drawCallback": function(settings) {
            feather.replace();
        },
        "destroy":true,
        "ajax":'ListarCensoMosquiteros/'+id,
        "method":'GET',
        "columns":[
                {data:'id'},
                {'defaultContent':
                "<button class='btn btn-icon btn-gradient-warning btnEditarCensoMosquitero'><i data-feather='edit-3'></i></button>\
                <button class='btn btn-icon btn-gradient-danger btnEliminarCensoMosquitero'><i data-feather='x'></i></button>"},
                {data:'NumeroMosquitero'},
                {data:'CantidadUsan'},
                {data:'Tamano'},
                {data:'BuenEstado'},
                {data:'Impregnado'},
                {data:'FechaImpregnacion'},
                {data:'InsecticidaUsado'},
                {data:'Material'},
                {data:'Color'},
                {data:'JefeHogar'},
                {data:'DniJefeHogar'},
                {data:'ResponsableCenso'},
                {data:'DniResponsableCenso'},
                {data:'ResponsableCenso2'},
                {data:'DniResponsableCenso2'},
    
        ],
        order: [0],
    });

    $("#ModalListaCensoMosquitero").modal('show');
});

$(document).on("click",".btnEditarMosquitero",function (e) { 
    e.preventDefault();
    $("#EtiquetaMosquitero").text('Editar Mosquiteros Retenidos y Usados');
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    $.ajax({
        type: "GET",
        url: "EditarMosquitero/"+id,
        dataType: "json",
        success: function (response) {
            $("#IdMosquitero").val(id);
            $("#Localidad").val(response[0].Localidad).change();
            $("#Provincia").val(response[0].IdProvincia).change();
            $("#Distrito").val(response[0].IdDistrito).change();
            $("#Establecimiento").val(response[0].IdEstablecimiento).change();
            $("#EstablecimientoMicroscopio").val(response[0].IdEstablecimientoMicroscopio).change();
            $("#TiempoHorasEESS").val(response[0].TiempoHorasEESS);
            $("#TiempoHorasEESSMicroscopio").val(response[0].TiempoHorasEESSMicroscopio);
            $("#MedioTransporte").val(response[0].MedioTransporte);
            $("#Hombres").val(response[0].Hombres);
            $("#Mujeres").val(response[0].Mujeres);
            $("#Gestantes").val(response[0].Gestantes);
            $("#Menor5anos").val(response[0].Menor5anos);
            $("#Mayor60anos").val(response[0].Mayor60anos);
            $("#NumeroCamas").val(response[0].NumeroCamas);
            $("#MosqImpregnadosBuenEstado").val(response[0].MosqImpregnadosBuenEstado);
            $("#MosqImpregnadosMalEstado").val(response[0].MosqImpregnadosMalEstado);
            $("#MosqNoImpregnadosBuenEstado").val(response[0].MosqNoImpregnadosBuenEstado);
            $("#MosqNoImpregnadosMalEstado").val(response[0].MosqNoImpregnadosMalEstado);
            $("#TamanoPersonal").val(response[0].TamanoPersonal);
            $("#TamanoFamiliar").val(response[0].TamanoFamiliar);
        }
    });
    $("#ModalMosquitero").modal('show');
});

$(document).on("click",".btnEliminarMosquitero",function(e){
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    EliminarRegistro("EliminarMosquitero/"+id,"Registro Eliminado","#DTListaMosquiteros");
});


$("#btnGuardaMosquitero").on("click",function (e) { 
    e.preventDefault();
    $("#Provincia").prop('disabled', false);
    var ds=$("#formMosquitero").serialize();
    var dt="#DTListaMosquiteros";
    var ru="";
    var mje="";
    if ($("#EtiquetaMosquitero").text()=='Registro de Mosquiteros Retenidos y Usados'){
        ru="GuardaMosquitero";
        mje="Registro Guardado";
    }else{
        ru="ActualizaMosquitero";
        mje="Registro Actualizado";
    }
    GuardarRegistro(ds,ru,mje,dt);

    $("#Provincia").prop('disabled', true);
    $("#ModalMosquitero").modal('hide');
    LimpiarMosquiteros();
});

$(document).on("click","#btnNuevoMosquitero",function (e) { 
    e.preventDefault();
    $("#EtiquetaMosquitero").text('Registro de Mosquiteros Retenidos y Usados');
    $("#IdMosquitero").val('');
    $("#Localidad").val('--').change();
    $("#TiempoHorasEESS").val('');
    $("#TiempoHorasEESSMicroscopio").val('');
    $("#Hombres").val(0);
    $("#Mujeres").val(0);
    $("#Gestantes").val(0);
    $("#Menor5anos").val(0);
    $("#Mayor60anos").val(0);
    $("#NumeroCamas").val(0);
    $("#MosqImpregnadosBuenEstado").val(0);
    $("#MosqImpregnadosMalEstado").val(0);
    $("#MosqNoImpregnadosBuenEstado").val(0);
    $("#MosqNoImpregnadosMalEstado").val(0);
    $("#TamanoPersonal").val(0);
    $("#TamanoFamiliar").val(0);
    
    $("#ModalMosquitero").modal('show');
});

$("#DTListaMosquiteros").DataTable({
    "drawCallback": function(settings) {
        feather.replace();
    },
    "destroy":true,
    "ajax":'ListarMosquiteros',
    "method":'GET',
    "columns":[
                {data:'id'},
                {'defaultContent':
                "<button class='btn btn-icon btn-gradient-warning btnEditarMosquitero'><i data-feather='edit-3'></i></button>\
                <button class='btn btn-icon btn-gradient-danger btnEliminarMosquitero'><i data-feather='x'></i></button>\
                <button class='btn btn-icon btn-gradient-success btnCensoMosquitero'><i data-feather='file-text'></i></button>"},
                {data:'Localidad'},
                {data:'nombre_provincia'},
                {data:'nombre_distrito'},
                {data:'nombre_establecimiento'},
                {data:'nombre_establecimiento2'},//con microscopio
                {data:'TiempoHorasEESS'},
                {data:'TiempoHorasEESSMicroscopio'},
                {data:'MedioTransporte'},
                {data:'Hombres'},
                {data:'Mujeres'},
                {data:'Gestantes'},
                {data:'Menor5anos'},
                {data:'Mayor60anos'},
                {data:'NumeroCamas'},
                {data:'MosqImpregnadosBuenEstado'},
                {data:'MosqImpregnadosMalEstado'},
                {data:'MosqNoImpregnadosBuenEstado'},
                {data:'MosqNoImpregnadosMalEstado'},
                {data:'TamanoPersonal'},
                {data:'TamanoFamiliar'},

    ],
    order: [0],
});

function LimpiarMosquiteros(){
    $("#IdMosquitero").val('');
    $("#Localidad").val('--').change();
    $("#TiempoHorasEESS").val('');
    $("#TiempoHorasEESSMicroscopio").val('0');
    $("#Hombres").val('0');
    $("#Mujeres").val('0');
    $("#Gestantes").val('0');
    $("#Menor5anos").val('0');
    $("#Mayor60anos").val('0');
    $("#NumeroCamas").val('0');
    $("#MosqImpregnadosBuenEstado").val('0');
    $("#MosqImpregnadosMalEstado").val('0');
    $("#MosqNoImpregnadosBuenEstado").val('0');
    $("#MosqNoImpregnadosMalEstado").val('0');
    $("#TamanoPersonal").val('0');
    $("#TamanoFamiliar").val('0');
}

var fecha = new Date();
document.getElementById("FechaImpregnacion").value = fecha.toJSON().slice(0, 10);