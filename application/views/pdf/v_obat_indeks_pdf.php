<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title; ?></title>
	<style>
		#table {
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		#table td,
		#table th {
			border: 1px solid #ddd;
			padding: 8px;
		}

		#table tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		#table tr:hover {
			background-color: #ddd;
		}

		#table th {
			padding-top: 10px;
			padding-bottom: 10px;
			text-align: left;
			background-color: #4CAF50;
			color: white;
		}

		#ttd {
			height: 45px;
			width: 200px;
			float: right;
		}
	</style>
</head>

<body>
	<div style="text-align:center">
		<img class="mt-n5" src="<?php echo base_url('/assets/header.png'); ?>" width="80%" />
		<h3><?= $title ?></h3>
	</div>
	<table id="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Tanggal Obat</th>
				<th>Nama Obat</th>
				<th>Satuan</th>
				<th>Jumlah</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i = 1;
			foreach ($obat_indeks_data as $obat) { ?>
				<tr>
					<td><?= $i ?></td>
					<td><?= date("d-m-Y", strtotime($obat->tanggal)) ?></td>
					<td><?= $obat->obat_nama ?></td>
					<td><?= $obat->obat_satuan_nama ?></td>
					<td><?= $obat->obat_jumlah ?></td>
				</tr>
			<?php
				$i++;
			}
			?>
		</tbody>
	</table>
	<br>
	<div id="ttd">
		<p>Jember, <?= date('d-m-Y') ?></p>
		<p>Mengetahui Kepala Klinik,</p><br><br><br>
		<p><?= $kepala_klinik ?></p>
	</div>
</body>
