
<?php

include ("inc/config.inc.php");

#echo "Listeners Current:"; 
$str = file_get_contents('http://207.180.205.39/api/nowplaying/blechradio1/');
$listeners_current = json_decode($str, true);
# echo $listeners_current['listeners']['current'];
$listeners_current_fertig = $listeners_current['listeners']['current'];
# echo $listeners_current_fertig;
?>
<br>
 
<?php
#echo "Listeners Total:";
$str = file_get_contents('http://207.180.205.39/api/nowplaying/blechradio1/');
$listeners_total = json_decode($str, true);
# echo $listeners_total['listeners']['total'];
?>
<br>

<?php
#echo "Listeners Unique:";
$str = file_get_contents('http://207.180.205.39/api/nowplaying/blechradio1/');
$listeners_unique= json_decode($str, true);
# echo $listeners_unique['listeners']['unique'];
?>

<?php 
$statement = $pdo->prepare("INSERT INTO listeners (current) VALUES ('$listeners_current_fertig')");
$statement->execute(array('$listeners_current_fertig'));   
?>
