<?php

require_once('../model/municipiosModelo.php');

class MunicipiosController {
    private $municipiosModel;

    public function __construct() {
        $this->municipiosModel = new MunicipiosModelo();
    }

    public function agregarMunicipio($nombre, $localidad, $direccion) {
        $exito = $this->municipiosModel->insertarMunicipio($nombre, $localidad, $direccion);

        if ($exito) {
            header('Content-Type: application/json');
            echo json_encode(['mensaje' => 'Municipio agregado con éxito.']);
        } else {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'No se pudo agregar el municipio.']);
        }
    }

    public function listarMunicipios() {
        // Llama al método del modelo para obtener la lista de municipios
        $municipios = $this->municipiosModel->obtenerMunicipios();
    
        // Devuelve la lista de municipios en formato JSON
        header('Content-Type: application/json');
        echo json_encode($municipios);
    }

    // Otras funciones del controlador pueden agregarse aquí

}

if (isset($_POST["agregarMunicipio"])) {
    $nombre = $_POST["nombre"];
    $localidad = $_POST["localidad"];
    $direccion = $_POST["direccion"];

    $municipiosController = new MunicipiosController();
    $municipiosController->agregarMunicipio($nombre, $localidad, $direccion);
}

if (isset($_POST["listarMunicipios"]) && $_POST["listarMunicipios"] === "ok") {
    $municipiosController = new MunicipiosController();
    $municipiosController->listarMunicipios();
}

?>
