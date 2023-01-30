<!-- Main -->
<link rel="stylesheet" href="<?php echo base_url('Klinik-RSK/docs/styles/style2.css') ?>">

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
						<form action="<?php echo base_url("home_pasien_cetak_detail"); ?>" method="post">
							<h4 class="text-center mb-3">Cek Bukti Pendaftaran</h4>

							<div class="text-center mt-3">
								<p>Cari Data</p>
							</div>
							<!-- Modal Add Product-->
							<div style="margin: 0 10% !important;">
								<div class="form-group row">
									<p for="no_rm" class="col-md-3 col-form-label col-form-label-sm text-left text-bold mr-0">No RM</p>
									<div class="col-md-6 pl-0">
										<input type="number" class="form-control form-control-sm" id="no_rm" name="no_rm" placeholder="No rekam medis" required>
									</div>
								</div>
								<div class="form-group row">
									<p for="tanggal_lahir" class="col-md-3 col-form-label col-form-label-sm text-left text-bold">Tanggal Lahir</p>
									<div class="col-md-6 pl-0">
										<input type="date" class="form-control form-control-sm" id="tanggal_lahir" name="tanggal_lahir" required>
									</div>
								</div>
							</div>
							<div class="text-center mt-2">
								<a href="home" class="btn btn-secondary btn-sm">Kembali</a>
								<button type="submit" class="btn btn-primary btn-sm">Selanjutnya</button>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

<!-- Akhir Main -->



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
