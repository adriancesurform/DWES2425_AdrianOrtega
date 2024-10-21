<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercici 112</title>
</head>
<body>

    <form method="post">
        <label for="nombre">Nom:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellidos">Llinatges:</label>
        <input type="text" id="apellidos" name="apellidos" required><br><br>

        <label for="sueldo">Sou:</label>
        <input type="number" id="sueldo" name="sueldo" required><br><br>

        <input type="submit" value="Enviar">

    </form>


    <?php
    class Empleado {

        // No modificables desde fuera de la clase. Por eso son privadas.
        private $nombre;
        private $apellidos;
        private $sueldo;


        public function __construct($nombre, $apellidos, $sueldo) {
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->sueldo = $sueldo;
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


    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $sueldo = $_POST['sueldo'];

        $empleado = new Empleado($nombre, $apellidos, $sueldo);
        echo "<br>" . "Nombre completo: " . $empleado->getNombreCompleto();

        if ($empleado->pagarHacienda()) {
            echo "<br>Ha de pagar impuestos";
        } else echo "<br>" . "No ha de pagar impuestos";
    }
    ?>
</body>
</html>