<?php
// Aplicación No 7 (Mostrar impares)
// Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
// Luego imprimir (utilizando la estructura for) cada uno en una línea distinta (recordar que el
// salto de línea en HTML es la etiqueta <br/>). Repetir la impresión de los números
// utilizando las estructuras while y foreach.

function CargarNumerosImpares($tam){
    $array = array();
    $numero = 1;
    while (count($array) < $tam) {
        if ($numero % 2 !== 0) {
            $array[] = $numero;
        }
        $numero++;
    }
    return $array;
}

$arrayNumerosImpares = CargarNumerosImpares(10);

echo "Estructura for<br/>";
for ($i=0; $i < count($arrayNumerosImpares); $i++) 
{
    echo $arrayNumerosImpares[$i],"<br/>";
}

echo "Estructura while<br/>";
$contador = 0;
while ($contador < count($arrayNumerosImpares)) {
    echo $arrayNumerosImpares[$contador],"<br/>";
    $contador++;
}

echo "Estructura foreach<br/>";
foreach ($arrayNumerosImpares as $posicion => $valor) {
    echo $valor,"<br/>";
}

?>