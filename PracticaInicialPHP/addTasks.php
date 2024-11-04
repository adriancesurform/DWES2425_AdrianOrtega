<?php
session_start(); // Inicia la sesión al comienzo del script
error_reporting(E_ALL); // Muestra todos los errores
ini_set('display_errors', 1); // Asegúrate de que los errores se muestren en la pantalla
global $conn;
include 'dbConnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task = $_POST['task'];
    echo "Tarea recibida: " . htmlspecialchars($task) . "<br>"; // Mostrar tarea recibida

    // Inserir la tasca a la base de dades
    $sql = "INSERT INTO tasks (task, status) VALUES (?, 'pending')";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
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

    echo "Consulta ejecutada correctamente. Redirigiendo...<br>"; // Mensaje de depuración

    // Redirigir a la pàgina principal
    header("Location: index.php");
    exit();
}
