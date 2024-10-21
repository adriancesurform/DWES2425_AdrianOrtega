<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <ol>
            <li>
                <p>¿Que programa usamos para programar en PHP?</p>
                <input type="radio" id="q1a" name="q1" value="a">
                <label for="q1a">WebStorm</label><br>
                <input type="radio" id="q1b" name="q1" value="b" data-correct="true">
                <label for="q1b">PhpStorm</label><br>
                <input type="radio" id="q1c" name="q1" value="c">
                <label for="q1c">IntellIJ</label><br>
            </li>
            <li>
                <p>¿Que color es #FFFFFF?</p>
                <input type="radio" id="q2a" name="q2" value="a">
                <label for="q2a">Negro</label><br>
                <input type="radio" id="q2b" name="q2" value="b" data-correct="true">
                <label for="q2b">Blanco</label><br>
                <input type="radio" id="q2c" name="q2" value="c">
                <label for="q2c">Verde</label><br>
            </li>
            <li>
                <p>¿Qué significa el acrónimo HTML?</p>
                <input type="radio" id="q3a" name="q3" value="a" data-correct="true">
                <label for="q3a">Hyper Text Markup Language</label><br>
                <input type="radio" id="q3b" name="q3" value="b">
                <label for="q3b">Hyper Text Mask Language</label><br>
                <input type="radio" id="q3c" name="q3" value="c">
                <label for="q3c">Hard Text Mask Language</label><br>
            </li>
            <li>
                <p>¿Qué significa el acrónimo PHP?</p>
                <input type="radio" id="q4a" name="q4" value="a" data-correct="true">
                <label for="q4a">Hypertext Preprocessor</label><br>
                <input type="radio" id="q4b" name="q4" value="b">
                <label for="q4b">Hypertext Processor</label><br>
                <input type="radio" id="q4c" name="q4" value="c">
                <label for="q4c">Hypertext Postprocessor</label><br>
            </li>
            <li>
                <p>¿Que es CSS?</p>
                <input type="radio" id="q5a" name="q5" value="a">
                <label for="q5a">Hoja de ruta de estilos</label><br>
                <input type="radio" id="q5b" name="q5" value="b" data-correct="true">
                <label for="q5b">Hoja de Estilos en Cascada</label><br>
                <input type="radio" id="q5c" name="q5" value="c">
                <label for="q5c">Hoja de Cascada con estilos.</label><br>
            </li>
            <li>
                <p>¿Que es VSC?</p>
                <input type="radio" id="q6a" name="q6" value="a">
                <label for="q6a">Visual Studio Course</label><br>
                <input type="radio" id="q6b" name="q6" value="b">
                <label for="q6b">Visual School Coding</label><br>
                <input type="radio" id="q6c" name="q6" value="c" data-correct="true">
                <label for="q6c">Visual Studio Code</label><br>
            </li>
        </ol>

        <button type="submit">Enviar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Respuestas correctas
        $respuestas_correctas = array(
            'q1' => 'b',
            'q2' => 'b',
            'q3' => 'a',
            'q4' => 'a',
            'q5' => 'b',
            'q6' => 'c'
        );

        $resultado = 0;

        // Comprobar cada respuesta
        foreach ($respuestas_correctas as $pregunta => $respuesta_correcta) {
            if (isset($_POST[$pregunta]) && $_POST[$pregunta] == $respuesta_correcta) {
                $resultado++;
            }
        }

        // Mostrar el resultado
        echo "<br>";
        echo "<label>Respuestas correctas: $resultado / 6</label>";

    }
    ?>

</body>
</html>