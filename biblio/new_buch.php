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
	<title>Bibliothek</title>
</head>

<body>
<header role="banner">
    <div >
        <table border="0">
            <tr>
              <th><a href="https://github.com/MMaue/Bibliothekssystem" aria-label="Homepage ">
  		            <svg height="32" aria-hidden="true" viewBox="0 0 16 16" version="1.1" width="32" data-view-component="true" class="octicon octicon-mark-github v-align-middle">
    		            <path style="fill:#335ECB;" fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path>
		            </svg>
		        </a></th>
              <td><a href="index.php">Index</a></td>
              <td><a href="search.php">Suchen</a></td>
              <td><a href="execsql.php">SQL ausführen</a></td>
              <td><a href="verliehen.php">Verliehen</a></td>
              <td><a href="login.php">History</a></td>
              <td><a href="mahnungen.php">Mahnungen</a></td>
              <td><a href="signup.php">Registrieren</a></td>
              <td><a href="login.php">Einloggen</a></td>
              <td><a href="logout.php">Ausloggen</a></td>
            </tr>
            <tr>
            <td>Hello <?php echo $user_data['user_name']; ?></td>
            </tr>
        </table>
    </div>
</header>
	<h1>Bibliothekssystem - Buch hinzufügen</h1>

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
