<?php
// Aplicación No 4 (Calculadora)
// Escribir un programa que use la variable $operador que pueda almacenar los símbolos
// matemáticos: ‘+’, ‘-’, ‘/’ y ‘*’; y definir dos variables enteras $op1 y $op2. De acuerdo al
// símbolo que tenga la variable $operador, deberá realizarse la operación indicada y mostrarse el
// resultado por pantalla.

function CalcularOperacion($num1, $num2, $operador){
    $resultado = "Operador inexistente";

    switch ($operador) {
        case '+':
            $resultado = $num1 + $num2;
            break;
        case '-':
            $resultado = $num1 - $num2;
            break;
        case '*':
            $resultado = $num1 * $num2;
            break;
        case '/':
            if($num2 != 0){
                $resultado = $num1 / $num2;
            }else{
                $resultado = "No se puede dividir por 0";
            }
            break;
    }
    return $resultado;
}

$operador = '+';
$a = 5;
$b = 5;
$resultado = CalcularOperacion($a, $b, $operador);

echo $a,$operador,$b, " = ",$resultado;


?>