<?php


require_once('../modelo/establecimientoModelo.php');

class EstablecimientoControlador {
    public function agregarEstablecimiento($codigo, $nombre, $responsable, $direccion, $servicioID) {
        $establecimientoModel = new EstablecimientoModelo();
        $exito = $establecimientoModel->insertarEstablecimiento($codigo, $nombre, $responsable, $direccion, $servicioID);

        if ($exito) {
            header('Content-Type: application/json');
            echo json_encode(['mensaje' => 'Establecimiento agregado con éxito.']);
        } else {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'No se pudo agregar el establecimiento.']);
        }
    }

    public function obtenerEstablecimientos() {
        $establecimientoModel = new EstablecimientoModelo();
        $establecimientos = $establecimientoModel->obtenerEstablecimientos();
        header('Content-Type: application/json');
        echo json_encode($establecimientos);
    }

    public function obtenerEstablecimientoPorID($establecimientoID) {
        $establecimientoModel = new EstablecimientoModelo();
        $establecimiento = $establecimientoModel->obtenerEstablecimientoPorID($establecimientoID);

        if ($establecimiento) {
            header('Content-Type: application/json');
            echo json_encode($establecimiento);
        } else {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Establecimiento no encontrado.']);
        }
    }

    public function actualizarEstablecimiento($establecimientoID, $codigo, $nombre, $responsable, $direccion, $servicioID) {
        $establecimientoModel = new EstablecimientoModelo();
        $exito = $establecimientoModel->actualizarEstablecimiento($establecimientoID, $codigo, $nombre, $responsable, $direccion, $servicioID);

        if ($exito) {
            header('Content-Type: application/json');
            echo json_encode(['mensaje' => 'Establecimiento actualizado con éxito.']);
        } else {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'No se pudo actualizar el establecimiento.']);
        }
    }

    public function eliminarEstablecimiento($establecimientoID) {
        $establecimientoModel = new EstablecimientoModelo();
        $exito = $establecimientoModel->eliminarEstablecimiento($establecimientoID);

        if ($exito) {
            header('Content-Type: application/json');
            echo json_encode(['mensaje' => 'Establecimiento eliminado con éxito.']);
        } else {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'No se pudo eliminar el establecimiento.']);
        }
    }
}

if (isset($_POST["agregarEstablecimiento"])) {
    $codigo = $_POST["codigo"];
    $nombre = $_POST["nombre"];
    $responsable = $_POST["responsable"];
    $direccion = $_POST["direccion"];
    $servicioID = $_POST["servicioID"];

    $establecimientoControlador = new EstablecimientoControlador();
    $establecimientoControlador->agregarEstablecimiento($codigo, $nombre, $responsable, $direccion, $servicioID);
}

if (isset($_POST["listarEstablecimientos"]) && $_POST["listarEstablecimientos"] === "ok") {
    $establecimientoControlador = new EstablecimientoControlador();
    $establecimientoControlador->obtenerEstablecimientos();
}

if (isset($_POST["obtenerEstablecimientoPorID"])) {
    $establecimientoID = $_POST["obtenerEstablecimientoPorID"];
    $establecimientoControlador = new EstablecimientoControlador();
    $establecimientoControlador->obtenerEstablecimientoPorID($establecimientoID);
}

if (isset($_POST["actualizarEstablecimiento"])) {
    $establecimientoID = $_POST["establecimientoID"];
    $codigo = $_POST["codigo"];
    $nombre = $_POST["nombre"];
    $responsable = $_POST["responsable"];
    $direccion = $_POST["direccion"];
    $servicioID = $_POST["servicioID"];

    $establecimientoControlador = new EstablecimientoControlador();
    $establecimientoControlador->actualizarEstablecimiento($establecimientoID, $codigo, $nombre, $responsable, $direccion, $servicioID);
}

if (isset($_POST["eliminarEstablecimiento"])) {
    $establecimientoID = $_POST["eliminarEstablecimiento"];
    $establecimientoControlador = new EstablecimientoControlador();
    $establecimientoControlador->eliminarEstablecimiento($establecimientoID);
}

?>
