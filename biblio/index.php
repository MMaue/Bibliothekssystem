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
	<title>Bibliothek - Suche</title>
</head>
<body>
<?php create_header('./'); ?>
<h1>Suche</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
	<div style="font-size: 20px;margin: 10px;color: white;">Suchoptionen</div>
    <table class="invisible"><tbody>
	<tr><td>Sachgebiet: </td><td><input id="text" type="text" name="sachgebiet"></td></tr>
    <tr><td>Autor: </td><td><input id="text" type="text" name="autor"></td></tr>
    <tr><td>Titel: </td><td><input id="text" type="text" name="titel"></td></tr>
    <tr><td>Erscheinungsort: </td><td><input id="text" type="text" name="ort"></td></tr>
	<tr><td>Erscheinungsjahr: </td><td><input id="text" type="text" name="jahr"></td></tr>
    <tr><td>Verlag: </td><td><input id="text" type="text" name="verlag"></td></tr>
</tbody></table><br>
	<input id="button" type="submit" value="Datenbank durchsuchen"><br>
	<?php echo $error; ?><br>
</form>

<table class="farbig"><tbody>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
	$sachgebiet = $_POST["sachgebiet"];
	$autor = $_POST["autor"];
	$titel = $_POST["titel"];
	$ort = $_POST["ort"];
	$jahr = $_POST["jahr"];
	$verlag = $_POST["verlag"];
	$query = $con->prepare("SELECT buch.titel, 'Some string'
							FROM autor, buchautor, buch, verlag, buchgebiet, sachgebiet
							WHERE autor.ANR = buchautor.ANR
    						AND buchautor.IDBUCH = buch.ID
							AND verlag.VNR = buch.VNR
							AND sachgebiet.SNR = buchgebiet.SNR
							AND buchgebiet.IDBUCH = buch.ID
							AND sachgebiet.name LIKE '%?%' 
							OR autor.name LIKE '%?%'
							OR buch.titel LIKE '%?%'
							OR buch.ort LIKE '%?%'
							OR buch.jahr LIKE '%?%'
							OR verlag.name LIKE '%?%'
							ORDER BY buch.titel ASC");
    $query->bind_param('ssssis', $sachgebiet, $autor, $titel, $ort, $jahr, $verlag);
    $query->execute();
	$result = array();
    $query->bind_result($res);
    while ($query->fetch()) {
		array_push($result, $res);
    }
    $query->close();
	create_table($result);
}
?>
</tbody></table>
</body>
</html>
