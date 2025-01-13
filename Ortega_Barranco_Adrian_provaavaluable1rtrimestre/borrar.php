<?php
include "connection.php";

// Verificar si se envia el código del registro a eliminar
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    // Obtener el código del registro a eliminar
    $codigoEliminar = $_POST["delete"];

    // Preparar la consulta SQL para eliminar el registro
    $delete = "DELETE FROM productos WHERE id = ?";
    $stmt = $conn->prepare($delete);
    $stmt->bind_param("s", $codigoEliminar);

    // Ejecutar la consulta y verificar si se eliminó correctamente
    if ($stmt->execute()) {
        echo "Producto eliminado correctamente.";
    } else {
        echo "Error al eliminar el producto: " . $stmt->error;
    }

    // Cerrar el statement
    $stmt->close();

    // Redirigir de vuelta a la página de mostrar
    header("Location: listado.php");
    exit();
} else {
    echo "No se proporcionó un código válido para eliminar.";
}

