<?php

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xlsx");

?>
<img src="/assets/header.png" alt="">
<center>
	<h1>Data Laporan Keuangan</h1>
</center>
<table border="1" width="100%">
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
