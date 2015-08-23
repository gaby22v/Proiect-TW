<html>
<head>
<link rel="stylesheet" type="text/css" href="../style.css">
<title>Modificare date</title>
</head>
<body>
</body>
</html>
<?php
include("config.php");
$cod=$_GET['cod'];
$row="SELECT * FROM produs WHERE cod_produs='$cod'";
$result=mysqli_query($conectare,$row);
$row=mysqli_fetch_array($result);
?>
<form method="post" action="edit1.php">
<input name="cod_produs" type="hidden" id="cod_produs" value="<? echo $row['cod_produs']; ?>">
Nume producator:<input name="producator" type="text" id="producator" value="<? echo $row['nume_producator']; ?>">
Denumire produs:<input name="denumire" type="text" id="denumire" value="<? echo $row['denumire_produs']; ?>">
Specificatii produs:<input name="specificatii" type="text" id="specificatii" value="<? echo $row['specificatii_produs']; ?>">
Pret:<input name="pret" type="text" id="pret" value="<? echo $row['pret_produs']; ?>">
Cod raion:<input name="cod_raion" type="text" id="cod_raion" value="<? echo $row['cod_raion']; ?>">
Cod client:<input name="cod_client" type="text" id="cod_client" value="<? echo $row['cod_client']; ?>">

<input type="submit" name="Submit" value="Modificare">
</form>
<?php
mysqli_close($conectare);
?>