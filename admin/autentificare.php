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

if(!isset($_GET['actiune'])) $_GET['actiune'] = '';

switch($_GET['actiune'])
{
case '':
echo '<form action="autentificare.php?actiune=validare" method="post">
      Utilizator: <input type="text" name="user" value=""><br>
      Parola: <input type="password" name="parola" value=""><br>
	  <input type="submit" name="Login" value="Login">
	  </form>';
break;

case 'validare':

$_SESSION['user'] = $_POST['user'];

if(($_POST['user'] == '') || ($_POST['parola'] == ''))
{
echo 'Completeaza casutele. <Br> 
      Apasati <a href="autentificare.php">aici</a> pentru a va intoarce la pagina precedenta.';
}
else
{
$cerereSQL = "SELECT * FROM `utilizatori` WHERE utilizator='".htmlentities($_POST['user'])."' AND parola='".md5($_POST['parola'])."'";
$rezultat = mysqli_query($conexiune,$cerereSQL);
if(mysqli_num_rows($rezultat) == 1)
{
  while($rand = mysqli_fetch_array($rezultat))
  {
    $_SESSION['logat'] = 'Da';
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=pagina.php">';
  }
}
else
{
echo 'Date incorecte. <Br> 
      Apasati <a href="autentificare.php">aici</a> pentru a va intoarce la pagina precedenta.';
}

}
break;
}
?>