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
<!doctype html>
<html>
<head>
	<title>Pie Chart</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body><center>
	<div style="font-family: arial"><h1>DATA KASUS COVID-19 DENGAN PIE CHART</h1></div>
	<div id="canvas-holder" style="width:500px;">
		<canvas id="1"></canvas><br>
		<canvas id="2"></canvas><br>
		<canvas id="3"></canvas><br>
		<canvas id="4"></canvas><br>
		<canvas id="5"></canvas><br>
		<canvas id="6"></canvas><br>
	</div></center>
	<script>
		var cty = document.getElementById("1").getContext('2d');
		var myChart = new Chart(cty, {
			type: 'pie',
			data: {
				labels: <?php echo json_encode($nama_negara); ?>,
				datasets: [{
					label: 'Grafik Angka Penderita Covid-19',
					data: <?php echo json_encode($Total_Cases); ?>,
					backgroundColor: ['rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(85, 243, 0, 1)','rgba(140, 60, 51, 1)','rgba(255, 1, 1, 1)','rgba(0, 85, 1, 1)','rgba(0, 0, 254, 1)','rgba(165, 80, 254, 1)','rgba(165, 80, 0, 1)','rgba(75, 192, 192, 1)'],
					borderColor: ['rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(85, 243, 0, 1)','rgba(140, 60, 51, 1)','rgba(255, 1, 1, 1)','rgba(0, 85, 1, 1)','rgba(0, 0, 254, 1)','rgba(165, 80, 254, 1)','rgba(165, 80, 0, 1)','rgba(75, 192, 192, 1)'],
				}]
			},
			options: {
			title: {
				display : true, text: 'Total Cases'	} }	});
		var cty = document.getElementById("2").getContext('2d');
		var myChart = new Chart(cty, {
			type: 'pie',
			data: {
				labels: <?php echo json_encode($nama_negara); ?>,
				datasets: [{
					label: 'Grafik Angka Penderita Covid-19',
					data: <?php echo json_encode($New_Cases); ?>,
					backgroundColor: ['rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(85, 243, 0, 1)','rgba(140, 60, 51, 1)','rgba(255, 1, 1, 1)','rgba(0, 85, 1, 1)','rgba(0, 0, 254, 1)','rgba(165, 80, 254, 1)','rgba(165, 80, 0, 1)','rgba(75, 192, 192, 1)'],
					borderColor: ['rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(85, 243, 0, 1)','rgba(140, 60, 51, 1)','rgba(255, 1, 1, 1)','rgba(0, 85, 1, 1)','rgba(0, 0, 254, 1)','rgba(165, 80, 254, 1)','rgba(165, 80, 0, 1)','rgba(75, 192, 192, 1)'],
				}]},
			options: {
			title: { display : true, text: 'New Cases'	} }	});
		var cty = document.getElementById("3").getContext('2d');
		var myChart = new Chart(cty, {
			type: 'pie',
			data: {
				labels: <?php echo json_encode($nama_negara); ?>,
				datasets: [{
					label: 'Grafik Angka Penderita Covid-19',
					data: <?php echo json_encode($Total_Deaths); ?>,
					backgroundColor: ['rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(85, 243, 0, 1)','rgba(140, 60, 51, 1)','rgba(255, 1, 1, 1)','rgba(0, 85, 1, 1)','rgba(0, 0, 254, 1)','rgba(165, 80, 254, 1)','rgba(165, 80, 0, 1)','rgba(75, 192, 192, 1)'],
					borderColor: ['rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(85, 243, 0, 1)','rgba(140, 60, 51, 1)','rgba(255, 1, 1, 1)','rgba(0, 85, 1, 1)','rgba(0, 0, 254, 1)','rgba(165, 80, 254, 1)','rgba(165, 80, 0, 1)','rgba(75, 192, 192, 1)'],
				}]
			},
			options: {
			title: {
				display : true, text: 'Total Deaths'	} }	});
		var cty = document.getElementById("4").getContext('2d');
		var myChart = new Chart(cty, {
			type: 'pie',
			data: {
				labels: <?php echo json_encode($nama_negara); ?>,
				datasets: [{
					label: 'Grafik Angka Penderita Covid-19',
					data: <?php echo json_encode($New_Deaths); ?>,
				backgroundColor: ['rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(85, 243, 0, 1)','rgba(140, 60, 51, 1)','rgba(255, 1, 1, 1)','rgba(0, 85, 1, 1)','rgba(0, 0, 254, 1)','rgba(165, 80, 254, 1)','rgba(165, 80, 0, 1)','rgba(75, 192, 192, 1)'],
					borderColor: ['rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(85, 243, 0, 1)','rgba(140, 60, 51, 1)','rgba(255, 1, 1, 1)','rgba(0, 85, 1, 1)','rgba(0, 0, 254, 1)','rgba(165, 80, 254, 1)','rgba(165, 80, 0, 1)','rgba(75, 192, 192, 1)'],
				}]
			},
			options: {
			title: {
				display : true, text: 'New Deaths'	} }	});
		var cty = document.getElementById("5").getContext('2d');
		var myChart = new Chart(cty, {
			type: 'pie',
			data: {
				labels: <?php echo json_encode($nama_negara); ?>,
				datasets: [{
					label: 'Grafik Angka Penderita Covid-19',
					data: <?php echo json_encode($Total_Recovered); ?>,
				backgroundColor: ['rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(85, 243, 0, 1)','rgba(140, 60, 51, 1)','rgba(255, 1, 1, 1)','rgba(0, 85, 1, 1)','rgba(0, 0, 254, 1)','rgba(165, 80, 254, 1)','rgba(165, 80, 0, 1)','rgba(75, 192, 192, 1)'],
					borderColor: ['rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(85, 243, 0, 1)','rgba(140, 60, 51, 1)','rgba(255, 1, 1, 1)','rgba(0, 85, 1, 1)','rgba(0, 0, 254, 1)','rgba(165, 80, 254, 1)','rgba(165, 80, 0, 1)','rgba(75, 192, 192, 1)'],
				}]
			},
			options: {
			title: {
				display : true, text: 'Total Recovered'	} }	});
		var cty = document.getElementById("6").getContext('2d');
		var myChart = new Chart(cty, {
			type: 'pie',
			data: {
				labels: <?php echo json_encode($nama_negara); ?>,
				datasets: [{
					label: 'Grafik Angka Penderita Covid-19',
					data: <?php echo json_encode($Active_Cases); ?>,
					backgroundColor: ['rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(85, 243, 0, 1)','rgba(140, 60, 51, 1)','rgba(255, 1, 1, 1)','rgba(0, 85, 1, 1)','rgba(0, 0, 254, 1)','rgba(165, 80, 254, 1)','rgba(165, 80, 0, 1)','rgba(75, 192, 192, 1)'],
					borderColor: ['rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(85, 243, 0, 1)','rgba(140, 60, 51, 1)','rgba(255, 1, 1, 1)','rgba(0, 85, 1, 1)','rgba(0, 0, 254, 1)','rgba(165, 80, 254, 1)','rgba(165, 80, 0, 1)','rgba(75, 192, 192, 1)'],
				}]
			},
			options: {
			title: {
				display : true, text: 'Active Cases'	} }	});
		
	</script>
</body>
</html>
