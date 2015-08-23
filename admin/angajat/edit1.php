<?php
include("config.php");
$nume = $_POST['nume'];
$prenume = $_POST['prenume'];
$functie = $_POST['functie'];
$salariu = $_POST['salariu'];
$zile = $_POST['zile'];
$telefon = $_POST['telefon'];
$cod_angajat=$_POST['cod_angajat'];
$sql="UPDATE angajat SET cod_angajat = '$cod_angajat',nume_angajat='$nume',prenume_angajat='$prenume',functie_angajat='$functie',
salariu_angajat='$salariu',zile_concediu='$zile',telefon_angajat='$telefon' WHERE cod_angajat='$cod_angajat'";
$result=mysqli_query($conectare,$sql);
if($result){
echo "Datele au fost adaugate cu succes";
echo "<br>";
 header( 'Location:update.php' ) ;
}

else
 {
echo "Datele nu au fost adaugate";
}

?>