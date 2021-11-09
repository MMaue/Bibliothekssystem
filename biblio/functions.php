<?php

function check_login($con) {
	if(isset($_SESSION['user_id'])) {
		$id = $_SESSION['user_id'];
		$query = "select * from leser where id = '$id' limit 1";
		// $result = mysqli_query($con,$query);
		$result = $con->query($query);
		if($result && mysqli_num_rows($result) > 0) {
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}
	//redirect to login
	header("Location: login.php");
	die;
}

function get_post_var($var) {
	// prevent Cross Site Scripting in forms
	// trim removes spaces
	// stripslashes removes slashes
	// htmlspecialchars interprets code-specialchars as chars
	return htmlspecialchars(stripslashes(trim($_POST[$var])));
}

function create_table($result) { // $result = $con->query($sql_query);
	if($result->num_rows > 0){ // if more than 0 data is returned
		echo "Anzahl der Einträge: ".$result->num_rows.PHP_EOL; // number of rows is displayed
		$n = 0;
		while($row = $result->fetch_assoc()) { // as long as new rows are available, row is a new associative array
			if ($n == 0){ // first time headings are created from the keys of an assoc array
				echo "<tr>".PHP_EOL;
				foreach (array_keys($row) as $key){
					echo "<th>".$key."</th>".PHP_EOL;
				}
				echo "</tr>".PHP_EOL;
			}
			if ($n % 2 == 0) { // $n needed for even and odd rows
				echo "<tr class=\"even\">".PHP_EOL; // css gives certain classes different colors
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
