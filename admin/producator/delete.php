<?php
include("config.php");
$id=$_GET['cod'];
$sql = "DELETE from producator where cod_producator='$id'";
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