<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Producto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include "connection.php";

// Obtener las familias para el select
$sql = "SELECT cod, nombre FROM familias";
$result = $conn->query($sql);

// Insertar un nuevo producto cuando se envíe el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $nombreCorto = $_POST['nombreCorto'];
    $descripcion = $_POST['descripcion'];
    $familia = $_POST['familia'];

    $sqlInsert = "INSERT INTO productos (nombre, pvp, nombre_corto, descripcion, familia)
                  VALUES ('$nombre', '$precio', '$nombreCorto', '$descripcion', '$familia')";

    if ($conn->query($sqlInsert) === TRUE) {
        echo "Producto creado con éxito.";
    } else {
        echo "Error al crear el producto: " . $conn->error;
    }
}
?>

<form action="" method="POST">
    <h1>Crear Producto</h1>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>
    <br>
    <label for="precio">Precio:</label>
    <input type="text" name="precio" id="precio" required>
    <br>
    <label for="nombreCorto">Nombre Corto:</label>
    <input type="text" name="nombreCorto" id="nombreCorto" required>
    <br>
    <label for="descripcion">Descripcion:</label>
    <input type="text" name="descripcion" id="descripcion" required>
    <br>
    <label for="familia">Familia:</label>
    <select name="familia" id="familia" required>
        <option value="">Seleccione una familia</option>
        <?php
        // Sacamos las rows necesarias.
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['cod'] . "'>" . $row['nombre'] . "</option>";
            }
        }
        ?>
    </select>
    <br>
    <div>
    <button id="crear" type="submit">Crear</button>
    <button id="delete" type="reset">Limpiar</button>
    <a href="listado.php"><button id="detalle" type="button">Volver</button></a>
    </div>
</form>

<?php $conn->close(); ?>
</body>
</html>
