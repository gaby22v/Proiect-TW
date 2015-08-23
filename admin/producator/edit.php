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
$row="SELECT * FROM producator WHERE cod_producator='$cod'";
$result=mysqli_query($conectare,$row);
$row=mysqli_fetch_array($result);
?>
<form method="post" action="edit1.php">
<input name="cod_producator" type="hidden" id="cod_producator" value="<? echo $row['cod_producator']; ?>">
Nume:<input name="nume" type="text" id="nume" value="<? echo $row['nume_producator']; ?>">
Telefon:<input name="telefon" type="text" id="telefon" value="<? echo $row['telefon_producator']; ?>">
Adresa:<input name="adresa" type="text" id="adresa" value="<? echo $row['adresa_producator']; ?>">
<input type="submit" name="Submit" value="Modificare">
</form>
<?php
mysqli_close($conectare);
?>