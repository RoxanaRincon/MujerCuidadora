<?php

include_once "conexion.php";

class mdlUsuario {

    public static function mdlGuardarUsuario($Correo, $Contrasena) {
        $GuardarUsuario = "";
        // Cifrar antes de guardar en la base de datos
        $password_cifrado = password_hash($Contrasena, PASSWORD_DEFAULT);
        try {
            $respuestaUsuario = Conexion::conectar()->prepare("INSERT INTO admin(correoElectronico, contraseña) VALUES (:Correo, :Contrasena)");
            $respuestaUsuario->bindParam(":Correo", $Correo);
            $respuestaUsuario->bindParam(":Contrasena", $password_cifrado);
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

    public static function mdlIniciarSesion($correo, $password) {
        try {
            $consulta = Conexion::conectar()->prepare("SELECT * FROM admin WHERE correoElectronico = :correo");
            $consulta->bindParam(":correo", $correo);
            $consulta->execute();
            $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

            if ($usuario && password_verify($password, $usuario['contraseña'])) {
                return $usuario;
            } else {
                return false;
            }
        } catch (Exception $error) {
            return false;
        }
    }
}
?>
