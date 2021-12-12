<?php 
session_start();

include("connection.php");
include("functions.php");

check_login();
if(check_admin()==false) {
	header('Location: http://'.$_SERVER['HTTP_HOST'].'/biblio/search.php');
	exit();
}

?>

<!DOCTYPE html>
<html lang="de">
	<meta charset="utf-8">
	<link href='style.css' rel='stylesheet' type='text/css'>
<head>
	<title>Bibliothek - SQL</title>
</head>

<script type="text/javascript">
<!--
function click( id ) {
  var e = document.getElementById( id );
  if( e.style.display == 'none' ) {
    e.style.display = '';
  }
  else {
    e.style.display = 'none';
  }
}
-->
</script>

<body>
<?php create_header('./'); ?>
	<h1>SQL</h1>

    <p><a href="javascript:click('schema');">Datenbankschema ein-/ausblenden</a></a>
    <div style="display:none;" id="schema"><img src="biblioschema.png" alt="Datenbankschema"  width="70%" height="60%"/></div>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<textarea id="SQLText" class="sqlquery" name="sqlfeld" cols="120" rows="10" spellcheck="false" style=" background:#3c5064; color: #000000;">
<?php 
if (isset($_POST['sqlfeld'])) {
  echo $_POST['sqlfeld'];
}
else {
  $default = "SELECT * \n\tFROM buch";
  $verfuegbar = "SELECT DISTINCT buch.titel AS Titel, autor.name AS Name, buch.isbn AS ISBN, verlag.name AS Verlag, buch.jahr AS Jahr, buch.ort AS Ort, buch.sachgebiet AS Sachgebiet \nFROM buch, buchleser, verlag, autor \nWHERE autor.ANR = buch.ANR \nAND verlag.VNR = buch.VNR \nAND buch.ID = buchleser.IDBUCH \nAND buchleser.bis != 'NULL'\n";
  $history = "SELECT buch.id AS ID, titel AS Titel, isbn AS ISBN, vorname AS Vorname, name AS Name, von, bis\nFROM buch, buchleser, leser\nWHERE buch.id = buchleser.idbuch\nAND leser.id = buchleser.idleser";
  echo $default;
}
?>
</textarea>
<p><input type="submit" value="Abschicken"></p>
</form>

<table class="farbig"><tbody>
<?php
// execute any SQL query from the textarea
if($_SERVER['REQUEST_METHOD'] == "POST") {
	//read from database 
	$query = $_POST['sqlfeld'];
	$result = $con->query($query);
	create_table($result);
}
?>
</tbody></table>
</body>
</html>
