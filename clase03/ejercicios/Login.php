<?php
// Recibe los datos del usuario(clave,mail )por POST ,
// crear un objeto y utilizar sus métodos para poder verificar si es un usuario registrado, Retorna
// un :
// “Verificado” si el usuario existe y coincide la clave también.
// “Error en los datos” si esta mal la clave.
// “Usuario no registrado si no coincide el mail“
// Hacer los métodos necesarios en la clase usuario.

include_once "./Usuario.php";

if(isset($_POST["clave"]) && isset($_POST["mail"])){
    $nuevoUsuario = new Usuario(null, $_POST["clave"], $_POST["mail"]);

    echo $nuevoUsuario->verificarUsuario();
} else {
    echo "Parametros incorrectos";
}
