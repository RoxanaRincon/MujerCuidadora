<?php

include_once "conexion.php";

class mdlUsuario {

    public static function mdlGuardarUsuario($Correo, $Contrasena) {
        $GuardarUsuario = "";
   
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
            return $error; 
        }
    }

    public static function mdlActualizarContrasena($correo, $nuevaContrasena) {
        try {
            
            
            $stmt = Conexion::conectar()->prepare("UPDATE admin SET contraseña = :nuevaContrasena WHERE correoElectronico = :correo");
            $stmt->bindParam(":nuevaContrasena", $nuevaContrasena);
            $stmt->bindParam(":correo", $correo);
            
            if ($stmt->execute()) {
                return "ok"; // Contraseña actualizada con éxito
            } else {
                return "Error al actualizar la contraseña";
            }
        } catch (Exception $error) {
            return $error->getMessage(); // Manejar errores si es necesario
        }
    }

}
?>
