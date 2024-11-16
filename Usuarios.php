<?php
require_once 'Conexion.php';

class Usuarios {
    private $db;

    public function __construct() {
        $conexion = new Conexion();
        $this->db = $conexion->getConexion();
    }

    public function obtenerUsuarios() {
        $query = "SELECT * FROM usuarios";
        $result = $this->db->query($query);

        $usuarios = [];
        while ($row = $result->fetch_assoc()) {
            $usuarios[] = $row;
        }
        return $usuarios;
    }

    public function insertarUsuario($username, $password, $email) {
        $query = "INSERT INTO usuarios (nombre_cliente, telefono, email) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sss", $username, $password, $email);
        return $stmt->execute();
    }

    public function eliminarUsuario($id) {
        $query = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
