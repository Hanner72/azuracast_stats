<?php

$apikey = 123;

$str = file_get_contents('http://207.180.205.39/api/nowplaying/blechradio1/');
$aktueller_titel= json_decode($str, true);
$titel = $aktueller_titel['now_playing']['song']['title'];
$artist = $aktueller_titel['now_playing']['song']['artist'];
$album = $aktueller_titel['now_playing']['song']['album'];

## replace funktion
$from = array('_', 'ě', 'á', 'ú', '°', 'é');
$to =   array(' ', 'e', 'a', 'u', 'o', 'e');
$replacetitel = str_replace($from, $to, $titel);
$replaceartist = str_replace($from, $to, $artist);
$replacealbum = str_replace($from, $to, $album);

#Ausgabe auf php Seite zum Test
echo "<br>";
echo "Titel: ";
echo urlencode($replacetitel); #urlencoded Titel
echo "<br>";
echo "Interpret: ";
echo urlencode($replaceartist); #urlencoded Artist
echo "<br>";
echo "Album: ";
echo urlencode($replacealbum); #urlencoded Album
echo "<br>";
echo "<br>";


# Den aktuellen Track Ihres Senders in unserem System aktualisieren
# Method GET
#http://api.radio.de/info/v2/pushmetadata/playingsong?broadcast=<broadcastsubdomain>&title=Song+Title&artist=Song+Artist&album=Album+Title&apikey=<ihrApiKey>
# Sollte der aktuelle Track ein Werbespot sein, bitte als solchen kennzeichnen
# Method GET
#http://api.radio.de/info/v2/pushmetadata/playingsong?broadcast=<broadcastsubdomain>&commercial=true&apikey=<ihrApiKey>

#$titelpush = "http://api.radio.de/info/v2/pushmetadata/playingsong?broadcast=<broadcastsubdomain>&title=Song+Title&artist=Song+Artist&album=Album+Title&apikey=<ihrApiKey>
    
# Daten per get übertragen
#echo $_GET["Eigenschaften"];

if ( $titel == "Intro" or $titel == "Werbung" )
{
    echo "Das ist ein Intro oder eine Werbung!";
}
else
{
    echo "normaler Titel";
}

?>

