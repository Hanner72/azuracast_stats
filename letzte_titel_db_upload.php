<?php

include ("inc/config.inc.php");

$str = file_get_contents('http://207.180.205.39/api/nowplaying/blechradio1/');
$letzter_titel= json_decode($str, true);
$$aktueller_titel_utf = $letzter_titel['now_playing']['song']['text'];
$istIntro = $letzter_titel['now_playing']['song']['titel'];

$from = array('ä',  'ö',  'ü',  'ß', '_', 'ě', 'á', 'ú', '°', 'é');
$to =   array('ae', 'oe', 'ue', 'ss', '', 'e', 'a', 'u', 'o', 'e');
$replace = str_replace($from, $to, $$aktueller_titel_utf);

$$aktueller_titel_fertig = str_replace(' ', '+', $$aktueller_titel_utf);

echo $replace;
echo "<br>";


if ( $istIntro == "Intro" or $istIntro == "Werbung" )
    {
        $statement = $pdo->prepare("INSERT INTO letzte_titel (text) VALUES ('Werbung')");
        $statement->execute(array('Werbung'));
}
else {
        $statement = $pdo->prepare("INSERT INTO letzte_titel (text) VALUES ('$replace')");
        $statement->execute(array('$replace'));
}
  
?>