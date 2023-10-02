<?php

class Producto{
    public $_id;
    public $_codigoDeBarra;
    public $_nombre;
    public $_tipo;
    public $_stock;
    public $_precio;

    public function __construct($codigoBarra, $nombre=null, $tipo=null, $stock=1, $precio=null, $id=null){
        $this->_codigoDeBarra = $codigoBarra;
        $this->_nombre = $nombre;
        $this->_tipo = $tipo;
        $this->_stock = $stock;
        $this->_precio = $precio;
        if($id == null){
            $this->_id = Producto::generarId();
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


    public static function subirProducto($producto){
        $productos = $producto->actualizarStockProducto();

        $arrayProductos = array();
        foreach ($productos as $producto) {
            $arrayProductos[] = array(
                'codigoDeBarra' => $producto->_codigoDeBarra,
                'nombre' => $producto->_nombre,
                'tipo' => $producto->_tipo,
                'stock' => $producto->_stock,
                'precio' => $producto->_precio,
                'id' => $producto->_id
            );
        }
        Producto::guardarJson($arrayProductos);
    }


    private function actualizarStockProducto()
    {
        $mensaje = "No se pudo hacer";
        $productoActualizado = false;
        $productos = array();
        $productosGuardados = Producto::leerProductosJson();
        
        if($productosGuardados != null){
            foreach ($productosGuardados as $productoGuardado) {
                if($productoGuardado->_codigoDeBarra == $this->_codigoDeBarra)
                {
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

    
    //Verifica que el producto exista y tenga stock disponible
    static function comprobarProducto($codigo){
        $ProductosGuardados = Producto::leerProductosJson();

        if($ProductosGuardados != null){
            foreach ($ProductosGuardados as $producto) {
                if($producto->_codigoDeBarra == $codigo && $producto->_stock > 0){
                    return true;
                }
            }
            return false;
        } 
    }

    static function retornarProducto($codigo){
        if(Producto::comprobarProducto($codigo)){
            $productosGuardados = Producto::leerProductosJson();
            foreach ($productosGuardados as $producto) 
            {
                if ($producto->_codigoDeBarra === $codigo){
                    return $producto;
                }
            }
        }
        return null;    
    }

    function venderProducto($cantidadDeItems)
    {
        if($this->_stock >= $cantidadDeItems)
        {
            $this->_stock = -($cantidadDeItems);
            Producto::subirProducto($this);
            return $cantidadDeItems;
        }else{
            echo "No hay suficiente stock";
            return null;
        }
    }

    //===========================================JSON===========================================
    public static function guardarJson($array){
        $nombreArchivo = './Productos/productos.json';
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
        $archivo = './Productos/productos.json';

        $jsonString = @file_get_contents($archivo);
        $productosLeidos = array();
        
        if($jsonString !== false){
            $arrayProductos = json_decode($jsonString, true);
            if($arrayProductos != null){
                foreach ($arrayProductos as $producto) {
                    $codigoBarra = $producto['codigoDeBarra'];
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