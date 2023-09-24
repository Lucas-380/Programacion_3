<?php
// Aplicación No 3 (Obtener el valor del medio)
// Dadas tres variables numéricas de tipo entero $a, $b y $c realizar una aplicación que muestre
// el contenido de aquella variable que contenga el valor que se encuentre en el medio de las tres
// variables. De no existir dicho valor, mostrar un mensaje que indique lo sucedido. Ejemplo 1: $a
// = 6; $b = 9; $c = 8; => se muestra 8.
// Ejemplo 2: $a = 5; $b = 1; $c = 5; => se muestra un mensaje “No hay valor del medio”

$a = 1;
$b = 5;
$c = 1;

//La funcion verificara si el primer parametro es el numero del medio
function VerificarNumeroDelMedio($numeroUno, $numeroDos, $numeroTres){
    switch ($numeroUno) {
        case $numeroUno > $numeroDos && $numeroUno < $numeroTres:
            return 1;
            break;
        case $numeroUno < $numeroDos && $numeroUno > $numeroTres:
            return 1;
            break;
        default:
            return 0;
            break;
    }
}

if(VerificarNumeroDelMedio($a, $b, $c)){
    echo $a;
}
elseif (VerificarNumeroDelMedio($b, $a, $c)) {
    echo $b;
}
elseif (VerificarNumeroDelMedio($c, $a, $b)){
    echo $c;
}else{
    echo "No hay valor del medio";
}

?>