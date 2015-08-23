<?php
session_start();
set_time_limit(0);
error_reporting(E_ALL);
 $AdresaBazaDate = "mysql.hostinger.ro";
 $UtilizatorBazaDate = "u878335792_tw";
 $ParolaBazaDate = "proiect";
 $NumeBazaDate = "u878335792_tw";
 $conexiune = mysqli_connect($AdresaBazaDate,$UtilizatorBazaDate,$ParolaBazaDate) or die("Nu ma pot conecta la MySQL!");
 mysqli_select_db($conexiune,$NumeBazaDate) or die("Nu gasesc baza de date");
 function addentities($data)
 {
 	if(trim($data) != ''){
 		$data = htmlentities($data, ENT_QUOTES);
 		return str_replace('\\', '&#92;', $data);
 	} else return $data;
 }
?>