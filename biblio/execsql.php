<?php



?>

<!DOCTYPE html>
<html lang="de">
	<meta charset="utf-8">
	<link href='style_inf.css' rel='stylesheet' type='text/css'>
<head>
	<title>Bibliothek</title>
</head>

<script type="text/javascript">
<!--
function click( id ) {
  var e = document.getElementById( id );
  if( e.style.display == 'none' ) {
    e.style.display = '';
  }
  else {
    e.style.display = 'none';
  }
}
-->
</script>

<body>
<header role="banner">
    <div >
        <table border="0">
            <tr>
              <th><a href="https://github.com/MMaue/Bibliothekssystem" aria-label="Homepage ">
  		            <svg height="32" aria-hidden="true" viewBox="0 0 16 16" version="1.1" width="32" data-view-component="true" class="octicon octicon-mark-github v-align-middle">
    		            <path style="fill:#335ECB;" fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path>
		            </svg>
		        </a></th>
              <td><a href="index.php">Index</a></td>
              <td><a href="search.php">Suchen</a></td>
              <td><a href="execsql.php">SQL ausführen</a></td>
              <td><a href="verliehen.php">Verliehen</a></td>
              <td><a href="login.php">History</a></td>
              <td><a href="mahnungen.php">Mahnungen</a></td>
              <td><a href="signup.php">Registrieren</a></td>
              <td><a href="login.php">Einloggen</a></td>
              <td><a href="logout.php">Ausloggen</a></td>
            </tr>
            <tr>
            <td>Hello <?php echo $user_data['user_name']; ?></td>
            </tr>
        </table>
    </div>
</header>
	<h1>Bibliotehkssystem - SQL</h1>

    <p><a href="javascript:click('schema');">Datenbankschema ein-/ausblenden</a></a>
    <div style="display:none;" id="schema"><img src="biblioschema.png" alt="Datenbankschema"  width="75%" height="75%"/></div>

<form action="/execsql.php" method="post">
<textarea id="SQLText" name="textfeld" cols="120" rows="10" spellcheck="false" style=" background:#3c5064; color: #000000;">
SELECT * FROM buch
</textarea>
<p><input type="submit" value="Abschicken"></p>
</form>
<br></br>
<table class="farbig">
<tbody><tr>
	<th>ONR</th>
	<th>Name</th>
	<th>LNR</th>
	<th>Landesteil</th>
	<th>Einwohner</th>
	<th>Breite</th>
	<th>Laenge</th>
</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=97660">97660</a></td>
		<td>Dembeni</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=F">F</a></td>
		<td>Mayotte</td>
		<td>10923</td>
		<td>-12.8442</td>
		<td>45.1878</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29078">A29078</a></td>
		<td>Annaberg</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Niederösterreich</td>
		<td>662</td>
		<td>47.8720</td>
		<td>15.3770</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29100">A29100</a></td>
		<td>Attnang-Puchheim</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Oberösterreich</td>
		<td>8982</td>
		<td>48.0083</td>
		<td>13.7167</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29124">A29124</a></td>
		<td>Bad Wimsbach-Neydharting</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Oberösterreich</td>
		<td>2375</td>
		<td>48.0667</td>
		<td>13.9000</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29129">A29129</a></td>
		<td>Behamberg</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Niederösterreich</td>
		<td>3155</td>
		<td>48.0350</td>
		<td>14.4971</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29148">A29148</a></td>
		<td>Bad Blumau</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Steiermark</td>
		<td>1580</td>
		<td>47.1153</td>
		<td>16.0514</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29173">A29173</a></td>
		<td>Buch-Geiseldorf</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Steiermark</td>
		<td>1036</td>
		<td>47.2322</td>
		<td>15.9920</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29190">A29190</a></td>
		<td>Dienten am Hochkönig</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Salzburg</td>
		<td>801</td>
		<td>47.3667</td>
		<td>13.0000</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29191">A29191</a></td>
		<td>Dietmanns</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Niederösterreich</td>
		<td>1190</td>
		<td>48.7833</td>
		<td>15.3833</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29204">A29204</a></td>
		<td>Dorfstetten</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Niederösterreich</td>
		<td>627</td>
		<td>48.3261</td>
		<td>14.9828</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29384">A29384</a></td>
		<td>Gratkorn</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Steiermark</td>
		<td>6828</td>
		<td>47.1355</td>
		<td>15.3392</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29410">A29410</a></td>
		<td>Grundlsee</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Steiermark</td>
		<td>1358</td>
		<td>47.6249</td>
		<td>13.8284</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29455">A29455</a></td>
		<td>Heiligenblut</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Kärnten</td>
		<td>1111</td>
		<td>47.0393</td>
		<td>12.8416</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29475">A29475</a></td>
		<td>Hippach</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Tirol</td>
		<td>1405</td>
		<td>47.2000</td>
		<td>11.8667</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29478">A29478</a></td>
		<td>Hirschegg</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Steiermark</td>
		<td>736</td>
		<td>47.0196</td>
		<td>14.9585</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29589">A29589</a></td>
		<td>Kitzeck im Sausal</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Steiermark</td>
		<td>1212</td>
		<td>46.7808</td>
		<td>15.4537</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29592">A29592</a></td>
		<td>Kleinarl</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Salzburg</td>
		<td>779</td>
		<td>47.2833</td>
		<td>13.3167</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29608">A29608</a></td>
		<td>Koglhof</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Steiermark</td>
		<td>1146</td>
		<td>47.3194</td>
		<td>15.6904</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29610">A29610</a></td>
		<td>Reißeck</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Kärnten</td>
		<td>2466</td>
		<td>46.8936</td>
		<td>13.2831</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29625">A29625</a></td>
		<td>Kramsach</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Tirol</td>
		<td>4522</td>
		<td>47.4500</td>
		<td>11.8667</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29633">A29633</a></td>
		<td>Krimml</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Salzburg</td>
		<td>880</td>
		<td>47.2167</td>
		<td>12.1833</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29659">A29659</a></td>
		<td>Langenegg</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Vorarlberg</td>
		<td>1076</td>
		<td>47.4667</td>
		<td>9.9000</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29660">A29660</a></td>
		<td>Längenfeld</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Tirol</td>
		<td>4238</td>
		<td>47.0667</td>
		<td>10.9667</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29689">A29689</a></td>
		<td>Leopoldschlag</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Oberösterreich</td>
		<td>1060</td>
		<td>48.6167</td>
		<td>14.5000</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29703">A29703</a></td>
		<td>Lödersdorf</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Steiermark</td>
		<td>709</td>
		<td>46.9576</td>
		<td>15.9479</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29713">A29713</a></td>
		<td>Annaberg-Lungötz</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Salzburg</td>
		<td>2274</td>
		<td>47.5167</td>
		<td>13.4333</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29777">A29777</a></td>
		<td>Mieming</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Tirol</td>
		<td>3033</td>
		<td>47.3000</td>
		<td>10.9833</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29803">A29803</a></td>
		<td>Mönichwald</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Steiermark</td>
		<td>934</td>
		<td>47.4461</td>
		<td>15.8836</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29813">A29813</a></td>
		<td>Muhr</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Salzburg</td>
		<td>606</td>
		<td>47.1167</td>
		<td>13.5000</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29837">A29837</a></td>
		<td>Neuberg an der Mürz</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Steiermark</td>
		<td>1460</td>
		<td>47.6606</td>
		<td>15.5847</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29924">A29924</a></td>
		<td>Opponitz</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Niederösterreich</td>
		<td>990</td>
		<td>47.8775</td>
		<td>14.8240</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29958">A29958</a></td>
		<td>Pfarrwerfen</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Salzburg</td>
		<td>2188</td>
		<td>47.4500</td>
		<td>13.2000</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29985">A29985</a></td>
		<td>Prägraten am Großvenediger</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Tirol</td>
		<td>1261</td>
		<td>47.0167</td>
		<td>12.3833</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A29987">A29987</a></td>
		<td>Pramet</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Oberösterreich</td>
		<td>976</td>
		<td>48.1333</td>
		<td>13.4833</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A30029">A30029</a></td>
		<td>Ratten</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Steiermark</td>
		<td>1220</td>
		<td>47.4840</td>
		<td>15.7211</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A30063">A30063</a></td>
		<td>Rohrbach an der Gölsen</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Niederösterreich</td>
		<td>1560</td>
		<td>48.0600</td>
		<td>15.7400</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A30067">A30067</a></td>
		<td>Rohrendorf bei Krems</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Niederösterreich</td>
		<td>1737</td>
		<td>48.4167</td>
		<td>15.6500</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A30172">A30172</a></td>
		<td>Sonntag</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Vorarlberg</td>
		<td>722</td>
		<td>47.2333</td>
		<td>9.9167</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A30181">A30181</a></td>
		<td>Stadl-Paura</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Oberösterreich</td>
		<td>5092</td>
		<td>48.0803</td>
		<td>13.8628</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A30191">A30191</a></td>
		<td>Stein</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Steiermark</td>
		<td>495</td>
		<td>47.0007</td>
		<td>16.0839</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A30255">A30255</a></td>
		<td>Thiersee</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Tirol</td>
		<td>2762</td>
		<td>47.5833</td>
		<td>12.0833</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A30276">A30276</a></td>
		<td>Treubach</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Oberösterreich</td>
		<td>748</td>
		<td>48.1833</td>
		<td>13.2167</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A30338">A30338</a></td>
		<td>Waldbach</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Steiermark</td>
		<td>823</td>
		<td>47.4491</td>
		<td>15.8375</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A30363">A30363</a></td>
		<td>Weißensee</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Kärnten</td>
		<td>786</td>
		<td>46.7167</td>
		<td>13.3000</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A30373">A30373</a></td>
		<td>Wenigzell</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Steiermark</td>
		<td>1538</td>
		<td>47.4262</td>
		<td>15.7863</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A30377">A30377</a></td>
		<td>Werfenweng</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Salzburg</td>
		<td>819</td>
		<td>47.4667</td>
		<td>13.2500</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60005">A60005</a></td>
		<td>Rust</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>1799</td>
		<td>47.8006</td>
		<td>16.6761</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60008">A60008</a></td>
		<td>Breitenbrunn</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>1757</td>
		<td>47.9431</td>
		<td>16.7367</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60010">A60010</a></td>
		<td>Donnerskirchen</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>1698</td>
		<td>47.8975</td>
		<td>16.6422</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60011">A60011</a></td>
		<td>Großhöflein</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>1821</td>
		<td>47.8344</td>
		<td>16.4814</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60013">A60013</a></td>
		<td>Hornstein</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>2627</td>
		<td>47.8808</td>
		<td>16.4458</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60015">A60015</a></td>
		<td>Klingenbach</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>1169</td>
		<td>47.7539</td>
		<td>16.5389</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60016">A60016</a></td>
		<td>Leithaprodersdorf</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>1172</td>
		<td>47.9367</td>
		<td>16.4778</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60018">A60018</a></td>
		<td>Mörbisch am See</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>2347</td>
		<td>47.7533</td>
		<td>16.6675</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60019">A60019</a></td>
		<td>Müllendorf</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>1270</td>
		<td>47.8439</td>
		<td>16.4589</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60020">A60020</a></td>
		<td>Neufeld an der Leitha</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>3033</td>
		<td>47.8669</td>
		<td>16.3772</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60021">A60021</a></td>
		<td>Oggau am Neusiedler See</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>1817</td>
		<td>47.8311</td>
		<td>16.6631</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60022">A60022</a></td>
		<td>Oslip</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>1296</td>
		<td>47.8339</td>
		<td>16.6211</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60023">A60023</a></td>
		<td>Purbach am Neusiedler See</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>2619</td>
		<td>47.9136</td>
		<td>16.6958</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60025">A60025</a></td>
		<td>Sankt Margarethen im Burgenlan</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>2776</td>
		<td>47.8034</td>
		<td>16.6069</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60027">A60027</a></td>
		<td>Schützen am Gebirge</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>1408</td>
		<td>47.8506</td>
		<td>16.6247</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60028">A60028</a></td>
		<td>Siegendorf im Burgenland</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>2701</td>
		<td>47.7814</td>
		<td>16.5422</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60029">A60029</a></td>
		<td>Steinbrunn</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>1981</td>
		<td>47.8372</td>
		<td>16.4144</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60031">A60031</a></td>
		<td>Trausdorf an der Wulka</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>1775</td>
		<td>47.8142</td>
		<td>16.5581</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60032">A60032</a></td>
		<td>Wimpassing an der Leitha</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>1109</td>
		<td>47.9164</td>
		<td>16.4294</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60034">A60034</a></td>
		<td>Wulkaprodersdorf</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>1879</td>
		<td>47.7933</td>
		<td>16.4944</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60035">A60035</a></td>
		<td>Loretto</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>380</td>
		<td>47.9147</td>
		<td>16.5158</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60037">A60037</a></td>
		<td>Stotzing</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>809</td>
		<td>47.9050</td>
		<td>16.5472</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60039">A60039</a></td>
		<td>Zillingtal</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>895</td>
		<td>47.8131</td>
		<td>16.4064</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60040">A60040</a></td>
		<td>Zagersdorf</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>926</td>
		<td>47.7650</td>
		<td>16.5125</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60043">A60043</a></td>
		<td>Bocksdorf</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>771</td>
		<td>47.1433</td>
		<td>16.1747</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60045">A60045</a></td>
		<td>Burgauberg-Neudauberg</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>1353</td>
		<td>47.1475</td>
		<td>16.1281</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60048">A60048</a></td>
		<td>Eberau</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>974</td>
		<td>47.1053</td>
		<td>16.4617</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60053">A60053</a></td>
		<td>Gerersdorf-Sulz</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>1042</td>
		<td>47.0722</td>
		<td>16.2500</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60056">A60056</a></td>
		<td>Güssing</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>3836</td>
		<td>47.0594</td>
		<td>16.3239</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60062">A60062</a></td>
		<td>Güttenbach</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>982</td>
		<td>47.1600</td>
		<td>16.2886</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60064">A60064</a></td>
		<td>Heiligenbrunn</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>907</td>
		<td>47.0253</td>
		<td>16.4158</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60070">A60070</a></td>
		<td>Kukmirn</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>1967</td>
		<td>47.0756</td>
		<td>16.2089</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60074">A60074</a></td>
		<td>Neuberg im Burgenland</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>1007</td>
		<td>47.1689</td>
		<td>16.2597</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60076">A60076</a></td>
		<td>Neustift bei Güssing</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>540</td>
		<td>47.0250</td>
		<td>16.2644</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60078">A60078</a></td>
		<td>Olbendorf</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>1385</td>
		<td>47.1878</td>
		<td>16.2055</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60079">A60079</a></td>
		<td>Ollersdorf im Burgenland</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>983</td>
		<td>47.1864</td>
		<td>16.1642</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60080">A60080</a></td>
		<td>Sankt Michael im Burgenland</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>1068</td>
		<td>47.1272</td>
		<td>16.2692</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60084">A60084</a></td>
		<td>Stegersbach</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>2433</td>
		<td>47.1600</td>
		<td>16.1669</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60085">A60085</a></td>
		<td>Stinatz</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>1433</td>
		<td>47.2042</td>
		<td>16.1333</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60086">A60086</a></td>
		<td>Strem</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>910</td>
		<td>47.0500</td>
		<td>16.4147</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60090">A60090</a></td>
		<td>Tobaj</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>1411</td>
		<td>47.0897</td>
		<td>16.3047</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60097">A60097</a></td>
		<td>Hackerberg</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>354</td>
		<td>47.1964</td>
		<td>16.1069</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60099">A60099</a></td>
		<td>Wörterberg</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>478</td>
		<td>47.2225</td>
		<td>16.0975</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60101">A60101</a></td>
		<td>Großmürbisch</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>263</td>
		<td>47.0164</td>
		<td>16.3608</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60103">A60103</a></td>
		<td>Inzenhof</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>317</td>
		<td>47.0125</td>
		<td>16.3172</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60105">A60105</a></td>
		<td>Kleinmürbisch</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>258</td>
		<td>47.0339</td>
		<td>16.3244</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60107">A60107</a></td>
		<td>Tschanigraben</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>72</td>
		<td>47.0067</td>
		<td>16.3053</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60109">A60109</a></td>
		<td>Heugraben</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>245</td>
		<td>47.1189</td>
		<td>16.1911</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60111">A60111</a></td>
		<td>Rohr im Burgenland</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>393</td>
		<td>47.1189</td>
		<td>16.1644</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60113">A60113</a></td>
		<td>Bildein</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>327</td>
		<td>47.1342</td>
		<td>16.4661</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60116">A60116</a></td>
		<td>Rauchwart im Burgenland</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>460</td>
		<td>47.1347</td>
		<td>16.2314</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60118">A60118</a></td>
		<td>Moschendorf</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>435</td>
		<td>47.0564</td>
		<td>16.4775</td>
	</tr>
<tr class="odd">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60121">A60121</a></td>
		<td>Deutsch Kaltenbrunn</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>1771</td>
		<td>47.0906</td>
		<td>16.1061</td>
	</tr>
<tr class="even">
		<td><a href="/SQLterra4.php?t=ort&amp;s=ONR&amp;k=A60123">A60123</a></td>
		<td>Eltendorf</td>
		<td><a href="/SQLterra4.php?t=land&amp;s=LNR&amp;k=A">A</a></td>
		<td>Burgenland</td>
		<td>1023</td>
		<td>47.0083</td>
		<td>16.1978</td>
	</tr>
</tbody></table>
</body>
</html>