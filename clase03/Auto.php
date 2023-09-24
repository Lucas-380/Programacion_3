<?php
class Auto{
    private $_color;
    private $_precio;
    private $_marca;
    private $_fecha;

    public function __construct($marca, $color, $precio = 0, $fecha = null){
        $this->_color = $color;
        $this->_marca = $marca;
        $this->_precio = $precio;
        
        if($fecha != null){
            $this->_fecha = $fecha;
        }else{
            $this->_fecha = (new DateTime())->format('d-m-y');
        }
    }

    public function getMarca() {
        return $this->_marca;
    }
    public function getColor() {
        return $this->_color;
    }
    public function getPrecio() {
        return $this->_precio;
    }
    public function getFecha() {
        return $this->_fecha;
    }


    function AgregarImpuestos($impuesto){
        $this->_precio += $impuesto;
    }

    static function MostrarAuto($auto){
        echo "Fecha: ".$auto->_fecha."<br/>Marca ".$auto->_marca."<br/>Color ".$auto->_color."<br/>Precio ".$auto->_precio."<br/>"."<br/>";
    }

    function Equals($autoAux){
        if(is_a($autoAux, 'Auto')){
            if($this->_marca == $autoAux->_marca){
                return true;
            }
        }
        return false;
    }

    static function Add($autoUno, $autoDos){
        if($autoUno->Equals($autoDos) && $autoUno->_color == $autoDos->_color){
            return doubleval($autoUno->_precio + $autoDos->_precio);
        }else{
            echo "<br/>La suma no se realizo debido a que el color o la marca no son iguales.<br/>";
        }
    }

    //Ejercicio clase 3
    public static function guardarAutoCsv($auto){
        $archivo = fopen('autos.csv', 'a');

        if ($archivo !== false) {
            fputcsv($archivo, [$auto->_fecha, $auto->_marca, $auto->_color, $auto->_precio]);
            fclose($archivo);
            echo "<p>Auto guardado</p>";
        } else {
            echo "<p>Algo salio mal</p>";
        }
        echo "</br>";
    }

    public static function leerAutos() {
        $archivo = fopen('autos.csv', 'r');
        $autosLeidos = array();

        if ($archivo !== false) {
            while (($fila = fgetcsv($archivo)) !== false) {
                $fecha = $fila[0];
                $marca = $fila[1];
                $color = $fila[2];
                $precio = $fila[3];
                
                $auto = new Auto($marca, $color, $precio, $fecha);
                
                array_push($autosLeidos, $auto);
            }

            fclose($archivo);
        } else {
            echo "No se pudo abrir el archivo.";
        }

        return $autosLeidos;
    }



    
    // public static function guardarLibro($libro){
    //     $exito = false;
    //     $archivo = fopen("libros.txt", "a");
    //     $cadena = $libro->titulo . " - " . $libro->precio . "\n";

    //     $caracteresEscritos = fwrite($archivo, $cadena);
        
    //     if($caracteresEscritos > 0){
    //         $exito = true;
    //     }

    //     fclose($archivo);

    //     if($exito) {
    //         echo "<p>¡Libro agregado!</p>";
    //     } else {
    //         echo "<p>¡Algo salió mal!</p>";
    //     }

    //     echo "<br/>";
    // }

    // /**
    //  * Lee todos los libros del archivo libros.txt y los muestra.
    //  */
    // public static function leerLibros() {
    //     $archivo = fopen("libros.txt", "r");

    //     $lectura = fread($archivo, filesize("libros.txt"));

    //     fclose($archivo);

    //     // Meramente estético: Podríamos leer linea por linea y agregar en cada una un <br/> siguiendo un código similar como el de la funcion encontrarPrecio.

    //     if($lectura !== false){
    //         echo $lectura;
    //     } else {
    //         echo "<p>Error</p>";
    //     }

    //     echo "<br/>";
    // }





}