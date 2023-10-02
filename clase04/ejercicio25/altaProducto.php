<?php

include_once "./Producto.php";

if(isset($_POST["codigoBarra"]) && isset($_POST["nombre"]) && isset($_POST["tipo"]) && isset($_POST["stock"]) && isset($_POST["precio"])){
    $newProd = new Producto($_POST["codigoBarra"] ,$_POST["nombre"], $_POST["tipo"], $_POST["stock"], $_POST["precio"]);
    Producto::subirProducto($newProd);
} else {
    echo "Parametros incorrectos";
}

$productos = Producto::leerProductosJson();


var_dump($productos);

