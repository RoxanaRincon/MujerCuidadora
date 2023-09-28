<?php

include_once "../modelo/servicioModelo.php";

class servicio{

    public function ctrListarServicios(){
        $objRespuesta = mdlServicio::mdlListarServicios();
        echo json_encode($objRespuesta);
    }
}


if(isset($_POST["listarServicios"]) == "ok"){
    $objServicio = new servicio();
    $objServicio->ctrListarServicios();
}
