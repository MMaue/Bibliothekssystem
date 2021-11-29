<?php 
session_start();

	include("connection.php");
	include("functions.php");

?>

<!DOCTYPE html>
<html lang="de">
	<meta charset="utf-8">
	<link href='style.css' rel='stylesheet' type='text/css'>
<head>
	<title>Bibliothek - Verliehen</title>
</head>
<body>
<?php create_header('./'); ?>
<h1>Verliehen</h1>

<table class="farbig"><tbody>
<?php
$sql = "SELECT leser.ID AS ID, CONCAT(leser.vorname, ' ', leser.name) AS Leser, COUNT(*) AS Mahnungen
		FROM buchleser, leser
		WHERE buchleser.IDLESER = leser.ID
		AND IF(buchleser.bis IS NULL , ABS(DATEDIFF(CURRENT_DATE(), buchleser.von)), ABS(DATEDIFF(buchleser.bis, buchleser.von)))>30
		GROUP BY leser.ID
		ORDER BY Mahnungen DESC";
	$result = $con->query($sql);
	create_table($result);
?>
</tbody></table>

</body>
</html>