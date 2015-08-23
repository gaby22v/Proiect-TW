<?php
include("config.php");
$denumire = $_POST['denumire'];
$producator = $_POST['producator'];
$specificatii = $_POST['specificatii'];
$cod_raion = $_POST['cod_raion'];
$pret = $_POST['pret'];
$cod_client = $_POST['cod_client'];
$cod_produs=$_POST['cod_produs'];
$sql="UPDATE produs SET cod_produs = '$cod_produs',nume_producator='$producator',denumire_produs='$denumire',specificatii_produs='$specificatii',
pret_produs='$pret',cod_raion='$cod_raion',cod_client='$cod_client' WHERE cod_produs='$cod_produs'";
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