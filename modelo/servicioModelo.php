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

    public static function mdlListarTipoServicio(){
        $listarTipoServicio = "";
        try {
            $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM tiposervicio");
            $objRespuesta->execute();
            $listarTipoServicio = $objRespuesta->fetchAll(PDO::FETCH_ASSOC);
            $objRespuesta = null;
        } catch (Exception $e) {
            $listarTipoServicio = $e;
        }
        return $listarTipoServicio;
    }

    public static function mdlListarServicio($codigo,$nombre,$descripcion,$idCategoria,$idTipoServicio){
        $mensaje = "";
        try{
            $objRespuesta = Conexion::conectar()->prepare("INSERT INTO servicio(codigo,nombre,descripcion,IdCategoria,IdTipoServicio) VALUES(:codigo,:nombre,:descripcion,:IdCategoria,:IdTipoServicio)");
            $objRespuesta->bindparam(":codigo", $codigo);
            $objRespuesta->bindparam(":nombre", $nombre);
            $objRespuesta->bindparam(":descripcion", $descripcion);
            $objRespuesta->bindparam(":IdCategoria", $idCategoria);
            $objRespuesta->bindparam(":IdTipoServicio", $idTipoServicio);
            if($objRespuesta->execute()){
                $mensaje = "ok";
            }else{
                $mensaje = "Error al insertar el servicio";
            }

        }catch(Exception $e){
            $mensaje = $e;
        }
        return $mensaje;
    }

}

