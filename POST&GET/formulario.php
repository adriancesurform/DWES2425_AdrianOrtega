<?php
// Comprobar si se han recibido datos via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos enviados desde el formulario
    $nom = $_POST['nom'];
    $edat = $_POST['edat'];
    $dni = $_POST['dni'];

    // Procesar los datos, por ejemplo, mostrar los valores
    echo "Nombre: " . htmlspecialchars($nom) . "<br>";
    echo "Edad: " . htmlspecialchars($edat) . "<br>";
    echo "DNI: " . htmlspecialchars($dni) . "<br>";
}
?>

