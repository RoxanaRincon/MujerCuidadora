<?php
include_once "conexion.php";

class mdlEstablecimiento{

    public static function mdlListarEstablecimiento(){
        $listarEstablecimiento = "";
        try {
            $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM establecimiento");
            $objRespuesta->execute();
            $listarEstablecimiento = $objRespuesta->fetchAll(PDO::FETCH_ASSOC);
            $objRespuesta = null;
        } catch (Exception $e) {
            $listarEstablecimiento = $e;
        }
        return $listarEstablecimiento;
    }

    public static function mdlGuardarEstablecimiento($codigo,$nombre,$responsable,$direccion){
        $mensaje = "";
        try {
            $objRespuesta = Conexion::conectar()->prepare("INSERT INTO establecimiento(codigo,nombre,responsable,direccion) VALUES(:codigo,:nombre,:responsable,:direccion)");
            $objRespuesta->bindParam(":codigo",$codigo);
            $objRespuesta->bindParam(":nombre",$nombre);
            $objRespuesta->bindParam(":responsable",$responsable);
            $objRespuesta->bindParam(":direccion",$direccion);
            if($objRespuesta->execute()){
                $mensaje = "ok";
            }else{
                $mensaje = "Error al registrar el establecimiento";
            }
        } catch (Exception $e) {
            $mensaje = $e;
        }
        return $mensaje;
    }
}

