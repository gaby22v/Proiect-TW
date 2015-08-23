<?php
include("config.php");
$nume = $_POST['nume'];
$adresa = $_POST['adresa'];
$telefon = $_POST['telefon'];
$cod_producator=$_POST['cod_producator'];
$sql="UPDATE producator SET cod_producator = '$cod_producator',nume_producator='$nume',telefon_producator='$telefon',
adresa_producator='$adresa' WHERE cod_producator='$cod_producator'";
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