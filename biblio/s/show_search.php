<html>
<body>
<table><tbody>
<?php
// In der Bibliothek müssen Bücher erfasst werden. 
// Eine Suche ist möglich über Sachgebiet, Autor, Titel, Erscheinungsort und –jahr, Verlag.

$sachgebiet = "Physik";
$autor = "";
$titel = "";
$ort = "";
$jahr = "";
$verlag = "";

mysql_connect("","root");
mysql_select_db("bibliothekssystem");

$sql = "SELECT DISTINCT buch.titel AS Titel
        FROM autor, buchautor, buch, verlag, buchgebiet, sachgebiet
        WHERE autor.ANR = buchautor.ANR
        AND buchautor.IDBUCH = buch.ID
        AND verlag.VNR = buch.VNR
        AND sachgebiet.SNR = buchgebiet.SNR
        AND buchgebiet.IDBUCH = buch.ID
        AND sachgebiet.name LIKE '%$sachgebiet%' 
        AND autor.name LIKE '%$autor%'
        AND buch.titel LIKE '%$titel%'
        AND buch.ort LIKE '%$ort%'
        AND buch.jahr LIKE '%$jahr%'
        AND verlag.name LIKE '%$verlag%'
        ORDER BY buch.titel ASC";

$res = mysql_query($sql);
$num = mysql_num_rows($res);
// echo "$num Datensätze gefunden<br />";

while ($dsatz = mysql_fetch_assoc($res)) {
    echo $dsatz["Titel"]."<br />";
}

/*
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
*/

?>
</tbody></table>
</body>
</html>