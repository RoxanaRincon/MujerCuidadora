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
        event.preventDefault();
        var formData = $(this).serialize();
        console.log(formData);
        $.ajax({
            url: "../controlador/usuarioControlador.php", 
            method: "POST",
            data: formData,
            dataType: "json",
            success: function(response) {
                if (response.idAdmin) {
                    console.log(response.idAdmin);
                    window.location.href = "../vista/manzanas.php";
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
});
