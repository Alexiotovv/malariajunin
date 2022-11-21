


$(document).on("click",".btnEliminarCapacitaciones",function (e) {
    e.preventDefault();
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    ru="EliminaCapacitaciones/"+id;
    mje="Registro Eliminado";
    dt="#DTListaCapacitaciones";
    EliminarRegistro(ru,mje,dt);

});

$(document).on("click",".btnEliminarCapacitacionesDetalle",function (e) {
    e.preventDefault();
    
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    
    ru="EliminaCapacitacionesDetalle/"+id;
    mje="Registro Eliminado";
    dt="#DTListaCapacitacionesDetalle";
    EliminarRegistro(ru,mje,dt);
});

$(document).on("click",".btnEditarCapacitacionesDetalle",function(e){
    
    $("#EtiquetaCapacitacionesDetalle").text('EDITARDETALLE DE CAPACITACIONES');
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();

    $.ajax({
        type: "GET",
        url: "EditaCapacitacionesDetalle/"+id,
        dataType: "json",
        success: function (response) {
            $("#IdDetalle").val(response[0].id);
            $("#NombreMicroscopista").val(response[0].NombreMicroscopista);
            $("#ApellidoMicroscopista").val(response[0].ApellidoMicroscopista);
            $("#Concordancia").val(response[0].Concordancia).change();
            $("#UltimaCapacitacion").val(response[0].UltimaCapacitacion);
            $("#FechaUltEvalPanelLam").val(response[0].FechaUltEvalPanelLam);
            

        }
    });
    $("#ModalCapacitacionesDetalle").modal('show');
});

$("#btnGuardaCapacitacionesDetalle").on("click",function (e){
    e.preventDefault();
    ds=$("#formCapacitacionesDetalle").serialize();
    dt="#DTListaCapacitacionesDetalle";
    if ($("#EtiquetaCapacitacionesDetalle").text()=='REGISTRO DETALLE DE CAPACITACIONES') {
        
        ru='GuardaCapacitacionesDetalle';   
        mje='Registro Guardado';
    }else{
        
        ru='ActualizaCapacitacionesDetalle';
        mje='Registro Actualizado';
    }
    GuardarRegistro(ds,ru,mje,dt);
    $("#ModalCapacitacionesDetalle").modal('hide');

});

$("#btnNuevoCapacitacionesDetalle").click(function (e) {
    e.preventDefault();
    $("#EtiquetaCapacitacionesDetalle").text('REGISTRO DETALLE DE CAPACITACIONES');
    
    $("NombreMicroscopista").val('');
    $("ApellidoMicroscopista").val('');
    $("Concordancia").val('--').change();
    $("UltimaCapacitacion").val('');
    $('FechaUltEvalPanelLam').val('');

    $("#ModalCapacitacionesDetalle").modal('show');
});

$(document).on("click",".btnCapacitacionesDetalle",function (e) {
    e.preventDefault();
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    $("#IdCapacitacionesDetalle").val(id);
    $("#DTListaCapacitacionesDetalle").DataTable({
        "drawCallback": function(settings) {
            feather.replace();
        },
        "destroy":true,
        "ajax":'ListaCapacitacionesDetalle/'+id,
        "method":'GET',
        "columns":[
            {data:'id'},
            {'defaultContent':
            "<button class='btn btn-icon btn-gradient-warning btnEditarCapacitacionesDetalle'><i data-feather='edit-3'></i></button>\
            <button class='btn btn-icon btn-gradient-danger btnEliminarCapacitacionesDetalle'><i data-feather='x'></i></button>"},
            {data:'NombreMicroscopista'},
            {data:'ApellidoMicroscopista'},
            {data:'Concordancia'},
            {data:'UltimaCapacitacion'},
            {data:'FechaUltEvalPanelLam'},
            ],
        order: [0],
    })

    $("#ModalListaCapacitacionesDetalle").modal('show');
});



$("#btnGuardaCapacitaciones").click(function (e) { 
    e.preventDefault();
    ds=$("#formCapacitaciones").serialize();
    dt="#DTListaCapacitaciones";
    if ($("#EtiquetaCapacitaciones").text()=='REGISTRO DE CAPACITACIONES') {
        ru='GuardaCapacitaciones';   
        mje='Registro Guardado';
    }else{
        ru='ActualizaCapacitaciones';
        mje='Registro Actualizado';
    }
    GuardarRegistro(ds,ru,mje,dt);
    $("#ModalCapacitaciones").modal('hide');
});


$("#btnNuevoCapacitaciones").click(function (e) { 
    e.preventDefault();
    $("#EtiquetaCapacitaciones").text('REGISTRO DE CAPACITACIONES');
    $("#IdCapacitaciones").val('');
    $("#ModalCapacitaciones").modal('show');
});

$(document).on("click",".btnEditarCapacitaciones",function (e) {
    e.preventDefault();
    $("#EtiquetaCapacitaciones").text('EDITAR CAPACITACIONES');
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    $.ajax({
        type: "GET",
        url: "EditaCapacitaciones/"+id,
        dataType: "json",
        success: function (response) {
            $("#IdCapacitaciones").val(id);
            $("#Ipress").val(response[0].Ipress).change();
            $("#Provincia").val(response[0].IdProvincia).change();
            $("#Distrito").val(response[0].IdDistrito).change();
            $("#Idred").val(response[0].Idred).change();
            $("#Idmicrored").val(response[0].Idmicrored).change();
        }
    });
    $("#ModalCapacitaciones").modal('show');

});


$("#DTListaCapacitaciones").DataTable({
    "drawCallback": function(settings) {
        feather.replace();
    },
    "destroy":true,
    "ajax":'ListarCapacitaciones',
    "method":'GET',
    "columns":[
        {data:'id'},
        {'defaultContent':
        "<button class='btn btn-icon btn-gradient-warning btnEditarCapacitaciones'><i data-feather='edit-3'></i></button>\
        <button class='btn btn-icon btn-gradient-danger btnEliminarCapacitaciones'><i data-feather='x'></i></button>\
        <button class='btn btn-icon btn-gradient-success btnCapacitacionesDetalle'><i data-feather='file-text'></i></button>"},
        {data:'Provincia'},
        {data:'Distrito'},
        {data:'Red'},
        {data:'Microred'},
        {data:'Ipress'},
        {data:'Usuario'},
        ],
    order: [0],
})



// var fecha = new Date();
// document.getElementById("fecha").value = fecha.toJSON().slice(0, 10);
