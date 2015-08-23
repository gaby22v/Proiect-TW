<?php
$host = "mysql.hostinger.ro";
$utilizator = "u878335792_tw";
$parola = "proiect";
$db = "u878335792_tw";
$conectare = mysqli_connect($host,$utilizator,$parola,$db);
if (mysqli_connect_errno())
{
	echo "Eroare la conectare: " . mysqli_connect_error();
}
?>