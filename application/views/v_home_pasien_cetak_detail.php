<body class="hold-transition sidebar-mini layout-fixed">


	<!-- Akhir Nav -->

	<!-- Main -->

	<main>
		<section class="">
			<div class="container mb-3 mt-3 mb-3">

			</div>
		</section>

		<section>
			<!--
          <div class="container">
            <div class="col-sm-6">
              <h4 class="ml-2">Daftar Pasien Baru</h4>
              <p class="ml-2">Pasien yang belum pernah berobat di Klinik RSK Jember</p>
            </div>
          </div> -->

			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="card ml-2 mr-2">
							<h4 class="text-center mb-3 mt-3">Pendaftaran Berobat Pasien Online Selesai</h4>



							<div class="mt-3 ml-4 mb-4">
								<div class="card-body table-responsive p-0">
									<table class="table table-hover text-nowrap">

										<tbody>
											<tr>
												<td>Data Sosial</td>
												<td></td>
											</tr>

											<tr>
												<th>No RM</th>
												<td>: <?= $pasien->no_rm ?></td>
											</tr>
											<tr>
												<th>Nama Pasien</th>
												<td>: <?= $pasien->nama ?></td>
											</tr>
											<tr>
												<th>Jenis Kelamin</th>
												<td>: <?= $pasien->jk ?></td>
											</tr>
											<tr>
												<th>Akses Bayar</th>
												<td>: <?= $pasien->akses_bayar ?></td>
											</tr>

											<tr>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td>Data Kunjungan Berobat</td>
												<td></td>
											</tr>
											<tr>
												<th>Poli</th>
												<td>: <?= $pasien->poli_nama ?></td>
											</tr>
											<tr>
												<th>No Antrian</th>
												<td>: <?= $pasien->no_antrian ?></td>
											</tr>
											<tr>
												<th>Dokter</th>
												<td>: <?= $pasien->dokter_nama ?></td>
											</tr>
											<tr>
												<th>Jadwal</th>
												<td>: <?= $pasien->jam_praktek ?></td>
											</tr>
										</tbody>
									</table>
									<br>
									<p>Keterangan</p>
									<p>Simpan bukti pendaftaran berikut dan bawa pada saat hendak berobat di Klinik Rumah Sehat Keluarga</p>
									<div class="text-center mt-4">
										<script src=""></script>
										<a href="<?= base_url("home_pasien_cetak_detail/cetak_pdf?no_rm=$pasien->no_rm&tanggal_lahir=$pasien->tanggal_lahir") ?>" class="btn btn-info">Cetak File </a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<script script src="plugins/jquery/jquery.min.js">
			</script>
			<!-- jQuery UI 1.11.4 -->
			<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
			<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
			<script>
				$.widget.bridge('uibutton', $.ui.button)
			</script>
			<!-- Bootstrap 4 -->
			<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
			<!-- ChartJS -->
			<script src="../../plugins/chart.js/Chart.min.js"></script>
			<!-- Sparkline -->
			<script src="../../plugins/sparklines/sparkline.js"></script>
			<!-- JQVMap -->
			<script src="../../plugins/jqvmap/jquery.vmap.min.js"></script>
			<script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
			<!-- jQuery Knob Chart -->
			<script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
			<!-- daterangepicker -->
			<script src="../../plugins/moment/moment.min.js"></script>
			<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
			<!-- Tempusdominus Bootstrap 4 -->
			<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
			<!-- Summernote -->
			<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
			<!-- overlayScrollbars -->
			<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
			<!-- AdminLTE App -->
			<script src="../../dist/js/adminlte.js"></script>
			<!-- PAGE PLUGINS -->
			<!-- Jquery -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<script>
				// Default tab
				$(".tab").css("display", "none");
				$("#tab-1").css("display", "block");

				function run(hideTab, showTab) {
					/*if(hideTab < showTab){ // If not press previous button
					  // Validation if press next button
					  var currentTab = 0;
					  x = $('#tab-'+hideTab);
					  y = $(x).find("input")
					  for (i = 0; i < y.length; i++){
					    if (y[i].value == ""){
					      $(y[i]).css("background", "#ffdddd");
					      return false;
					    }
					  }
					}*/

					// Progress bar
					for (i = 1; i < showTab; i++) {
						$("#step-" + i).css("opacity", "1");
					}

					// Switch tab
					$("#tab-" + hideTab).css("display", "none");
					$("#tab-" + showTab).css("display", "block");
					$("input").css("background", "#fff");
				}
			</script>
</body>

</html>
