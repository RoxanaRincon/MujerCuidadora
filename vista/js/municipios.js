$(document).ready(function () {

    // Función para listar municipios
    $("#listarMunicipiosBtn").click(function () {
       
        $.ajax({
            url: "../controlador/municipiosControlador.php",
            type: "POST",
            dataType: "json",
            data: { listarMunicipios: "ok" }, // Envia el parámetro listarMunicipios
            success: function (response) {

                console.log(response);
                if (response.length > 0) {
                    $("#listaMunicipios").empty();
                    $.each(response, function (index, municipio) {
                        $("#listaMunicipios").append("<li class='list-group-item'>" + municipio.nombre + " - " + municipio.localidad + " - " + municipio.direccion + "</li>");
                    });
                } else {
                    alert("No se encontraron municipios.");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Maneja errores aquí
                console.error('Error en la solicitud AJAX:', errorThrown);
                alert("Algo salió mal.");
            }
        });
    });

    // Función para agregar municipios
    $("#formularioAgregarMunicipio").submit(function (event) {
        event.preventDefault(); // Evita el envío del formulario por defecto

        var nombre = $("#nombre").val();
        var localidad = $("#localidad").val();
        var direccion = $("#direccion").val();

        var objData = new FormData();
        objData.append("agregarMunicipio", "ok");
        objData.append("nombre", nombre);
        objData.append("localidad", localidad);
        objData.append("direccion", direccion);

        $.ajax({
            url: "../controlador/municipiosControlador.php",
            type: "POST",
            dataType: "json",
            data: objData,
            processData: false, // Importante cuando se usa FormData
            contentType: false, // Importante cuando se usa FormData
            success: function (response) {
                console.log(response);
                if (response.hasOwnProperty('mensaje')) {
                    alert(response.mensaje);
                    // Puedes hacer alguna acción adicional aquí, como actualizar la lista de municipios
                } else if (response.hasOwnProperty('error')) {
                    alert(response.error);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Maneja errores aquí
                console.error('Error en la solicitud AJAX:', errorThrown);
                alert("Algo salió mal.");
            }
        });
    });

    // ...
});
