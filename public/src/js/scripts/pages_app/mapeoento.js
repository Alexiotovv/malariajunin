$(document).on("click",".btnEliminarIndicePicadura",function (e) {
    e.preventDefault();
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    ru="EliminaIndicePicadura/"+id;
    mje="Registro Eliminado";
    dt="#DTListaIndicePicadura"
    EliminarRegistro(ru,mje,dt);
});

$(document).on("click",".btnEliminarMapeoEnto",function (e) {
    e.preventDefault();
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    ru="EliminaMapeoEnto/"+id;
    mje="Registro Eliminado";
    dt="#DTListaMapeoEnto"
    EliminarRegistro(ru,mje,dt);

});

$(document).on("click",".btnEditarIndicePicadura",function(e){
    
    $("#EtiquetaIndicePicadura").text('EDITAR ÍNDICE DE PICADURA');
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();

    $.ajax({
        type: "GET",
        url: "EditaIndicePicadura/"+id,
        dataType: "json",
        success: function (response) {
            $("#IdIndicePicadura").val(id);
            $("#fecha").val(response[0].fecha);
            $("#indicehombrehora").val(response[0].indicehombrehora);
            $("#indicehombrenoche").val(response[0].indicehombrenoche);
        }
    });
    $("#ModalIndicePicadura").modal('show');
});

$("#btnGuardaIndicePicadura").on("click",function (e){
    e.preventDefault();
    ds=$("#formIndicePicadura").serialize();
    dt="#DTListaIndicePicadura";
    if ($("#EtiquetaIndicePicadura").text()=='REGISTRO DE ÍNDICE DE PICADURA') {
        ru='GuardaIndicePicadura';   
        mje='Registro Guardado';
    }else{
        ru='ActualizaIndicePicadura';
        mje='Registro Actualizado';
    }
    GuardarRegistro(ds,ru,mje,dt);
    $("#ModalIndicePicadura").modal('hide');

});

$("#btnNuevoIndicePicadura").click(function (e) {
    e.preventDefault();
    $("#EtiquetaIndicePicadura").text('REGISTRO DE ÍNDICE DE PICADURA');
    $("#IdIndicePicadura").val('');
    $("#indicehombrehora").val('');
    $("#indicehombrenoche").val('');
    $("#ModalIndicePicadura").modal('show');
});

$(document).on("click",".btnIndicePicadura",function (e) {
    e.preventDefault();
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    $("#IdIndicePicaduraMapeoEnto").val(id);
    $("#DTListaIndicePicadura").DataTable({
        "drawCallback": function(settings) {
            feather.replace();
        },
        "destroy":true,
        "ajax":'ListaIndicePicadura/'+id,
        "method":'GET',
        "columns":[
            {data:'id'},
            {'defaultContent':
            "<button class='btn btn-icon btn-gradient-warning btnEditarIndicePicadura'><i data-feather='edit-3'></i></button>\
            <button class='btn btn-icon btn-gradient-danger btnEliminarIndicePicadura'><i data-feather='x'></i></button>"},
            {data:'fecha'},
            {data:'indicehombrehora'},
            {data:'indicehombrenoche'},
            ],
        order: [0],
    })

    $("#ModalListaIndicePicadura").modal('show');
});



$("#btnGuardaMapeoEnto").click(function (e) { 
    e.preventDefault();
    ds=$("#formMapeoEnto").serialize();
    dt="#DTListaMapeoEnto";
    if ($("#EtiquetaMapeoEnto").text()=='REGISTRO FICHA DE EVALUACIÓN DE LOCALIDADES CON MAPEO ENTOMOLÓGICO') {
        ru='GuardaMapeoEnto';   
        mje='Registro Guardado';
    }else{
        ru='ActualizaMapeoEnto';
        mje='Registro Actualizado';
    }
    GuardarRegistro(ds,ru,mje,dt);
    $("#ModalMapeoEnto").modal('hide');
});


$("#btnNuevoMapeoEnto").click(function (e) { 
    e.preventDefault();
    $("#EtiquetaMapeoEnto").text('REGISTRO FICHA DE EVALUACIÓN DE LOCALIDADES CON MAPEO ENTOMOLÓGICO');
    $("#IdMapeoEnto").val('');
    // $("#Localidad").val('');
    $("#ModalMapeoEnto").modal('show');
});

$(document).on("click",".btnEditarMapeoEnto",function (e) {
    e.preventDefault();
    $("#EtiquetaMapeoEnto").text('EDITAR FICHA DE EVALUACIÓN DEL LOCALIDAD CON MAPEO ENTOMOLÓGICO');
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    $.ajax({
        type: "GET",
        url: "EditaMapeoEnto/"+id,
        dataType: "json",
        success: function (response) {
            $("#IdMapeoEnto").val(id);
            $("#Localidad").val(response[0].idLocalidad).change();
            $("#Provincia").val(response[0].IdProvincia).change();
            $("#Distrito").val(response[0].IdDistrito).change();
            $("#Idred").val(response[0].Idred).change();
            $("#Idmicrored").val(response[0].Idmicrored).change();
        }
    });
    $("#ModalMapeoEnto").modal('show');
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

$("#DTListaMapeoEnto").DataTable({
    "drawCallback": function(settings) {
        feather.replace();
    },
    "destroy":true,
    "ajax":'ListarMapeoEnto',
    "method":'GET',
    "columns":[
        {data:'id'},
        {'defaultContent':
        "<button class='btn btn-icon btn-gradient-warning btnEditarMapeoEnto'><i data-feather='edit-3'></i></button>\
        <button class='btn btn-icon btn-gradient-danger btnEliminarMapeoEnto'><i data-feather='x'></i></button>\
        <button class='btn btn-icon btn-gradient-success btnIndicePicadura'><i data-feather='file-text'></i></button>"},
        {data:'Provincia'},
        {data:'Distrito'},
        {data:'Red'},
        {data:'Microred'},
        {data:'NombreLocalidad'},
        {data:'Usuario'},
        ],
    order: [0],
})
var fecha = new Date();
document.getElementById("fecha").value = fecha.toJSON().slice(0, 10);
