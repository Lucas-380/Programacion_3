<?php
class Usuario{
    public $_nombre;
    public $_clave;
    public $_mail;

    public function __construct($nombre = null, $clave = null, $mail = null){
        if($clave != null || $mail != null){
            $this->_nombre = $nombre;
            $this->_clave = $clave;
            $this->_mail = $mail;
        }else{
            echo "</br>El usuario no se pudo crear por falta de datos</br>";
        }
    }

    static function mostrarUsuario($user){
        echo "Usuario: ".$user->_nombre." Clave: ".$user->_clave." Mail: ".$user->_mail."</br>";
    }

    function verificarUsuario(){
        $usuariosGuardados = Usuario::leerUsuario();

        foreach ($usuariosGuardados as $usuario){
            if($this->_mail == $usuario->_mail && $this->_clave == $usuario->_clave){
                return "</br>Verificado</br>";
            }elseif($this->_mail == $usuario->_mail && $this->_clave != $usuario->_clave){
                return "</br>Error en los datos</br>";
            }        
        }
        return "</br>Usuario no registrado</br>";
    }

    public static function guardarUsuario($user){
        $archivo = fopen('usuarios.csv', 'a');

        if ($archivo !== false) {
            fputcsv($archivo, [$user->_nombre, $user->_clave, $user->_mail]);
            fclose($archivo);
            echo "<p>Usuario guardado</p>";
        } else {
            echo "<p>Algo salio mal</p>";
        }
        echo "</>";
    }

    public static function leerUsuario() {
        $archivo = fopen('usuarios.csv', 'r');
        $usuariosLeidos = array();

        if ($archivo !== false) {
            while (($fila = fgetcsv($archivo)) !== false) {
                $nombre = $fila[0];
                $clave = $fila[1];
                $mail = $fila[2];
                
                $User = new Usuario($nombre, $clave, $mail);
                array_push($usuariosLeidos, $User);
            }

            fclose($archivo);
        } else {
            echo "No se pudo abrir el archivo.";
        }

        return $usuariosLeidos;
    }

    static function AltaUsuario($user){
        if($user instanceof Usuario){
            
        }
    }


}
