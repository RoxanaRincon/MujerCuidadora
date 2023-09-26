<?php
class ManzanaModelo {
    private $conexion;

    // Constructor para inicializar la conexión a la base de datos
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Función para crear una nueva manzana
    public function crearManzana($codigo, $nombre, $localidad, $direccion, $municipioID) {
        $sql = "INSERT INTO manzanascuidado (Codigo, Nombre, Localidad, Direccion, MunicipioID) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("ssssi", $codigo, $nombre, $localidad, $direccion, $municipioID);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Función para obtener todas las manzanas
    public function obtenerManzanas() {
        $sql = "SELECT * FROM manzanascuidado";
        $result = $this->conexion->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return array();
        }
    }

    // Función para obtener una manzana por su ID
    public function obtenerManzanaPorID($manzanaID) {
        $sql = "SELECT * FROM manzanascuidado WHERE ManzanaID = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $manzanaID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    // Función para actualizar una manzana
    public function actualizarManzana($manzanaID, $codigo, $nombre, $localidad, $direccion, $municipioID) {
        $sql = "UPDATE manzanascuidado SET Codigo = ?, Nombre = ?, Localidad = ?, Direccion = ?, MunicipioID = ? WHERE ManzanaID = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("ssssii", $codigo, $nombre, $localidad, $direccion, $municipioID, $manzanaID);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Función para eliminar una manzana por su ID
    public function eliminarManzana($manzanaID) {
        $sql = "DELETE FROM manzanascuidado WHERE ManzanaID = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $manzanaID);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
