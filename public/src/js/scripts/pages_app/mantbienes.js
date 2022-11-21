


$(document).on("click",".btnEliminarMantBienes",function (e) {
    e.preventDefault();
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    ru="EliminaMantbienes/"+id;
    mje="Registro Eliminado";
    dt="#DTListaMantBienes";
    EliminarRegistro(ru,mje,dt);

});

$(document).on("click",".btnEliminarMantbienesDetalle",function (e) {
    e.preventDefault();
    
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    
    ru="EliminaMantbienesDetalle/"+id;
    mje="Registro Eliminado";
    dt="#DTListaMantBienesDetalle";
    EliminarRegistro(ru,mje,dt);
});

$(document).on("click",".btnEditarMantbienesDetalle",function(e){
    
    $("#EtiquetaMantbienesDetalle").text('EDITAR BIENES CON MANTENIMIENTO Y ESTADO DE LOS MISMOS');
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();

    $.ajax({
        type: "GET",
        url: "EditaMantbienesDetalle/"+id,
        dataType: "json",
        success: function (response) {
            $("#IdDetalle").val(response[0].id);
            $("#Descripcion").val(response[0].Descripcion);
            $("#NumeroSerie").val(response[0].NumeroSerie);
            $("#Modelo").val(response[0].Modelo);
            $("#AnoFab").val(response[0].AnoFab);
            $("#AnoCompra").val(response[0].AnoCompra);
            $("#Estado").val(response[0].Estado).change();
            $("#Observaciones").val(response[0].Observaciones);
            $("#MPreventivo").val(response[0].MPreventivo).change();
            $("#MCorrectivo").val(response[0].MCorrectivo).change();

        }
    });
    $("#ModalMantbienesDetalle").modal('show');
});

$("#btnGuardaMantbienesDetalle").on("click",function (e){
    e.preventDefault();
    ds=$("#formMantbienesDetalle").serialize();
    dt="#DTListaMantBienesDetalle";
    if ($("#EtiquetaMantbienesDetalle").text()=='REGISTRO DE BIENES CON MANTENIMIENTO Y ESTADO DE LOS MISMOS') {
        ru='GuardaMantbienesDetalle';   
        mje='Registro Guardado';
    }else{
        
        ru='ActualizaMantbienesDetalle';
        mje='Registro Actualizado';
    }
    GuardarRegistro(ds,ru,mje,dt);
    $("#ModalMantbienesDetalle").modal('hide');

});

$("#btnNuevoMantBienesDetalle").click(function (e) {
    e.preventDefault();
    
    $("#EtiquetaMantbienesDetalle").text('REGISTRO DE BIENES CON MANTENIMIENTO Y ESTADO DE LOS MISMOS');
    $("#Descripcion").val('');
    $("#NumeroSerie").val('');
    $("#Modelo").val('');
    $("#AnoFab").val('');
    $("#AnoCompra").val('');
    $("#Estado").val('--');
    $("#Observaciones").val('');
    $("#MPreventivo").val('');
    $("#MCorrectivo").val('');

    $("#ModalMantbienesDetalle").modal('show');
});

$(document).on("click",".btnMantBienesDetalle",function (e) {
    e.preventDefault();
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    $("#IdMantbienesDetalle").val(id);
    $("#DTListaMantBienesDetalle").DataTable({
        "drawCallback": function(settings) {
            feather.replace();
        },
        "destroy":true,
        "ajax":'ListaMantbienesDetalle/'+id,
        "method":'GET',
        "columns":[
            {data:'id'},
            {'defaultContent':
            "<button class='btn btn-icon btn-gradient-warning btnEditarMantbienesDetalle'><i data-feather='edit-3'></i></button>\
            <button class='btn btn-icon btn-gradient-danger btnEliminarMantbienesDetalle'><i data-feather='x'></i></button>"},
            {data:'Descripcion'},
            {data:'NumeroSerie'},
            {data:'Modelo'},
            {data:'Marca'},
            {data:'AnoFab'},
            {data:'AnoCompra'},
            {data:'Estado'},
            {data:'Observaciones'},
            {data:'MPreventivo'},
            {data:'MCorrectivo'},
            ],
        order: [0],
    })

    $("#ModalListaMantbienesDetalle").modal('show');
});



$("#btnGuardaMantBienes").click(function (e) { 
    e.preventDefault();
    ds=$("#formMantBienes").serialize();
    dt="#DTListaMantBienes";
    if ($("#EtiquetaMantBienes").text()=='REGISTRO DE BIENES CON MANTENIMIENTO Y ESTADO DE LOS MISMOS') {
        ru='GuardaMantbienes';   
        mje='Registro Guardado';
    }else{
        ru='ActualizaMantbienes';
        mje='Registro Actualizado';
    }
    GuardarRegistro(ds,ru,mje,dt);
    $("#ModalMantBienes").modal('hide');
});


$("#btnNuevoMantBienes").click(function (e) { 
    e.preventDefault();
    $("#EtiquetaMantBienes").text('REGISTRO DE BIENES CON MANTENIMIENTO Y ESTADO DE LOS MISMOS');
    $("#IdMantBienes").val('');
    //falta limpiar cajas
    $("#ModalMantBienes").modal('show');
});

$(document).on("click",".btnEditarMantBienes",function (e) {
    e.preventDefault();
    $("#EtiquetaMantBienes").text('EDITAR BIENES CON MANTENIMIENTO Y ESTADO DE LOS MISMOS');
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    $.ajax({
        type: "GET",
        url: "EditaMantbienes/"+id,
        dataType: "json",
        success: function (response) {
            $("#IdMantBienes").val(id);
            $("#Ipress").val(response[0].Ipress).change();
            $("#Provincia").val(response[0].IdProvincia).change();
            $("#Distrito").val(response[0].IdDistrito).change();
            $("#Idred").val(response[0].Idred).change();
            $("#Idmicrored").val(response[0].Idmicrored).change();
        }
    });
    $("#ModalMantBienes").modal('show');

});


$("#DTListaMantBienes").DataTable({
    "drawCallback": function(settings) {
        feather.replace();
    },
    "destroy":true,
    "ajax":'ListarMantbienes',
    "method":'GET',
    "columns":[
        {data:'id'},
        {'defaultContent':
        "<button class='btn btn-icon btn-gradient-warning btnEditarMantBienes'><i data-feather='edit-3'></i></button>\
        <button class='btn btn-icon btn-gradient-danger btnEliminarMantBienes'><i data-feather='x'></i></button>\
        <button class='btn btn-icon btn-gradient-success btnMantBienesDetalle'><i data-feather='file-text'></i></button>"},
        {data:'Provincia'},
        {data:'Distrito'},
        {data:'Red'},
        {data:'Microred'},
        {data:'Ipress'},
        {data:'Usuario'},
        ],
    order: [0],
})

$("#Estado").change(function () {
    if ($(this).val()=='REGULAR') {
        $("#Observaciones").val('REQUIERE CAMBIO DE REPUESTOS');
    }
    if ($(this).val()=='MALO') {
        $("#Observaciones").val('REQUIERE DAR DE BAJA');    
    }
    if ($(this).val()=='BUENO') {
        $("#Observaciones").val('');    
    }
});

var fecha = new Date();
document.getElementById("fecha").value = fecha.toJSON().slice(0, 10);
