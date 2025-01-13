<?php
include 'connection.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Verificar si se recibió el ID del producto
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["update"])) {
    $idProducto = $_GET["update"];

    // Validar que el ID sea un número entero
    if (!filter_var($idProducto, FILTER_VALIDATE_INT)) {
        echo "<p>ID inválido.</p>";
        exit;
    }

    // Consulta para obtener los datos del producto
    $consultaProducto = "SELECT * FROM productos WHERE id = ?";
    $stmtProducto = $conn->prepare($consultaProducto);
    $stmtProducto->bind_param("i", $idProducto);
    $stmtProducto->execute();
    $resultadoProducto = $stmtProducto->get_result();

    if ($resultadoProducto->num_rows > 0) {
        $producto = $resultadoProducto->fetch_assoc();
    } else {
        echo "<p>Producto no encontrado.</p>";
        exit;
    }

    // Consulta para obtener las familias
    $consultaFamilias = "SELECT cod, nombre FROM familias";
    $resultadoFamilias = $conn->query($consultaFamilias);
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar la actualización del producto
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $nombreCorto = $_POST["nombreCorto"];
    $descripcion = $_POST["descripcion"];
    $familia = $_POST["familia"];

    // Validar los datos enviados
    if (empty($nombre) || !is_numeric($precio) || empty($nombreCorto) || empty($descripcion) || empty($familia)) {
        echo "<p>Todos los campos son obligatorios y el precio debe ser un número.</p>";
        exit;
    }

    $consultaUpdate = "UPDATE productos SET nombre = ?, pvp = ?, nombre_corto = ?, descripcion = ?, familia = ? WHERE id = ?";
    $stmtUpdate = $conn->prepare($consultaUpdate);
    $stmtUpdate->bind_param("sdsssi", $nombre, $precio, $nombreCorto, $descripcion, $familia, $id);

    if ($stmtUpdate->execute()) {
        header("Location: listado.php");
        exit;
    } else {
        echo "<p>Error al actualizar el producto: " . $stmtUpdate->error . "</p>";
    }
} else {
    echo "<p>No se ha especificado un producto para actualizar.</p>";
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Producto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Actualizar Producto</h1>
<form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value="<?php echo htmlspecialchars($producto['nombre']); ?>" required>
    <br>
    <label for="precio">Precio:</label>
    <input type="text" name="precio" id="precio" value="<?php echo htmlspecialchars($producto['pvp']); ?>" required>
    <br>
    <label for="nombreCorto">Nombre Corto:</label>
    <input type="text" name="nombreCorto" id="nombreCorto" value="<?php echo htmlspecialchars($producto['nombre_corto']); ?>" required>
    <br>
    <label for="descripcion">Descripción:</label>
    <input type="text" name="descripcion" id="descripcion" value="<?php echo htmlspecialchars($producto['descripcion']); ?>" required>
    <br>
    <label for="familia">Familia:</label>
    <select name="familia" id="familia" required>
        <?php
        if ($resultadoFamilias->num_rows > 0) {
            while ($familia = $resultadoFamilias->fetch_assoc()) {
                $selected = $producto['familia'] === $familia['cod'] ? "selected" : "";
                echo "<option value='" . htmlspecialchars($familia['cod']) . "' $selected>" . htmlspecialchars($familia['nombre']) . "</option>";
            }
        }
        ?>
    </select>
    <br>
    <button id="crear" type="submit">Guardar Cambios</button>
    <button><a id="detalle" href="listado.php">Cancelar</a></button>
</form>
</body>
</html>
