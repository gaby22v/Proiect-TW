<?php
require_once('../include/config.php');
require_once '../include/functii.php';
mysqli_select_db($conectare,$db);
$query_rs_vote = "SELECT * FROM poll";
$rs_vote = mysqli_query($conectare,$query_rs_vote) or die(mysql_error());
$row_rs_vote = mysqli_fetch_assoc($rs_vote);
$totalRows_rs_vote = mysqli_num_rows($rs_vote);

$resultQuestion1 = mysqli_query($conectare,"SELECT * FROM poll WHERE question='samsung'");
$num_rowsQuestion1 = mysqli_num_rows($resultQuestion1);

$resultQuestion2 = mysqli_query($conectare,"SELECT * FROM poll WHERE question='lg'");
$num_rowsQuestion2 = mysqli_num_rows($resultQuestion2);

$resultQuestion3 = mysqli_query($conectare,"SELECT * FROM poll WHERE question='sony'");
$num_rowsQuestion3 = mysqli_num_rows($resultQuestion3);

$resultQuestion4 = mysqli_query($conectare,"SELECT * FROM poll WHERE question='toshiba'");
$num_rowsQuestion4 = mysqli_num_rows($resultQuestion4);

$resultQuestion5 = mysqli_query($conectare,"SELECT * FROM poll WHERE question='other'");
$num_rowsQuestion5 = mysqli_num_rows($resultQuestion5);

$percentQuestion1 = ($num_rowsQuestion1 / $totalRows_rs_vote)*100;
$percentQuestion2 = ($num_rowsQuestion2 / $totalRows_rs_vote)*100;
$percentQuestion3 = ($num_rowsQuestion3 / $totalRows_rs_vote)*100;
$percentQuestion4 = ($num_rowsQuestion4 / $totalRows_rs_vote)*100;
$percentQuestion5 = ($num_rowsQuestion5 / $totalRows_rs_vote)*100;

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Rezultate</title>
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link rel="stylesheet" href="../stiluri/style.css"/>
</head>
<body>
	<fieldset>	
		<legend>Rezultate</legend>		
		<ul>
			<li>
				<span class="total-votes"><?php echo $num_rowsQuestion1 ?></span> Samsung
				<br />
				<div class="results-bar" style="width: <?php echo round($percentQuestion1,2); ?>%;">
					 <?php echo round($percentQuestion1,2); ?>%
				</div>
			</li>
			
			<li>
				<span class="total-votes"><?php echo $num_rowsQuestion2 ?></span> Lg
				<div class="results-bar" style="width: <?php echo round($percentQuestion2,2); ?>%;">
					 <?php echo round($percentQuestion2,2); ?>%
				</div>
			</li>
		
			<li>
				<span class="total-votes"><?php echo $num_rowsQuestion3 ?></span> Sony
				<div class="results-bar" style="width: <?php echo round($percentQuestion3,2); ?>%;">
					 <?php echo round($percentQuestion3,2); ?>%
				</div>
			</li>
		
			<li>
				<span class="total-votes"><?php echo $num_rowsQuestion4 ?></span> Toshiba
				<div class="results-bar" style="width: <?php echo round($percentQuestion4,2); ?>%;">
					 <?php echo round($percentQuestion4,2); ?>%
				</div>
			</li>
		
			<li>
				<span class="total-votes"><?php echo $num_rowsQuestion5 ?></span> Other
				<div class="results-bar" style="width: <?php echo round($percentQuestion5,2); ?>%;">
					 <?php echo round($percentQuestion5,2); ?>%
				</div>
			</li>
		</ul>
	
		<h6>Total votes: <?php echo $totalRows_rs_vote ?></h6>
		
		<a href="index.php">Pagina principala</a>	
	</fieldset>	
</body>
</html>
<?php
mysqli_free_result($rs_vote);
?>