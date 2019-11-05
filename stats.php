<?php
 include ("inc/config.inc.php");
?>
<!DOCTYPE HTML>
<html>
<head>
 <meta charset="utf-8">
 <title>
 Blechradio Höhrer Statistik
 </title>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">

	google.charts.load('current', {'packages':['corechart']});
      	google.charts.setOnLoadCallback(drawChart);



 	function drawChart() {
        	var data = google.visualization.arrayToDataTable([

['Datum', 'Höhrer'],
<?php 

// $query = "SELECT * from listeners where date BETWEEN CAST('2019-11-04 10:16:00' AS DATETIME) AND CAST('9999-12-31 23:59:59' AS DATETIME)"; 

$query = "SELECT * FROM listeners WHERE date 
BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW();"; // die letzten 30 Tage

 $exec = mysqli_query($con,$query);
 while($row = mysqli_fetch_array($exec)){

 echo "['".$row['date']."',".$row['current']."],";
 }
 ?>
 
 ]);

var options = {
          title: 'Höhrer Zeitgleich Statistik',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
</script>

</head>
<body>
	<h3>Blechradio Statistik</h3>
 <div id="curve_chart" style="width: 900px; height: 500px;"></div>
</body>
</html>