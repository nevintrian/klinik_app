<?php

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xlsx");

?>
<img src="/assets/header.png" alt="">
<center>
	<h1>Data Laporan Indeks Kunjungan Pasien</h1>
</center>
<table border="1" width="100%">
	<thead>
		<tr>
			<th>No</th>
			<th>Tanggal Daftar</th>
			<th>No RM</th>
			<th>Nama</th>
			<th>JK</th>
			<th>Poli</th>
			<th>DPJP</th>
			<th>Akses Bayar</th>
			<th>Daftar</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$i = 1;
		foreach ($pasien_kunjungan_indeks_data as $pasien_kunjungan) {
		?>
			<tr>
				<td><?= $i ?></td>
				<td><?= date("d-m-Y", strtotime($pasien_kunjungan->tanggal)) ?></td>
				<td><?= $pasien_kunjungan->no_rm ?></td>
				<td><?= $pasien_kunjungan->nama ?></td>
				<td><?= $pasien_kunjungan->jk ?></td>
				<td><?= $pasien_kunjungan->poli_nama ?></td>
				<td><?= $pasien_kunjungan->dokter_nama ?></td>
				<td><?= $pasien_kunjungan->akses_bayar ?></td>
				<td><?= $pasien_kunjungan->daftar ?></td>
			</tr>
		<?php
			$i++;
		}
		?>
	</tbody>

</table>
