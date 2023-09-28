<?php
include_once "../modelo/establecimientoModelo.php";

class establecimiento{

    public $codigo;
    public $nombre;
    public $responsable;
    public $direccion;

    public function ctrListarEstablecimiento(){
        $objRespuesta = mdlEstablecimiento::mdlListarEstablecimiento();
        echo json_encode($objRespuesta);
    }

    public function ctrGuardarEstablecimiento(){
        $objRespuesta = mdlEstablecimiento::mdlGuardarEstablecimiento($this->codigo,$this->nombre,$this->responsable,$this->direccion);
        echo json_encode($objRespuesta);
    }
    
}


if(isset($_POST["listarEstablecimiento"]) == "ok"){
    $objEstablecimiento = new establecimiento();
    $objEstablecimiento->ctrListarEstablecimiento();
}

if(isset($_POST["guardarCodigo"], $_POST["guardarNombre"],$_POST["guardarResponsable"],$_POST["guardarDireccion"])){
    $objEstablecimiento = new establecimiento();
    $objEstablecimiento -> codigo = $_POST["guardarCodigo"];
    $objEstablecimiento -> nombre = $_POST["guardarNombre"];
    $objEstablecimiento -> responsable = $_POST["guardarResponsable"];
    $objEstablecimiento -> direccion = $_POST["guardarDireccion"];
    $objEstablecimiento->ctrGuardarEstablecimiento();
    
}


