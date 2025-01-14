<?php

function execute(){
    header('Content-Type: application/json;');

    $url = $_SERVER['REQUEST_URI'];
    $nuevaUrl = explode("?", $url)[0];

    switch ($nuevaUrl) {
        case '/pepito.php':
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                http_response_code(200);
            }
            break;

        case '/DWES2425_AdrianOrtega/APIs/prova.php':
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                http_response_code(200);
            } else {
                http_response_code(405);
            }
            break;
    }
}


