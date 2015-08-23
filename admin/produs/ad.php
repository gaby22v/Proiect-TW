<?php
#conectarea la baza de date
include("config.php");
#preluarea variabilelor din formular
$denumire = $_POST['denumire'];
$producator = $_POST['producator'];
$specificatii = $_POST['specificatii'];
$cod_raion = $_POST['cod_raion'];
$pret = $_POST['pret'];
$cod_client = $_POST['cod_client'];
#inserarea in baza de date
$query = "INSERT INTO produs VALUES (null,'$producator','$denumire','$specificatii','$pret','$cod_raion','$cod_client')";
mysqli_query($conectare,$query);
#redirectionare catre pagina de afisare
header( 'Location:adaugare.php' ) ;
#inchiderea conexiunii la baza de date
mysqli_close($conectare);
?>