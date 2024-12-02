<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>125 Validacion</title>
</head>
<body>

<form action="" method="GET">
    <fieldset>
        <legend>Datos personales</legend><br />

        <label for="nombre">Nombre y apellidos</label>
        <input type="text" name="nombre" id="nombre" required pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñÜü]+(?: [A-Za-zÁÉÍÓÚáéíóúÑñÜü]+)+$" ><br /><br />

        <label for="email">Email</label>
        <input type="email" name="email" id="email" pattern="^[a-zA-Z0-9.]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" ><br /><br />

        <label for="website">URL Personal</label>
        <input type="url" name="website" id="website" placeholder="https://www.example.com"><br /><br />

        <span>Selecciona tu sexo</span>
        <input type="radio" name="sexo" id="sexoM" value="Masculino" required>
        <label for="sexoM">M</label>
        <input type="radio" name="sexo" id="sexoF" value="Femenino" required>
        <label for="sexoF">F</label><br /><br />

        <label for="convivientes">Numero de convivientes</label>
        <input type="number" name="convivientes" id="convivientes" min="0" max="20" required><br /><br />

        <span>Selecciona tus aficiones:</span><br />
        <input type="checkbox" id="futbol" name="aficiones[]" value="Futbol" required>
        <label for="futbol">Futbol</label><br />
        <input type="checkbox" id="baloncesto" name="aficiones[]" value="Baloncesto" required>
        <label for="baloncesto">Baloncesto</label><br />
        <input type="checkbox" id="tennis" name="aficiones[]" value="Tennis" required>
        <label for="tennis">Tennis</label><br />
        <input type="checkbox" id="Pádel" name="aficiones[]" value="Pádel" required>
        <label for="Pádel">Pádel</label><br />
        <input type="checkbox" id="otros" name="aficiones[]" value="Otros" required>
        <label for="Otros">Otros</label><br /><br />

        <label for="menu">Selecciona un menú:</label><br>
        <select name="menu[]" id="menu" multiple required>
            <option value="Wrap de pollo y aguacate">Wrap de pollo y aguacate</option>
            <option value="Smoothie energético">Smoothie energético</option>
            <option value="Ensalada de atún y garbanzos">Ensalada de atún y garbanzos</option>
            <option value="Tostadas de huevo y aguacate">Tostadas de huevo y aguacate</option>
            <option value="Croissant con café">Croissant con café</option>
            <option value="Otros">Otros</option>
        </select>
        <br><br>

        <button type="submit">Enviar</button>
    </fieldset>
</form>

<table>
    <thead><strong>Información</strong></thead>
    <tbody>
    <?php if ($_GET): ?>
        <tr>
            <td>Nombre y Apellidos</td>
            <td><?= htmlspecialchars($_GET['nombre'] ?? '') ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?= htmlspecialchars($_GET['email'] ?? '') ?></td>
        </tr>
        <tr>
            <td>URL Personal</td>
            <td><?= htmlspecialchars($_GET['website'] ?? '') ?></td>
        </tr>
        <tr>
            <td>Sexo</td>
            <td><?= htmlspecialchars($_GET['sexo'] ?? '') ?></td>
        </tr>
        <tr>
            <td>Numero de convivientes</td>
            <td><?= htmlspecialchars($_GET['convivientes'] ?? '') ?></td>
        </tr>
        <tr>
            <td>Aficiones</td>
            <td>
                <?= isset($_GET['aficiones']) ? implode(', ', array_map('htmlspecialchars', $_GET['aficiones'])) : '' ?>
            </td>
        </tr>
        <tr>
            <td>Menú seleccionado</td>
            <td><?= isset($_GET['menu']) ? implode(', ', array_map('htmlspecialchars', $_GET['menu'])) : '' ?></td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>

</body>
</html>
