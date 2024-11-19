<?php
// Verificar si la solicitud es POST y si se han recibido datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtener los datos JSON enviados
    $json_data = file_get_contents('php://input'); // Leer el cuerpo de la solicitud
    $data = json_decode($json_data, true); // Decodificar el JSON a un array asociativo

    // Verificamos si los datos fueron correctamente decodificados
    if ($data) {
        // Extraemos las variables
        $nom = $data['nom'] ?? 'No proporcionado';
        $edat = $data['edat'] ?? 'No proporcionado';
        $dni = $data['dni'] ?? 'No proporcionado';

        // Imprimir los datos procesados
        echo "Nombre: $nom <br>";
        echo "Edad: $edat <br>";
        echo "DNI: $dni <br>";
    } else {
        echo "Error al decodificar los datos JSON.";
    }

} else {
    echo "No se ha recibido ninguna solicitud POST.";
}
?>
