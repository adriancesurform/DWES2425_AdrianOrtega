<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump(json_decode(dadesJSON));
} else {
    echo 'Sin datos';
}