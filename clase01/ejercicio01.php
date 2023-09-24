<?php
/*
Aplicación No 1 (Sumar números)
Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números
se sumaron.
*/

$numeros = 0;
$contador = 0;

for ($i=0; $numeros < 1000; $i++) 
{ 
    $contador++;
    $numeros += $contador;
    echo "resultado: ", $numeros,"<br/>";
}

echo "<br/>Se sumaron en total de ", $contador - 1," numeros";

?>