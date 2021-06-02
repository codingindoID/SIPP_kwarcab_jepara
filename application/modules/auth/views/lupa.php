<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?php echo SITENAME ?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?php echo base_url('assets/') ?>img/logo2.png" type="image/x-icon"/>
	<script src="<?php echo base_url('assets/') ?>js/core/jquery.3.2.1.min.js"></script>

	<!-- Fonts and icons -->
	<script src="<?php echo base_url('assets/') ?>js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?php echo base_url('assets/') ?>css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/atlantis2.css">

	<script src="<?php echo base_url('assets/login/') ?>vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="<?php echo base_url('assets/login') ?>/sweetalert.min.js"></script>
</head>
<div style="background-image: url('<?php echo base_url()."assets/img/bg_log.jpg" ?>');">
	<body class="login">
		<input type="hidden" id="base" value="<?php echo site_url() ?>">
		<div class="wrapper wrapper-login">
			<div class="container container-login animated fadeIn">
				<h3 class="text-center">Masukkan Email Terdaftar</h3>
				<?php if ($this->session->flashdata('success')): ?>
					<div class="alert alert-success" role="alert">
						<?php echo $this->session->flashdata('success'); ?>
					</div>
					<?php elseif ($this->session->flashdata('error')):  ?>
						<div class="alert alert-danger" role="alert">
							<?php echo $this->session->flashdata('error'); ?>
						</div>
					<?php endif ?>
					<div class="login-form">
						<form action="<?php echo site_url('auth/aksilupa') ?>" method="post" accept-charset="utf-8">
							<div class="form-group form-floating-label">
								<input name="email" type="email" class="form-control input-border-bottom" required>
								<label for="email" class="placeholder">Email</label>
							</div>
							<div class="form-action mb-3">
								<button href="#" type="submit" class="btn btn-primary btn-rounded btn-login">Reset Passsword</button>
							</div>
							<div class="row">
								<div class="col-md-12 text-center">
									<a href="<?php echo site_url('auth') ?>" class="link">Kembali ke Halaman Login</a>
								</div>
							</div>
						</form>
					</div>
				</div>

				<script src="<?php echo base_url('assets/') ?>js/core/jquery.3.2.1.min.js"></script>
				<script src="<?php echo base_url('assets/') ?>js/core/popper.min.js"></script>
				<script src="<?php echo base_url('assets/') ?>js/core/bootstrap.min.js"></script>

				<!-- jQuery UI -->
				<script src="<?php echo base_url('assets/') ?>js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>

				<!-- Atlantis JS -->
				<script src="<?php echo base_url('assets/') ?>js/atlantis.min.js"></script>
			</body>
		</div>
		</html>