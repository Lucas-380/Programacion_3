<?php
class Usuario{
    public $_id;
    public $_nombre;
    public $_clave;
    public $_mail;
    public $_imagen;
    public $_fechaDeRegistro;

    public function __construct($id, $nombre = null, $clave = null, $mail = null, $imagen = null, $fechaDeRegistro = new DateTime()){
        $this->_nombre = $nombre;
        $this->_clave = $clave;
        $this->_mail = $mail;
        $this->_imagen = $imagen;
        $this->_fechaDeRegistro = $fechaDeRegistro;
        if($id == null){
            $this->_id = Usuario::generarId();
        }else{
            $this->_id = $id;
        }
    }

    private static function generarId(){
        $usuariosGuardados = Usuario::leerUsuarioJSON();
        $ultimoUsuario = end($usuariosGuardados);

        if($ultimoUsuario != false){
            $ultimoId = $ultimoUsuario->_id;
            return ($ultimoId+1);
        }else{
            return rand(1, 10000);
        }
    }

    static function mostrarUsuario($user){
        echo "</br>Usuario: ".$user->_nombre." Clave: ".$user->_clave." Mail: ".$user->_mail."</br>";
      
        echo "imagen: <img width=100 src=".$user->_imagen["full_path"].">";
    }

    // Si el usuario esta guardado retorna 1
    // Si el usuario esta guardado pero la clave esta mal, retorna 0
    // Si el usuario no esta guardado retorna -1
    function verificarUsuario(){
        $usuariosGuardados = Usuario::leerUsuarioJSON();

        foreach ($usuariosGuardados as $usuario){
            if($this->_mail == $usuario->_mail && $this->_clave == $usuario->_clave){
                return 1;
            }elseif($this->_mail == $usuario->_mail && $this->_clave != $usuario->_clave){
                return 0;
            }        
        }
        return -1;
    }

    private static function guardarUsuarioJSON($user){
        //Traigo los usuarios que ya estan guardados y los guardo con el nuevo usuario
        $usuarios = array();
        $UsuariosGuardados = Usuario::leerUsuarioJSON();
        if($UsuariosGuardados != null){
            foreach ($UsuariosGuardados as $usuario) {
                array_push($usuarios, $usuario);
            }
        }
        array_push($usuarios, $user);

        // Convierto el array de objetos en un array asociativo
        $usuariosArray = array();
        foreach ($usuarios as $usuario) {
            $usuariosArray[] = array(
                'id' => $usuario->_id,
                'nombre' => $usuario->_nombre,
                'clave' => $usuario->_clave,
                'mail' => $usuario->_mail,
                'imagen' => $usuario->_imagen,
                'fecha' => $usuario->_fechaDeRegistro
            );
        }
        
        $nombreArchivo = './Usuario/usuarios.json';
        $json = json_encode($usuariosArray, JSON_PRETTY_PRINT);
        if ($json !== false) {
            if (@file_put_contents($nombreArchivo, $json)) {
                echo 'El array de objetos se ha guardado correctamente en el archivo JSON.';
            } else {
                echo 'No se pudo guardar el archivo.';
            }
        }else{
            echo "Error al convertir a JSON";
        }
    }

    public static function leerUsuarioJSON(){
        $archivo = './Usuario/usuarios.json';
        $jsonString = @file_get_contents($archivo);
        $usuariosLeidos = array();

        if($jsonString !== false){
            $arrayUsuarios = json_decode($jsonString, true);

            if($arrayUsuarios != null){
                foreach ($arrayUsuarios as $usuario) {
                    $id = $usuario['id'];
                    $nombre = $usuario['nombre'];
                    $clave = $usuario['clave'];
                    $mail = $usuario['mail'];
                    $imagen = $usuario['imagen'];
                    $fechaDeRegistro = $usuario['fecha'];
                    
                    $user = new Usuario($id, $nombre, $clave, $mail, $imagen, $fechaDeRegistro);
                    array_push($usuariosLeidos, $user);
                }
            }
        }
        return $usuariosLeidos;
    }

    static function guardarImagen(){
        $carpeta_archivos = './Usuario/Fotos/';
        // Datos del arhivo enviado por POST
        $nombre_archivo = $_FILES['imagen']['name'];
        $tipo_archivo = $_FILES['imagen']['type'];
        $tamano_archivo = $_FILES['imagen']['size'];
        $ruta_destino = $carpeta_archivos . $nombre_archivo;

        if (!((strpos($tipo_archivo, "png") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 100000))) {
            echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .png o .jpg<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>";
        }else{
            if (move_uploaded_file($_FILES['imagen']['tmp_name'],  $ruta_destino)){
                    $imagenGuardada = array(
                        'name' => $nombre_archivo,
                        'full_path' => $ruta_destino,
                        'type' => $tipo_archivo,
                        'size' => $tamano_archivo
                    );
                    echo "</br>El archivo ha sido cargado correctamente.</br>";
                    return $imagenGuardada;
            }else{
                    echo "</br>Ocurrió algún error al subir el fichero. No pudo guardarse.</br>";
                    return null;
            }
        }
    }

    static function AltaUsuario($nombre, $clave, $mail){
        $imagen = Usuario::guardarImagen();
        $nuevoUsuario = new Usuario(null, $nombre, $clave, $mail, $imagen);

        if($nuevoUsuario instanceof Usuario && $nuevoUsuario->verificarUsuario() == -1){
            Usuario::guardarUsuarioJSON($nuevoUsuario);
        }else{
            echo "</br>El usuario ya esta creado</br>";
        }
    }


    static function retornarUsuario($id){
        if(Usuario::comprobarId($id)){
            $UsuariosGuardados = Usuario::leerUsuarioJSON();
            foreach ($UsuariosGuardados as $usuario) {
                if ($usuario->_id == $id) {
                    return $usuario;
                }
            }
        }
        return null;    
    }


    public static function comprobarId($id){
        $UsuariosGuardados = Usuario::leerUsuarioJSON();
        $idsGuardados = array_map(function ($usuario) {
            return $usuario->_id;
        }, $UsuariosGuardados);
        
        return in_array($id, $idsGuardados);
    }



}
