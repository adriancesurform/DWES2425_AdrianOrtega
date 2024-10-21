<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercici 113</title>
</head>
<body>



    <?php
        class Empleado {

            // No modificables desde fuera de la clase. Por eso son privadas.
            private $nombre;
            private $apellidos;
            private $sueldo;
            private $telefonos = [];


            public function __construct($nombre, $apellidos, $sueldo, $telefon) {
                $this->nombre = $nombre;
                $this->apellidos = $apellidos;
                $this->sueldo = $sueldo;
                $this->telefonos = $telefon;
            }

            public function getNombre() {
                return $this->nombre;
            }

            public function getApellidos() {
                return $this->apellidos;
            }

            public function getSueldo() {
                return $this->sueldo;
            }

            public function getNombreCompleto(): string {
                return $this->getNombre() . ' ' . $this->getApellidos();
            }

            public  function pagarHacienda(): bool {
                return $this->getSueldo() > 3333;
            }

            public function añadirTelefono(int $telefono): void {
                $this->telefonos[] = $telefono;
            }

            public function listarTelefonos(): string {
                $tel = "";
                $totalTelefonos = count($this->telefonos);
                for ($i = 0; $i < $totalTelefonos; $i++) {
                    $tel .= $this->telefonos[$i];
                    if ($i < $totalTelefonos - 1){
                        $tel .= ", ";
                    }
                }
                return $tel;
            }

            public function eliminaTelefonos(): void {
                $this->telefonos = [];
            }
        }
    ?>
</body>
</html>