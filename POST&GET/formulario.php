<?php
// Datos a enviar
$data = [
    'nom' => $_POST['nom'] ?? 'No proporcionado',
    'edat' => $_POST['edat'] ?? 'No proporcionado',
    'dni' => $_POST['dni'] ?? 'No proporcionado'
];

// URL de destino
$url = 'http://aortega.infinityfreeapp.com/POST&GET/formulario.php';

// Crear el contexto de POST
$options = [
    'http' => [
        'method'  => 'POST',
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'content' => http_build_query($data),
    ]
];

$context  = stream_context_create($options);

// Enviar la solicitud POST
$response = file_get_contents($url, false, $context);

// Mostrar la respuesta
echo $response;
?>
