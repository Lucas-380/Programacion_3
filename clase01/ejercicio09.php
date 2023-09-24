<?php
// Aplicación No 9 (Arrays asociativos)
// Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
// contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres
// lapiceras.

function CrearLapicera($color, $marca, $trazo, $precio){
    $lapicera = array(
        'color' => $color,
        'marca' => $marca,
        'trazo' => $trazo,
        'precio' => $precio
    );
    return $lapicera;
}
function ImprimirLapicera($lapicera){
    foreach ($lapicera as $key => $value) {
        echo $key," : ",$value,"<br/>";
    }
    echo "-----------------------------<br/>";
}

$lapiceraUno = CrearLapicera('Azul', 'bic', 'fino', 250);
$lapiceraDos = CrearLapicera('Negro', 'faber-castell', 'fino', 370);
$lapiceraTres = CrearLapicera('Rojo', 'nose', 'grueso', 180);

ImprimirLapicera($lapiceraUno);
ImprimirLapicera($lapiceraDos);
ImprimirLapicera($lapiceraTres);


?>