<?php

function create_hash($password) {
	$r = hash('sha256', 'pass', false);
	echo $r."<br>";
	return $pwhash;

	// $command = escapeshellcmd("create_hash.py $password");
	// $pwhash = shell_exec($command);
	/* python - create_hash.py
	import sys
	import hashlib

	print(hashlib.sha256(bytes(sys.argv[1], encoding='utf-8')).hexdigest())

	*/
}

function create_linktree() {
	/* should generate something like:

	<td><a href="index.php">Index</a></td>
    <td><a href="search.php">Suchen</a></td>
    <td><a href="execsql.php">SQL ausführen</a></td>
    <td><a href="verliehen.php">Verliehen</a></td>
    <td><a href="login.php">History</a></td>
    <td><a href="mahnungen.php">Mahnungen</a></td>
    <td><a href="signup.php">Registrieren</a></td>
    <td><a href="login.php">Einloggen</a></td>
    <td><a href="logout.php">Ausloggen</a></td>
	 */
	echo "not finished"
}

function get_post_var($var) {
	// to prevent Cross Site Scripting in forms
	// trim removes spaces
	// stripslashes removes slashes
	// htmlspecialchars interprets code-specialchars as chars
	return htmlspecialchars(stripslashes(trim($_POST[$var])));
}

function create_table($result) {
	// $result = $con->query($sql_query);
	// if more than 0 data is returned
	if($result->num_rows > 0){
		echo "Anzahl der Einträge: ".$result->num_rows.PHP_EOL;
		// $n needed for even and odd rows
		$n = 0;
		// as long as new rows are available, row is a new associative array
		while($row = $result->fetch_assoc()) {
			// first time headings are created from the keys of an assoc array
			if ($n == 0){
				echo "<tr>".PHP_EOL;
				foreach (array_keys($row) as $key){
					echo "<th>".$key."</th>".PHP_EOL;
				}
				echo "</tr>".PHP_EOL;
			}
			if ($n % 2 == 0) {
				// css gives certain classes different colors
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
	elseif ($result->num_rows == 0) {
		echo "Tabelle enthält 0 Reihen.";
	}
	else { // wird nie ausgeführt
		echo "Fehler beim erstellen einer Tabelle -->".$con->error;
	}
}

?>
