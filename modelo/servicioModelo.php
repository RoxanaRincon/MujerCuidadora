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
            $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM tiposervicio");
            $objRespuesta->execute();
            $listarTipoServicio = $objRespuesta->fetchAll(PDO::FETCH_ASSOC);
            $objRespuesta = null;
        } catch (Exception $e) {
            $listarTipoServicio = $e;
        }
        return $listarTipoServicio;
    }


    public static function mdlGuardarServicio($codigo, $nombre, $descripcion, $categoria, $tipoServicio) {
        try {
            // Preparar la sentencia SQL INSERT
            $stmt = Conexion::conectar()->prepare("INSERT INTO servicio(codigo, nombre, descripcion, IdCategoria, IdTipoServicio) VALUES (:codigo, :nombre, :descripcion, :categoria, :tipoServicio)");
    
            // Bind de los parámetros
            $stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(':categoria', $categoria, PDO::PARAM_INT);
            $stmt->bindParam(':tipoServicio', $tipoServicio, PDO::PARAM_INT);
    
            // Ejecutar la sentencia SQL
            if ($stmt->execute()) {
                // Éxito: Devolver un mensaje de éxito
                return ["mensaje" => "ok"];
            } else {
                // Error: Devolver un mensaje de error
                return ["mensaje" => "Error al guardar el servicio"];
            }
        } catch (Exception $e) {
            // Manejar cualquier excepción que ocurra
            return ["mensaje" => "Error: " . $e->getMessage()];
        }
    }
}

