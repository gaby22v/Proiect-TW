<?php
include("config.php");
$id=$_GET['cod'];
$sql = "DELETE from produs where cod_produs='$id'";
$result  = mysqli_query($conectare,$sql);
if($result)
{
 header( 'Location:sterge.php' ) ;
}

else
{
	echo "Eroare";
}
mysqli_close($conectare);
?>