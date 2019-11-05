<?php include ("inc/config.inc.php"); ?>

<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">

<title>
  Blechradio 1 - Höhrer Statistik
</title>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

function drawChart() {
        var data = google.visualization.arrayToDataTable([

['Datum', 'Höhrer'],
<?php 

$query = "SELECT * FROM listeners WHERE date 
BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW();"; // die letzten 30 Tage

 $exec = mysqli_query($con,$query);
 while($row = mysqli_fetch_array($exec)){

 echo "['".$row['date']."',".$row['current']."],";
 }
 ?>
 
 ]);

var options = {
          title: 'Statistik 30 Tage, Abstand 15 min.',
          animation:{duration: 1000, startup: 'true', easing: 'inAndOut'},
          hAxis: {title: 'Datum',  format: 'short', titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0},
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
</script>

</head>

<body>
	<h3>Blechradio 1 - Höhrer Statistik</h3>
 <div id="chart_div" style="width: 100%; height: 700px;"></div>
</body>
</html>