<?php
session_start(); // Inicia la sesión al comienzo del script
global $conn;
include 'dbConnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task = $_POST['task'];

    // Inserir la tasca a la base de dades
    $sql = "INSERT INTO tasks (task, status) VALUES (?, 'pending')";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        // Si hay un error al preparar la consulta
        $_SESSION['message'] = "Error al preparar la consulta: " . $conn->error;
        header("Location: index.php");
        exit();
    }

    $stmt->bind_param("s", $task);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Tasca afegida amb èxit!";
    } else {
        $_SESSION['message'] = "Error al insertar la tasca: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    // Redirigir a la pàgina principal
    header("Location: index.php");
    exit();
}
?>
