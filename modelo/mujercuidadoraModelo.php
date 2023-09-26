<?php
class MujerCuidadoraModelo {
    private $conexion;

    // Constructor para inicializar la conexión a la base de datos
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Función para crear una nueva mujer cuidadora
    public function crearMujerCuidadora($tipoDocumento, $documento, $nombres, $apellidos, $telefono, $correoElectronico, $ciudad, $direccion, $ocupacion, $serviciosPreferidos) {
        $sql = "INSERT INTO mujerescuidadoras (TipoDocumento, Documento, Nombres, Apellidos, Telefono, CorreoElectronico, Ciudad, Direccion, Ocupacion, ServiciosPreferidos) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("ssssssssss", $tipoDocumento, $documento, $nombres, $apellidos, $telefono, $correoElectronico, $ciudad, $direccion, $ocupacion, $serviciosPreferidos);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Función para obtener todas las mujeres cuidadoras
    public function obtenerMujeresCuidadoras() {
        $sql = "SELECT * FROM mujerescuidadoras";
        $result = $this->conexion->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return array();
        }
    }

    // Función para obtener una mujer cuidadora por su ID
    public function obtenerMujerCuidadoraPorID($mujerID) {
        $sql = "SELECT * FROM mujerescuidadoras WHERE MujerID = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $mujerID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    // Función para actualizar una mujer cuidadora
    public function actualizarMujerCuidadora($mujerID, $tipoDocumento, $documento, $nombres, $apellidos, $telefono, $correoElectronico, $ciudad, $direccion, $ocupacion, $serviciosPreferidos) {
        $sql = "UPDATE mujerescuidadoras SET TipoDocumento = ?, Documento = ?, Nombres = ?, Apellidos = ?, Telefono = ?, CorreoElectronico = ?, Ciudad = ?, Direccion = ?, Ocupacion = ?, ServiciosPreferidos = ? WHERE MujerID = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("ssssssssssi", $tipoDocumento, $documento, $nombres, $apellidos, $telefono, $correoElectronico, $ciudad, $direccion, $ocupacion, $serviciosPreferidos, $mujerID);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Función para eliminar una mujer cuidadora por su ID
    public function eliminarMujerCuidadora($mujerID) {
        $sql = "DELETE FROM mujerescuidadoras WHERE MujerID = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $mujerID);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
