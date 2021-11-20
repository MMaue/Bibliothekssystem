<?php 

session_start();

	include("connection.php");
	include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $query = $con->prepare("SELECT name 
        FROM autor
        WHERE name = ?
        LIMIT 1");
        $query->bind_param('s', $_POST["autor"]);
        $query->execute();
        $query->bind_result($autor);
        $res = $query->fetch();
        if ($res < 0) { // wenn autor nicht vorhanden -> hinzufügen
            $query->close();
            $query = $con->prepare("INSERT INTO autor (name) VALUES(?)");
            $query->bind_param('s', $_POST["autor"]);
            $query->execute();
        }
        $query->close();
        $query = $con->prepare("SELECT name 
        FROM verlag
        WHERE name = ?
        LIMIT 1");
        $query->bind_param('s', $_POST["verlag"]);
        $query->execute();
        $query->bind_result($verlag);
        $res = $query->fetch();
        if ($res < 0) { // wenn verlag nicht vorhanden -> hinzufügen
            $query->close();
            $query = $con->prepare("INSERT INTO verlag (name) VALUES(?)");
            $query->bind_param('s', $_POST["verlag"]);
            $query->execute();
        }

        $query->close();
        $query = $con->prepare("SELECT ANR FROM autor WHERE name = ? LIMIT 1");
        $query->bind_param('s', $_POST["autor"]);
        $query->execute();
        $query->bind_result($anr);

        $query->close();
        $query = $con->prepare("SELECT VNR FROM verlag WHERE name = ? LIMIT 1");
        $query->bind_param('s', $_POST["verlag"]);
        $query->execute();
        $query->bind_result($vnr);

        $query->close();
        $query = $con->prepare("INSERT INTO buch (ANR, titel, VNR, jahr, ort, isbn, sachgebiet) VALUES(?, ?, ?, ?, ?, ?, ?)");
        $query->bind_param('sssssss', $anr, $_POST["titel"], $VNR, $_POST["jahr"], $_POST["ort"], $_POST["isbn"], $_POST["sachgebiet"]);
        $query->execute();

        $query->close();
    }
    
?>

<!DOCTYPE html>
<html lang="de">
	<meta charset="utf-8">
	<link href='style.css' rel='stylesheet' type='text/css'>
<head>
	<title>Bibliothek - Buch hinzufügen</title>
</head>

<body>
<?php create_header('./'); ?>
<h1>Buch hinzufügen</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
	<div style="font-size: 20px;margin: 10px;color: white;">Buchdaten eintragen</div>
    <table class="invisible"><tbody>
	<tr><td>Autor: </td><td><input id="text" type="text" name="autor"></td></tr>
    <tr><td>Titel: </td><td><input id="text" type="text" name="titel"></td></tr>
    <tr><td>Verlag: </td><td><input id="text" type="text" name="verlag"></td></tr>
    <tr><td>Jahr: </td><td><input id="text" type="text" name="jahr"></td></tr>
	<tr><td>Ort: </td><td><input id="text" type="text" name="ort"></td></tr>
    <tr><td>ISBN: </td><td><input id="text" type="text" name="isbn"></td></tr>    
    <tr><td>Sachgebiet: </td><td><input id="text" type="text" name="sachgebiet"></td></tr>
</tbody></table><br><br>
	<input id="button" type="submit" value="In Datenbank Einfügen"><br>
	<?php echo $error; ?><br>
</form>

<table class="farbig"><tbody>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $sql = "SELECT autor.name AS Autor, buch.titel AS Titel, verlag.name AS Verlag, buch.jahr AS Jahr, buch.ort AS Ort, buch.isbn AS ISBN, buch.sachgebiet AS Sachgebiet
    FROM autor, buch, verlag
    WHERE autor.ANR = buch.ANR
    AND verlag.VNR = buch.VNR
    ORDER BY buch.ID DESC
    LIMIT 1";
	$result = $con->query($sql);
	create_table($result);
}
?>
</tbody></table>
</body>
</html>
