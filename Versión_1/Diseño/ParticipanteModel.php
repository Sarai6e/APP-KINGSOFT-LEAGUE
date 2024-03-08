<?php
class ParticipanteModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Obtener todos los participantes
    public function getAllParticipantes() {
        $query = "SELECT * FROM participantes";
        $result = $this->db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    // Eliminar un participante por ID
    public function deleteParticipante($id) {
        $query = "DELETE FROM participantes WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute(['id' => $id]);
    }

    // Obtener un participante por ID
    public function getParticipanteById($id) {
        $query = "SELECT * FROM participantes WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar un participante
    public function updateParticipante($id, $nombre, $apellidos, $dni, $genero, $fecha_nacimiento, $correo, $anio_estudio, $especialidad, $clave, $fecha_actualizacion, $grado_estudio, $id_club_robotica, $nombre_institucion_id) {
        $query = "UPDATE participantes SET nombre = :nombre, apellidos = :apellidos, dni = :dni, genero = :genero, fecha_nacimiento = :fecha_nacimiento, correo = :correo, anio_estudio = :anio_estudio, especialidad = :especialidad, clave = :clave, fecha_actualizacion = :fecha_actualizacion, grado_estudio = :grado_estudio, id_club_robotica = :id_club_robotica, nombre_institucion_id = :nombre_institucion_id WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            'id' => $id,
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'dni' => $dni,
            'genero' => $genero,
            'fecha_nacimiento' => $fecha_nacimiento,
            'correo' => $correo,
            'anio_estudio' => $anio_estudio,
            'especialidad' => $especialidad,
            'clave' => $clave,
            'fecha_actualizacion' => $fecha_actualizacion,
            'grado_estudio' => $grado_estudio,
            'id_club_robotica' => $id_club_robotica,
            'nombre_institucion_id' => $nombre_institucion_id
        ]);
    }
}
?>
