<?php

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xlsx");

?>
<img src="/assets/header.png" alt="">
<center>
	<h1>Data Laporan Indeks Dokter</h1>
</center>

<table border="1" width="100%">
	<thead>
		<tr>
			<th>No</th>
			<th>Tanggal Registrasi</th>
			<th>Nama Dokter</th>
			<th>Nama Pasien</th>
			<th>Poli</th>
			<th>Akses Bayar</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$i = 1;
		foreach ($dokter_indeks_data as $dokter) { ?>
			<tr>
				<td><?= $i ?></td>
				<td><?= date("d-m-Y", strtotime($dokter->tanggal)) ?></td>
				<td><?= $dokter->dokter_nama ?></td>
				<td><?= $dokter->nama ?></td>
				<td><?= $dokter->poli_nama ?></td>
				<td><?= $dokter->akses_bayar ?></td>
			</tr>
		<?php
			$i++;
		}
		?>
	</tbody>
</table>
