<?php

include ("inc/config.inc.php");

### Zeit festlegen

$starthour = 23;
$startminute = 28;
$startsecond = 0;

$stophour = 23;
$stopminute = 29;
$stopsecond = 0;

$aktuelleZeit = time();
$timestampSTART = mktime( $starthour, $startminute, $startsecond, date("m"), date("d"), date("Y"));
$timestampENDE = mktime( $stophour, $stopminute, $stopsecond, date("m"), date("d"), date("Y"));
$sperrzeit = (($aktuelleZeit >= $timestampSTART) && ($aktuelleZeit < $timestampENDE));

$datum = date('d.m.Y');
if ($sperrzeit == true) {
      echo "Juhuu ich werde angezeigt!";
}

#### hier kommt der Datenbankwert für die Listeners rein
$letztemysqlaktualisierung = 0; 
#### Zwischensumme lesen
$zwischensumme = file_get_contents("zwischensumme.txt");

#### aktuelle Listeners
$str = file_get_contents('http://207.180.205.39/api/nowplaying/blechradio1/');
$listeners_current = json_decode($str, true);
echo $listeners_current['listeners']['current'];
$momentanehoerer = (int) $listeners_current;

if ($listeners_current > $letztemysqlaktualisierung) {
      $differenz = $momentanehoerer - $letztemysqlaktualisierung;
      $summe = $zwischensumme + $differenz;
}

$aktuellemysqlsumme = $summe;


$letztemysqlaktualisierung = $momentanehoerer;

#### Zwischensumme schreiben
file_put_contents("zwischensumme.txt", $summe); //Abspeichern des Wertes




echo $timestampSTART;
echo "<br>";
echo $timestampENDE;
echo "<br>";
echo $datum;
echo "<br>";
echo "Summe: " . $aktuellemysqlsumme;
?>