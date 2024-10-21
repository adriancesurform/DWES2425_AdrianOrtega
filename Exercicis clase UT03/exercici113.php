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

<form method="post">
    <label for="nombre">Nom:</label>
    <input type="text" id="nombre" name="nombre" required><br><br>

    <label for="apellidos">Llinatges:</label>
    <input type="text" id="apellidos" name="apellidos" required><br><br>

    <label for="sueldo">Sou:</label>
    <input type="number" id="sueldo" name="sueldo" required><br><br>

    <label for="telefonos">Telèfons (separats per comes):</label>
    <input type="text" id="telefonos" name="telefonos" required><br><br>

    <input type="submit" value="Enviar">
</form>

    <?php
        class Empleado {

            // No modificables desde fuera de la clase. Por eso son privadas.
            private $nombre;
            private $apellidos;
            private $sueldo;
            private $telefonos = [];

            public function __construct($nombre, $apellidos, $sueldo, $telefonos) {
                $this->nombre = $nombre;
                $this->apellidos = $apellidos;
                $this->sueldo = $sueldo;
                $this->telefonos = $telefonos;
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

            public function pagarHacienda(): bool {
                return $this->getSueldo() > 3333;
            }

            public function añadirTelefono(int $telefono): void {
                $this->telefonos[] = $telefono;
            }

            public function listarTelefonos(): string {
                return implode(", ", $this->telefonos);
            }

            public function eliminaTelefonos(): void {
                $this->telefonos = [];
            }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $sueldo = $_POST['sueldo'];
            $telefonos = explode(",", $_POST['telefonos']);

            $empleado = new Empleado($nombre, $apellidos, $sueldo, $telefonos);

            echo "<br>Nombre completo: " . $empleado->getNombreCompleto();

            if ($empleado->pagarHacienda()) {
                echo "<br>Ha de pagar impostos";
            } else {
                echo "<br>No ha de pagar impostos";
            }

            echo "<br>Telèfons: " . $empleado->listarTelefonos();
        }
    ?>
</body>
</html>
