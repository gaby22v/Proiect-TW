<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Acasa</title>
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link rel="stylesheet" href="style.css"/>
</head>
<body></body>
</html>
<?php
require_once('config.php');

if(!isset($_SESSION['logat'])) $_SESSION['logat'] = 'Nu';
if($_SESSION['logat'] != 'Da') 
{
echo 'Pentru a accesa aceasta pagina, trebuie sa va autentificati. <br>
      Pentru a va autentifica, apasati <a href="autentificare.php">aici</a><br>
	  Pentru a va inregistra, apasati <a href="inregistrare.php">aici</a>';
}
else
{
echo 'Bine ai venit, <b><i>'.$_SESSION['user'].'</b></i>!<br><br>
      <a href="profil.php">Schimba date personale</a><br><br> 
	  <a href="iesire.php">Iesire</a>';
}

?>