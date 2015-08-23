<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Operatii</title>
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link rel="stylesheet" href="style.css"/>
</head>
<body>
<div id="portfolio" class="container">
	<div class="box1">
		<h2>Angajat</h2>
		<ul class="style2">
			<?php 
require_once '../include/config.php';
##diferenta
$query = "SELECT nume_angajat, prenume_angajat
FROM angajat AS a
WHERE NOT
EXISTS (
SELECT nume_angajat, prenume_angajat
FROM manager AS m
WHERE a.nume_angajat = m.nume_angajat
AND a.prenume_angajat = m.prenume_angajat
)";
$rezultat = mysqli_query($conectare,$query);
while($row = mysqli_fetch_array($rezultat))
{
	echo "<li>" .$row['nume_angajat']. " ". $row['prenume_angajat']. "</li>";

}?>
		</ul>
	</div>
	<div class="box3">
		<h2>Factura</h2>
		<ul class="style2">
<?php 
require_once '../include/config.php';
#jonctiune
$query = "SELECT nume_client, prenume_client, tip_client, adresa_client, telefon_client, cod_factura, data_factura, cod_produs
FROM client, factura
WHERE factura.cod_client = client.cod_client";
$rezultat = mysqli_query($conectare,$query);
while($row = mysqli_fetch_array($rezultat))
{
	echo "<li>" .$row['nume_client']. " " ;
	echo  $row['prenume_client'] . " ";
	echo  $row['tip_client']. " ";
	echo  $row['adresa_client']. " ";
	echo  $row['telefon_client']. " ";
	echo  $row['cod_factura']." ";
	echo  $row['data_factura']." ";
	echo  $row['cod_produs']."</li>";

}?>
</ul>
</div>
</body>
</html>