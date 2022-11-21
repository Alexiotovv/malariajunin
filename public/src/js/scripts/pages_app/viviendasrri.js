$(document).on("click",".btnEliminarViviendasRociadas",function (e) {
    e.preventDefault();
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    ru="EliminaViviendasRociadas/"+id;
    mje="Registro Eliminado";
    dt="#DTListaViviendasRociadas"
    EliminarRegistro(ru,mje,dt);
});

$(document).on("click",".btnEliminarViviendasRRI",function (e) {
    e.preventDefault();
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    ru="EliminaViviendaRRI/"+id;
    mje="Registro Eliminado";
    dt="#DTListaViviendasRRI"
    EliminarRegistro(ru,mje,dt);

});

$(document).on("click",".btnEditarViviendasRociadas",function(e){
    
    $("#EtiquetaViviendasRociadas").text('EDITAR VIVIENDA ROCIADA');
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    $("#IdViviendasRociadas").val(id);
    $.ajax({
        type: "GET",
        url: "EditaViviendaRociada/"+id,
        dataType: "json",
        success: function (response) {
            $("#IdViviendasRociadas").val(id);
            $("#NumeroViviendasRociadas").val(response[0].NumeroViviendasRociadas);
            $("#FechaPrimerCiclo").val(response[0].FechaPrimerCiclo);
            $("#FechaSegundoCiclo").val(response[0].FechaSegundoCiclo);
        }
    });
    $("#ModalViviendasRociadas").modal('show');
});

$("#btnGuardaViviendaRociada").on("click",function (e){
    e.preventDefault();
    ds=$("#formViviendasRociadas").serialize();
    dt="#DTListaViviendasRociadas";
    if ($("#EtiquetaViviendasRociadas").text()=='REGISTRO DE VIVIENDAS ROCIADAS') {
        ru='GuardaViviendaRociada';   
        mje='Registro Guardado';
    }else{
        ru='ActualizaViviendaRociada';
        mje='Registro Actualizado';
    }
    GuardarRegistro(ds,ru,mje,dt);
    $("#ModalViviendasRociadas").modal('hide');

});

$("#btnNuevoViviendaRociada").click(function (e) {
    e.preventDefault();
    $("#EtiquetaViviendasRociadas").text('REGISTRO DE VIVIENDAS ROCIADAS');
    $("#IdViviendasRociadas").val('');
    $("#NumeroViviendasRociadas").val('');
    $("#ModalViviendasRociadas").modal('show');
});

$(document).on("click",".btnViviendasRociadas",function (e) {
    e.preventDefault();
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    $("#IdViviendasRociadasIRR").val(id);

    $("#DTListaViviendasRociadas").DataTable({
        "drawCallback": function(settings) {
            feather.replace();
        },
        "destroy":true,
        "ajax":'ListaViviendasRociadas/'+id,
        "method":'GET',
        "columns":[
            {data:'id'},
            {'defaultContent':
            "<button class='btn btn-icon btn-gradient-warning btnEditarViviendasRociadas'><i data-feather='edit-3'></i></button>\
            <button class='btn btn-icon btn-gradient-danger btnEliminarViviendasRociadas'><i data-feather='x'></i></button>"},
            {data:'NumeroViviendasRociadas'},
            {data:'FechaPrimerCiclo'},
            {data:'FechaSegundoCiclo'},
            ],
        order: [0],
    })

    $("#ModalListaViviendasRociadas").modal('show');
});



$("#btnGuardaViviendaRRI").click(function (e) { 
    e.preventDefault();
    ds=$("#formViviendasRRI").serialize();
    dt="#DTListaViviendasRRI";
    if ($("#EtiquetaViviendasRRI").text()=='REGISTRO FICHA DE EVALUACIÓN DE VIVIENDAS CON RRI') {
        ru='GuardaViviendaRRI';   
        mje='Registro Guardado';
    }else{
        ru='ActualizaViviendaRRI';
        mje='Registro Actualizado';
    }
    GuardarRegistro(ds,ru,mje,dt);
    $("#ModalViviendasRRI").modal('hide');
});


$("#btnNuevoRegistroRRI").click(function (e) { 
    e.preventDefault();
    $("#EtiquetaViviendasRRI").text('REGISTRO FICHA DE EVALUACIÓN DE VIVIENDAS CON RRI');
    $("#IdViviendasRRI").val('');
    $("#Localidad").val('');
    $("#ModalViviendasRRI").modal('show');
});

$(document).on("click",".btnEditarViviendasRRI",function (e) {
    e.preventDefault();
    $("#EtiquetaViviendasRRI").text('EDICIÓN FICHA DE EVALUACIÓN DE VIVIENDAS CON RRI');
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    $.ajax({
        type: "GET",
        url: "EditaViviendaRRI/"+id,
        dataType: "json",
        success: function (response) {
            $("#IdViviendasRRI").val(id);
            $("#Localidad").val(response[0].Localidad);
            $("#Provincia").val(response[0].IdProvincia).change();
            $("#Distrito").val(response[0].IdDistrito).change();
            $("#Idred").val(response[0].Idred).change();
            $("#Idmicrored").val(response[0].Idmicrored).change();
        }
    });
    $("#ModalViviendasRRI").modal('show');
});

function ObtieneRed(microred){

    $.ajax({
        url: "ListarRed/" + $("#" + microred + "").val(),
        method: "GET",
        dataType: "json",
        success: function(response) {
            $.each(response.lista_red, function(key, item) {
                if ((item.Idmicrored) == ($("#" + microred + "").val())) {
                    $("#Idred").val(item.idRed).change();
                    return false;
                }
            });
        }
    });
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

$("#DTListaViviendasRRI").DataTable({
    "drawCallback": function(settings) {
        feather.replace();
    },
    "destroy":true,
    "ajax":'ListarViviendaRRI',
    "method":'GET',
    "columns":[
        {data:'id'},
        {'defaultContent':
        "<button class='btn btn-icon btn-gradient-warning btnEditarViviendasRRI'><i data-feather='edit-3'></i></button>\
        <button class='btn btn-icon btn-gradient-danger btnEliminarViviendasRRI'><i data-feather='x'></i></button>\
        <button class='btn btn-icon btn-gradient-success btnViviendasRociadas'><i data-feather='file-text'></i></button>"},
        {data:'Provincia'},
        {data:'Distrito'},
        {data:'Red'},
        {data:'Microred'},
        {data:'Localidad'},
        {data:'Usuario'},
        ]
        ,order: [0],
})
var fecha = new Date();
document.getElementById("FechaPrimerCiclo").value = fecha.toJSON().slice(0, 10);
document.getElementById("FechaSegundoCiclo").value = fecha.toJSON().slice(0, 10);
