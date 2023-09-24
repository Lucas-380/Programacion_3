<?php
class Garage{
    private $_razonSocial;
    private $_precioPorHora;
    private $_autos;

    public function __construct($razonSocial, $precioPorHora = 0, $autos = null){
        $this->_razonSocial = $razonSocial;
        $this->_precioPorHora = $precioPorHora;
        if($autos == null){
            $this->_autos = array();
        }else{
            $this->_autos = $autos;
        }
    }

    function MostrarGarage(){
        echo "Razon Social: ".$this->_razonSocial."<br/>Precio por hora ".$this->_precioPorHora."<br/>Autos:<br/>";
        for ($i = 0; $i < count($this->_autos); $i++) {
            Auto::MostrarAuto($this->_autos[$i]);
        }
    }

    //Que devuelva el indice si existe o false
    function Equals($autoAux){
        $indice = array_search($autoAux, $this->_autos);
        if($indice > -1){
            return $indice;
        }
        return false;
    }

    function Add($autoAux){
        if($this->Equals($autoAux) === false){
            //array_push($this->_autos,$auto);
            $this->_autos[] = $autoAux;
        }else{
            echo "<br/>El auto ya se encuentra en el garage<br/>";
        }
    }

    function Remove($autoAux){
        $indice = $this->Equals($autoAux);
        if($indice !== false){
            unset($this->_autos[$indice]);
        }else{
            echo "<br/>El auto no se encuentra en el garage<br/>";
        }
    }



    public static function guardarGarageCsv($garage){
        $archivo = fopen('garage.csv', 'a');

        if ($archivo !== false) {

            foreach ($garage->_autos as $auto) {
                fputcsv($archivo, [$garage->_razonSocial, $garage->_precioPorHora, $auto->getFecha(), $auto->getMarca(), $auto->getColor(), $auto->getPrecio()]);
            }

            fclose($archivo);
            echo "<p>Garage guardado</p>";
        } else {
            echo "<p>Algo salio mal</p>";
        }
        echo "</br>";
    }

    
    public static function leerGarage() {
        $archivo = fopen('garage.csv', 'r');
        $garageLeidos = array();
        $autosLeidos = array();

        if ($archivo !== false) {
            while (($fila = fgetcsv($archivo)) !== false) {
                $razonSocial = $fila[0];
                $precioPorHora = $fila[1];
                
                $fecha = $fila[2];
                $marca = $fila[3];
                $color = $fila[4];
                $precio = $fila[5];
                
                $auto = new Auto($marca, $color, $precio, $fecha);
                array_push($autosLeidos, $auto);
                
                $garage = new Garage($razonSocial, $precioPorHora, $autosLeidos);
                array_push($garageLeidos, $garage);
            }

            fclose($archivo);
        } else {
            echo "No se pudo abrir el archivo.";
        }
        
        return $garageLeidos;
    }

}