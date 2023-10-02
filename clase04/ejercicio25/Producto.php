<?php

class Producto{
    public $_id;
    public $_codigoBarra;
    public $_nombre;
    public $_tipo;
    public $_stock;
    public $_precio;

    public function __construct($codigoBarra, $nombre=null, $tipo=null, $stock=1, $precio=null, $id=null){
        $this->_codigoBarra = $codigoBarra;
        $this->_nombre = $nombre;
        $this->_tipo = $tipo;
        $this->_stock = $stock;
        $this->_precio = $precio;
        if($id == null){
            $this->_id = Producto::generarId();
            echo $this->_id;
        }else{
            $this->_id = $id;
        }
    }


    private static function generarId(){
        $productosGuardados = Producto::leerProductosJson();
        $ultimoProducto = end($productosGuardados);

        if($ultimoProducto != false){
            $ultimoId = $ultimoProducto->_id;
            $ultimoId++;
            return $ultimoId;
        }else{
            return rand(1, 10000);
        }
    }


    public function mostrarProducto(){
        echo "</br>id: ".$this->_id;
        echo "</br>cod.: ".$this->_codigoBarra;
        echo "</br>nombre: ".$this->_nombre;
        echo "</br>tipo: ".$this->_tipo;
        echo "</br>stock: ".$this->_stock;
        echo "</br>precio: ".$this->_precio;
    }


    public static function subirProducto($producto){
        $productos = $producto->actualizarStockProducto();

        $arrayProductos = array();
        foreach ($productos as $producto) {
            $arrayProductos[] = array(
                'codigoBarra' => $producto->_codigoBarra,
                'nombre' => $producto->_nombre,
                'tipo' => $producto->_tipo,
                'stock' => $producto->_stock,
                'precio' => $producto->_precio,
                'id' => $producto->_id
            );
        }

        Producto::guardarJson($arrayProductos);
    }


    private function actualizarStockProducto(){
        $mensaje = "No se pudo hacer";
        $productoActualizado = false;
        $productos = array();
        $productosGuardados = Producto::leerProductosJson();
        if($productosGuardados != null){
            foreach ($productosGuardados as $productoGuardado) {
                if($productoGuardado->_codigoBarra == $this->_codigoBarra){
                    $productoGuardado->_stock += $this->_stock;
                    $productoActualizado = true;
                    $mensaje = "<br/>Actualizado<br/>";
                }
                array_push($productos, $productoGuardado);
            }
        }
        if($productoActualizado === false){
            array_push($productos, $this);
            $mensaje = "<br/>Ingresado<br/>";
        }
        echo $mensaje;
        return $productos;
    }


    public static function guardarJson($array){
        $nombreArchivo = './productos.json';
        $json = json_encode($array, JSON_PRETTY_PRINT);
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


    public static function leerProductosJson(){
        $archivo = './productos.json';
        $jsonString = @file_get_contents($archivo);
        $productosLeidos = array();

        if($jsonString !== false){
            $arrayProductos = json_decode($jsonString, true);
            if($arrayProductos != null){
                foreach ($arrayProductos as $producto) {
                    $codigoBarra = $producto['codigoBarra'];
                    $nombre = $producto['nombre'];
                    $tipo = $producto['tipo'];
                    $stock = $producto['stock'];
                    $precio = $producto['precio'];
                    $id = $producto['id'];
                    
                    $leerProducto = new Producto($codigoBarra, $nombre, $tipo, $stock, $precio, $id);
                    array_push($productosLeidos, $leerProducto);
                }
            }
        }
        return $productosLeidos;
    }
}