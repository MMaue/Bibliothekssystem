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
	<title>Bibliothek - Buch leihen</title>
</head>

<body>
<?php create_header('./'); ?>
<h1>Buch leihen</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
	<div style="font-size: 20px;margin: 10px;color: white;">Nutzerdaten eintragen</div>
    <table class="invisible"><tbody>
	<tr><td>BuchID: </td><td><input id="text" type="text" name="buchid"></td></tr>
    <tr><td>LeserID: </td><td><input id="text" type="text" name="leserid"></td></tr>
    <tr><td>Ausgeliehen am: </td><td><input type="date" name="von" value=<?php date_default_timezone_set('Europe/Paris')/*'1.0/no DST'*/ ; echo date("Y-m-d");?>></td></tr>
    </tbody></table><br><br>
	<input id="button" type="submit" value="In Datenbank Einfügen"><br>
</form>

<table class="farbig"><tbody>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $query = $con->prepare("INSERT INTO buchleser (IDBUCH, IDLESER, von) VALUES(?, ?, ?)");
    $query->bind_param('iis', $_POST["buchid"], $_POST["leserid"], $_POST["von"]);
    $query->execute();
    $query->close();    

	$result = $con->query("SELECT * FROM buchleser ORDER BY von DESC LIMIT 1");
	create_table($result);
}
?>
</tbody></table>
</body>
</html>
