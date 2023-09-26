<?php

require_once('conexion.php');

class MunicipiosModelo {
    private $conexion; // Variable para almacenar la conexión

    public function __construct() {
        // En el constructor, crea una instancia de la clase Conexion
        $this->conexion = Conexion::conectar();
    }

    // Función insertar nuevo municipio en BD
    public function insertarMunicipio($nombre, $localidad, $direccion) {
        // Consulta SQL para insertar un nuevo municipio!!
        $consulta = "INSERT INTO municipios (Nombre, Localidad, Direccion) VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bind_param("sss", $nombre, $localidad, $direccion);
        if ($stmt->execute()) {
            return true; 
        } else {
            return false; 
        }
    }

    public function obtenerMunicipios() {

        $consulta = "SELECT * FROM municipios";
        $resultados = $this->conexion->query($consulta);
        if ($resultados->num_rows > 0) {
            $municipios = array();
            while ($fila = $resultados->fetch_assoc()) {
                $municipios[] = $fila;
            }
            return $municipios;
        } else {
            return array(); 
        }
    }
    
}
?>
