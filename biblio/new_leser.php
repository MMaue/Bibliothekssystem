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
	<title>Bibliothek</title>
</head>

<body>
<h1>Registrieren</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
	<div style="font-size: 20px;margin: 10px;color: white;">Nutzerdaten eintragen</div>
    <table class="invisible"><tbody>
	<tr><td>Vorname: </td><td><input id="text" type="text" name="vorname" placeholder="Max"></td></tr>
    <tr><td>Name: </td><td><input id="text" type="text" name="name" placeholder="Mustermann"></td></tr>
    <tr><td>Geburtsdatum: </td><td><input type="date" name="gebdate" value="2003-01-01"></td></tr>
    <tr><td>Mail: </td><td><input id="text" type="text" name="mail" placeholder="maxm@gmail.com"></td></tr>
	<tr><td>Passwort: </td><td><input id="text" type="password" name="password" placeholder="passwort"></td></tr>
    </tbody></table><br><br>
	<input id="button" type="submit" value="Registrieren"><br><br>
    <a href="index.php">Schon registriert? --> Login</a>
	<?php echo $error; ?><br>
</form>

<table class="farbig"><tbody>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
    /*
    ! Der Passwort-Hash wird hier ohne Salt oder Pepper erstellt und gespeichert.
    ! Diese Datenbank sollte nur für Bildungszwecke genutzt werden, da sonst mit Rainbowtables 
    ! schlechte Passwörter einfach herausgefunden werden können.
    */
    $query = $con->prepare("INSERT INTO leser (vorname, name, geburtsdatum, mail, pwhash) VALUES(?, ?, ?, ?, ?)");
    $password = $_POST["password"];
    //create the pwhash using sha256
    $pwhash = hash('sha256', $password, false);
    // 8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918
    $query->bind_param('sssss', $_POST["vorname"], $_POST["name"], $_POST["gebdate"], $_POST["mail"], $pwhash);
    $query->execute();
    $query->close();

    // $command = escapeshellcmd("create_hash.py $password");
	// $pwhash = shell_exec($command);
	/* python - create_hash.py
	import sys
	import hashlib

	print(hashlib.sha256(bytes(sys.argv[1], encoding='utf-8')).hexdigest())
	*/

    /*
    $hashed = password_hash($password, PASSWORD_DEFAULT);
	// $2y$10$.vGA1O9wmRjrwAVXD98HNOgsNpDczlqm3Jq7KnEd1rVAGv3Fykk1a
	if (password_verify($password, $hashed)) {
	    echo "eingeloggt";
	}
    */

	$result = $con->query("SELECT * FROM leser ORDER BY id DESC LIMIT 1");
	create_table($result);
}
?>
</tbody></table>
</body>
</html>
