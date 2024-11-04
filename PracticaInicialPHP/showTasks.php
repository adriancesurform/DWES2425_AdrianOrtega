<?php
global $conn;
include 'dbConnect.php';

// Consulta per obtenir totes les tasques
$sql = "SELECT task, status FROM tasks";
$result = $conn->query($sql);

// Comprovar si hi ha resultats
if ($result->num_rows > 0) {
    echo "<tbody>";
    // Mostrar cada tasca en una fila de la taula
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["task"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["status"]) . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
} else {
    echo "<tr><td colspan='2'>No hi ha tasques.</td></tr>";
}
?>
