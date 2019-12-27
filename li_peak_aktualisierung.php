<?php

include ("inc/config.inc.php");

#### aktuelle Listeners
$str = file_get_contents('http://207.180.205.39/api/nowplaying/blechradio1/');
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
echo "momentanehoerer (letzte.txt): " . $momentanehoerer . "<br>";
echo "zwischensumme (zwischensumme.txt): " . $zwischensumme . "<br>";
echo "summe: " . $summe . "<br>";

?>