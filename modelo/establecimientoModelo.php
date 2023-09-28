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
}

