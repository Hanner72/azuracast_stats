<?php
 $con = mysqli_connect('mysql80b.ssl-net.net','h13u228','Da05nnerj12','h13u228_stats');
?>
<!DOCTYPE HTML>
<html>
<head>
 <meta charset="utf-8">
 <title>
 Blechradio Höhrer Statistik
 </title>
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>

<script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {
 var data = google.visualization.arrayToDataTable([

['Datum', 'Höhrer', { role: 'style' }],
<?php 

// $query = "SELECT * from listeners where date BETWEEN CAST('2019-11-04 10:16:00' AS DATETIME) AND CAST('9999-12-31 23:59:59' AS DATETIME)"; 

$query = "SELECT * FROM listeners WHERE date 
BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW();"; // die letzten 30 Tage

 $exec = mysqli_query($con,$query);
 while($row = mysqli_fetch_array($exec)){

 echo "['".$row['date']."',".$row['current'].", 'stroke-color: #047000; stroke-width: 4; fill-color: #FF9900'],";
 }
 ?>
 
 ]);

 var options = {
 title: 'Höhrer Abstand 15 min.'
 };
 var chart = new google.visualization.ColumnChart(document.getElementById("columnchart"));
 chart.draw(data, options);
 }
</script>

</head>
<body>
	<h3>Blechradio Statistik</h3>
 <div id="columnchart" style="width: 900px; height: 500px;"></div>
</body>
</html>