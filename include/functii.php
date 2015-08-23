<?php 
#fisierul in care se afla functiile folosite
if (!function_exists("GetSQLValueString"))
 {
function GetSQLValueString($conn_vote,$theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($conn_vote,$theValue) : mysqli_escape_string($conn_vote,$theValue);
  switch ($theType)
  {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
 function addentities($data)
 {
 	if(trim($data) != ''){
 		$data = htmlentities($data, ENT_QUOTES);
 		return str_replace('\\', '&#92;', $data);
 	} else return $data;
 }
?>