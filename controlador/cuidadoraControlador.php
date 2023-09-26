<?php

require_once('../modelo/mujercuidadoraModelo.php');

class CuidadoraControlador {
    private $cuidadorasModel;

    public function __construct() {
        $this->cuidadorasModel = new MujeresCuidadorasModelo();
    }

    public function agregarCuidadora($tipoDocumento, $documento, $nombres, $apellidos, $telefono, $correo, $ciudad, $direccion, $ocupacion, $serviciosPreferidos) {
        $exito = $this->cuidadorasModel->insertarCuidadora($tipoDocumento, $documento, $nombres, $apellidos, $telefono, $correo, $ciudad, $direccion, $ocupacion, $serviciosPreferidos);

        if ($exito) {
            header('Content-Type: application/json');
            echo json_encode(['mensaje' => 'Cuidadora agregada con éxito.']);
        } else {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'No se pudo agregar la cuidadora.']);
        }
    }

    public function listarCuidadoras() {
        $cuidadoras = $this->cuidadorasModel->obtenerCuidadoras();
        header('Content-Type: application/json');
        echo json_encode($cuidadoras);
    }

    public function obtenerCuidadoraPorID($id) {
        $cuidadora = $this->cuidadorasModel->obtenerCuidadoraPorID($id);
        header('Content-Type: application/json');
        echo json_encode($cuidadora);
    }

    public function actualizarCuidadora($id, $tipoDocumento, $documento, $nombres, $apellidos, $telefono, $correo, $ciudad, $direccion, $ocupacion, $serviciosPreferidos) {
        $exito = $this->cuidadorasModel->actualizarCuidadora($id, $tipoDocumento, $documento, $nombres, $apellidos, $telefono, $correo, $ciudad, $direccion, $ocupacion, $serviciosPreferidos);

        if ($exito) {
            header('Content-Type: application/json');
            echo json_encode(['mensaje' => 'Cuidadora actualizada con éxito.']);
        } else {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'No se pudo actualizar la cuidadora.']);
        }
    }

    public function eliminarCuidadora($id) {
        $exito = $this->cuidadorasModel->eliminarCuidadora($id);

        if ($exito) {
            header('Content-Type: application/json');
            echo json_encode(['mensaje' => 'Cuidadora eliminada con éxito.']);
        } else {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'No se pudo eliminar la cuidadora.']);
        }
    }
}

if (isset($_POST["agregarCuidadora"])) {
    $tipoDocumento = $_POST["tipoDocumento"];
    $documento = $_POST["documento"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $ciudad = $_POST["ciudad"];
    $direccion = $_POST["direccion"];
    $ocupacion = $_POST["ocupacion"];
    $serviciosPreferidos = $_POST["serviciosPreferidos"];

    $cuidadoraControlador = new CuidadoraControlador();
    $cuidadoraControlador->agregarCuidadora($tipoDocumento, $documento, $nombres, $apellidos, $telefono, $correo, $ciudad, $direccion, $ocupacion, $serviciosPreferidos);
}

if (isset($_POST["listarCuidadoras"]) && $_POST["listarCuidadoras"] === "ok") {
    $cuidadoraControlador = new CuidadoraControlador();
    $cuidadoraControlador->listarCuidadoras();
}

if (isset($_POST["obtenerCuidadoraPorID"])) {
    $id = $_POST["id"];
    $cuidadoraControlador = new CuidadoraControlador();
    $cuidadoraControlador->obtenerCuidadoraPorID($id);
}

if (isset($_POST["actualizarCuidadora"])) {
    $id = $_POST["id"];
    $tipoDocumento = $_POST["tipoDocumento"];
    $documento = $_POST["documento"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $ciudad = $_POST["ciudad"];
    $direccion = $_POST["direccion"];
    $ocupacion = $_POST["ocupacion"];
    $serviciosPreferidos = $_POST["serviciosPreferidos"];

    $cuidadoraControlador = new CuidadoraControlador();
    $cuidadoraControlador->actualizarCuidadora($id, $tipoDocumento, $documento, $nombres, $apellidos, $telefono, $correo, $ciudad, $direccion, $ocupacion, $serviciosPreferidos);
}

if (isset($_POST["eliminarCuidadora"])) {
    $id = $_POST["id"];
    $cuidadoraControlador = new CuidadoraControlador();
    $cuidadoraControlador->eliminarCuidadora($id);
}


?>