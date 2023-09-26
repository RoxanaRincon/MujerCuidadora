<?php
class ServicioModelo {
    private $conexion;

    // Constructor para inicializar la conexión a la base de datos
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Función para crear un nuevo servicio
    public function crearServicio($codigo, $nombre, $descripcion) {
        $sql = "INSERT INTO servicios (Codigo, Nombre, Descripcion) VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("sss", $codigo, $nombre, $descripcion);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Función para obtener todos los servicios
    public function obtenerServicios() {
        $sql = "SELECT * FROM servicios";
        $result = $this->conexion->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return array();
        }
    }

    // Función para obtener un servicio por su ID
    public function obtenerServicioPorID($servicioID) {
        $sql = "SELECT * FROM servicios WHERE ServicioID = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $servicioID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    // Función para actualizar un servicio
    public function actualizarServicio($servicioID, $codigo, $nombre, $descripcion) {
        $sql = "UPDATE servicios SET Codigo = ?, Nombre = ?, Descripcion = ? WHERE ServicioID = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("sssi", $codigo, $nombre, $descripcion, $servicioID);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Función para eliminar un servicio por su ID
    public function eliminarServicio($servicioID) {
        $sql = "DELETE FROM servicios WHERE ServicioID = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $servicioID);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
