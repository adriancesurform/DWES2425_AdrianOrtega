<?php

header('Access-Control-Allow-Methods: GET, POST, OPTIONS'); // Métodos permitidos
header('Content-Type: application/json;');

$prueba = $_SERVER['REQUEST_METHOD'];

switch ($prueba) {
    case 'GET':
        http_response_code(200);
        echo "El método usado es GET";
        break;
    case 'POST':
        http_response_code(405);
        break;
    default:
        http_response_code(405);
        echo "Error";
        break;
}
