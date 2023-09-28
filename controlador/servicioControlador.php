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
        $objRespuesta = mdlServicio::mdlListarTipoServicios();
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
    $objServicio->ctrListarTipoServicios();
}

