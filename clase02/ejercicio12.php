<?php
// Aplicación No 12 (Invertir palabra)
// Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
// de las letras del Array.
// Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.

$saludo = ['H','O','L','A'];

function InvertirArray($array){
    $newArray = [];

    for ($i = count($array) - 1; $i >= 0; $i--) {
        $newArray[] = $array[$i];
    }
    
    return $newArray;
}

echo var_dump($saludo),"<br/>";
echo var_dump(InvertirArray($saludo));