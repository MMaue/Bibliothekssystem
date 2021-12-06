<?php
//tests
?>
<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "bibliothekssystem";

//error_reporting(0);

$con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
if($con->connect_error) {
	echo "<img src=\"red_x_wiki.svg\" alt=\"NOT Connected\"  width=\"25px\" height=\"25px\"/> NOT connected";
	//die("failed to connect<br>".$con->connect_error);
}
else {
	echo "<img src=\"green_tick_wiki.svg\" alt=\"Connected\"  width=\"25px\" height=\"25px\"/> connected";
}
?>