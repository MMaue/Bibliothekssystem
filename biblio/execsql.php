<?php 

session_start();

	include("connection.php");

?>

<!DOCTYPE html>
<html lang="de">
	<meta charset="utf-8">
	<link href='style_inf.css' rel='stylesheet' type='text/css'>
<head>
	<title>Bibliothek</title>
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
	<h1>Bibliotehkssystem - SQL</h1>

    <p><a href="javascript:click('schema');">Datenbankschema ein-/ausblenden</a></a>
    <div style="display:none;" id="schema"><img src="biblioschema.png" alt="Datenbankschema"  width="75%" height="75%"/></div>

<form method="post">
<textarea id="SQLText" name="sqlfeld" cols="120" rows="10" spellcheck="false" style=" background:#3c5064; color: #000000;">
SELECT * FROM buch
</textarea>
<p><input type="submit" value="Abschicken"></p>
</form>
<br></br>

<table class="farbig"><tbody>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	//read from database
	$query = $_POST['sqlfeld'];
	$result = $con->query($query);
	if($result->num_rows > 0){
		echo "Anzahl der Einträge: ".$result->num_rows.PHP_EOL;
		$n = 0;
		while($row = $result->fetch_assoc()){
			if ($n == 0){
				echo "<tr>".PHP_EOL;
				foreach (array_keys($row) as $key){
					echo "<th>".$key."</th>".PHP_EOL;
				}
				echo "</tr>".PHP_EOL;
			}
			if ($n % 2 == 0){
				echo "<tr class=\"even\">".PHP_EOL;
				foreach ($row as $field) {
					echo "<td>".$field."</td>".PHP_EOL;
				}
				echo "</tr>".PHP_EOL;
			}
			else {
				echo "<tr class=\"odd\">".PHP_EOL;
				foreach ($row as $field) {
					echo "<td>".$field."</td>".PHP_EOL;
				}
				echo "</tr>".PHP_EOL;
			}
			$n += 1;
		}
	}
	else {
		echo "Fehler ".$con->error;
	}
}
?>
</tbody></table>
</body>
</html>
