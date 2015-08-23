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
$query = "SELECT * from producator";
$rezultat = mysqli_query($conectare,$query);?>
<table>
<tr>
<th>Cod</th>
<th>Nume </th>
<th>Telefon</th>
<th>Adresa</th>
</tr>
<?php 
while($row = mysqli_fetch_array($rezultat))
{?>
<tr>
<td><? echo $row['cod_producator']; ?></td>
<td><? echo $row['nume_producator']; ?></td>
<td><? echo $row['telefon_producator']; ?></td>
<td><? echo $row['adresa_producator']; ?></td>
<td><a href="delete.php?cod=<? echo $row['cod_producator']; ?>">Sterge</a></td>
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