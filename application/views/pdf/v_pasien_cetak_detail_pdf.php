<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kartu Berobat</title>
	<style>

	</style>
</head>

<body>
	<div style="text-align:center">
		<img class="mt-n5" src="<?php echo base_url('/assets/header.png'); ?>" width="100%" />
		<h3>Kartu Berobat</h3>
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
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td><?= $pasien->jk == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
			</tr>
			<tr>
				<td>Akses Bayar</td>
				<td>:</td>
				<td><?= $pasien->akses_bayar ?></td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td>:</td>
				<td><?= date("d-m-Y", strtotime($pasien->tanggal_lahir)) ?></td>
			</tr>
			<br>
			<tr>
				<td><b>Data Kunjungan Berobat</b></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>Poli</td>
				<td>:</td>
				<td><?= $pasien->poli_nama ?></td>
			</tr>
			<tr>
				<td>No Antrian</td>
				<td>:</td>
				<td><?= $pasien->no_antrian ?></td>
			</tr>
			<tr>
				<td>Dokter</td>
				<td>:</td>
				<td><?= $pasien->dokter_nama ?></td>
			</tr>
			<tr>
				<td>Dokter</td>
				<td>:</td>
				<td><?= $pasien->jam_praktek ?></td>
			</tr>
		</table>
	</div>
	<br>
	<p>Keterangan</p>
	<p>Simpan bukti pendaftaran berikut dan bawa pada saat hendak berobat di Klinik Rumah Sehat Keluarga</p>
	<br>
</body>
