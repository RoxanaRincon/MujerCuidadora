<?php


require_once('../model/propuestaModelo.php');

class PropuestaControlador {
    public function agregarPropuesta($mujerID, $manzanaID, $servicioID, $fecha, $hora) {
        $propuestaModel = new PropuestaModelo();
        $exito = $propuestaModel->insertarPropuesta($mujerID, $manzanaID, $servicioID, $fecha, $hora);

        if ($exito) {
            header('Content-Type: application/json');
            echo json_encode(['mensaje' => 'Propuesta agregada con éxito.']);
        } else {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'No se pudo agregar la propuesta.']);
        }
    }

    public function obtenerPropuestas() {
        $propuestaModel = new PropuestaModelo();
        $propuestas = $propuestaModel->obtenerPropuestas();
        header('Content-Type: application/json');
        echo json_encode($propuestas);
    }

    public function obtenerPropuestaPorID($propuestaID) {
        $propuestaModel = new PropuestaModelo();
        $propuesta = $propuestaModel->obtenerPropuestaPorID($propuestaID);

        if ($propuesta) {
            header('Content-Type: application/json');
            echo json_encode($propuesta);
        } else {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Propuesta no encontrada.']);
        }
    }

    public function actualizarPropuesta($propuestaID, $mujerID, $manzanaID, $servicioID, $fecha, $hora) {
        $propuestaModel = new PropuestaModelo();
        $exito = $propuestaModel->actualizarPropuesta($propuestaID, $mujerID, $manzanaID, $servicioID, $fecha, $hora);

        if ($exito) {
            header('Content-Type: application/json');
            echo json_encode(['mensaje' => 'Propuesta actualizada con éxito.']);
        } else {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'No se pudo actualizar la propuesta.']);
        }
    }

    public function eliminarPropuesta($propuestaID) {
        $propuestaModel = new PropuestaModelo();
        $exito = $propuestaModel->eliminarPropuesta($propuestaID);

        if ($exito) {
            header('Content-Type: application/json');
            echo json_encode(['mensaje' => 'Propuesta eliminada con éxito.']);
        } else {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'No se pudo eliminar la propuesta.']);
        }
    }
}

if (isset($_POST["agregarPropuesta"])) {
    $mujerID = $_POST["mujerID"];
    $manzanaID = $_POST["manzanaID"];
    $servicioID = $_POST["servicioID"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];

    $propuestaControlador = new PropuestaControlador();
    $propuestaControlador->agregarPropuesta($mujerID, $manzanaID, $servicioID, $fecha, $hora);
}

if (isset($_POST["listarPropuestas"]) && $_POST["listarPropuestas"] === "ok") {
    $propuestaControlador = new PropuestaControlador();
    $propuestaControlador->obtenerPropuestas();
}

if (isset($_POST["obtenerPropuestaPorID"])) {
    $propuestaID = $_POST["obtenerPropuestaPorID"];
    $propuestaControlador = new PropuestaControlador();
    $propuestaControlador->obtenerPropuestaPorID($propuestaID);
}

if (isset($_POST["actualizarPropuesta"])) {
    $propuestaID = $_POST["propuestaID"];
    $mujerID = $_POST["mujerID"];
    $manzanaID = $_POST["manzanaID"];
    $servicioID = $_POST["servicioID"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];

    $propuestaControlador = new PropuestaControlador();
    $propuestaControlador->actualizarPropuesta($propuestaID, $mujerID, $manzanaID, $servicioID, $fecha, $hora);
}

if (isset($_POST["eliminarPropuesta"])) {
    $propuestaID = $_POST["eliminarPropuesta"];
    $propuestaControlador = new PropuestaControlador();
    $propuestaControlador->eliminarPropuesta($propuestaID);
}

?>
