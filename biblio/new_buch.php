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
    // returns ANR or 0 if not existent
    $autors = explode(",", $_POST["autor"]);
    //$aranr = array();
    foreach($autors as $autor) {
        $query = $con->prepare("SELECT IF((SELECT COUNT(*)
                                        FROM autor
                                        WHERE name=?)>0,
                                        (SELECT ANR
                                            FROM autor
                                            WHERE name=?
                                            LIMIT 1),
                                            0)
                                FROM autor
                                LIMIT 1");
        $query->bind_param('ss', $autor, $autor);
        $query->execute();
        $query->bind_result($anr);
        while ($query->fetch()) {
            $nanr = $anr;
        }
        $query->close();

        if ($nanr == 0) { // wenn autor nicht vorhanden -> hinzufügen
            $query = $con->prepare("INSERT INTO autor (name) VALUES(?)");
            $query->bind_param('s', $autor);
            $query->execute();
            $query->close();
            // ANR wird automatisch erstellt
            $query = $con->prepare("SELECT ANR
                                    FROM autor
                                    WHERE name=?
                                    LIMIT 1");
            $query->bind_param('s', $autor);
            $query->execute();
            $query->bind_result($anr);
            while ($query->fetch()) {
                $nanr = $anr;
            }
            $query->close();
        }
    }
    // repeat process for verlag to find or create VNR
    $query = $con->prepare("SELECT IF((SELECT COUNT(*)
                                       FROM verlag
                                       WHERE name=?)>0,
                                       (SELECT VNR
                                        FROM verlag
                                        WHERE name=?
                                        LIMIT 1),
                                        0)
                            FROM verlag
                            LIMIT 1");
    $query->bind_param('ss', $_POST["verlag"], $_POST["verlag"]);
    $query->execute();
    $query->bind_result($vnr);
    while ($query->fetch()) {
        $nvnr = $vnr;
    }
    $query->close();
    if ($nvnr == 0) {
        $query = $con->prepare("INSERT INTO verlag (name) VALUES(?)");
        $query->bind_param('s', $_POST["verlag"]);
        $query->execute();
        $query->close();

        $query = $con->prepare("SELECT VNR
                                FROM verlag
                                WHERE name=?
                                LIMIT 1");
        $query->bind_param('s', $_POST["verlag"]);
        $query->execute();
        $query->bind_result($vnr);
        while ($query->fetch()) {
            $nvnr = $vnr;
        }
        $query->close();
    }
    // insert new data into buch
    $query = $con->prepare("INSERT INTO buch (titel, VNR, jahr, ort, isbn) VALUES(?, ?, ?, ?, ?)");
    $query->bind_param('ssiss', $_POST["titel"], $nvnr, $_POST["jahr"], $_POST["ort"], $_POST["isbn"]);
    $query->execute();
    $query->close();
    // get ID von diesem Eintrag
    $query = $con->prepare("SELECT ID 
                            FROM buch 
                            WHERE titel=?
                            AND VNR=?
                            AND jahr=?
                            AND ort=?
                            AND isbn=? 
                            ORDER BY ID DESC 
                            LIMIT 1");
    $query->bind_param('ssiss', $_POST["titel"], $nvnr, $_POST["jahr"], $_POST["ort"], $_POST["isbn"]);
    $query->execute();
    $query->bind_result($id);
        while ($query->fetch()) {
            $nid = $id;
        }
    $query->close();
    // insert ANRs in buchautor
    foreach($autors as $autor) {
        $query = $con->prepare("SELECT ANR
                                FROM autor
                                WHERE name=?
                                LIMIT 1");
        $query->bind_param('s', $autor);
        $query->execute();
        $query->bind_result($anr);
        while ($query->fetch()) {
            $nanr = $anr;
        }
        $query->close();
        $query = $con->prepare("INSERT INTO buchautor (ANR, IDBUCH) VALUES(?, ?)");
        $query->bind_param('ii', $nanr, $nid);
        $query->execute();
        $query->close();
    }
    // $_POST["sachgebiet"]
    $sachgebiete = explode(",", $_POST["sachgebiet"]);
    foreach($sachgebiete as $sachgebiet) {
        $query = $con->prepare("SELECT IF((SELECT COUNT(*)
                                        FROM sachgebiet
                                        WHERE name=?)>0,
                                        (SELECT SNR
                                            FROM sachgebiet
                                            WHERE name=?
                                            LIMIT 1),
                                            0)
                                FROM sachgebiet
                                LIMIT 1");
        $query->bind_param('ss', $sachgebiet, $sachgebiet);
        $query->execute();
        $query->bind_result($snr);
        while ($query->fetch()) {
            $nsnr = $snr;
        }
        $query->close();

        if ($nsnr == 0) { // wenn sachgebiet nicht vorhanden -> hinzufügen
            $query = $con->prepare("INSERT INTO sachgebiet (name) VALUES(?)");
            $query->bind_param('s', $sachgebiet);
            $query->execute();
            $query->close();
            // SNR wird automatisch erstellt
            $query = $con->prepare("SELECT SNR
                                    FROM sachgebiet
                                    WHERE name=?
                                    LIMIT 1");
            $query->bind_param('s', $sachgebiet);
            $query->execute();
            $query->bind_result($snr);
            while ($query->fetch()) {
                $nsnr = $snr;
            }
            $query->close();
        }
    }
    // buchgebiet beziehungstabelle füllen
    foreach($sachgebiete as $sachgebiet) {
        $query = $con->prepare("SELECT SNR
                                FROM sachgebiet
                                WHERE name=?
                                LIMIT 1");
        $query->bind_param('s', $sachgebiet);
        $query->execute();
        $query->bind_result($snr);
        while ($query->fetch()) {
            $nsnr = $snr;
        }
        $query->close();
        $query = $con->prepare("INSERT INTO buchgebiet (SNR, IDBUCH) VALUES(?, ?)");
        $query->bind_param('ii', $nsnr, $nid);
        $query->execute();
        $query->close();
    }
    // display db entry
    $sql = "SELECT autor.name AS Autor, buch.titel AS Titel, verlag.name AS Verlag, buch.jahr AS Jahr, buch.ort AS Ort, buch.isbn AS ISBN, sachgebiet.name AS Sachgebiet
    FROM autor, buchautor, buch, verlag, buchgebiet, sachgebiet
    WHERE autor.ANR = buchautor.ANR
    AND buchautor.IDBUCH = buch.ID
    AND verlag.VNR = buch.VNR
    AND sachgebiet.SNR = buchgebiet.SNR
    AND buchgebiet.IDBUCH = buch.ID
    AND buch.ID = $nid
    ORDER BY buch.ID DESC";
	$result = $con->query($sql);
	create_table($result);
}
?>
</tbody></table>
</body>
</html>
