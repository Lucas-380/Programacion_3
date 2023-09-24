<?php
// Aplicación No 5 (Números en letras)
// Realizar un programa que en base al valor numérico de una variable $num, pueda mostrarse
// por pantalla, el nombre del número que tenga dentro escrito con palabras, para los números
// entre el 20 y el 60.
// Por ejemplo, si $num = 43 debe mostrarse por pantalla “cuarenta y tres”.

function TransformarNumeroEnPalabras($numero){

    if($numero > 19 && $numero < 61)
    {
        $primerNumeroPalabra = "";
        $segundoNumeroPalabra = "";
        $numCadena = (string)$numero;
        $primerDigito = $numCadena[0];
        $segundoDigito = $numCadena[1];
        
        switch ($primerDigito) {
            case 2:
                $primerNumeroPalabra = "veinte";
                break;
            case 3:
                $primerNumeroPalabra = "treinta";
                break;
            case 4:
                $primerNumeroPalabra = "cuarenta";
                break;
            case 5:
                $primerNumeroPalabra = "cincuenta";
                break;
            case 6:
                $primerNumeroPalabra = "sesenta";
                break;
        }
        
        switch ($segundoDigito) {
            case 1:
                $segundoNumeroPalabra = " y uno";
                break;
            case 2:
                $segundoNumeroPalabra = " y dos";
                break;
            case 3:
                $segundoNumeroPalabra = " y tres";
                break;
            case 4:
                $segundoNumeroPalabra = " y cuatro";
                break;
            case 5:
                $segundoNumeroPalabra = " y cinco";
                break;
            case 6:
                $segundoNumeroPalabra = " y seis";
                break;
            case 7:
                $segundoNumeroPalabra = " y siete";
                break;
            case 8:
                $segundoNumeroPalabra = " y ocho";
                break;
            case 9:
                $segundoNumeroPalabra = " y nueve";
                break;
        }
        return $primerNumeroPalabra.$segundoNumeroPalabra;
    }
    return "El numero no esta dentro del rango, intente entre el 20 y 60";
}

$num = 43;

echo $num, " : ",TransformarNumeroEnPalabras($num);

?>