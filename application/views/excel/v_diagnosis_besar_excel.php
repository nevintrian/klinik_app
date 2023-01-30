<?php

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xlsx");

?>
<img src="/assets/header.png" alt="">
<center>
	<h1>Data Laporan 10 Besar Diagnosis</h1>
</center>
<table border="1" width="100%">
	<thead>
		<tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>Kode</th>
			<th>Nama</th>
			<th>Jumlah</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$i = 1;
		foreach ($diagnosis_besar_data as $diagnosis) { ?>
			<tr>
				<td><?= $i ?></td>
				<td><?= date("d-m-Y", strtotime($diagnosis->tanggal)) ?></td>
				<td><?= $diagnosis->kode ?></td>
				<td><?= $diagnosis->nama ?></td>
				<td><?= $diagnosis->jumlah ?></td>
			</tr>
		<?php
			$i++;
		}
		?>
	</tbody>
</table>
