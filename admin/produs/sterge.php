<html>
<head>
<link rel="stylesheet" type="text/css" href="../style.css">
<title>Sterge date</title>
</head>
<body>
<div class="container">
	     <a href="../index.php" class="btn-gradient purple large">Acasa</a>		
	</div>
<?php
 include("config.php"); 
$query = "SELECT * from produs";
$rezultat = mysqli_query($conectare,$query);?>
<table>
<tr>
<th>Cod</th>
<th>Nume producator</th>
<th>Denumire produs</th>
<th>Specificatii produs</th>
<th>Pret produs</th>
<th>Cod raion</th>
<th>Cod client</th>
</tr>
<?php 
while($row = mysqli_fetch_array($rezultat))
{?>
<tr>
<td><? echo $row['cod_produs']; ?></td>
<td><? echo $row['nume_producator']; ?></td>
<td><? echo $row['denumire_produs']; ?></td>
<td><? echo $row['specificatii_produs']; ?></td>
<td><? echo $row['pret_produs']; ?></td>
<td><? echo $row['cod_raion']; ?></td>
<td><? echo $row['cod_client']; ?></td>
<td><a href="delete.php?cod=<? echo $row['cod_produs']; ?>">Sterge</a></td>
</tr>
<?php
}
?>
</table>
</body>
</html>
<?php
mysqli_close($conectare);
?>