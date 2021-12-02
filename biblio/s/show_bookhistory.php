<html>
<body>
<table><tbody>
<?php
// Um Schäden nachvollziehen zu können, können alle vorherigen Ausleiher ermittelt werden.

mysql_connect("","root");
mysql_select_db("bibliothekssystem");

$idbuch = "3"; // Woyzeck

$sql = "SELECT buch.ID, 
               buch.titel AS Titel,
               CONCAT(leser.vorname, ' ', leser.name) AS Leser, 
               buchleser.von AS 'Ausgeliehen am',
               IF(buchleser.bis IS NULL , CURRENT_DATE(), buchleser.bis) AS 'Ausgeliehen bis'
		FROM buch, buchleser, leser 
		WHERE buch.ID = buchleser.IDBUCH
		AND leser.ID = buchleser.IDLESER
		AND buch.ID = $idbuch
		ORDER BY buchleser.bis ASC";

$res = mysql_query($sql);
$num = mysql_num_rows($res);
// echo "$num Datensätze gefunden<br />";

/*
while ($dsatz = mysql_fetch_assoc($res)) {
      echo $dsatz["ID"]." ".$dsatz["Titel"]." ".$dsatz["Leser"]." ".$dsatz["Ausgeliehen am"]." ".$dsatz["Ausgeliehen bis"]."<br />";
}
*/

$n = 0;
while($dsatz = mysql_fetch_assoc($res)) {
    if ($n == 0){
        echo "<tr>".PHP_EOL;
        foreach (array_keys($dsatz) as $key){
            echo "<th>".$key."</th>".PHP_EOL;
        }
        echo "</tr>".PHP_EOL;
        $n ++;
    }
    echo "<tr>".PHP_EOL;
    foreach ($dsatz as $field) {
        echo "<td>".$field."</td>".PHP_EOL;
    }
    echo "</tr>".PHP_EOL;
}


?>
</tbody></table>
</body>
</html>