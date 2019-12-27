
<?php

include ("inc/config.inc.php");

#echo "Listeners Current:"; 
$str = file_get_contents('http://207.180.205.39/api/nowplaying/blechradio1/');
$listeners_current = json_decode($str, true);
$listeners_current_fertig = $listeners_current['listeners']['current'];
?>


<?php 
$statement = $pdo->prepare("INSERT INTO listeners (current) VALUES ('$listeners_current_fertig')");
$statement->execute(array('$listeners_current_fertig'));   
?>
