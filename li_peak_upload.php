<?php

include ("inc/config.inc.php");

#### Zwischensumme lesen
$zwischensumme = file_get_contents("data/zwischensumme.txt");

<?php 
$statement = $pdo->prepare("INSERT INTO listeners_peak (listeners) VALUES ('$zwischensumme')");
$statement->execute(array('$zwischensumme'));   
?>