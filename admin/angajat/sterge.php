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
$query = "SELECT * from angajat";
$rezultat = mysqli_query($conectare,$query);?>
<table>
<tr>
<th>Cod angajat</th>
<th>Nume angajat</th>
<th>Prenume angajat</th>
<th>Functie angajat</th>
<th>Salariu angajat</th>
<th>Zile concediu</th>
<th>Telefon angajat</th>
</tr>
<?php 
while($row = mysqli_fetch_array($rezultat))
{?>
<tr>
<td><? echo $row['cod_angajat']; ?></td>
<td><? echo $row['nume_angajat']; ?></td>
<td><? echo $row['prenume_angajat']; ?></td>
<td><? echo $row['functie_angajat']; ?></td>
<td><? echo $row['salariu_angajat']; ?></td>
<td><? echo $row['zile_concediu']; ?></td>
<td><? echo $row['telefon_angajat']; ?></td>
<td><a href="delete.php?cod=<? echo $row['cod_angajat']; ?>">Sterge</a></td>
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