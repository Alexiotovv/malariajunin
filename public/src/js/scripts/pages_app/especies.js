
$("#DTListaEspecies").DataTable({
    "drawCallback": function(settings) {
        feather.replace();
    },
    "destroy":true,
    "ajax":'ListarEspecies',
    "method":'GET',
    "columns":[
        {data:'id'},
        {'defaultContent':
        "<button class='btn btn-icon btn-gradient-warning btnEditarEspecie'><i data-feather='edit-3'></i></button>"},
        {data:'nombre_especie'},
        ],
    order: [0],
})
$("#btnNuevoRegistroEspecie").on("click",function (e) {
    e.preventDefault();
    $("#EtiquetaEspecie").text('Nueva Especie');
    $("#nombre_especie").val("");
    $("#ModalNuevaEspecie").modal('show');
    
})
$(document).on("click",".btnEditarEspecie",function (e) {
    e.preventDefault();
    $("#EtiquetaEspecie").text('Editar Especie');
    fila = $(this).closest("tr");
    IdEspecie = (fila).find('td:eq(0)').text();
    nombre_especie = (fila).find('td:eq(2)').text();
    $("#IdEspecie").val(IdEspecie);
    $("#nombre_especie").val(nombre_especie);
    $("#ModalNuevaEspecie").modal('show');
    
})
$("#btnGuardaNuevaEspecie").on("click",function (e) {
    e.preventDefault();
    ds=$("#frmEspecie").serialize();
    if ($("#EtiquetaEspecie").text()=="Nueva Especie") {
        ru="GuardaEspecie";
        mje="Registro Guardado";
    }else{
        ru="ActualizaEspecie";
        mje="Registro Actualizado";
    }
    dt="#DTListaEspecies";
    GuardarRegistro(ds,ru,mje,dt);
    $("#ModalNuevaEspecie").modal('hide');
})