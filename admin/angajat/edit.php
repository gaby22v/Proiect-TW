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
$row="SELECT * FROM angajat WHERE cod_angajat='$cod'";
$result=mysqli_query($conectare,$row);
$row=mysqli_fetch_array($result);
?>
<form method="post" action="edit1.php">
<input name="cod_angajat" type="hidden" id="cod_angajat" value="<? echo $row['cod_angajat']; ?>">
Nume:<input name="nume" type="text" id="nume" value="<? echo $row['nume_angajat']; ?>">
Prenume:<input name="prenume" type="text" id="prenume" value="<? echo $row['prenume_angajat']; ?>">
Functie:<input name="functie" type="text" id="functie" value="<? echo $row['functie_angajat']; ?>">
Salariu:<input name="salariu" type="text" id="salariu" value="<? echo $row['salariu_angajat']; ?>">
Zile concediu:<input name="zile" type="text" id="zile" value="<? echo $row['zile_concediu']; ?>">
Telefon angajat:<input name="telefon" type="text" id="telefon" value="<? echo $row['telefon_angajat']; ?>">

<input type="submit" name="Submit" value="Modificare">
</form>
<?php
mysqli_close($conectare);
?>