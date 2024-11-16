<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
</head>
<body>
    <h1>Lista de Categorías</h1>
    <?php
    require_once 'categorias.php';

    $categoriasRepo = new Categorias();
    $categorias = $categoriasRepo->obtenerCategorias();

    if (count($categorias) > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                </tr>";
        foreach ($categorias as $categoria) {
            echo "<tr>
                    <td>{$categoria['id']}</td>
                    <td>{$categoria['nombre']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No hay categorías registradas.</p>";
    }
    ?>
</body>
</html>
