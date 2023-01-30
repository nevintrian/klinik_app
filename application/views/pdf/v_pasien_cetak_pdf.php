<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<style>
	.card {
		/* Add shadows to create the "card" effect */
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
		transition: 0.3s;

	}

	/* On mouse-over, add a deeper shadow */
	.card:hover {
		box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
	}

	/* Add some padding inside the card container */
	.container {
		padding: 2px 16px;
	}
</style>

<body>
	<center>
		<div class="card">
			<h1>KARTU IDENTITAS BEROBAT</h1>
			<p>Klinik Rumah Sehat Keluarga Jember</p>
			<hr><br>
			<table width="100%">
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
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td><?= date("d-m-Y", strtotime($pasien->tanggal_lahir)) ?></td>
				</tr>
			</table>
			<br>
			<br>
			<b>*jika berobat kartu ini harus dibawa</b>
		</div>
	</center>

</body>

</html>
