<?php
require_once 'Conexion.php';

class Categorias {
    private $db;

    public function __construct() {
        $conexion = new Conexion();
        $this->db = $conexion->getConexion();
    }

    public function obtenerCategorias() {
        $query = "SELECT * FROM categorias";
        $result = $this->db->query($query);

        $categorias = [];
        while ($row = $result->fetch_assoc()) {
            $categorias[] = $row;
        }
        return $categorias;
    }

    public function insertarCategoria($nombre) {
        $query = "INSERT INTO categorias (nombre) VALUES (?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $nombre);
        return $stmt->execute();
    }

    public function eliminarCategoria($id) {
        $query = "DELETE FROM categorias WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
