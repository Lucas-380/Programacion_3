<?php
// Aplicación No 10 (Arrays de Arrays)
// Realizar las líneas de código necesarias para generar un Array asociativo y otro indexado que
// contengan como elementos tres Arrays del punto anterior cada uno. Crear, cargar y mostrar los
// Arrays de Arrays.

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

$arrayDeLapiceras = array(
    $lapiceraUno = CrearLapicera('Azul', 'bic', 'fino', 250),
    $lapiceraDos = CrearLapicera('Negro', 'faber-castell', 'fino', 370),
    $lapiceraTres = CrearLapicera('Rojo', 'nose', 'grueso', 180)
);

for ($i=0; $i < count($arrayDeLapiceras); $i++) 
{
    ImprimirLapicera($arrayDeLapiceras[$i]);
}

?>