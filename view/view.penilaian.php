<<?php 
include_once '../classes/database.php';
include_once '../classes/pertandingan.class.php';
include_once '../initial.php';
$page_title = "Penilaian Pertandingan";
include_once "../template/header.php";
?>

<div class="content">
	<div class="col-md-12">
		<table class="table">
			<td>
				<a href="#" class="btn btn-primary">
					<span>Menang Angka</span>
				</a>
				<a href="#" class="btn btn-primary">
					<span>Menang Mutlak</span>
				</a>
				<a href="#" class="btn btn-primary">
					<span>Menang Tehknik</span>
				</a>
				<a href="#" class="btn btn-warning">
					<span>Undur Diri</span>
				</a>
				<a href="#" class="btn btn-warning">
					<span>WMP</span>
				</a>
				<a href="#" class="btn btn-danger">
					<span>Diskulifikasi</span>
				</a>
				<a href="#" class="btn btn-default right-margin">
					<span>SELESAI</span>
				</a>
			</td>
		</table>
	</div>
</div>

<div class="content">
    <div class="col-md-12">
        <div class="content table-responsive table-full-width">
			<table border="1" class="table">
			  	<tr>
				   <th rowspan="2" class="text-center">Babak</th>
				   <th colspan="2" class="text-center">Juri 1</th>
				   <th colspan="2" class="text-center">Juri 2</th>
				   <th colspan="2" class="text-center">Juri 3</th>
				   <th colspan="2" class="text-center">Juri 4</th>
				   <th colspan="2" class="text-center">Juri 5</th>
			  	</tr>

				<tr class="text-center">
				   <td class="merah">Merah</td>
				   <td class="biru">Biru</td>

				   <td class="merah">Merah</td>
				   <td class="biru">Biru</td>

				   <td class="merah">Merah</td>
				   <td class="biru">Biru</td>

				   <td class="merah">Merah</td>
				   <td class="biru">Biru</td>

				   <td class="merah">Merah</td>
				   <td class="biru">Biru</td>
				</tr>	

			  	<tr class="text-center">
				  	<td>1</td>

				  	<td>nilai</td>
				   	<td>nilai</td>

				   	<td>nilai</td>
				   	<td>nilai</td>

				   	<td>nilai</td>
				   	<td>nilai</td>

				   	<td>nilai</td>
				   	<td>nilai</td>

				   	<td>nilai</td>
				   	<td>nilai</td>
			  	</tr>

			  	<tr class="text-center">
				  	<td>2</td>

				  	<td>nilai</td>
				   	<td>nilai</td>

				   	<td>nilai</td>
				   	<td>nilai</td>

				   	<td>nilai</td>
				   	<td>nilai</td>

				   	<td>nilai</td>
				   	<td>nilai</td>

				   	<td>nilai</td>
				   	<td>nilai</td>
			  	</tr>

			  	<tr class="text-center">
			  		<td>3</td>

			  		<td>nilai</td>
			   		<td>nilai</td>

				   	<td>nilai</td>
				   	<td>nilai</td>

				   	<td>nilai</td>
				   	<td>nilai</td>

				   	<td>nilai</td>
				   	<td>nilai</td>

				   	<td>nilai</td>
				   	<td>nilai</td>
			  	</tr>

			  	<tr class="text-center">
			  		<td>Total</td>

			  		<td>nilai</td>
			   		<td>nilai</td>

			   		<td>nilai</td>
			   		<td>nilai</td>

			   		<td>nilai</td>
			   		<td>nilai</td>

			   		<td>nilai</td>
			   		<td>nilai</td>

			   		<td>nilai</td>
			   		<td>nilai</td>
			  	</tr>
			</table>
		</div>
	</div>
</div>