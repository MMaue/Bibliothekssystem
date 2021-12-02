<html>
<body>
<table><tbody>
<?php
// Für ein Buch kann herausgefunden werden, ob es zur Zeit verfügbar ist.

mysql_connect("","root");
mysql_select_db("bibliothekssystem");

$sql = "SELECT DISTINCT buch.titel, buch.isbn
        FROM buch, buchleser
        WHERE buchleser.IDBUCH = buch.ID
        AND buchleser.bis IS NOT NULL
        ORDER BY buch.titel ASC";

$res = mysql_query($sql);
$num = mysql_num_rows($res);
// echo "$num Datensätze gefunden<br />";

/*
while ($dsatz = mysql_fetch_assoc($res)) {
      echo $dsatz["Titel"]." ".$dsatz["ISBN"]."<br />";
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