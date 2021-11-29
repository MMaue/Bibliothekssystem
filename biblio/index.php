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
	<tr><td>Sachgebiet: </td><td><input id="text" type="text" name="sachgebiet" list="sugsa" value=<?php if (isset($_POST['sachgebiet'])) { echo $_POST['sachgebiet'];}?>></td></tr>
    <tr><td>Autor: </td><td><input id="text" type="text" name="autor" list="sugau" value=<?php if (isset($_POST['autor'])) { echo $_POST['autor'];}?>></td></tr>
    <tr><td>Titel: </td><td><input id="text" type="text" name="titel" list="sugti" value=<?php if (isset($_POST['titel'])) { echo $_POST['titel'];}?>></td></tr>
    <tr><td>Erscheinungsort: </td><td><input id="text" type="text" name="ort" list="sugor" value=<?php if (isset($_POST['ort'])) { echo $_POST['ort'];}?>></td></tr>
	<tr><td>Erscheinungsjahr: </td><td><input id="text" type="text" name="jahr" list="sugja" value=<?php if (isset($_POST['jahr'])) { echo $_POST['jahr'];}?>></td></tr>
    <tr><td>Verlag: </td><td><input id="text" type="text" name="verlag" list="sugve" value=<?php if (isset($_POST['verlag'])) { echo $_POST['verlag'];}?>></td></tr>
</tbody></table><br>
<datalist id="sugsa">
  <?php 
  $result = $con->query("SELECT DISTINCT name FROM sachgebiet ORDER BY name ASC");
  create_options($result);
  ?>
</datalist>
<datalist id="sugau">
  <?php 
  $result = $con->query("SELECT DISTINCT name FROM autor ORDER BY name ASC");
  create_options($result);
  ?>
</datalist>
<datalist id="sugti">
  <?php 
  $result = $con->query("SELECT DISTINCT titel FROM buch ORDER BY titel ASC");
  create_options($result);
  ?>
</datalist>
<datalist id="sugor">
  <?php 
  $result = $con->query("SELECT DISTINCT ort FROM buch ORDER BY ort ASC");
  create_options($result);
  ?>
</datalist>
<datalist id="sugja">
  <?php 
  $result = $con->query("SELECT DISTINCT jahr FROM buch ORDER BY jahr ASC");
  create_options($result);
  ?>
</datalist>
<datalist id="sugve">
  <?php 
  $result = $con->query("SELECT DISTINCT name FROM verlag ORDER BY name ASC");
  create_options($result);
  ?>
</datalist>
	<input id="button" type="submit" value="Datenbank durchsuchen"><br>
	<?php echo $error; ?><br>
</form>

<table class="farbig"><tbody>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
	$sachgebiet = mysqli_real_escape_string($con, $_POST["sachgebiet"]);
	$autor = mysqli_real_escape_string($con, $_POST["autor"]);
	$titel = mysqli_real_escape_string($con, $_POST["titel"]);
	$ort = mysqli_real_escape_string($con, $_POST["ort"]);
	$jahr = mysqli_real_escape_string($con, $_POST["jahr"]);
	$verlag = mysqli_real_escape_string($con, $_POST["verlag"]);
	
	$query = "SELECT DISTINCT buch.titel AS Titel
			  FROM autor, buchautor, buch, verlag, buchgebiet, sachgebiet
			  WHERE autor.ANR = buchautor.ANR
			  AND buchautor.IDBUCH = buch.ID
			  AND verlag.VNR = buch.VNR
			  AND sachgebiet.SNR = buchgebiet.SNR
			  AND buchgebiet.IDBUCH = buch.ID
			  AND sachgebiet.name LIKE '%$sachgebiet%' 
			  AND autor.name LIKE '%$autor%'
			  AND buch.titel LIKE '%$titel%'
			  AND buch.ort LIKE '%$ort%'
			  AND buch.jahr LIKE '%$jahr%'
			  AND verlag.name LIKE '%$verlag%'
			  ORDER BY buch.titel ASC";
	$result = $con->query($query);
	create_table($result);

	/* 
	$sachgebiet = $_POST["sachgebiet"];
	$autor = $_POST["autor"];
	$titel = $_POST["titel"];
	$ort = $_POST["ort"];
	$jahr = $_POST["jahr"];
	$verlag = $_POST["verlag"];
	
	$query = $con->prepare("SELECT DISTINCT buch.titel, 'Some string'
							FROM autor, buchautor, buch, verlag, buchgebiet, sachgebiet
							WHERE autor.ANR = buchautor.ANR
    						AND buchautor.IDBUCH = buch.ID
							AND verlag.VNR = buch.VNR
							AND sachgebiet.SNR = buchgebiet.SNR
							AND buchgebiet.IDBUCH = buch.ID
							AND sachgebiet.name LIKE '%?%' 
							AND autor.name LIKE '%?%'
							AND buch.titel LIKE '%?%'
							AND buch.ort LIKE '%?%'
							AND buch.jahr LIKE '%?%'
							AND verlag.name LIKE '%?%'
							ORDER BY buch.titel ASC");
    $query->bind_param('sssiss', $sachgebiet, $autor, $titel, $ort, $jahr, $verlag);
	//$query->bind_param('sssiss', $_POST["sachgebiet"], $_POST["autor"], $_POST["titel"], $_POST["ort"], $_POST["jahr"], $_POST["verlag"]);
    $query->execute();
	$result = array();
    $query->bind_result($res);
    while ($query->fetch()) {
		array_push($result, $res);
    }
    $query->close();
	create_table($result); */
}
?>
</tbody></table>
</body>
</html>
