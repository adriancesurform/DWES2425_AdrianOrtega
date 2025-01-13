<?php
include 'connection.php';

// Verificar si se recibió el ID del producto
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["detalle"])) {
    $idProducto = $_GET["detalle"];

    // Consulta para obtener los detalles del producto
    $consulta = "SELECT p.id, p.nombre, p.nombre_corto, p.descripcion, p.pvp, f.nombre AS familia
                 FROM productos p
                 JOIN familias f ON p.familia = f.cod
                 WHERE p.id = ?";

    $stmt = $conn->prepare($consulta);
    $stmt->bind_param("i", $idProducto);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Verificar si se encontró el producto
    if ($resultado->num_rows > 0) {
        $producto = $resultado->fetch_assoc();
    } else {
        echo "<p>Producto no encontrado.</p>";
        exit;
    }
} else {
    echo "<p>No se ha especificado un producto.</p>";
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Producto</title>
</head>
<body>
<h1>Detalles del Producto</h1>
<table border="1" style="border-collapse: collapse; text-align: left">
    <tr>
        <th>ID</th>
        <td><?php echo $producto['id']; ?></td>
    </tr>
    <tr>
        <th>Nombre</th>
        <td><?php echo $producto['nombre']; ?></td>
    </tr>
    <tr>
        <th>Nombre Corto</th>
        <td><?php echo $producto['nombre_corto']; ?></td>
    </tr>
    <tr>
        <th>Descripción</th>
        <td><?php echo $producto['descripcion']; ?></td>
    </tr>
    <tr>
        <th>Precio</th>
        <td><?php echo $producto['pvp']; ?> €</td>
    </tr>
    <tr>
        <th>Familia</th>
        <td><?php echo $producto['familia']; ?></td>
    </tr>
</table>
<br>
<a href="listado.php"><button>Volver</button></a>
</body>
</html>
