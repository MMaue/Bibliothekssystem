# Bibliothekssystem

[Inf-Schule - Datenbanksysteme](https://www.inf-schule.de/datenbanksysteme/ermodelle/uebung1)

- In der Bibliothek müssen Bücher erfasst werden. Eine Suche ist möglich über Sachgebiet, Autor, Titel, Erscheinungsort und –jahr, Verlag.
- Bei der Suche wird eine Liste aller verfügbaren Verlage vorgeblendet.
- Leser, die Bücher ausleihen wollen, müssen sich zuvor registrieren.
- Für ein Buch kann herausgefunden werden, ob es zur Zeit ausgeliehen ist und von wem.
- Um Schäden nachvollziehen zu können, können alle vorherigen Ausleiher ermittelt werden.
- Bei zu langer Ausleihe erfolgt eine Mahnung an den Leser. Das muss vermerkt werden.

![Datenbankschema](./biblio/biblioschema.png)

## Setup

Wir arbeiten mit XAMPP...  

> Im Ordner `xampp` befindet sich der Ordner `htdocs`  
> *htdocs* steht für *hypertext documents*.  
> Hier fügen wir den Ordner `biblio` ein um über `http://localhost/biblio/` auf das Bibliothekssystem zugreifen können.

Im Ordner `htdocs` befindet sich außerdem noch die `index.php` Datei.
Nach der XAMPP Installation sieht die Datei folgendermaßen aus.

```php
<?php
    if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
        $uri = 'https://';
    } else {
        $uri = 'http://';
    }
    $uri .= $_SERVER['HTTP_HOST'];
    header('Location: '.$uri.'/xampp/');
    exit;
?>
Something is wrong with the XAMPP installation :-(
```

Dieses Script wird ausgeführt, wenn wir `http://localhost/` aufrufen. Anschließend wird man an `http://localhost/xampp/` weitergeleitet. Um zum Bibliothekssystem weitergeleitet zu werden ersetzen wir `xampp` durch `biblio`

```php
header('Location: '.$uri.'/biblio/');
```
