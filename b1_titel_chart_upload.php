<?php

include ("inc/config.inc.php");

$str = file_get_contents('https://streamt.at/api/nowplaying/blechradio1/');
$letzter_titel= json_decode($str, true);
$$aktueller_titel_utf = $letzter_titel['now_playing']['song']['text'];
$istIntro = $letzter_titel['now_playing']['song']['titel'];

$np_titel = $letzter_titel['now_playing']['song']['title'];
$np_artist = $letzter_titel['now_playing']['song']['artist'];
$np_album = $letzter_titel['now_playing']['song']['album'];
$art = $letzter_titel['now_playing']['song']['art'];

$from = array('ä',  'ö',  'ü',  'ß', '_', 'ě', 'á', 'ú', '°', 'é', 'š', 'ý', '+');
$to =   array('ae', 'oe', 'ue', 'ss', '', 'e', 'a', 'u', 'o', 'e', 's', 'y', ' ');

$np_titel_utf = str_replace($from, $to, $np_titel);
$np_artist_utf = str_replace($from, $to, $np_artist);
$np_album_utf = str_replace($from, $to, $np_album);


$replace = str_replace($from, $to, $$aktueller_titel_utf);



$$aktueller_titel_fertig = str_replace(' ', '+', $$aktueller_titel_utf);

echo $replace;
echo "<br>";


if ( $istIntro == "Intro" or $istIntro == "Werbung" )
    {
        /* $statement = $pdo->prepare("INSERT INTO letzte_titel (titel) VALUES ('Werbung')");
        $statement->execute(array('Werbung')); */
}
else {
        $statement = $pdo->prepare("INSERT INTO b1_charts (titel,artist,album,art) VALUES ('$np_titel_utf','$np_artist_utf','$np_album_utf','$art')");
        $statement->execute(array('$np_titel_utf','$np_artist_utf','$np_album_utf','$art'));
}
  
?>