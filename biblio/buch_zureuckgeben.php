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
	<title>Bibliothek - Buch zurückgeben</title>
</head>

<body>
<?php create_header('./'); ?>
<h1>Buch zurückgeben</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
	<div style="font-size: 20px;margin: 10px;color: white;">Nutzerdaten eintragen</div>
    <table class="invisible"><tbody>
	<tr><td>BuchID: </td><td><input id="text" type="text" name="buchid"></td></tr>
    <tr><td>LeserID: </td><td><input id="text" type="text" name="leserid"></td></tr>
    <tr><td>Zurückgeben am: </td><td><input type="date" name="bis" value=<?php date_default_timezone_set('Europe/Paris')/*'1.0/no DST'*/ ; echo date("Y-m-d");?>></td></tr>
    </tbody></table><br><br>
	<input id="button" type="submit" value="In Datenbank Einfügen"><br>
</form>

<table class="farbig"><tbody>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $query = $con->prepare("UPDATE buchleser SET bis = ? WHERE IDBUCH = ? AND IDLESER = ? AND bis IS NULL");
    $query->bind_param('sii', $_POST["bis"], $_POST["buchid"], $_POST["leserid"]);
    $query->execute();
    $query->close();    

	$result = $con->query("SELECT * FROM buchleser ORDER BY bis DESC LIMIT 1");
	create_table($result);
}
?>
</tbody></table>
</body>
</html>
