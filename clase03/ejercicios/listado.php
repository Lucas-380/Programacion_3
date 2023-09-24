<?php
include_once "./Usuario.php";

if(isset($_GET["listado"])){
    $tipoListado = $_GET["listado"];

    switch ($tipoListado) {
        case "usuario":
            $usuarios = Usuario::leerUsuario();
            foreach ($usuarios as $usuario) {
                echo
                "<ul>
                <li>".$usuario->_nombre."</li>
                <li>".$usuario->_clave."</li>
                <li>".$usuario->_mail."</li>
                </ul>";
            }
            break;
    }

} else {
    echo "Parametro titulo no encontrado";
}