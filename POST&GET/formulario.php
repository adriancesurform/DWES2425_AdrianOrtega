<?php
// Verificar si los datos han sido enviados por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si los datos de POST están presentes
    echo "<h3>Datos POST recibidos:</h3>";
    var_dump($_POST);  // Ver qué datos están siendo enviados en $_POST

    // Si $_POST no está vacío, puedes acceder a los datos específicos
    if (!empty($_POST)) {
        // Depurar los valores específicos recibidos
        echo "<h3>Datos Específicos:</h3>";
        var_dump($_POST['nom']);   // Ver el valor de 'nom'
        var_dump($_POST['edat']);  // Ver el valor de 'edat'
        var_dump($_POST['dni']);   // Ver el valor de 'dni'
    }

    // Obtener los datos enviados
    $nom = $_POST['nom'] ?? 'No proporcionado';
    $edat = $_POST['edat'] ?? 'No proporcionado';
    $dni = $_POST['dni'] ?? 'No proporcionado';

    // Imprimir los datos
    echo "<h3>Datos procesados:</h3>";
    echo "Nombre: $nom <br>";
    echo "Edad: $edat <br>";
    echo "DNI: $dni <br>";

} else {
    // Si no se recibe ningún dato por POST
    echo "No se han recibido datos.<br>";
}
?>
