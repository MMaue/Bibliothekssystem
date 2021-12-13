<html>
<body>
<?php
    // In der Bibliothek müssen Bücher erfasst werden. 
    // Eine Suche ist möglich über Sachgebiet, Autor, Titel, Erscheinungsort und –jahr, Verlag.

    mysql_connect("","root");
    mysql_select_db("bibliothekssystem");

    $sachgebiet = $_POST["sachgebiet"];
    $autor = $_POST["autor"];
    $titel = $_POST["titel"];
    $ort = $_POST["ort"];
    $jahr = $_POST["jahr"];
    $verlag = $_POST["verlag"];

    $sqlab = "SELECT DISTINCT buch.titel AS Titel
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

    $res = mysql_query($sqlab);
    $num = mysql_num_rows($res);

    if ($num==0) echo "Keine passenden Datensätze gefunden";

    while ($dsatz = mysql_fetch_assoc($res)) {
        echo $dsatz["Titel"]."<br />";
    }    
?>
</body>
</html>