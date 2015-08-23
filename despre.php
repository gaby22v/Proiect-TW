<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Despre</title>
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link rel="stylesheet" href="stiluri/style.css"/>
</head>
<body>
<div id="header-wrapper">
<div id="header" class="container">
		<div id="logo">
			<h1><a href="index.php">Tehnologii Web</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li><a href="afisare.php" accesskey="1" title="">Produse</a></li>
				<li><a href="despre.php" accesskey="1" title="">Despre</a></li>
				<li><a href="galerie.php" accesskey="2" title="">Galerie</a></li>
				<li><a href="contact.html" accesskey="3" title="">Contact</a></li>
				<li><a href="admin/index.php" accesskey="5" title="">Administrare</a></li>
			</ul>
		</div>
	</div>
<div id="portfolio" class="container">
	<div class="box1">
		<h2>Lista Producatori</h2>
		<ul class="style2">
			<?php 
require_once 'include/config.php';
##proiectie
$query = "SELECT DISTINCT `nume_producator`FROM producator";
$rezultat = mysqli_query($conectare,$query);
while($row = mysqli_fetch_array($rezultat))
{
	echo "<li>" .$row['nume_producator'] . "</li>";

}?>
		</ul>
	</div>
	<div class="box2">
		<h2>Reduceri produse</h2>
		<ul class="style2">
<?php 
require_once 'include/config.php';
##selectie
$query = "SELECT denumire_produs,specificatii_produs,pret_produs FROM produs WHERE pret_produs <2500";
$rezultat = mysqli_query($conectare,$query);
while($row = mysqli_fetch_array($rezultat))
{
	echo "<li>" .$row['denumire_produs']. " " ;
	echo  $row['specificatii_produs']. " ";
	echo  $row['pret_produs'] . "</li>";

}?>
</ul>
</div>
	<div class="box3">
		<h2>Angajati</h2>
		<ul class="style2">
<?php 
require_once 'include/config.php';
##reuniune
$query = "SELECT nume_angajat, prenume_angajat
FROM manager
UNION SELECT nume_angajat, prenume_angajat
FROM angajat";
$rezultat = mysqli_query($conectare,$query);
while($row = mysqli_fetch_array($rezultat))
{
	echo "<li>" .$row['nume_angajat']. " " ;
	echo  $row['prenume_angajat'] . "</li>";

}?>
</ul>
</div>
</div>
</body>
</html>
