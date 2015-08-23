<?php
#conectarea la baza de date
include("config.php");
#preluarea variabilelor din formular
$nume = $_POST['nume'];
$prenume = $_POST['prenume'];
$functie = $_POST['functie'];
$salariu = $_POST['salariu'];
$zile = $_POST['zile'];
$telefon = $_POST['telefon'];
#inserarea in baza de date
$query = "INSERT INTO angajat VALUES (null,'$nume','$prenume','$functie','$salariu','$zile','$telefon')";
mysqli_query($conectare,$query);
#redirectionare catre pagina de afisare
header( 'Location:adaugare.php' ) ;
#inchiderea conexiunii la baza de date
mysqli_close($conectare);
?>