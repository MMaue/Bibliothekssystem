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
$sql = "SELECT buch.ID, buch.titel AS Titel, buch.isbn AS ISBN, CONCAT(leser.vorname, ' ', leser.name) AS Leser, buchleser.von AS 'Ausgeliehen am', ABS(DATEDIFF(CURRENT_DATE(), buchleser.von)) AS 'Dauer in Tagen'
		FROM buch, buchleser, leser 
		WHERE buch.ID = buchleser.IDBUCH
		AND leser.ID = buchleser.IDLESER
		AND buchleser.bis IS NULL
		ORDER BY buch.ID ASC";
	$result = $con->query($sql);
	create_table($result);
?>
</tbody></table>

</body>
</html>