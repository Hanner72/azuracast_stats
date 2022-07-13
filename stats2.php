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

$query = "SELECT * FROM listeners WHERE date >= DATE_SUB(NOW(),INTERVAL 5 DAY);" ; // die letzten 30 Tage

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
 <div id="columnchart" style="width: 100%; height: 400px;"></div>

<?php
	$DateAndTime = date('m-d-Y h:i:s a', time());  
	echo "Das aktuelle Datum und Zeit ist $DateAndTime.";
?>

<div class="col-xl-4">
	<h2>Music Chart</h2>
	<div class="row row-85">
		<div class="col-xl-12 col-md-6">
			<ol class="list-marked small font-weight-sbold">
			<?php
				$sql = "SELECT *, COUNT(titel) AS anzahl FROM `b1_charts` 
								WHERE titel <> ' ' and titel NOT LIKE ' - Stream Offline' and titel NOT LIKE 'Intro'
									GROUP BY titel
									ORDER BY anzahl DESC
									LIMIT 10";

				$exec = mysqli_query( $con, $sql );
				if ( ! $exec )
				{
					die('Ungültige Abfrage: ' . mysqli_error());
				}
				
				while ($zeile = mysqli_fetch_array( $exec))
				{
					echo "<li><a class='link-gray-900' href='#'>". $zeile['titel'] . " (" . $zeile['anzahl'] . ")</a></li>";
				}
				
				mysqli_free_result( $exec );
				?>
			</ol>
		</div>

<div class="col-xl-4">
	<h2>Artist Chart</h2>
	<div class="row row-85">
		<div class="col-xl-12 col-md-6">
			<ol class="list-marked small font-weight-sbold">
			<?php
				$sql = "SELECT *, COUNT(artist) AS anzahl FROM `b1_charts` 
								WHERE artist <> ' ' and artist NOT LIKE ' - Stream Offline' and artist NOT LIKE 'Blechradio.at'
									GROUP BY artist
									ORDER BY anzahl DESC
									LIMIT 10";

				$exec = mysqli_query( $con, $sql );
				if ( ! $exec )
				{
					die('Ungültige Abfrage: ' . mysqli_error());
				}
				while ($zeile = mysqli_fetch_array( $exec))
				{
					echo "<li><a class='link-gray-900' href='#'>". $zeile['artist'] . " (" . $zeile['anzahl'] . ")</a></li>";
				}
				
				mysqli_free_result( $exec );
				?>
			</ol>
		</div>

<div class="col-xl-4">
	<h2>Album Chart</h2>
	<div class="row row-85">
		<div class="col-xl-12 col-md-6">
			<ol class="list-marked small font-weight-sbold">
			<?php
				$sql = "SELECT *, COUNT(album) AS anzahl FROM `b1_charts` 
								WHERE album <> ' ' and album NOT LIKE ' - Stream Offline' and album NOT LIKE 'Blechradio.at'
									GROUP BY album
									ORDER BY anzahl DESC
									LIMIT 10";

				$exec = mysqli_query( $con, $sql );
				if ( ! $exec )
				{
					die('Ungültige Abfrage: ' . mysqli_error());
				}
				while ($zeile = mysqli_fetch_array( $exec))
				{
					echo "<li><a class='link-gray-900' href='#'>". $zeile['album'] . " (" . $zeile['anzahl'] . ")</a></li>";
				}
				
				mysqli_free_result( $exec );
				?>
			</ol>
</div>
								
</body>
</html>