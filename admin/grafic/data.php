<?php
$con = mysqli_connect("mysql.hostinger.ro","u878335792_tw","proiect");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysqli_select_db($con,"u878335792_tw");

$sth = mysqli_query($con,"SELECT salariu_angajat FROM angajat");
$rows = array();
$rows['name'] = 'Salariu';
while($r = mysqli_fetch_array($sth)) {
    $rows['data'][] = $r['salariu_angajat'];
}

$sth = mysqli_query($con,"SELECT pret_produs FROM produs");
$rows1 = array();
$rows1['name'] = 'Pret';
while($rr = mysqli_fetch_assoc($sth)) {
    $rows1['data'][] = $rr['pret_produs'];
}

$result = array();
array_push($result,$rows);
array_push($result,$rows1);


print json_encode($result, JSON_NUMERIC_CHECK);

mysqli_close($con);
?>
