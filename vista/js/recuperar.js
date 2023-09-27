$(document).ready(function() {
    // Variable para almacenar el correo
    var correo = "";

  
    // Manejo del evento click para el botón "PREGUNTAS DE SEGURIDAD"
    $("#preguntas-btn").on("click", function() {
        correo = $("#correoidfrm").val();

        $.ajax({
            url: "../controlador/usuarioControlador.php",
            method: "POST",
            data: { correo: correo, action: "consultarPreguntas" },
            dataType: "json",
            success: function(response) {
                if (response.pregunta1 && response.pregunta2) {
                    // Si se obtienen preguntas de seguridad, mostrar la sección de preguntas
                    $("#pregunta1Texto").text(response.pregunta1);
                    $("#pregunta2Texto").text(response.pregunta2);
                    $("#preguntas-seguridad").fadeIn(1000);
                } else {
                    // Si no se obtienen preguntas de seguridad, mostrar un mensaje de error
                    alert("Usuario no encontrado o no tiene preguntas de seguridad registradas.");
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr, status, error);
                alert("Error al obtener las preguntas de seguridad.");
            }
        });
    });

    // Manejo del evento click para el botón "Validar Preguntas"
    $("#validar-preguntas").on("click", function() {
        var respuesta1 = $("#respuesta1").val();
        var respuesta2 = $("#respuesta2").val();

        $.ajax({
            url: "../controlador/usuarioControlador.php",
            method: "POST",
            data: { correo: correo, respuesta1: respuesta1, respuesta2: respuesta2, action: "validarRespuestas" },
            dataType: "json",
            success: function(response) {
                if (response.mensaje === "true") {
                    // Si las respuestas son correctas, mostrar el campo de nueva contraseña
                    

                    var nuevaContrasena = $("#nuevaContrasena").val();

                    $.ajax({
                        url: "../controlador/usuarioControlador.php",
                        method: "POST",
                        data: { correo: correo, nuevaContrasena: nuevaContrasena, action: "guardarNuevaContrasena" },
                        dataType: "json",
                        success: function(response) {
                            if (response.mensaje === "ok") {
                                // Contraseña guardada correctamente, mostrar un mensaje de éxito
                                alert("Contraseña cambiada con éxito. Ahora puedes iniciar sesión con la nueva contraseña.");
                                // Redirigir al usuario a la página de inicio de sesión
                                window.location.href = "../vista/login.php";
                            } else {
                                // Si hay un error al guardar la contraseña, mostrar un mensaje de error
                                alert("Error al cambiar la contraseña. Inténtalo de nuevo.");
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr, status, error);
                            alert("Error al guardar la nueva contraseña.");
                        }
                    });

                } else {
                    // Si las respuestas son incorrectas, mostrar un mensaje de error
                    alert("Respuestas incorrectas. Inténtalo de nuevo.");
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr, status, error);
                alert("Error al validar las respuestas.");
            }
        });
    });

    
});
