<?php
include_once "./Usuario/Usuario.php";

if(isset($_GET["listado"])){
    $tipoListado = $_GET["listado"];

    switch ($tipoListado) {
        case "usuario":
            $usuarios = Usuario::leerUsuarioJSON();
            foreach ($usuarios as $usuario) {
                echo
                "<ul>
                <li>ID: ".$usuario->_id."</li>
                <li>Nombre: ".$usuario->_nombre."</li>
                <li>Clave: ".$usuario->_clave."</li>
                <li>Mail: ".$usuario->_mail."</li>
                <li>Imagen:<img width=50 src=".$usuario->_imagen["full_path"]."></li>
                <li>Fecha de registro: ".$usuario->_fechaDeRegistro["date"]."</li>
                </ul>";
            }
            break;
        case "productos":
            echo "<br/>Los productos no estan cargados<br/>";
            break;
    }
} else {
    echo "Parametro titulo no encontrado";
}