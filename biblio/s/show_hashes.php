<?php
// <###title>Bibliothek - Salt?</title>

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "bibliothekssystem";

//error_reporting(0);

$con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

$sql = "SELECT leser.pwhash
        FROM leser
        ORDER BY leser.ID ASC";
$result = $con->query($sql);
while($row = $result->fetch_assoc()) {
    echo $row['pwhash']."<br>";
}

echo "<br><br><a href='https://crackstation.net/'>Crackstation</a>"
?>
