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

    public function ctrListarTipoServicio(){
        $objRespuesta = mdlServicio::mdlListarTipoServicio();
        echo json_encode($objRespuesta);
    }

    public function ctrInsertarServicio(){
        $objRespuesta = mdlServicio::mdlListarServicio($this->codigo, $this->nombre, $this->descripcion, $this->idCategoria, $this->idTipo);
        echo json_encode($objRespuesta);
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
    $objServicio->ctrListarTipoServicio();
}

if(isset($_POST["guardarCodigo"],$_POST["guardarNombre"],$_POST["guardarDescripcion"],$_POST["guardarIdCategoria"],$_POST["guardarIdTipoServicio"])){
    $objServicio = new pedido();
    $objServicio -> codigo = $_POST["guardarCodigo"];
    $objServicio -> nombre = $_POST["guardarNombre"];
    $objServicio -> descripcion = $_POST["guardarDescripcion"];
    $objServicio -> idCategoria = $_POST["guardarIdCategoria"];
    $objServicio -> idTipoServicio = $_POST["guardarIdTipoServicio"];
    $objServicio ->ctrInsertarServicio();
}
