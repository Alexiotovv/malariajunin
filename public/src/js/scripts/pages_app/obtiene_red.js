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