<?php
include_once "../modelo/establecimientoModelo.php";

class establecimiento{

    public function ctrListarEstablecimiento(){
        $objRespuesta = mdlEstablecimiento::mdlListarEstablecimiento();
        echo json_encode($objRespuesta);
    }
}


if(isset($_POST["listarEstablecimiento"]) == "ok"){
    $objEstablecimiento = new establecimiento();
    $objEstablecimiento->ctrListarEstablecimiento();
}


