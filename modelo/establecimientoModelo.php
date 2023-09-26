<?php
class EstablecimientoModelo {
    private $conexion;

    // Constructor para inicializar la conexión a la base de datos
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Función para crear un nuevo establecimiento
    public function crearEstablecimiento($codigo, $nombre, $responsable, $direccion, $servicioID) {
        $sql = "INSERT INTO establecimientos (Codigo, Nombre, Responsable, Direccion, ServicioID) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("ssssi", $codigo, $nombre, $responsable, $direccion, $servicioID);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Función para obtener todos los establecimientos
    public function obtenerEstablecimientos() {
        $sql = "SELECT * FROM establecimientos";
        $result = $this->conexion->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return array();
        }
    }

    // Función para obtener un establecimiento por su ID
    public function obtenerEstablecimientoPorID($establecimientoID) {
        $sql = "SELECT * FROM establecimientos WHERE EstablecimientoID = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $establecimientoID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    // Función para actualizar un establecimiento
    public function actualizarEstablecimiento($establecimientoID, $codigo, $nombre, $responsable, $direccion, $servicioID) {
        $sql = "UPDATE establecimientos SET Codigo = ?, Nombre = ?, Responsable = ?, Direccion = ?, ServicioID = ? WHERE EstablecimientoID = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("ssssii", $codigo, $nombre, $responsable, $direccion, $servicioID, $establecimientoID);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Función para eliminar un establecimiento por su ID
    public function eliminarEstablecimiento($establecimientoID) {
        $sql = "DELETE FROM establecimientos WHERE EstablecimientoID = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $establecimientoID);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
