<?php
require_once('../include/config.php');
require_once '../include/functii.php';
$editFormAction = $_SERVER['PHP_SELF'];
 if (isset($_SERVER['QUERY_STRING']))
  {
   $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
  }

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = sprintf("INSERT INTO poll (id, question) VALUES (%s, %s)",
                       GetSQLValueString($conectare,$_POST['id'], "int"),
                       GetSQLValueString($conectare,$_POST['Poll'], "text"));

  mysqli_select_db($conectare,$database_conectare);
  $Result1 = mysqli_query($conectare,$insertSQL) or die(mysql_error());

  $insertGoTo = "results.php";
  if (isset($_SERVER['QUERY_STRING']))
   {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$colname_rs_vote = "-1";
if (isset($_GET['recordID']))
 {
  $colname_rs_vote = $_GET['recordID'];
}

mysqli_select_db($conectare,$db);
$query_rs_vote = sprintf("SELECT * FROM poll WHERE id = %s", GetSQLValueString($conectare,$colname_rs_vote, "int"));
$rs_vote = mysqli_query($conectare,$query_rs_vote) or die(mysql_error());
$row_rs_vote = mysqli_fetch_assoc($rs_vote);
$totalRows_rs_vote = mysqli_num_rows($rs_vote);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link rel="stylesheet" href="../stiluri/style.css"/>
</head>
<body>
<fieldset>
	<legend>Care este marca dvs.favorita?</legend>
	
	<form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST">
    
    <label>
    	<input type="radio" name="Poll" value="samsung" id="Poll_0" />
     	Samsung
     </label>
     
    <label>
    	<input type="radio" name="Poll" value="lg" id="Poll_1" />
      	Lg
    </label>
    
    <label>
    	<input type="radio" name="Poll" value="sony" id="Poll_2" />
		Sony
	</label>
	
    <label>
    	<input type="radio" name="Poll" value="toshiba" id="Poll_3" />
		Toshiba
	</label>

    <label>
    	<input type="radio" name="Poll" value="other" id="Poll_4" />
		Other
	</label>

    <input type="submit" name="submit" id="submit" value="Vote" />
    
	<input type="hidden" name="id" value="form1" />
	
	<input type="hidden" name="MM_insert" value="form1" />
</form>
</fieldset>
</body>
</html>
<?php
mysqli_free_result($rs_vote);
?>