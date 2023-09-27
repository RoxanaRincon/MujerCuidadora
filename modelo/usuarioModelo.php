<?php

include_once "conexion.php";

class mdlUsuario {

    public static function mdlGuardarUsuario($Correo, $Contrasena) {
        $GuardarUsuario = "";
        // Cifrar antes de guardar en la base de datos
      //  $password_cifrado = password_hash($Contrasena, PASSWORD_DEFAULT);
        try {
            $respuestaUsuario = Conexion::conectar()->prepare("INSERT INTO admin(correoElectronico, contraseña) VALUES (:Correo, :Contrasena)");
            $respuestaUsuario->bindParam(":Correo", $Correo);
            $respuestaUsuario->bindParam(":Contrasena", $Contrasena);
            if ($respuestaUsuario->execute()) {
                $GuardarUsuario = "ok";
            } else {
                $GuardarUsuario = "Error al registrar el usuario";
            }
        } catch (Exception $error) {
            $GuardarUsuario = $error;
        }
        return $GuardarUsuario;
    }


    
    public static function mdlConsultarPreguntasSeguridad($correo) {
        $stmt = Conexion::conectar()->prepare("SELECT pregunta1, pregunta2 FROM admin WHERE correoElectronico = :correo");
        $stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

    public static function mdlIniciarSesion($correo, $password) {
        try {
            $consulta = Conexion::conectar()->prepare("SELECT * FROM admin WHERE correoElectronico = :correo");
            $consulta->bindParam(":correo", $correo);
            $consulta->execute();
            $usuario = $consulta->fetch(PDO::FETCH_ASSOC);
            if ($usuario && $password == $usuario['contraseña']) {
                return $usuario;
            } else {
                return false;
            }
        } catch (Exception $error) {
            return $error;
        }
    }


    public static function mdlValidarRespuestas($correo, $respuesta1, $respuesta2) {
        try {
            $consulta = Conexion::conectar()->prepare("SELECT * FROM admin WHERE correoElectronico = :correo");
            $consulta->bindParam(":correo", $correo);
            $consulta->execute();
            $usuario = $consulta->fetch(PDO::FETCH_ASSOC);
            
            if ($usuario) {
                if ($respuesta1 === $usuario['respuesta1'] && $respuesta2 === $usuario['respuesta2']) {
                    return true; 
                }
            }
            return false; 
        } catch (Exception $error) {
            return false; 
        }
    }

}
?>
