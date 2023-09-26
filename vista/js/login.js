$(document).ready(function() {

    $("#registro").on("click", function() {
        $("#boxIngreso").hide();
        $("#boxRegistro").fadeIn(1000);
        $("#correoregistroid").val("");
        $("#contrasenaregistroid").val(""); // Limpiar el campo de contraseña
    });
    
    $("#ingresarlogin").on("click", function() {
        $("#boxIngreso").show();
        $("#boxRegistro").hide();
        $("#correoregistroid").val("");
        $("#contrasenaregistroid").val(""); // Limpiar el campo de contraseña
    });


$("#formLogin").submit(function(event) {
    debugger;
        event.preventDefault();
        var formData = $(this).serialize();
        console.log(formData);
        $.ajax({
            url: "../controlador/usuarioControlador.php", 
            method: "POST",
            data: formData,
            dataType: "json",
            success: function(response) {
                if (response.hasOwnProperty('id_rol')) {
                    console.log(response.id_rol);
                    // Redireccionar al dashboard según el tipo de usuario
                    window.location.href = determineDashboard(response.id_rol);
                } else {
                    alert("Usuario o contraseña incorrectos");
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr, status, error); // Imprimir el error en la consola para depurar
                alert("Error al procesar la solicitud");
            }
        });
    });

    function determineDashboard(tipoUsuario) {
        switch (tipoUsuario) {
            case 1:
                return "../vista/aprendiz.php";
            case 2:
                return "../vista/instructor.php";
            case 3:
                return "../vista/administrador.php";
            case 4:
                return "../vista/usuario.php";
            default:
                return "../vista/index.php"; // Página predeterminada en caso de rol desconocido
        }
    }



    
});
