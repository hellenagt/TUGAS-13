<?php
include('koneksii.php');
$negara = mysqli_query($koneksi,"select * from tb_negara");
while($row = mysqli_fetch_array($negara)){
	$nama_negara[] = $row['Negara'];
	
	$query = mysqli_query($koneksi,"select * from tb_ts where Id_negara='".$row['Id_negara']."'");
	$row = $query->fetch_array();
	$Total_Cases[] = $row['Total_Cases'];
	$New_Cases[] = $row['New_Cases'];
	$Total_Deaths[] = $row['Total_Deaths'];
	$New_Deaths[] = $row['New_Deaths'];
	$Total_Recovered[] = $row['Total_Recovered'];
	$Active_Cases[] = $row['Active_Cases'];
}?>
<!DOCTYPE html>
<html>
<head>
	<title>Line Chart</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body><center>
	<div style="font-family: arial"><h1>DATA KASUS COVID-19 DENGAN LINE CHART</h1></div>
	<div style="width: 1000px;height: 1000px;">
		<canvas id="myChart"></canvas>
	</div>
	</center>
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: <?php echo json_encode($nama_negara); ?>,
				datasets: [{
					label: 'Total Cases',
					data: <?php echo json_encode($Total_Cases); ?>,
					backgroundColor: 'rgba(255, 99, 132, 0.2)',
					fill : false,
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 3
				},{
					label: 'New Cases',
					data: <?php echo json_encode($New_Cases); ?>,
					backgroundColor: 'rgba(37, 11, 9, 0.2)',
					fill : false,
					borderColor: 'rgba(37, 11, 9,1)',
					borderWidth: 3
				},{
					label: 'Total Deaths',
					data: <?php echo json_encode($Total_Deaths); ?>,
					backgroundColor: 'rgba(215, 55, 12, 0.2)',
					fill : false,
					borderColor: 'rgba(215,55,12,1)',
					borderWidth: 3
				},{
					label: 'New Deaths',
					data: <?php echo json_encode($New_Deaths); ?>,
					backgroundColor: 'rgba(255, 255, 0, 0.2)',
					fill : false,
					borderColor: 'rgba(255,255,0,1)',
					borderWidth: 3
				},{
					label: 'Total Recovered',
					data: <?php echo json_encode($Total_Recovered); ?>,
					backgroundColor: 'rgba(26, 21, 140, 0.2)',
					fill : false,
					borderColor: 'rgba(26,21,140,1)',
					borderWidth: 3
				},{
					label: 'Active Cases',
					data: <?php echo json_encode($Active_Cases); ?>,
					backgroundColor: 'rgba(0, 255, 0, 0.2)',
					fill : false,
					borderColor: 'rgba(0,255,0,1)',
					borderWidth: 3
				}]
			},	
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});	
	</script>
</body>
</html>
