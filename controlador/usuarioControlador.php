<?php 

include_once "../modelo/usuarioModelo.php";

class ctrUsuario {

    public function ctrGuardarUsuario($correo, $contrasena, $pregunta1, $pregunta2, $respuesta1, $respuesta2) {
        $respuestaUsuarioM = mdlUsuario::mdlGuardarUsuario($correo, $contrasena, $pregunta1, $pregunta2, $respuesta1, $respuesta2);
        echo json_encode($respuestaUsuarioM);
    }


    public function ctrGuardarNuevaContrasena($correo, $nuevaContrasena) {
        $resultado = mdlUsuario::mdlActualizarContrasena($correo, $nuevaContrasena);
        
        if ($resultado === "ok") {
            echo json_encode(["mensaje" => "ok"]);
        } else {
            echo json_encode(["mensaje" => "error"]);
        }
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

if (isset($_POST["guardarCorreo"], $_POST["guardarContrasena"], $_POST["preguntaSeguridad1"], $_POST["preguntaSeguridad2"], $_POST["respuestaSeguridad1"], $_POST["respuestaSeguridad2"])) {
    $objUsuario = new ctrUsuario();
    $correo = $_POST["guardarCorreo"];
    $contrasena = $_POST["guardarContrasena"];
    $pregunta1 = $_POST["preguntaSeguridad1"];
    $pregunta2 = $_POST["preguntaSeguridad2"];
    $respuesta1 = $_POST["respuestaSeguridad1"];
    $respuesta2 = $_POST["respuestaSeguridad2"];
    
    $objUsuario->ctrGuardarUsuario($correo, $contrasena, $pregunta1, $pregunta2, $respuesta1, $respuesta2);
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

if (isset($_POST["action"]) && $_POST["action"] === "guardarNuevaContrasena") {
    if (isset($_POST["correo"], $_POST["nuevaContrasena"])) {
        $objUsuario = new ctrUsuario();
        $objUsuario->ctrGuardarNuevaContrasena($_POST["correo"], $_POST["nuevaContrasena"]);
    } else {
        echo json_encode(["mensaje" => "Faltan datos"]);
    }
}

?>
