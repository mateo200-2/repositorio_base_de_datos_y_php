<?php
require_once 'Conexion.php';

class Productos {
    private $db;

    public function __construct() {
        $conexion = new Conexion();
        $this->db = $conexion->getConexion();
    }

    public function obtenerProductos() {
        $query = "SELECT p.*, c.nombre AS categoria_nombre 
                  FROM productos p 
                  LEFT JOIN categorias c ON p.categoria_id = c.id";
        $result = $this->db->query($query);

        $productos = [];
        while ($row = $result->fetch_assoc()) {
            $productos[] = $row;
        }
        return $productos;
    }

    public function insertarProducto($nombre, $descripcion, $precio, $cantidad, $categoria_id, $imagen) {
        $query = "INSERT INTO productos (nombre, descripcion, precio, cantidad, categoria_id, usuario_id) 
                  VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssdiis", $nombre, $descripcion, $precio, $cantidad, $categoria_id, $imagen);
        return $stmt->execute();
    }

    public function eliminarProducto($id) {
        $query = "DELETE FROM productos WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
