<?php

include_once "../modelo/servicioModelo.php";

class servicio{

    public function ctrListarServicios(){
        $objRespuesta = mdlServicio::mdlListarServicios();
        echo json_encode($objRespuesta);
    }

    public function ctrListarCategorias(){
        $objRespuesta = mdlServicio::mdlListarCategorias();
        echo json_encode($objRespuesta);
    }

    public function ctrListarTipoServicios(){
        $objRespuesta = mdlServicio::mdlListarTipoServicios();
        echo json_encode($objRespuesta);
    }

    public function ctrGuardarServicio($codigo, $nombre, $descripcion, $categoria, $tipoServicio) {
        $respuestaServicio = mdlServicio::mdlGuardarServicio($codigo, $nombre, $descripcion, $categoria, $tipoServicio);
        echo json_encode($respuestaServicio);
    }
}


if(isset($_POST["listarServicios"]) == "ok"){
    $objServicio = new servicio();
    $objServicio->ctrListarServicios();
}


if(isset($_POST["listarCategorias"]) == "ok"){
    $objServicio = new servicio();
    $objServicio->ctrListarCategorias();
}

if(isset($_POST["listarTipoServicio"]) == "ok"){
    $objServicio = new servicio();
    $objServicio->ctrListarTipoServicios();
}

if (isset($_POST["guardarCodigo"], $_POST["guardarNombre"], $_POST["guardarDescripcion"], $_POST["guardarCategoria"], $_POST["guardarTipoServicio"])) {
    $objServicio = new servicio();
    $codigo = $_POST["guardarCodigo"];
    $nombre = $_POST["guardarNombre"];
    $descripcion = $_POST["guardarDescripcion"];
    $categoria = $_POST["guardarCategoria"];
    $tipoServicio = $_POST["guardarTipoServicio"];
    
    $objServicio->ctrGuardarServicio($codigo, $nombre, $descripcion, $categoria, $tipoServicio);
}