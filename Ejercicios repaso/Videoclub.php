<?php
class Disco {
    private $nombre;
    private $grupo;
    private $añoPublicacion;
    private $tipoMusica;
    private $localizacion;
    private $prestado;


    public function __construct()
    {
        $this->nombre = "";
        $this->grupo = "";
        $this->añoPublicacion = "";
        $this->tipoMusica = "";
        $this->localizacion = 0;
        $this->prestado = false;
    }

    public function setPropiedades($nombre, $grupo, $añoPublicacion, $tipoMusica, $localizacion): void
    {
        $this->nombre = $nombre;
        $this->grupo = $grupo;
        $this->añoPublicacion = $añoPublicacion;
        $this->tipoMusica = $tipoMusica;
        $this->localizacion = $localizacion;
    }

    public function cambiarLocalizacion($NuevaLocalizacion): void {
        $this->localizacion = $NuevaLocalizacion;
    }

    public function cambiarPrestado($NuevaPrestado): void {
        $this->prestado = $NuevaPrestado;
    }

    public function mostrarInformacion(): void {
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Grupo: " . $this->grupo . "<br>";
        echo "Año de Publicacion: " . $this->añoPublicacion . "<br>";
        echo "Tipo de Musica: " . $this->tipoMusica . "<br>";
        echo "Localizacion: " . $this->localizacion . "<br>";
        echo "Prestado: " . ($this->prestado ? "Sí" : "No") . "<br>";
    }
}

$nuevoDisco = new Disco();
$nuevoDisco->setPropiedades("Disco", "Grupo Disco", "1990", "Rock",1);
$nuevoDisco->mostrarInformacion();






