<?php 

include_once "../modelo/usuarioModelo.php";

class ctrUsuario {

    public $idUsuarioContralador;
    public $CorreoContralador;
    public $ContrasenaControlador;
    public $TipoUsuarioControlador;

    public function ctrGuardarUsuario() {
        $respuestaUsuarioM = mdlUsuario::mdlGuardarUsuario($this->CorreoContralador, $this->ContrasenaControlador);
        echo json_encode($respuestaUsuarioM);
    }

    public function ctrIniciarSesion($correoIniciarSesion, $contrasenaIniciarSesion) {
        $usuario = mdlUsuario::mdlIniciarSesion($correoIniciarSesion, $contrasenaIniciarSesion);
    
        if ($usuario) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['idUsuario'] = $usuario['id'];
            $_SESSION['tipoUsuario'] = $usuario['id_rol'];
            echo json_encode($usuario);
        } else {
            echo json_encode("Usuario o contraseña incorrectos");
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
    $objUsuario->CorreoContralador = $_POST["guardarCorreo"];
    $objUsuario->ContrasenaControlador = $_POST["guardarContrasena"]; 
    $objUsuario->ctrGuardarUsuario();
}
?>
