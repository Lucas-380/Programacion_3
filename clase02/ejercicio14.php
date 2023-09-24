<?php
class Auto{
    private $_color;
    private $_precio;
    private $_marca;
    private $_fecha;

    public function __construct($marca, $color, $precio = null, $fecha = null){
        $this->_color = $color;
        $this->_marca = $marca;
        if($precio != null){
            $this->_precio = $precio;
        }else{
            $this->_precio = 0;
        }
        
        if($fecha != null){
            $this->_fecha = $fecha;
        }else{
            $this->_fecha = (new DateTime())->format('d-m-y');
        }
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
}