<?php
class Venta{
    private $_id;
    private $_idUsuario;
    private $_codigoDeBarra;
    private $_cantidad;
    
    public function __construct($usuario, $producto, $cantidad, $id = null){
        $this->_idUsuario = $usuario;
        $this->_codigoDeBarra = $producto;
        $this->_cantidad = $cantidad;
        
        if($id == null){
            $this->_id = Venta::generarId();
        }else{
            $this->_id = $id;
        }
    }


    private static function generarId(){
        $ventasGuardadas = Venta::leerJSON();
        $ultimaVenta = end($ventasGuardadas);

        if($ultimaVenta != false){
            $ultimoId = $ultimaVenta->_id;
            return ($ultimoId+1);
        }else{
            return rand(1, 10000);
        }
    }


    static function realizarVenta($usuario, $producto, $cantidad){

        if($usuario != null && $producto != null){

            $venta = new Venta($usuario->_id, $producto->_codigoDeBarra, $cantidad);
            Venta::guardarJSON($venta);
            echo "<br/>Venta Realizada<br/>";
        }else{
            echo "Error al realizar la venta";    
        }
    }


    private static function guardarJSON($ultimaVenta){
        $ventaArray = [
            'id' => $ultimaVenta->_id,
            'codigoDeBarra' => $ultimaVenta->_codigoDeBarra,
            'idUsuario' => $ultimaVenta->_idUsuario,
            'cantidad' => $ultimaVenta->_cantidad,
        ];

        $ventas = [];
        if (file_exists('./Ventas/ventas.json')) {
            $ventas = json_decode(file_get_contents('./Ventas/ventas.json'), true);
        }
        $ventas[] = $ventaArray;
        //el json pretty es para que quede bien ordenado.
        file_put_contents('./Ventas/ventas.json', json_encode($ventas, JSON_PRETTY_PRINT));
    }


    public static function leerJSON(){
        $archivo = './Ventas/ventas.json';
        $jsonString = @file_get_contents($archivo);
        $ventasLeidas = array();

        if($jsonString !== false){
            $arrayVentas = json_decode($jsonString, true);

            if($arrayVentas != null){
                foreach ($arrayVentas as $venta) {
                    $id = $venta['id'];
                    $usuario = $venta['idUsuario'];
                    $cantidad = $venta['cantidad'];
                    $producto = $venta['codigoDeBarra'];
                    
                    $nuevaVenta = new Venta($usuario, $producto, $cantidad, $id);
                    array_push($ventasLeidas, $nuevaVenta);
                }
            }
        }
        return $ventasLeidas;
    }


}