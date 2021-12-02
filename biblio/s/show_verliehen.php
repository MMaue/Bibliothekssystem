<html>
<body>
<table><tbody>
<?php
// Für ein Buch kann herausgefunden werden, ob es zur Zeit verliehen ist und an wem.

mysql_connect("","root");
mysql_select_db("bibliothekssystem");

$sql = "SELECT buch.ID, 
               buch.titel AS Titel, 
               buch.isbn AS ISBN, 
               CONCAT(leser.vorname, ' ', leser.name) AS Leser, 
               buchleser.von AS 'Ausgeliehen am', 
               ABS(DATEDIFF(CURRENT_DATE(), buchleser.von)) AS 'Dauer in Tagen'
        FROM buch, buchleser, leser 
        WHERE buch.ID = buchleser.IDBUCH
        AND leser.ID = buchleser.IDLESER
        AND buchleser.bis IS NULL
        ORDER BY buch.ID ASC";

$res = mysql_query($sql);
$num = mysql_num_rows($res);
// echo "$num Datensätze gefunden<br />";

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