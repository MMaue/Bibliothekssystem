<?php 
session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST") {
	$mail = $_POST["mail"];
	$password = $_POST["password"];
    //create the pwhash using sha256
    $pwhash = hash('sha256', $password, false);
    // 8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918

	$query = $con->prepare("SELECT ID, mail, pwhash, vorname, name
							FROM leser
							WHERE mail=?
							AND pwhash=?
							LIMIT 1");
    $query->bind_param('ss', $mail, $pwhash);
    $query->execute();
    $query->bind_result($user_id, $user_mail, $user_pwhash, $user_vorname, $user_name);
    while ($query->fetch()) {
		$_SESSION["user_id"] = $user_id;
        $_SESSION["user_mail"] = $user_mail;
        $_SESSION["user_pwhash"] = $user_pwhash;
        $_SESSION["user_vorname"] = $user_vorname;
        $_SESSION["user_name"] = $user_name;
    }
	$query->close();

	if($user_id == 0) {
		echo "<h2>Passwort oder Mail falsch</h2>";
	}
	else {
		header('Location: http://'.$_SERVER['HTTP_HOST'].'/biblio/search.php');
  		exit();
	}
}
?>

<!DOCTYPE html>
<html lang="de">
	<meta charset="utf-8">
	<link href='style.css' rel='stylesheet' type='text/css'>
<head>
	<title>Bibliothek</title>
</head>
<body>
<h1>Login</h1>

<form action="#" method="post">
    <table class="invisible"><tbody>
	<tr><td>Mail: </td><td><input id="text" type="text" name="mail" placeholder="beispiel@mail.com"></td></tr>
	<tr><td>Passwort: </td><td><input id="text" type="password" name="password" placeholder="passwort"></td></tr>
</tbody></table><br>

	<input id="button" type="submit" value="Einloggen"><br><br>
	<a href="new_leser.php">Neu Registrieren</a>
</form>

</body>
</html>
