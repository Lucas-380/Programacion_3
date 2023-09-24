<?php
// Aplicación No 6 (Carga aleatoria)
// Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
// función rand). Mediante una estructura condicional, determinar si el promedio de los números
// son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
// resultado.

$arrayDeNumeros = array();

for ($i=0; $i < 5; $i++) 
{ 
    $arrayDeNumeros[$i] = rand(1, 10);
    echo $arrayDeNumeros[$i],"<br/>";
}

function PromediarArray($array){
    $total = 0;
    for ($i=0; $i < count($array); $i++) 
    { 
        $total += $array[$i];
    }
    return $total/count($array);
}

$promedio = PromediarArray($arrayDeNumeros);

if($promedio > 6)
{
    echo "El promedio es mayor que 6";
}
else if($promedio < 6)
{
    echo "El promedio es menor que 6";
}
else
{
    echo "El promedio es igual a 6";
}

echo "<br/>Promedio: ".$promedio;

?>