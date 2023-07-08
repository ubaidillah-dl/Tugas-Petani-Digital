<?php 
	// Koneksi ke database
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "petanidigital";
$konek = mysqli_connect($servername, $username,$password,$database);

$sql_id = mysqli_query($konek, "SELECT MAX(Id) FROM data");
$sql_nilai = mysqli_query($konek, "SELECT * FROM data ");
$data_id = mysqli_fetch_array($sql_id);
$id_akhir = $data_id['MAX(Id)'];
$id_awal = $id_akhir - 7;

	// Baca data
$waktu = mysqli_query($konek,"SELECT Waktu FROM data WHERE Id>='$id_awal' and Id<='$id_akhir' ORDER BY Id ASC");
$ketinggian = mysqli_query($konek,"SELECT Ketinggian_Air FROM data WHERE Id>='$id_awal' and Id<='$id_akhir' ORDER BY Id ASC");

$data_nilai = mysqli_fetch_array($sql_nilai);
$nilai = $data_nilai['Ketinggian_Air'];
?>

<canvas id="myChart"></canvas>	
<script type="text/javascript">
	var canvas = document.getElementById('myChart');
	var data = {
		labels : [
			<?php 
			while ($data_waktu = mysqli_fetch_array($waktu)) {
				echo '"'.$data_waktu['Waktu'].'",';
			}
			?>
			],
		datasets : [{
			label : "Ketinggian Air",
			fill : true,
			backgroundColor : "rgba(76,132,222, .3)",
			borderColor : "rgba(76,132,222,1)",
			lineTension : 0.5,
			
			data : [
				<?php  
				while ($data_ketinggian = mysqli_fetch_array($ketinggian)) {
					echo $data_ketinggian['Ketinggian_Air'].',';
				}
				?>
				]
		}]
	};	
	var option = {
		showLines : true,
		animation : {duration : 2}
	};
	var myLineChart = Chart.Line(canvas,{
		data : data,
		options : option
	}) ;
</script>