<?php

class Empleado {
    private $nombre = "Adrian";
    private $apellido  = "Ortega";
    private $sueldo = 3334;
    private array $telefonos;

    public function getNombreCompleto(): string {
        return $this->nombre . " " . $this->apellido;
    }

    public function haDePagarImpuestos(): bool {
        return $this->sueldo >= 3333;
    }

    public function añadirTelefono(int $telefono) : void {
        $this->telefonos[] = $telefono;
    }

    public function mostrarTelefonos(): string {
        return implode(", ", $this->telefonos);
    }

    public function borrarTelefonos(): array {
        return $this->telefonos = [];
    }
}

$empleado1 = new Empleado();

echo $empleado1->getNombreCompleto();
echo $empleado1->haDePagarImpuestos();

