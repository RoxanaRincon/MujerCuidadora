<?php
include_once "conexion.php";

class mdlMapa{

    public static function mdlListarMapa(){
        $listarMapa = "";
        try {
            $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM manzana");
            $objRespuesta->execute();
            $listarMapa = $objRespuesta->fetchAll(PDO::FETCH_ASSOC);
            $objRespuesta = null;
        } catch (Exception $e) {
            $listarMapa = $e;
        }
        return $listarMapa;
    }
}