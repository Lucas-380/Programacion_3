<?php
include_once "./Auto.php";
include_once "./Garage.php";

$garage = new Garage("garage");

// $autoUno = new Auto("Audi", "Rojo");
// $autoDos = new Auto("Audi", "Azul");

// $autoTres = new Auto("Audi", "Rojo", 300000);
// $autoCuatro = new Auto("Audi", "Rojo", 800000);

// $autoCinco = new Auto("Audi", "Rojo", 600000, (new DateTime())->format('d-m-y'));

// $autoUno->AgregarImpuestos(1500);
// $autoDos->AgregarImpuestos(1500);
// $autoTres->AgregarImpuestos(1500);

// echo $importeSumado = Auto::Add($autoUno, $autoDos)."<br/>";

// $autos = array($autoUno, $autoDos, $autoTres, $autoCuatro, $autoCinco);

// for ($i = 0; $i <= 5; $i += 2) {
//     Auto::MostrarAuto($autos[$i]);
// }

// $garage->Add($autoUno);
// $garage->Add($autoDos);
// $garage->Add($autoCuatro);
// $garage->Add($autoCuatro);

// $garage->MostrarGarage();

// $garage->Remove($autoCuatro);
// $garage->Remove($autoCinco);

// $garage->MostrarGarage();

//========================================
// Auto::guardarAutoCsv($autoUno);
// Auto::guardarAutoCsv($autoDos);

$coleccionDeAutos = Auto::leerAutos();

foreach ($coleccionDeAutos as $auto) {
    Auto::MostrarAuto($auto);
    $garage->Add($auto);
}
echo "<br/>=========================<br/>";

$garage->MostrarGarage();

// Garage::guardarGarageCsv($garage);
// echo "<br/>=========================<br/>";
// $garages = Garage::leerGarage();
// // foreach ($garages as $garage) {
// //     $garage->MostrarGarage();
// // }
// $garages[1]->MostrarGarage();

