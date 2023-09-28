<?php
include_once "conexion.php";

class mdlServicio{

    public static function mdlListarServicios(){
        $listarServicio = "";
        try {
            $objRespuesta = Conexion::conectar()->prepare("SELECT * from categoria,servicio,tiposervicio where servicio.IdCategoria = categoria.idCategoria and servicio.IdTipoServicio = tiposervicio.idTipoUsuario");
            $objRespuesta->execute();
            $listarServicio = $objRespuesta->fetchAll(PDO::FETCH_ASSOC);
            $objRespuesta = null;
        } catch (Exception $e) {
            $listarServicio = $e;
        }
        return $listarServicio;
    }
}

