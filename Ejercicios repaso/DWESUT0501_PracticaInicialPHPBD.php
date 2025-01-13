<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todolist";

// Crear la connexió
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprovar si la connexió ha fallat
if ($conn->connect_error) {
    die("Error de connexió: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["tarea"]) && !empty(trim($_POST["tarea"]))) {
        $tarea = trim($_POST["tarea"]);

        $stmt = $conn->prepare("INSERT INTO `todolist` (`task`) VALUES (?)");
        $stmt->bind_param("s", $tarea);
        if ($stmt->execute()) {
            header("location: DWESUT0501_PracticaInicialPHPBD.php");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
        $stmt->close();

    }
}

?>

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
    <fieldset>
        <legend>To-do-list</legend>
        <form action="" method="POST">
            <label for="tarea">Tarea:</label>
            <input type="text" id="tarea" name="tarea" autocomplete="off">
            <button type="submit">Enviar</button>
        </form>
    </fieldset>

    <div id="result">
        <?php
        $select = "SELECT * FROM `todolist`";
        $result = $conn->query($select);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Tarea: " . $row["task"] . "<br>";
                echo "Estado: " . $row["status"] . "<br><br>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
