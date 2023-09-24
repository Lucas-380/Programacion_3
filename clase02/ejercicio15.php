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
    // Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage”
    // (sólo si el auto no está en el garaje, de lo contrario informarlo).
    // Ejemplo: $miGarage->Add($autoUno);

    function Add($autoAux){
        if($this->Equals($autoAux) === false){
            //array_push($this->_autos,$auto);
            $this->_autos[] = $autoAux;
        }else{
            echo "<br/>El auto ya se encuentra en el garage<br/>";
        }
    }
    
    // Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del
    // “Garage” (sólo si el auto está en el garaje, de lo contrario informarlo). Ejemplo:
    // $miGarage->Remove($autoUno);

    function Remove($autoAux){
        $indice = $this->Equals($autoAux);
        //se puede usar el array search desde acá para que el equals devuelva true o false en vez de numeros
        if($indice !== false){
            unset($this->_autos[$indice]);
        }else{
            echo "<br/>El auto no se encuentra en el garage<br/>";
        }
    }



}