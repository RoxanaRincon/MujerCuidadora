$(document).ready(function() {
    // Manejo del evento click para el botón "REGISTRAR"
    $("#registro").on("click", function() {
        $("#boxIngreso").hide();
        $("#boxRegistro").fadeIn(1000);
        $("#correoregistroid").val("");
        $("#contrasenaregistroid").val(""); // Limpiar el campo de contraseña
    });

   
      // Manejo del evento submit para el formulario de registro
      $("#formRegistro").submit(function(event) {
        event.preventDefault();

        // Obtener las preguntas de seguridad seleccionadas
        var preguntaSeguridad1 = $("#preguntaSeguridad1").val();
        var preguntaSeguridad2 = $("#preguntaSeguridad2").val();

        // Obtener las respuestas ingresadas
        var respuestaSeguridad1 = $("#respuestaSeguridad1").val();
        var respuestaSeguridad2 = $("#respuestaSeguridad2").val();

        // Crear un objeto con los datos del formulario, incluyendo las preguntas y respuestas
        var formDataRegistro = {
            guardarCorreo: $("#correoregistroid").val(),
            guardarContrasena: $("#contrasenaregistroid").val(),
            preguntaSeguridad1: preguntaSeguridad1,
            preguntaSeguridad2: preguntaSeguridad2,
            respuestaSeguridad1: respuestaSeguridad1,
            respuestaSeguridad2: respuestaSeguridad2
        };

        console.log(formDataRegistro);

        
        $.ajax({
            url: "../controlador/usuarioControlador.php",
            type: "POST",
            dataType: "json",
            data: formDataRegistro,
        }).done(function (respuesta) {
            console.log(respuesta);
            $("#correoregistroid").val("");
            $("#contrasenaregistroid").val("");
            $("#preguntaSeguridad1").val("");
            $("#preguntaSeguridad2").val("");
            $("#respuestaSeguridad1").val("");
            $("#respuestaSeguridad2").val("");
            alert("Usuario creado satisfactoriamente ");

            $("#boxIngresoMol").show();
            $("#boxRegistroMol").hide();
        }).fail(function (xhr, status, error) {
            
            console.log(xhr, status, error);
        });
    });


    $("#preguntas").on("click", function() {
        var correo = $("#correoidfrm").val();

        $.ajax({
            url: "../controlador/usuarioControlador.php",
            method: "POST",
            data: { correo: correo, action: "consultarPreguntas" },
            dataType: "json",
            success: function(response) {
                $("#pregunta1").val(response.pregunta1);
                $("#pregunta2").val(response.pregunta2);
                $("#preguntas-seguridad").fadeIn(1000);
            },
            error: function(xhr, status, error) {
                console.log(xhr, status, error);
                alert("Error al obtener las preguntas de seguridad.");
            }
        });
    });
});
