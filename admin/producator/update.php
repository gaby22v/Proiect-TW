<html>
<head>
<link rel="stylesheet" type="text/css" href="../style.css">
<title>Modificare date</title>
</head>
<body>
<div class="container">
	     <a href="../index.php" class="btn-gradient purple large">Acasa</a>		
	</div>
</body>
</html>
<?php
include("config.php");
$sql="SELECT * FROM producator";
$result=mysqli_query($conectare,$sql);
?>
<table>
<tr>
<th>Cod</th>
<th>Nume </th>
<th>Telefon</th>
<th>Adresa</th>
</tr>
<?php
while($row=mysqli_fetch_array($result))
{
?>
<tr>
<td><? echo $row['cod_producator']; ?></td>
<td><? echo $row['nume_producator']; ?></td>
<td><? echo $row['telefon_producator']; ?></td>
<td><? echo $row['adresa_producator']; ?></td>
<td><a href="edit.php?cod=<? echo $row['cod_producator']; ?>">Edit</a></td>
</tr>
<?php
}
?>
</table>
<?php
mysqli_close($conectare);
?>