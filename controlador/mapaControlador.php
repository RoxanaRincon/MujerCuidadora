<?php

include_once "../modelo/mapaModelo.php";

class mapa{

    public function ctrListarMapa(){
        $objRespuesta = mdlMapa::mdlListarMapa();
        echo json_encode($objRespuesta);
    }
}

if(isset($_POST["listarManzanas"]) == "ok"){
    $objMapa = new mapa();
    $objMapa->ctrListarMapa();
}