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

    public function ctrValidarRespuestas($correo, $respuesta1, $respuesta2) {
        $validacion = mdlUsuario::mdlValidarRespuestas($correo, $respuesta1, $respuesta2);
        if ($validacion) {
            
            echo json_encode(["mensaje" => "true"]);
        } else {
            echo json_encode(["mensaje" => "false"]);
        }
    }


    public function ctrConsultarPreguntasSeguridad($correo) {
        $preguntas = mdlUsuario::mdlConsultarPreguntasSeguridad($correo);
        echo json_encode($preguntas);
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

if (isset($_POST["action"]) && $_POST["action"] === "consultarPreguntas") {
    if (isset($_POST["correo"])) {
        $objUsuario = new ctrUsuario();
        $objUsuario->ctrConsultarPreguntasSeguridad($_POST["correo"]);
    } else {
        echo json_encode(["pregunta1" => "", "pregunta2" => ""]);
    }
}

if (isset($_POST["action"]) && $_POST["action"] === "validarRespuestas") {
    if (isset($_POST["correo"], $_POST["respuesta1"], $_POST["respuesta2"])) {
        $objUsuario = new ctrUsuario();
        $objUsuario->ctrValidarRespuestas($_POST["correo"], $_POST["respuesta1"], $_POST["respuesta2"]);
    } else {
        echo json_encode(["mensaje" => "Faltan datos"]);
    }
}

?>
