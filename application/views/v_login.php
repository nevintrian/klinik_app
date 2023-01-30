

<center>
	<div class="login-box">
		<div class="login-logo mt-5">
			<!-- <b>Login </b> -->
			<div class="row justify-content-center">
			</div>
		</div>

		<!-- /.login-logo -->
		<div class="card mb-5">
			<div class="card-body login-card-body rounded shadow-lg">
				<p class="login-box-msg text-bold fs-2">Sistem Informasi Klinik RSK</p>
				<form action="<?php echo base_url("login"); ?>" method="post">
					<div class="input-group mb-3">
						<input type="email" name="email" class="form-control" placeholder="Email">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" name="password" class="form-control" placeholder="Password">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row justify-content-center">
						<!-- /.col -->
						<div class="col-6">
							<button style="background-color: #10A5DD; border-color: white;" type="submit" class="btn btn-primary btn-block">Masuk</button>
						</div>
						<!-- /.col -->
					</div>
				</form>
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->
</center>
