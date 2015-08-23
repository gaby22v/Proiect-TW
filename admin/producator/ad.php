<?php
#conectarea la baza de date
include("config.php");
#preluarea variabilelor din formular
$nume = $_POST['nume'];
$adresa = $_POST['adresa'];
$telefon = $_POST['telefon'];
#inserarea in baza de date
$query = "INSERT INTO producator VALUES (null,'$nume','$telefon','$adresa')";
mysqli_query($conectare,$query);
#redirectionare catre pagina de afisare
header( 'Location:adaugare.php' ) ;
#inchiderea conexiunii la baza de date
mysqli_close($conectare);
?>