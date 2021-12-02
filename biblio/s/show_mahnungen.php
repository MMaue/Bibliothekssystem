<html>
<body>
<table><tbody>
<?php
// Bei zu langer Ausleihe erfolgt eine Mahnung an den Leser. Das muss vermerkt werden.

mysql_connect("","root");
mysql_select_db("bibliothekssystem");

$sql = "SELECT leser.ID AS ID, 
               CONCAT(leser.vorname, ' ', leser.name) AS Leser, 
               COUNT(*) AS Mahnungen
        FROM buchleser, leser
        WHERE buchleser.IDLESER = leser.ID
        AND IF( buchleser.bis IS NULL ,
                ABS( DATEDIFF( CURRENT_DATE( ) , buchleser.von ) ), 
                ABS( DATEDIFF( buchleser.bis, buchleser.von ) ) )>30
        GROUP BY leser.ID
        ORDER BY Mahnungen DESC";

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