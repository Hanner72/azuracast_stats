<?php

include ("inc/config.inc.php");

### Zeit festlegen
$aktuelleZeit = time();
$timestampSTART = mktime( 6, 00, 0, date("m"), date("d"), date("Y"));
$timestampENDE = mktime( 9, 00, 0, date("m"), date("d"), date("Y"));
$sperrzeit = (($aktuelleZeit >= $timestampSTART) && ($aktuelleZeit < $timestampENDE));
if ($sperrzeit == true) {
      echo "Ich werde nur zwischen 6 und 9 Uhr angezeigt!";
}

?>