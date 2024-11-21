<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dades = json_decode($_POST['dades'], true);

    echo "Nom: " . htmlspecialchars($dades['nom']);
    echo "<br>Edat: " . htmlspecialchars($dades['edat']);
    echo "<br>DNI: " . htmlspecialchars($dades['dni']);

} else {
    echo 'Sin datos';
}