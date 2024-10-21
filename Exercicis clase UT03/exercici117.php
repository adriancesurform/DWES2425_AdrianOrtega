<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercici 117</title>
</head>
<body>

<form method="post">
    <label for="nombre">Nom:</label>
    <input type="text" id="nombre" name="nombre" required><br><br>

    <label for="apellidos">Llinatges:</label>
    <input type="text" id="apellidos" name="apellidos" required><br><br>

    <label for="sueldo">Sou (deixa en blanc per defecte 1000):</label>
    <input type="number" id="sueldo" name="sueldo" step="0.01"><br><br>

    <label for="telefonos">Telèfons (separats per comes):</label>
    <input type="text" id="telefonos" name="telefonos" required><br><br>

    <input type="submit" value="Enviar">
</form>

<?php
class Empleado {

    // Variable estática para el sueldo máximo que requiere pagar impuestos
    private static $sueldoMaximo = 3333.0;

    // Propiedades privadas
    private $nombre;
    private $apellidos;
    private $sueldo = 1000.0;
    private $telefonos = [];

    // Constructor que asigna nombre, apellidos y sueldo opcional
    public function __construct(string $nombre, string $apellidos, float $sueldo = 1000.0)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->sueldo = $sueldo;
    }

    // Métodos para obtener el nombre, apellidos y sueldo
    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    public function getSueldo(): float
    {
        return $this->sueldo;
    }

    public function getNombreCompleto(): string
    {
        return $this->getNombre() . ' ' . $this->getApellidos();
    }

    public function pagarHacienda(): bool
    {
        return $this->getSueldo() > self::$sueldoMaximo;
    }

    public function añadirTelefono(int $telefono): void
    {
        $this->telefonos[] = $telefono;
    }

    public function listarTelefonos(): string
    {
        return implode(", ", $this->telefonos);
    }

    public function getTelefonos(): array // Getter para los teléfonos
    {
        return $this->telefonos;
    }

    public function eliminaTelefonos(): void
    {
        $this->telefonos = [];
    }

    // Método estático para generar HTML
    public static function toHtml(Empleado $emp): string
    {
        $html = "<p><strong>Nom:</strong> " . $emp->getNombreCompleto() . "<br>"
            . "<strong>Sueldo:</strong> " . $emp->getSueldo() . "<br>"
            . "<strong>Ha de pagar impostos:</strong> " . ($emp->pagarHacienda() ? "Sí" : "No") . "</p>";

        if (!empty($emp->getTelefonos())) {
            $html .= "<strong>Telèfons:</strong><ol>";
            foreach ($emp->getTelefonos() as $telefono) {
                $html .= "<li>" . htmlspecialchars($telefono) . "</li>";
            }
            $html .= "</ol>";
        }

        return $html;
    }

    // Getter para sueldoMaximo
    public static function getSueldoMaximo(): float
    {
        return self::$sueldoMaximo;
    }

    // Setter para sueldoMaximo
    public static function setSueldoMaximo(float $nuevoSueldoMaximo): void
    {
        self::$sueldoMaximo = $nuevoSueldoMaximo;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $sueldo = !empty($_POST['sueldo']) ? floatval($_POST['sueldo']) : 1000.0;  // Valor por defecto si no se introduce sueldo
    $telefonos = explode(",", $_POST['telefonos']);  // Separar los teléfonos por comas

    // Crear un objeto Empleado con el sueldo introducido o el valor por defecto
    $empleado = new Empleado($nombre, $apellidos, $sueldo);

    // Añadir los teléfonos al objeto empleado
    foreach ($telefonos as $telefono) {
        $empleado->añadirTelefono(trim($telefono));
    }

    // Mostrar la información del empleado como HTML
    echo Empleado::toHtml($empleado);
}
?>

</body>
</html>
