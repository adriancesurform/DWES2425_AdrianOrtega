<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $credenciales = [
        'admin' => 'admin',
        'usuario' => 'usuario',
        'denis' => 'denis'
    ];

    $alquileres = [
        "alquiler1" => [
            "Pitbull",
            "MiseWoWeah",
            "4,99€"
        ],
        "alquiler2" => [
            "Pitbull",
            "Cuba, la cosa ta dura",
            "5,75€"
        ]
    ];


    $_SESSION['credenciales'] = $credenciales;
    $_SESSION['alquileres'] = $alquileres;

    class Cliente
    {
        private $usuario;
        private $password;
        private $alquileres;

        public function __construct($usuario, $password)
        {
            $this->usuario = $usuario;
            $this->password = $password;
        }

        public function esAdministrador()
        {
            global $credenciales;
            return isset($credenciales[$this->usuario]) &&
                $credenciales[$this->usuario] === $this->password;
        }

        public function esAdmin()
        {
            return $this->usuario === 'admin';
        }

        public function getAlquileres() {
            return $this->alquileres;
        }
    }

    $cliente = new Cliente($usuario, $password);

    if ($cliente->esAdministrador()) {
        $_SESSION['usuario'] = $usuario;
        if ($cliente->esAdmin()) {
            header('Location: mainAdmin.php');
            exit();
        } else {
            header('Location: main.php');
        }
    } else {
        $_SESSION['error'] = "Usuario o contraseña incorrectos.";
        header('Location: index.php');
    }
    exit();
} else {
    echo "NaN";
}