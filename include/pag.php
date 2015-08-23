<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Paginare</title>
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link rel="stylesheet" href="stiluri/style.css"/>
</head>
<body>
<table border="1">
<tr>
<th>Cod</th>
<th>Producator</th>
<th>Denumire</th>
<th>Specificatii</th>
<th>Pret</th>
</tr>
<?php
include("config.php");
$sql = "SELECT COUNT(*) FROM `produs`";  
$result = mysqli_query($conectare, $sql) or trigger_error(E_USER_ERROR);  
$r = mysqli_fetch_row($result);  
$numrows = $r[0];   
$rowsperpage = 10;  
$totalpages = ceil($numrows / $rowsperpage);		
if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage']))
 {  
  $currentpage = (int) $_GET['currentpage'];  
}
 else 
{  
  $currentpage = 1;  
}
if ($currentpage > $totalpages) 
{    
  $currentpage = $totalpages;  
}   
if ($currentpage < 1) 
{     
  $currentpage = 1;  
}  
$offset = ($currentpage - 1) * $rowsperpage;   
$sql = "SELECT cod_produs,nume_producator,denumire_produs,specificatii_produs,pret_produs FROM `produs` LIMIT $offset, $rowsperpage";  
$result = mysqli_query($conectare, $sql);   
while ($list = mysqli_fetch_assoc($result))
 {  
  // Stocheaza datele returnate de MySQL in variabile array pt. fiecare coloana
  $id[] = $list['cod_produs'];
  $nume[] = $list['nume_producator'];
  $produs[] = $list['denumire_produs'];
  $specificatii[] = $list['specificatii_produs'];
  $pret[] = $list['pret_produs'];
  
}
mysqli_close($conectare);
for($i=0; $i<count($id); $i++)
 {
 	
  // Aici puteti adauga cod HTML pentru aspectul grafic al afisarii
  echo "<tr>";
  echo "<th>" .$id[$i]. "</th> ";
  echo "<th>" . $nume[$i]. "</th>";
  echo "<th>" .$produs[$i]. "</th>";
  echo "<th>" .$specificatii[$i]. "</th>";
  echo "<th>" .$pret[$i]."</th>";
  echo "</tr>";
} 
$range = 3;
if ($currentpage > 1) {  
  // arata << pt. link la prima pagina  
  echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=1'>&lt;&lt;</a> &nbsp; ";  
  // obtine nr. pagina din urma 
  $prevpage = $currentpage - 1;  
  // arata < pt. link la o pagina in urma 
  echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'>&lt;</a> &nbsp;";  
} 
 
// definirea link-urilor din raza paginii curente
for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {  
  // daca e un nr. de pagina valid ... 
  if (($x > 0) && ($x <= $totalpages)) {  
	 // daca nr. e pagina curenta ...  
	 if ($x == $currentpage) {  
		// afiseaza nr. pagina fara a fi link  
		echo " [<b>$x</b>] ";  
	 // daca nr. nu e pagina curenta ...  
	 } else {  
		// il face link  
	echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$x'>$x</a> ";  
	 }  
  }
}
		  
// Daca pagina curenta nu e ultima, afiseaza link inainte si spre ultima pagina
if ($currentpage != $totalpages) {  
  // obtine pagina urmatoare 
  $nextpage = $currentpage + 1;  
   // arata > pt. urmatoarea pagina   
  echo "&nbsp; <a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'>&gt;</a> ";  
  //  arata >> pt. ultima pagina
  echo " &nbsp; <a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages'>&gt;&gt;</a> ";  
}
?>
</table>
</body>
</html>