<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
    <h1>Lista de Productos</h1>
    <?php
    require_once 'Productos.php';

    $productosRepo = new Productos();
    $productos = $productosRepo->obtenerProductos();

    if (count($productos) > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Categoría</th>
                    <th>usuario_id</th>
                </tr>";
        foreach ($productos as $producto) {
            echo "<tr>
                    <td>{$producto['id']}</td>
                    <td>{$producto['nombre']}</td>
                    <td>{$producto['descripcion']}</td>
                    <td>{$producto['precio']}</td>
                    <td>{$producto['cantidad']}</td>
                    <td>{$producto['categoria_nombre']}</td>
                    <td>{$producto['usuario_id']}</td>

                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No hay productos registrados.</p>";
    }
    ?>
</body>
</html>
