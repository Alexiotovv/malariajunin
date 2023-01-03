function GuardaRegistroEspecie(ds,ru) {
    
    $.ajax({
        type: "POST",
        url: ru,
        data: ds,
        dataType: "json",
        success: function (response) {
            mje=response.Mensaje;
            icono=response.Icono;
            if (mje=='Registro Guardado') {
                $("#Especies").empty();
                response.especies.forEach(element => {
                    // console.log(element['nombre_especie']);
                    if (element['nombre_especie']==$("#nombre_especie").val().toUpperCase()) {
                        $("#Especies").append('<option selected value=' + element['id'] + '>'+element['nombre_especie']+'</option>');
                    }else{
                        $("#Especies").append('<option value=' + element['id'] + '>'+element['nombre_especie']+'</option>');
                    }
                });
                $("#nombre_especie").val('');
            }
            
            Swal.fire(
                {
                position: 'top-end',
                icon: icono,
                title: mje,
                showConfirmButton: false,
                timer: 1500}
                )
            $(dt).DataTable().ajax.reload();
            
        },
        error: function(response) {
            Swal.fire('OPS!', 'Hubo un error!', 'error')
        },
    });
};


////LA FUNCIÓN PARA GUARDAR O ACTUALIZAR REGISTRO
function GuardarRegistro(ds,ru,mje,dt){
    $.ajax({
        type: "POST",
        url: ru,
        data: ds,
        dataType: "json",
        success: function (response) {
            Swal.fire(
                {
                position: 'top-end',
                icon: 'success',
                title: mje,
                showConfirmButton: false,
                timer: 1500}
                )
            $(dt).DataTable().ajax.reload();
            
        },
        error: function(response) {
            Swal.fire('OPS!', 'Hubo un error!', 'error')
        },
    });
};

///FUNCION ELIMINAR REGISTRO
function EliminarRegistro(ru,mje,dt){
    Swal.fire({
        title: 'Estás seguro?', text: "Confirma para poder eliminar el registro!",
        icon: 'Mensaje', showCancelButton: true, confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33', confirmButtonText: 'Sí, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "GET",
                url: ru,
                dataType: "json",
                success: function (response) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: mje,
                        showConfirmButton: false,
                        timer: 1500});
                    $(dt).DataTable().ajax.reload();
                },
                error: function(response) {
                    Swal.fire('OPS!', 'Hubo un error!', 'error');
                },
            });
        }
    })

};

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