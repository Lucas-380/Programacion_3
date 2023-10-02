<?php

switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        switch ($_POST['accion']) 
        {
//=================================================VENTA=================================================

            case 'realizarVenta':
                include_once "./Productos/Producto.php";
                include_once "./Usuario/Usuario.php";
                include_once "./Ventas/Venta.php";

                if(isset($_POST["codigoDeBarra"]) && isset($_POST["idUsuario"]) && isset($_POST["cantidadDeItems"])){
                    $codigoDeBarra = $_POST["codigoDeBarra"];
                    $idUsuario = $_POST["idUsuario"];
                    $cantidadDeItems = $_POST["cantidadDeItems"];
                    if(Usuario::comprobarId($idUsuario) && Producto::comprobarProducto($codigoDeBarra))
                    {
                        $usuario = Usuario::retornarUsuario($idUsuario);
                        $producto = Producto::retornarProducto($codigoDeBarra);
                        $productosVendido = $producto->venderProducto($cantidadDeItems);
                            
                        if($productosVendido != null){
                            Venta::realizarVenta($usuario, $producto, $productosVendido);
                        }else{
                            echo "Error no se pudieron vender los productos";
                        }
                    }
                } else {
                    echo "Parametros incorrectos";
                }
                break;

//=================================================PRODUCTO=================================================

            case 'altaProducto':
                include_once "./Productos/Producto.php";

                if(isset($_POST["codigoDeBarra"]) && isset($_POST["nombre"]) && 
                   isset($_POST["tipo"]) && isset($_POST["stock"]) && isset($_POST["precio"]))
                   {
                    $newProd = new Producto($_POST["codigoDeBarra"] ,$_POST["nombre"], $_POST["tipo"], $_POST["stock"], $_POST["precio"]);
                    Producto::subirProducto($newProd);
                } else {
                    echo "Parametros incorrectos";
                }
                break;

//=================================================USUARIO=================================================

            case 'altaUsuario':
                include_once "./Usuario/Usuario.php";

                if(isset($_POST["nombre"]) && isset($_POST["clave"]) && isset($_POST["mail"]) && isset($_FILES["imagen"])){
                    Usuario::AltaUsuario($_POST["nombre"], $_POST["clave"], $_POST["mail"]);
                } else {
                    echo "Parametros incorrectos";
                }
                break;
        }
        break;
}


?>