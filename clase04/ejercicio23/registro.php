<?php

include_once "./Usuario/Usuario.php";

if(isset($_POST["nombre"]) && isset($_POST["clave"]) && isset($_POST["mail"]) && isset($_FILES["imagen"])){
    Usuario::AltaUsuario($_POST["nombre"], $_POST["clave"], $_POST["mail"]);
} else {
    echo "Parametros incorrectos";
}

$Usuarios = Usuario::leerUsuarioJSON();

foreach ($Usuarios as $user) {
    Usuario::mostrarUsuario($user);
}

