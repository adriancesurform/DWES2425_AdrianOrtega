<?php
global $conn;
include 'dbConnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task = $_POST['task'];

    // Inserir la tasca a la base de dades
    $sql = "INSERT INTO tasks (task, status) VALUES (?, 'pending')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $task);

    if ($stmt->execute()) {
        echo "Tasca afegida amb èxit!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    // Redirigir a la pàgina principal
    header("Location: index.html");
    exit();
}
?>
