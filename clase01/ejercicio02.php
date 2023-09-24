<?php
/*
Aplicación No 2 (Mostrar fecha y estación)
Obtenga la fecha actual del servidor (función date) y luego imprímala dentro de la página con
distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
año es. Utilizar una estructura selectiva múltiple.
*/

$fechaPrimerFormato = date("d-m-y h:i:s");
$fechaSegundoFormato = date("l F Y ga");
$fechaTercerFormato = date("d/m/Y H:ia");
$fechaCuartoFormato = date("D M Y H:i e");

function CalcularEstacion() {
    $dia = date('z');

    $invierno=79;
    $primavera=172;
    $verano=265;
    $otono=352;

    switch ($dia) {
        case $dia < $invierno:
            $estacion = 'Invierno';
            break;
        case $dia < $primavera:
            $estacion = 'Primavera';
            break;
        case $dia < $verano:
            $estacion = 'Verano';
            break;
        default:
            $estacion = 'Otono';
            break;
    }

    echo $estacion;
}

echo "La estación actual es: ", CalcularEstacion(), "<br/>";

echo $fechaPrimerFormato, "<br/>";
echo $fechaSegundoFormato, "<br/>";
echo $fechaTercerFormato, "<br/>";
echo $fechaCuartoFormato, "<br/>";


?>