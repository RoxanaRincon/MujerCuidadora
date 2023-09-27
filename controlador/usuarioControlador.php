<?php 

include_once "../modelo/usuarioModelo.php";

class ctrUsuario {

    public function ctrGuardarUsuario($correo, $contrasena) {
        $respuestaUsuarioM = mdlUsuario::mdlGuardarUsuario($correo, $contrasena);
        echo json_encode($respuestaUsuarioM);
    }

    public function ctrIniciarSesion($correo, $contrasena) {
        $usuario = mdlUsuario::mdlIniciarSesion($correo, $contrasena);
    
        if ($usuario) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['idAdmin'] = $usuario['idAdmin']; // Ajusta el nombre de la columna de ID según tu estructura
            echo json_encode($usuario);
        } else {
            echo json_encode($usuario);
        }
    }
}

// Verificar si se ha enviado el formulario de inicio de sesión
if (isset($_POST["correoFrm"], $_POST["contrasenaFrm"])) {
    $objUsuario = new ctrUsuario();
    $objUsuario->ctrIniciarSesion($_POST["correoFrm"], $_POST["contrasenaFrm"]);
}

// Verificar si se ha enviado el formulario de registro de usuario
if (isset($_POST["guardarCorreo"], $_POST["guardarContrasena"])) {
    $objUsuario = new ctrUsuario();
    $objUsuario->ctrGuardarUsuario($_POST["guardarCorreo"], $_POST["guardarContrasena"]);
}
?>
