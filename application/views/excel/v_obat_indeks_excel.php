<?php

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xlsx");

?>
<img src="/assets/header.png" alt="">
<center>
	<h1>Data Laporan Indeks Obat</h1>
</center>

<table border="1" width="100%">
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
