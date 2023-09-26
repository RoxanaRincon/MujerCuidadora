<?php


require_once('../modelo/manzanaModelo.php');

class ManzanaControlador {
    public function agregarManzana($codigo, $nombre, $localidad, $direccion, $municipioID) {
        $manzanaModel = new ManzanaModelo();
        $exito = $manzanaModel->insertarManzana($codigo, $nombre, $localidad, $direccion, $municipioID);

        if ($exito) {
            header('Content-Type: application/json');
            echo json_encode(['mensaje' => 'Manzana agregada con éxito.']);
        } else {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'No se pudo agregar la manzana.']);
        }
    }

    public function obtenerManzanas() {
        $manzanaModel = new ManzanaModelo();
        $manzanas = $manzanaModel->obtenerManzanas();
        header('Content-Type: application/json');
        echo json_encode($manzanas);
    }

    public function obtenerManzanaPorID($manzanaID) {
        $manzanaModel = new ManzanaModelo();
        $manzana = $manzanaModel->obtenerManzanaPorID($manzanaID);

        if ($manzana) {
            header('Content-Type: application/json');
            echo json_encode($manzana);
        } else {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Manzana no encontrada.']);
        }
    }

    public function actualizarManzana($manzanaID, $codigo, $nombre, $localidad, $direccion, $municipioID) {
        $manzanaModel = new ManzanaModelo();
        $exito = $manzanaModel->actualizarManzana($manzanaID, $codigo, $nombre, $localidad, $direccion, $municipioID);

        if ($exito) {
            header('Content-Type: application/json');
            echo json_encode(['mensaje' => 'Manzana actualizada con éxito.']);
        } else {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'No se pudo actualizar la manzana.']);
        }
    }

    public function eliminarManzana($manzanaID) {
        $manzanaModel = new ManzanaModelo();
        $exito = $manzanaModel->eliminarManzana($manzanaID);

        if ($exito) {
            header('Content-Type: application/json');
            echo json_encode(['mensaje' => 'Manzana eliminada con éxito.']);
        } else {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'No se pudo eliminar la manzana.']);
        }
    }
}

if (isset($_POST["agregarManzana"])) {
    $codigo = $_POST["codigo"];
    $nombre = $_POST["nombre"];
    $localidad = $_POST["localidad"];
    $direccion = $_POST["direccion"];
    $municipioID = $_POST["municipioID"];

    $manzanaControlador = new ManzanaControlador();
    $manzanaControlador->agregarManzana($codigo, $nombre, $localidad, $direccion, $municipioID);
}

if (isset($_POST["listarManzanas"]) && $_POST["listarManzanas"] === "ok") {
    $manzanaControlador = new ManzanaControlador();
    $manzanaControlador->obtenerManzanas();
}

if (isset($_POST["obtenerManzanaPorID"])) {
    $manzanaID = $_POST["obtenerManzanaPorID"];
    $manzanaControlador = new ManzanaControlador();
    $manzanaControlador->obtenerManzanaPorID($manzanaID);
}

if (isset($_POST["actualizarManzana"])) {
    $manzanaID = $_POST["manzanaID"];
    $codigo = $_POST["codigo"];
    $nombre = $_POST["nombre"];
    $localidad = $_POST["localidad"];
    $direccion = $_POST["direccion"];
    $municipioID = $_POST["municipioID"];

    $manzanaControlador = new ManzanaControlador();
    $manzanaControlador->actualizarManzana($manzanaID, $codigo, $nombre, $localidad, $direccion, $municipioID);
}

if (isset($_POST["eliminarManzana"])) {
    $manzanaID = $_POST["eliminarManzana"];
    $manzanaControlador = new ManzanaControlador();
    $manzanaControlador->eliminarManzana($manzanaID);
}

?>

