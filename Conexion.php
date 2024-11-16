<?php
class Conexion {
    private $host = "localhost";
    private $user = "root"; // Cambiar si tienes otro usuario configurado
    private $password = ""; // Cambiar si tienes contraseña configurada
    private $database = "productos_negocio"; // Cambia por el nombre de tu base de datos
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }

    public function getConexion() {
        return $this->conn;
    }

    public function cerrarConexion() {
        $this->conn->close();
    }
}
?>
