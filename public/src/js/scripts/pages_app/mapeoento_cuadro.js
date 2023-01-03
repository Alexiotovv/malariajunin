
$("#btnGuardaNuevaEspecie").on("click",function (e) {
    e.preventDefault();
    ds=$("#frmNuevaEspecie").serialize();
    ru='GuardaEspecie';
    GuardaRegistroEspecie(ds,ru);
    
    $("#ModalNuevaEspecie").modal('hide');
    //limpiar select de Especies
    
    //Llenar select de Especies
});

$("#AgregarEspecie").on("click",function (e){
    e.preventDefault();
    $("#EtiquetaNuevaEspecie").text("Nueva Especie")
    $("#ModalNuevaEspecie").modal('show');

});

$(document).on("click",".btnEliminarMapeoEntoCuadro",function (e) {
    e.preventDefault();
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    ru="EliminaMapeoEntoCuadro/"+id;
    mje="Registro Eliminado";
    dt="#DTListaMapeoEntoCuadro"
    EliminarRegistro(ru,mje,dt);

});


$("#btnGuardaMapeoEntoCuadro").click(function (e) { 
    e.preventDefault();
    ds=$("#formMapeoEntoCuadro").serialize();
    dt="#DTListaMapeoEntoCuadro";
    if ($("#EtiquetaMapeoEntoCuadro").text()=='REGISTRO MAPEO ENTOMOLÓGICO ANOPHELES') {
        ru='GuardaMapeoEntoCuadro';   
        mje='Registro Guardado';
    }else{
        ru='ActualizaMapeoEntoCuadro';
        mje='Registro Actualizado';
    }
    GuardarRegistro(ds,ru,mje,dt);
    $("#ModalMapeoEntoCuadro").modal('hide');
});


$(document).on("click",".btnEditarMapeoEntoCuadro",function (e) {
    e.preventDefault();
    $("#EtiquetaMapeoEntoCuadro").text('EDITAR MAPEO ENTOMOLÓGICO ANOPHELES');
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    $.ajax({
        type: "GET",
        url: "EditaMapeoEntoCuadro/"+id,
        dataType: "json",
        success: function (response) {
            $("#IdMapeoEntoCuadro").val(id);
            $("#Localidad").val(response[0].idLocalidad).change();
            $("#Provincia").val(response[0].IdProvincia).change();
            $("#Distrito").val(response[0].IdDistrito).change();
            $("#Idred").val(response[0].Idred).change();
            $("#Idmicrored").val(response[0].Idmicrored).change();
            $("#tipo_mapeo").val(response[0].tipo_mapeo).change();
            $("#Especies").val(response[0].idEspecies).change();
            $("#mes").val(response[0].mes).change();
            $("#ano").val(response[0].ano).change();

        }
    });
    $("#ModalMapeoEntoCuadro").modal('show');
});



$("#btnNuevoMapeoEntoCuadro").on("click",function (e) {
    e.preventDefault();
    $("#EtiquetaMapeoEntoCuadro").text('REGISTRO MAPEO ENTOMOLÓGICO ANOPHELES')
    $("#ModalMapeoEntoCuadro").modal("show");
    
})

$("#DTListaMapeoEntoCuadro").DataTable({
    "drawCallback": function(settings) {
        feather.replace();
    },
    "destroy":true,
    "ajax":'ListarMapeoEntoCuadro',
    "method":'GET',
    "columns":[
        {data:'id'},
        {'defaultContent':
        "<button class='btn btn-icon btn-gradient-warning btnEditarMapeoEntoCuadro'><i data-feather='edit-3'></i></button>\
        <button class='btn btn-icon btn-gradient-danger btnEliminarMapeoEntoCuadro'><i data-feather='x'></i></button>"},
        {data:'Provincia'},
        {data:'Distrito'},
        {data:'Red'},
        {data:'Microred'},
        {data:'NombreLocalidad'},
        {data:'tipo_mapeo'},
        {data:'nombre_especie'},
        {data:'mes'},
        {data:'ano'},
        {data:'Usuario'},
        ],
    order: [0],
})
// var fecha = new Date();
// document.getElementById("fecha").value = fecha.toJSON().slice(0, 10);
