<?php

include ("inc/config.inc.php");

### zwischen dieser Zeit $zwischensumme auf 0 setzen
$starthour = 23;
$startminute = 55;
$startsecond = 30;

$stophour = 23;
$stopminute = 56;
$stopsecond = 30;

$aktuelleZeit = time();
$timestampSTART = mktime( $starthour, $startminute, $startsecond, date("m"), date("d"), date("Y"));
$timestampENDE = mktime( $stophour, $stopminute, $stopsecond, date("m"), date("d"), date("Y"));
$sperrzeit = (($aktuelleZeit >= $timestampSTART) && ($aktuelleZeit < $timestampENDE));

$datum = date('d.m.Y');
if ($sperrzeit == true) {
      $summe = 0;
      file_put_contents("data/zwischensumme.txt", $summe); //Abspeichern des Wertes
}


#### aktuelle Listeners
$str = file_get_contents('https://streamt.at/api/nowplaying/blechradio1/');
$listeners_current = json_decode($str, true);
#echo $listeners_current['listeners']['current'];
$listeners_current_str = $listeners_current['listeners']['current'];
$momentanehoerer = intval($listeners_current_str);

#### Zwischensumme lesen
$zwischensumme = file_get_contents("data/zwischensumme.txt");
#### hier kommt der Datenbankwert für die Listeners rein
$letzteaktualisierung = file_get_contents("data/letzte.txt");

if ($momentanehoerer > $letzteaktualisierung) {
    $differenz = $momentanehoerer - $letzteaktualisierung;
    $summe = $zwischensumme + $differenz;
    echo "Momentane Höhrer sind mehr als letzte Aktualisierung.<br>";
} else {
    $summe = $zwischensumme;
    echo "Momentane Höhrer sind weniger oder gleich als letzte Aktualisierung.<br>";
}

#### Lezte Aktualisierung schreiben
file_put_contents("data/letzte.txt", $momentanehoerer); //Abspeichern des Wertes

#### Zwischensumme schreiben
file_put_contents("data/zwischensumme.txt", $summe); //Abspeichern des Wertes


#### AUSGABE TESTEN
#echo "momentanehoerer (letzte.txt): " . $momentanehoerer . "<br>";
#echo "zwischensumme (zwischensumme.txt): " . $zwischensumme . "<br>";
#echo "summe: " . $summe . "<br>";

?>