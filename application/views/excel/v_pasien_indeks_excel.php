<?php

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xlsx");

?>
<img src="/assets/header.png" alt="">
<center>
	<h1>Data Laporan Indeks Pasien</h1>
</center>
<table border="1" width="100%">
	<thead>
		<tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>No RM</th>
			<th>No Identitas</th>
			<th>Nama</th>
			<th>JK</th>
			<th>Usia</th>
			<th>Gol Darah</th>
			<th>Pendidikan</th>
			<th>Pekerjaan</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$i = 1;
		foreach ($pasien_indeks_data as $pasien) {
			$date1 = date("Y-m-d");
			$date2 = $pasien->tanggal_lahir;
			$diff = abs(strtotime($date2) - strtotime($date1));
			$years = floor($diff / (365 * 60 * 60 * 24));
		?>
			<tr>
				<td><?= $i ?></td>
				<td><?= $pasien->tanggal ?></td>
				<td><?= $pasien->no_rm ?></td>
				<td><?= $pasien->no_identitas ?></td>
				<td><?= $pasien->nama ?></td>
				<td><?= $pasien->jk ?></td>
				<td><?= $years ?></td>
				<td><?= $pasien->gol_darah ?></td>
				<td><?= $pasien->pendidikan ?></td>
				<td><?= $pasien->pekerjaan ?></td>
			</tr>
		<?php
			$i++;
		}
		?>
	</tbody>
</table>
