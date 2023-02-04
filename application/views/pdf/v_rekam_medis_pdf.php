<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Rekam Medis</title>
	<style>
		#ttd {
			height: 45px;
			width: 200px;
			float: right;
		}
	</style>
</head>

<body>
	<div style="text-align:center">
		<img class="mt-n5" src="<?php echo base_url('/assets/header.png'); ?>" width="100%" />
		<h3>Resume Medis</h3>
	</div>
	<div class="card">
		<table width="100%">
			<tr>
				<td><b>Data Sosial</b></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>No RM</td>
				<td>:</td>
				<td><?= $pasien->no_rm ?></td>
			</tr>
			<tr>
				<td>Nama Pasien</td>
				<td>:</td>
				<td><?= $pasien->nama ?></td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td>:</td>
				<td><?= date("d-m-Y", strtotime($pasien->tanggal_lahir)) ?></td>
			</tr>
			<tr>
				<td>Tanggal Pemeriksaan</td>
				<td>:</td>
				<td><?= date("d-m-Y", strtotime($pasien->tanggal)) ?></td>
			</tr>
			<br><br>
			<tr>
				<td><b>Data Kunjungan Berobat</b></td>
				<td></td>
				<td></td>
			</tr>

			<tr>
				<td>Keluhan</td>
				<td>:</td>
				<td><?= $pasien->keluhan ?></td>
			</tr>
			<tr>
				<td>Diagnosis</td>
				<td>:</td>
				<?php
				$data2 = [];
				foreach ($diagnosis as $k) {
					array_push($data2, $k->nama);
				}
				$data_diagnosis = join(', ', $data2)
				?>
				<td><?= $data_diagnosis ?></td>
			</tr>
			<tr>
				<td>Tindakan</td>
				<td>:</td>
				<?php
				$data3 = [];
				foreach ($tindakan as $k) {
					array_push($data3, $k->nama);
				}
				$data_tindakan = join(', ', $data3)
				?>
				<td><?= $data_tindakan ?></td>
			</tr>
			<tr>
				<td>Obat</td>
				<td>:</td>
				<?php
				$data4 = [];
				foreach ($resep as $k) {
					array_push($data4, $k->nama);
				}
				$data_obat = join(', ', $data4)
				?>
				<td><?= $data_obat ?></td>
			</tr>
		</table>
	</div>
	<br>
	<br>
	<br>
	<br>

	<div id="ttd">
		<p>Jember, <?= date('d-m-Y') ?></p>
		<p>DPJP,</p><br><br><br>
		<p><?= $pasien->dokter_nama ?></p>
	</div>
	<br>
</body>
