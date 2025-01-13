<?php
include 'connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["codigo"]) && isset($_POST["nombre"])) {
        $codigo = $_POST["codigo"];
        $nombre = $_POST["nombre"];

        $insert = "INSERT INTO familias (cod, nombre) VALUES (?, ?)";
        $stmt = $conn->prepare($insert);
        $stmt->bind_param("ss", $codigo, $nombre);
        $stmt->execute();
        header("Location: listado.php");
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestión de productos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Gestión de productos</h1>

<a href="crear.php">
    <button id="crear">Crear</button>
</a><br>

<table border="1">
    <tr id="encabezada">
        <td>Detalle</td>
        <td>Codigo</td>
        <td>Nombre</td>
        <td colspan="2">Acciones</td>
    </tr>
    <?php $instruccion = "SELECT * FROM `productos`";
    $resultado = mysqli_query($conn, $instruccion);

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<form method='GET' action='detalle.php'>";
            echo "<td><button id='detalle' type='submit' name='detalle' value='" . $row['id'] . "'>Ver detalles</button></td>";
            echo "</form>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<form method='GET' action='update.php'>";
            echo "<td><button id='update' type='submit' name='update' value='" . $row['id'] . "'>Actualizar</button></td>";
            echo "</form>";
            echo "<form method='POST' action='borrar.php'>";
            echo "<td><button id='delete' type='submit' name='delete' value='" . $row['id'] . "'>Delete</button></td>";
            echo "</form>";
            echo "</tr>";
        }
    }
    ?>
</table>

<script>

</script>
</body>
</html>

