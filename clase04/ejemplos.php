<?php

switch($_SERVER['REQUEST_METHOD']){
    case 'GET':
        switch ($_GET['accion']) {
            case 'leer':
                echo "leer";
                include 'usuario.php';
                //Usuario::LeerUsuario;
                break;
            case 'buscar':
                echo "buscar";
                break;
        }
        break;
    case 'POST':
        switch ($_POST['accion']) {
            case 'leer':
                echo "leer";
                break;
            case 'buscar':
                echo "buscar";
                break;
        }
        break;
}

// public static function leerUsuarioJSON(){
//     $archivo = './Usuario/usuarios.json';
//     $jsonString = @file_get_contents($archivo);

//     if($jsonString !== false){
//         $arrayUsuarios = json_decode($jsonString, true);
//         $usuariosLeidos = array();

//         if($arrayUsuarios != null){
//             foreach ($arrayUsuarios as $usuario) {
//                 $id = $usuario['id'];
//                 $nombre = $usuario['nombre'];
//                 $clave = $usuario['clave'];
//                 $mail = $usuario['mail'];
//                 $imagen = $usuario['imagen'];
//                 $fechaDeRegistro = $usuario['fecha'];
                
//                 $user = new Usuario($id, $nombre, $clave, $mail, $imagen, $fechaDeRegistro);
//                 array_push($usuariosLeidos, $user);
//             }
//         }
//         return $usuariosLeidos;
//     }else{
//         return null;
//     }

// }

// private static function guardarUsuarioJSON($user){
//     //Traigo los usuarios que ya estan guardados y los guardo con el nuevo usuario
//     $usuarios = array();
//     $UsuariosGuardados = Usuario::leerUsuarioJSON();
//     if($UsuariosGuardados != null){
//         foreach ($UsuariosGuardados as $usuario) {
//             array_push($usuarios, $usuario);
//         }
//     }
//     array_push($usuarios, $user);

//     // Convierto el array de objetos en un array asociativo
//     $usuariosArray = array();
//     foreach ($usuarios as $usuario) {
//         $usuariosArray[] = array(
//             'id' => $usuario->_id,
//             'nombre' => $usuario->_nombre,
//             'clave' => $usuario->_clave,
//             'mail' => $usuario->_mail,
//             'imagen' => $usuario->_imagen,
//             'fecha' => $usuario->_fechaDeRegistro
//         );
//     }
    
//     $nombreArchivo = './Usuario/usuarios.json';

//     $json = json_encode($usuariosArray, JSON_PRETTY_PRINT);
//     if ($json !== false) {
//         if (@file_put_contents($nombreArchivo, $json)) {
//             echo 'El array de objetos se ha guardado correctamente en el archivo JSON.';
//         } else {
//             echo 'No se pudo guardar el archivo.';
//         }
//     }else{
//         echo "Error al convertir a JSON";
//     }
// }

?>