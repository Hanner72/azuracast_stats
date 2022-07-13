<?php
 include ("inc/config.inc.php");
?>
<!DOCTYPE HTML>
<html>
<head>
 <meta charset="utf-8">
 <title>
 Blechradio - letzte Titel (ein Monat)
 </title>

<style>
    table#letzte_titel_table {
        font-family: "Ubuntu",Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;
        border-color: black;
        border-width: thin;
    }
    td.letzte_titel_td {
        padding: 3px 10px 0px 10px;
        border-style: solid;
        border-color: #279424;
        border-width: thin;
    }
</style>
    
</head>
<body>
<?php
 
$sql = "SELECT * FROM letzte_titel WHERE date 
BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW() ORDER BY date DESC";
 
$exec = mysqli_query( $con, $sql );
if ( ! $exec )
{
  die('Ungültige Abfrage: ' . mysqli_error());
}
 
echo '<center><table id="letzte_titel_table">';
while ($zeile = mysqli_fetch_array( $exec))
{
  echo "<tr class='letzte_titel_tr'>";
  echo "<td class='letzte_titel_td'>". $zeile['date'] . "</td>";
  echo "<td class='letzte_titel_td'>". $zeile['text'] . "</td>";
  echo "<td class='letzte_titel_td'><a href='https://www.amazon.de/s?k=". $zeile['text'] . "&tag=dannerbam-21&language=de_DE' target='_blank'><img src='img/einkaufswagen.jpg'</a></td>";
  echo "</tr>";
}
echo "</table></center>";
 
mysqli_free_result( $exec );
?>

    
</body>
</html>