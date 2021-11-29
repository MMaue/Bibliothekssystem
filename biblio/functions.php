<?php

function get_title_of_file($name) {
	$file_content = file_get_contents($name);
	$part1 = explode("<title>", $file_content);
	$part2 = explode("</title>", $part1[1]);
	$part3 = explode(" - ", $part2[0]);
	return $part3[1];

	/* 
	$myfile = fopen("new_buch.php", "r") or die("Unable to open file!");
	echo fread($myfile,filesize("new_buch.php"));
	fclose($myfile);
	*/ 
	/* 
	$fh = fopen('new_buch.php','r');
	while ($line = fgets($fh)) {
	  // <... Do your work with the line ...>
	  echo($line);
	}
	fclose($fh);
	*/
}

function create_linktable($path) {
	//$n = 1;
	$files = array_diff(scandir('./'), array('.', '..'));	
	foreach($files as $file) {
		$end = explode(".", $file);
		if ($end[1] == "php") {
			$name = get_title_of_file($file);
			if ($name != "") {
				echo "<td><a href='$file'>$name</a></td>";
			}
			//$n++;
		}
	}
}

function create_header($path) {
	echo "<header role=\"banner\">
	<div >
	<table class=\"links\" border=\"0\"><tbody>
	<tr>
	<th><a href=\"https://github.com/MMaue/Bibliothekssystem\" aria-label=\"Source Code\">
	<svg height=\"32\" aria-hidden=\"true\" viewBox=\"0 0 16 16\" version=\"1.1\" width=\"32\" data-view-component=\"true\" class=\"octicon octicon-mark-github v-align-middle\">
	<path style=\"fill:#335ECB;\" fill-rule=\"evenodd\" d=\"M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z\"></path>
	</svg>
	</a></th>";
    create_linktable($path);
    echo "</tr>
	</tbody></table>
	</div>
	</header>";
}

function get_post_var($var) {
	// to prevent Cross Site Scripting in forms
	// trim removes spaces
	// stripslashes removes slashes
	// htmlspecialchars interprets code-specialchars as chars
	return htmlspecialchars(stripslashes(trim($_POST[$var])));
}

function create_options($result) {
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()) {
			foreach ($row as $field) {
				echo "<option>".$field."</option>".PHP_EOL;
			}
		}
	}
	else {
		echo $con->error;
	}
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
