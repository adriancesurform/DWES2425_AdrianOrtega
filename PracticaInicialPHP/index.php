<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>To-Do List</h1>

<!-- Mostrar mensajes de éxito o error -->
<?php
session_start();
if (isset($_SESSION['message'])) {
    echo "<p>" . $_SESSION['message'] . "</p>";
    unset($_SESSION['message']); // Limpiar el mensaje después de mostrarlo
}
?>

<!-- Formulario para agregar nuevas tareas -->
<form action="addTasks.php" method="POST">
    <label for="task">Nova tasca:</label>
    <input type="text" id="task" name="task" required>
    <button type="submit">Afegir Tasca</button>
</form>

<!-- Tabla para mostrar la lista de tareas -->
<h2>Llista de Tasques</h2>
<table>
    <thead>
    <tr>
        <th>Tasca</th>
        <th>Estat</th>
    </tr>
    </thead>
    <tbody>
    <?php include 'showTasks.php'; ?>
    </tbody>
</table>

</body>
</html>
