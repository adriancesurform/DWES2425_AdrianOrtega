<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    json_decode(dadesJSON);
} else {
    echo 'Sin datos';
}