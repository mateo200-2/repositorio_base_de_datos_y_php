<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>
<body>
    <h1>Lista de Usuarios</h1>
    <?php
    require_once 'Usuarios.php';

    $usuariosRepo = new Usuarios();
    $usuarios = $usuariosRepo->obtenerUsuarios();

    if (count($usuarios) > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Nombre de Usuario</th>
                    <th>Email</th>
                    <th>telefono</th>
                </tr>";
        foreach ($usuarios as $usuario) {
            echo "<tr>
                    <td>{$usuario['id']}</td>
                    <td>{$usuario['nombre_cliente']}</td>
                    <td>{$usuario['email']}</td>
                    <td> {$usuario['telefono']} </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No hay usuarios registrados.</p>";
    }
    ?>
</body>
</html>
