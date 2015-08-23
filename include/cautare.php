<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Cautare</title>
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link rel="stylesheet" href="../stiluri/style.css"/>
</head>
<body>
<?php
include("config.php");
// Se verifica daca e primita valoare de la formular si are mai mult de 1 caracter
if (isset($_POST['term']) && strlen($_POST['term'])>1) 
{
  // Preia valoarea, eliminand posibile spatii exterioare
  $term = trim($_POST['term']);
  // Filtreaza caracterele speciale ca sa poata fi utilizate in comanda SQL 
  $term = $conectare->real_escape_string($term);
  // Se face selectarea si afisarea datelor returnate
  $sql = "SELECT * FROM `produs` WHERE `denumire_produs` LIKE '%$term%'"; 
  // executa interogarea si retine datele returnate
  $result = $conectare->query($sql);
  // daca $result contine cel putin un rand
  if ($result->num_rows > 0) 
{
    // Parcurge si afiseaza randurile gasite
    while($row = $result->fetch_assoc()) 
{
      echo '<br />'. $row['nume_producator']. ' - '. $row['denumire_produs'];
    }
  }
  else {
    echo '0 rezultate';
  }
  $conectare->close();
}
?>
</body>
</html>