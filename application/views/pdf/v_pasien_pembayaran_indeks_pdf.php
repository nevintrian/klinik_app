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
				<th>Bulan</th>
				<th>Jumlah Pasien</th>
				<th>Total Harga</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i = 1;
			$total = 0;
			$jumlah = 0;
			foreach ($pasien_pembayaran_indeks_data as $pasien_pembayaran) { ?>
				<tr>
					<td><?= $i ?></td>
					<?php
					$bulan = $pasien_pembayaran->bulan;
					if ($bulan == 1) {
						$bulan =
							"Januari " . $pasien_pembayaran->year;
					} else if ($bulan == 2) {
						$bulan =
							"Februari " . $pasien_pembayaran->year;
					} else if ($bulan == 3) {
						$bulan =
							"Maret " . $pasien_pembayaran->year;
					} else if ($bulan == 4) {
						$bulan =
							"April " . $pasien_pembayaran->year;
					} else if ($bulan == 5) {
						$bulan =
							"Mei " . $pasien_pembayaran->year;
					} else if ($bulan == 6) {
						$bulan =
							"Juni " . $pasien_pembayaran->year;
					} else if ($bulan == 7) {
						$bulan =
							"Juli " . $pasien_pembayaran->year;
					} else if ($bulan == 8) {
						$bulan =
							"Agustus " . $pasien_pembayaran->year;
					} else if ($bulan == 9) {
						$bulan =
							"September " . $pasien_pembayaran->year;
					} else if ($bulan == 10) {
						$bulan =
							"Oktober " . $pasien_pembayaran->year;
					} else if ($bulan == 11) {
						$bulan =
							"November " . $pasien_pembayaran->year;
					} else if ($bulan == 12) {
						$bulan =
							"Desember " . $pasien_pembayaran->year;
					}
					?>
					<td><?= $bulan ?></td>
					<td><?= $pasien_pembayaran->jumlah_pasien ?></td>
					<td>Rp<?= $pasien_pembayaran->total_harga ?></td>
				</tr>
			<?php
				$i++;
				$total += $pasien_pembayaran->total_harga;
				$jumlah += $pasien_pembayaran->jumlah_pasien;
			}
			?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="2">Total</th>
				<th><?= $jumlah ?></th>
				<th>Rp<?= $total ?></th>
			</tr>
		</tfoot>
	</table>
	<br>
	<div id="ttd">
		<p>Jember, <?= date('d-m-Y') ?></p>
		<p>Mengetahui Kepala Klinik,</p><br><br><br>
		<p><?= $kepala_klinik ?></p>
	</div>
</body>
