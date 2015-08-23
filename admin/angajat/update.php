<html>
<head>
<link rel="stylesheet" type="text/css" href="../style.css">
<title>Modificare date</title>
</head>
<body>
</body>
<div class="container">
	     <a href="../index.php" class="btn-gradient purple large">Acasa</a>		
	</div>
</html>
<?php
include("config.php");
$sql="SELECT * FROM angajat";
$result=mysqli_query($conectare,$sql);
?>
<table>
<tr>
<th>Cod</th>
<th>Nume </th>
<th>Prenume</th>
<th>Functie</th>
<th>Salariu</th>
<th>Zile concediu</th>
<th>Telefon</th>
</tr>
<?php
while($row=mysqli_fetch_array($result))
{
?>
<tr>
<td><? echo $row['cod_angajat']; ?></td>
<td><? echo $row['nume_angajat']; ?></td>
<td><? echo $row['prenume_angajat']; ?></td>
<td><? echo $row['functie_angajat']; ?></td>
<td><? echo $row['salariu_angajat']; ?></td>
<td><? echo $row['zile_concediu']; ?></td>
<td><? echo $row['telefon_angajat']; ?></td>
<td><a href="edit.php?cod=<? echo $row['cod_angajat']; ?>">Edit</a></td>
</tr>
<?php
}
?>
</table>
<?php
mysqli_close($conectare);
?>