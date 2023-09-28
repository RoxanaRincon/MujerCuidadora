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

    public static function mdlListarCategorias(){
        $listarCategoria = "";
        try {
            $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM categoria");
            $objRespuesta->execute();
            $listarCategoria = $objRespuesta->fetchAll(PDO::FETCH_ASSOC);
            $objRespuesta = null;
        } catch (Exception $e) {
            $listarCategoria = $e;
        }
        return $listarCategoria;
    }

    public static function mdlListarTipoServicios(){
        $listarTipoServicio = "";
        try {
            $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM tipoServicio");
            $objRespuesta->execute();
            $listarTipoServicio = $objRespuesta->fetchAll(PDO::FETCH_ASSOC);
            $objRespuesta = null;
        } catch (Exception $e) {
            $listarTipoServicio = $e;
        }
        return $listarTipoServicio;
    }
}

