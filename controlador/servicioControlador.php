<?php

include_once "../modelo/servicioModelo.php";

class servicio{

    public $codigo;
    public $nombre;
    public $descripcion;
    public $idCategoria;
    public $idTipoServicio;

    public function ctrListarServicios(){
        $objRespuesta = mdlServicio::mdlListarServicios();
        echo json_encode($objRespuesta);
    }

    public function ctrListarCategorias(){
        $objRespuesta = mdlServicio::mdlListarCategorias();
        echo json_encode($objRespuesta);
    }

    public function ctrListarTipoServicios(){
        $objRespuesta = mdlServicio::mdlListarTipoServicio();
        echo json_encode($objRespuesta);
    }

    public function ctrGuardarServicio($codigo, $nombre, $descripcion, $categoria, $tipoServicio) {
        $respuestaServicio = mdlServicio::mdlGuardarServicio($codigo, $nombre, $descripcion, $categoria, $tipoServicio);
        echo json_encode($respuestaServicio);
    }

    public function ctrEliminarServicio($idServicio) {
        $respuestaEliminar = mdlServicio::mdlEliminarServicio($idServicio);
        echo json_encode($respuestaEliminar);
    }

    public function ctrEditarServicio($idServicio, $codigo, $nombre, $descripcion, $categoria, $tipoServicio) {
        $respuestaEditar = mdlServicio::mdlEditarServicio($idServicio, $codigo, $nombre, $descripcion, $categoria, $tipoServicio);
        echo json_encode($respuestaEditar);
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

if (isset($_POST["eliminarServicio"], $_POST["idServicio"])) {
    $objServicio = new servicio();
    $idServicio = $_POST["idServicio"];
    
    $objServicio->ctrEliminarServicio($idServicio);
}


if (isset($_POST["editarServicio"], $_POST["editarIdServicio"], $_POST["editarCodigo"], $_POST["editarNombre"], $_POST["editarDescripcion"], $_POST["editarCategoria"], $_POST["editarTipoServicio"])) {
    $objServicio = new servicio();
    $idServicio = $_POST["editarIdServicio"];
    $codigo = $_POST["editarCodigo"];
    $nombre = $_POST["editarNombre"];
    $descripcion = $_POST["editarDescripcion"];
    $categoria = $_POST["editarCategoria"];
    $tipoServicio = $_POST["editarTipoServicio"];
    
    $objServicio->ctrEditarServicio($idServicio, $codigo, $nombre, $descripcion, $categoria, $tipoServicio);
}