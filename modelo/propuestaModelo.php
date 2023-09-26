<?php
class PropuestaModelo {
    private $conexion;

    // Constructor para inicializar la conexión a la base de datos
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Función para crear una nueva propuesta de asistencia
    public function crearPropuesta($mujerID, $manzanaID, $servicioID, $fecha, $hora) {
        $sql = "INSERT INTO propuestasasistencia (MujerID, ManzanaID, ServicioID, Fecha, Hora) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("iiiss", $mujerID, $manzanaID, $servicioID, $fecha, $hora);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Función para obtener todas las propuestas de asistencia
    public function obtenerPropuestas() {
        $sql = "SELECT * FROM propuestasasistencia";
        $result = $this->conexion->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return array();
        }
    }

    // Función para obtener una propuesta de asistencia por su ID
    public function obtenerPropuestaPorID($propuestaID) {
        $sql = "SELECT * FROM propuestasasistencia WHERE PropuestaID = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $propuestaID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    // Función para actualizar una propuesta de asistencia
    public function actualizarPropuesta($propuestaID, $mujerID, $manzanaID, $servicioID, $fecha, $hora) {
        $sql = "UPDATE propuestasasistencia SET MujerID = ?, ManzanaID = ?, ServicioID = ?, Fecha = ?, Hora = ? WHERE PropuestaID = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("iiissi", $mujerID, $manzanaID, $servicioID, $fecha, $hora, $propuestaID);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Función para eliminar una propuesta de asistencia por su ID
    public function eliminarPropuesta($propuestaID) {
        $sql = "DELETE FROM propuestasasistencia WHERE PropuestaID = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $propuestaID);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
