$(document).on("click",".btnEliminarEncuestado",function (e) { 
    e.preventDefault();
    fila=$(this).closest("tr");
    id=parseInt((fila).find('td:eq(0)').text());
    ru='EliminaCensoEncuestados/'+id;
    mje='Registro Eliminado';
    dt='#DTListaCensoMosquitero';
    EliminarRegistro(ru,mje,dt);
});

$(document).on("click",".btnEliminarMosquiteroEntregado",function (e) { 
    e.preventDefault();
    fila=$(this).closest("tr");
    id=parseInt((fila).find('td:eq(0)').text());
    ru='EliminaFichMosqEntregado/'+id;
    mje='Registro Eliminado';
    dt='#DTListaMosquiterosEntregados';
    EliminarRegistro(ru,mje,dt);
});
$("#btnGuardaCensoMosquitero").on("click",function (e) { 
    e.preventDefault();
    ds=$("#formCensoMosquitero").serialize();
    dt='#DTListaCensoMosquitero';
    if ($("#EtiquetaCensoMosquitero").text()=='Nuevo Registro Censo (encuestado)') {
        ru='GuardarEncuestado';   
        mje='Registro Guardado'; 
    }else{
        ru='ActualizarEncuestado';   
        mje='Registro Actualizado'; 
    }
    GuardarRegistro(ds,ru,mje,dt)
    $("#ModalCensoMosquitero").modal('hide');
});


$(document).on("click",".btnEditarEncuestado",function (e){
    e.preventDefault();
    fila=$(this).closest("tr");
    id=parseInt((fila).find('td:eq(0)').text());

    $("#EtiquetaCensoMosquitero").text("Editar Registro Censo (encuestado)");
    $("#idEncuestado").val(id);
    $.ajax({
        type: "GET",
        url: "EditarEncuestado/"+id,
        dataType: "json",
        success: function (response) {
            $.each(response, function (index, valor) {
                $("#Nombre").val(response[0].Nombre);
                $("#Apellido").val(response[0].Apellido);
                $("#Edad").val(response[0].Edad);
                $("#DNI").val(response[0].DNI);
                $("#NPersonasFemenino").val(response[0].NPersonasFemenino);
                $("#NPersonasMasculino").val(response[0].NPersonasMasculino);
                $("#NEmbarazadas").val(response[0].NEmbarazadas);
                $("#NNinosMenor5").val(response[0].NNinosMenor5);
                $("#NCamasDormir").val(response[0].NCamasDormir);
                $("#NMosqTela").val(response[0].NMosqTela);
                $("#NMosqMTILDAntiguo").val(response[0].NMosqMTILDAntiguo);
                $("#NMTILDEntregados").val(response[0].NMTILDEntregados);
                $("#NMTILDUso").val(response[0].NMTILDUso);
                $("#NPersonasUsanMosqFemenino").val(response[0].NPersonasUsanMosqFemenino);
                $("#NPersonasUsanMosqMasculino").val(response[0].NPersonasUsanMosqMasculino);
                $("#NEmbarazadasUsanMosq").val(response[0].NEmbarazadasUsanMosq);
                $("#NNinosMenor5UsanMosq").val(response[0].NNinosMenor5UsanMosq);
                $("#NMTILDSinUso").val(response[0].NMTILDSinUso);
                $("#RazonNoUso").val(response[0].RazonNoUso).change();
                $("#NLimpios").val(response[0].NLimpios);
                $("#NSucios").val(response[0].NSucios);
                $("#NRotos").val(response[0].NRotos);
                $("#N6_7Noches").val(response[0].N6_7Noches);
                $("#N1_5Noches").val(response[0].N1_5Noches);
                $("#N0Noches").val(response[0].N0Noches);
                $("#NMTILDLavados").val(response[0].NMTILDLavados);
                $("#NLavadoCorrecto").val(response[0].NLavadoCorrecto);
                $("#NLavadoIncorrecto").val(response[0].NLavadoIncorrecto);
                $("#RioLago").val(response[0].RioLago);
                $("#BandejaOtro").val(response[0].BandejaOtro);
                $("#Sol").val(response[0].Sol);
                $("#Sombra").val(response[0].Sombra);
                $("#Colgado").val(response[0].Colgado);
                $("#RecogidoDia").val(response[0].RecogidoDia);
                $("#GuardadoDia").val(response[0].GuardadoDia);
                $("#Embarazadas").val(response[0].Embarazadas);
                $("#NinosMenor5").val(response[0].NinosMenor5);
                $("#OtrasPersonas").val(response[0].OtrasPersonas);
                $("#TipoReaccion1").val(response[0].TipoReaccion1);
                $("#TipoReaccion2").val(response[0].TipoReaccion2);
                $("#TipoReaccion3").val(response[0].TipoReaccion3);
                $("#TipoReaccion4").val(response[0].TipoReaccion4);
                $("#TipoReaccion5").val(response[0].TipoReaccion5);
                $("#TipoReaccion6").val(response[0].TipoReaccion6);
                $("#Informante").val(response[0].Informante).change();
                $("#Observaciones").val(response[0].Observaciones);
            });
        }
    });
    $("#ModalCensoMosquitero").modal('show');

});

$("#btnNuevoCensoMosquitero").on("click",function (e) { 
    e.preventDefault();
    $("#EtiquetaCensoMosquitero").text('Nuevo Registro Censo (encuestado)');
    LimpiarFormCensomosquiteros();
    $("#ModalCensoMosquitero").modal('show');

});

$(document).on("click",".btnCensoMosquiteroEntregado",function (e) {
    fila=$(this).closest("tr");
    id=parseInt((fila).find('td:eq(0)').text());
    $("#idMonitoreo").val(id);
    $("#DTListaCensoMosquitero").DataTable({
        "drawCallback": function(settings) {
            feather.replace();
        },
        "destroy":true,
        "ajax":"ListaCensoEncuestados/"+id,
        "method":"GET",
        "columns":[
            {data:"IdEncuestado"},
            {"defaultContent":
            "<button class='btn-warning btn-sm btnEditarEncuestado'><i data-feather='edit-3'></i></button>\
            <button class='btn-danger btn-sm btnEliminarEncuestado'><i data-feather='x'></i></button>"},
            {data:"Nombre"},
            {data:"Apellido"},
            {data:"Edad"},
            {data:"DNI"},
            {data:"NPersonasFemenino"},
            {data:"NPersonasMasculino"},
            {data:"NEmbarazadas"},
            {data:"NNinosMenor5"},
            {data:"NCamasDormir"},
            {data:"NMosqTela"},
            {data:"NMosqMTILDAntiguo"},
            {data:"NMTILDEntregados"},
            {data:"NMTILDUso"},
            {data:"NPersonasUsanMosqFemenino"},
            {data:"NPersonasUsanMosqMasculino"},
            {data:"NEmbarazadasUsanMosq"},
            {data:"NNinosMenor5UsanMosq"},
            {data:"NMTILDSinUso"},
            {data:"RazonNoUso"},
            {data:"NLimpios"},
            {data:"NSucios"},
            {data:"NRotos"},
            {data:"N6_7Noches"},
            {data:"N1_5Noches"},
            {data:"N0Noches"},
            {data:"NMTILDLavados"},
            {data:"NLavadoCorrecto"},
            {data:"NLavadoIncorrecto"},
            {data:"RioLago"},
            {data:"BandejaOtro"},
            {data:"Sol"},
            {data:"Sombra"},
            {data:"Colgado"},
            {data:"RecogidoDia"},
            {data:"GuardadoDia"},
            {data:"Embarazadas"},
            {data:"NinosMenor5"},
            {data:"OtrasPersonas"},
            {data:"TipoReaccion1"},
            {data:"TipoReaccion2"},
            {data:"TipoReaccion3"},
            {data:"TipoReaccion4"},
            {data:"TipoReaccion5"},
            {data:"TipoReaccion6"},
            {data:"Informante"},
            {data:"Observaciones"},

        ],
        order:[0]
    });
    
    $("#ModalListaCensoMosquitero").modal('show');
});

$(document).on("click",".btnEditarMosquiteroEntregado", function (e) { 
    e.preventDefault();
    
    $("#EtiquetaMosquitero").text('Editar Evaluación Mosquiteros Entregados');
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();

    $.ajax({
        type: "GET",
        url: "EditarMosquiteroEntregado/"+id,
        dataType: "json",
        success: function (response) {
            $("#idEntregaMosquitero").val(id);
            $("#Departamento").val(response[0].Departamento).change();
            $("#Provincia").val(response[0].Provincia).change();
            $("#Distrito").val(response[0].Distrito).change();
            $("#Ipress").val(response[0].Ipress).change();
            $("#Comunidad").val(response[0].Comunidad);
            $("#FechaEntrega").val(response[0].FechaEntrega);
            $("#FechaMonitoreo").val(response[0].FechaMonitoreo);
            $("#NumeroMonitoreo").val(response[0].NumeroMonitoreo);
            $("#Responsable").val(response[0].Responsable);
            $("#CargoResponsable").val(response[0].CargoResponsable);

        }
    });
    $("#ModalMosquiteroEntregado").modal('show');
 });


$("#btnGuardaEntregaMosquitero").on("click",function(e){
    e.preventDefault();
    $("#Departamento").prop('disabled',false);
    $("#Provincia").prop('disabled',false);
    ds=$("#formFichaMosquiteroEntregado").serialize();
    dt="#DTListaMosquiterosEntregados";
    if ($("#EtiquetaMosquitero").text()=='Nuevo Registro de Evaluación Mosquiteros Entregados') {
        url="GuardaFichMosqEntregado";
        mje="Registro Guardado";
    }else{
        url="ActualizaFichMosqEntregado";
        mje="Registro Actualizado";  
    };
    GuardarRegistro(ds,url,mje,dt);
    $("#Departamento").prop("disabled",true);
    $("#Provincia").prop("disabled",true);
    $("#ModalMosquiteroEntregado").modal('hide');

});

$("#btnNuevoMosquiteroEntregado").on("click",function(e){
    e.preventDefault();
    $("#EtiquetaMosquitero").text('Nuevo Registro de Evaluación Mosquiteros Entregados');
    $("#idEntregaMosquitero").val('');
    $("#NumeroMonitoreo").val(1).change();
    $("#Comunidad").val('');
    $("#Responsable").val('');
    $("#CargoResponsable").val('');
    $("#ModalMosquiteroEntregado").modal('show');    
    var fecha = new Date();
    document.getElementById("FechaEntrega").value = fecha.toJSON().slice(0, 10);
    document.getElementById("FechaMonitoreo").value = fecha.toJSON().slice(0, 10);

});

$("#DTListaMosquiterosEntregados").DataTable({
    "drawCallback": function(settings) {
        feather.replace();
    },
    "destroy":true,
    "ajax":'ListarFichaMosquiteroEntregado',
    "method":'GET',
    "columns":[
                {data:'Id'},
                {'defaultContent':
                "<button class='btn btn-icon btn-gradient-warning btnEditarMosquiteroEntregado'><i data-feather='edit-3'></i></button>\
                <button class='btn btn-icon btn-gradient-danger btnEliminarMosquiteroEntregado'><i data-feather='x'></i></button>\
                <button class='btn btn-icon btn-gradient-success btnCensoMosquiteroEntregado'><i data-feather='file-text'></i></button>"},
                {data:'nombre_departamento'},
                {data:'nombre_provincia'},
                {data:'nombre_distrito'},
                {data:'nombre_establecimiento'},
                {data:'Comunidad'},
                {data:'FechaEntrega'},
                {data:'FechaMonitoreo'},
                {data:'NumeroMonitoreo'},
                {data:'Responsable'},
                {data:'CargoResponsable'},
                {data:'usuario'},
    ],
    order: [0],
});


function LimpiarFormCensomosquiteros(){
    $("#Nombre").val('');
    $("#Apellido").val('');
    $("#Edad").val('');
    $("#DNI").val('');
    $("#NPersonasFemenino").val('');
    $("#NPersonasMasculino").val('');
    $("#NEmbarazadas").val('');
    $("#NNinosMenor5").val('');
    $("#NCamasDormir").val('');
    $("#NMosqTela").val('');
    $("#NMosqMTILDAntiguo").val('');
    $("#NMTILDEntregados").val('');
    $("#NMTILDUso").val('');
    $("#NPersonasUsanMosqFemenino").val('');
    $("#NPersonasUsanMosqMasculino").val('');
    $("#NEmbarazadasUsanMosq").val('');
    $("#NNinosMenor5UsanMosq").val('');
    $("#NMTILDSinUso").val('');
    $("#RazonNoUso").val('');
    $("#NLimpios").val('');
    $("#NSucios").val('');
    $("#NRotos").val('');
    $("#N6_7Noches").val('');
    $("#N1_5Noches").val('');
    $("#N0Noches").val('');
    $("#NMTILDLavados").val('');
    $("#NLavadoCorrecto").val('');
    $("#NLavadoIncorrecto").val('');
    $("#RioLago").val('');
    $("#BandejaOtro").val('');
    $("#Sol").val('');
    $("#Sombra").val('');
    $("#Colgado").val('');
    $("#RecogidoDia").val('');
    $("#GuardadoDia").val('');
    $("#Embarazadas").val('');
    $("#NinosMenor5").val('');
    $("#OtrasPersonas").val('');
    $("#TipoReaccion1").val('');
    $("#TipoReaccion2").val('');
    $("#TipoReaccion3").val('');
    $("#TipoReaccion4").val('');
    $("#TipoReaccion5").val('');
    $("#TipoReaccion6").val('');
    $("#Informante").val('');
    $("#Observaciones").val('');
}

function ObtieneRegiones(dist) {
    $.ajax({
        url: "ListarRegiones/" + $("#" + dist + "").val(),
        method: "GET",
        dataType: "json",
        success: function(response) {
            $.each(response.lista_regiones, function(key, item) {
                if ((item.distId) == ($("#" + dist + "").val())) {
                    // $("#Departamento").val(item.dptoId).change();
                    $("#Provincia").val(item.provId).change();
                    return false;
                }
            });
        }
    });
}

function ObtieneRedes(ests) {
    $.ajax({
        url: "ListarRedes/" + $("#" + ests + "").val(),
        method: "GET",
        dataType: "json",
        success: function(response) {
            $.each(response.lista_redes, function(key, item) {
                if ((item.Idests) == ($("#" + ests + "").val())) {
                    // $("#Departamento").val(item.dptoId).change();
                    $("#Idred").val(item.Idred).change();
                    $("#Idmicrored").val(item.Idmicrored).change();
                    return false;
                }
            });
        }
    });
}
var fecha = new Date();
document.getElementById("FechaEntrega").value = fecha.toJSON().slice(0, 10);
document.getElementById("FechaMonitoreo").value = fecha.toJSON().slice(0, 10);