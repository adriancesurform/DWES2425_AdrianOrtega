<?php

class Persona
{
    public $nombre;
    public $dni;
    public $edad;

    public function __construct($nombre, $dni, $edad)
    {
        $this->nombre = $nombre;
        $this->dni = $dni;
        $this->edad = $edad;
    }
}

if (isset($_POST['name']) && isset($_POST['dni']) && isset($_POST['edad'])) {
    $nombre = htmlspecialchars($_POST['name']);
    $dni = htmlspecialchars($_POST['dni']);
    $edad = htmlspecialchars($_POST['edad']);

    $persona = new Persona($nombre, $dni, $edad);

    echo $persona->nombre;
    echo $persona->dni;
    echo $persona->edad;
}

