<?php
session_start(); // Asegúrate de que la sesión esté iniciada
?>

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

<!-- Mostrar mensaje de sesión si existe -->
<?php if (isset($_SESSION['message'])): ?>
    <div class="message">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']); // Limpiar el mensaje después de mostrarlo
        ?>
    </div>
<?php endif; ?>

<!-- Formulari per afegir noves tasques -->
<form action="addTasks.php" method="POST">
    <label for="task">Nova tasca:</label>
    <input type="text" id="task" name="task" required>
    <button type="submit">Afegir Tasca</button>
</form>

<!-- Taula per mostrar la llista de tasques -->
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
