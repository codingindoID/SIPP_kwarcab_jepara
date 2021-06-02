<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Sensus Anggota Pramuka Kwarcab Jepara</title>
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
				<div class="text-center mb-3">
					<img width="150px" src="<?php echo base_url('assets/img/logo_asli.png') ?>" alt="">
				</div>
				<!-- <h3 class="text-center">Log in</h3> -->
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
						<div class="form-group form-floating-label">
							<input id="username" name="username" type="text" class="form-control input-border-bottom" required>
							<label for="username" class="placeholder">Username</label>
						</div>
						<div class="form-group form-floating-label">
							<input id="password" name="password" type="password" class="form-control input-border-bottom" required>
							<label for="password" class="placeholder">Password</label>
							<div class="show-password">
								<i class="icon-eye"></i>
							</div>
						</div>

						<div class="form-action mb-3">
							<a href="#" class="btn btn-primary btn-rounded btn-login" id="btn-login">Masuk</a>
						</div>
						<div class="row">
							<div class="col-md-12 text-center">
								<a href="<?php echo site_url('auth/lupa') ?>" class="link">Lupa Password ?</a>
							</div>
						</div>
						<div class="login-account">
							<span class="msg">Sistem Informasi Data Potensi Pramuka</span>
							<!-- <a href="#" id="show-signup" class="link">Daftar</a> -->
						</div>
					</div>
				</div>

				<div class="container container-signup animated fadeIn">
					<h3 class="text-center">Daftar Akun</h3>
					<div class="login-form">
						<div class="form-group form-floating-label">
							<input  id="fullname" name="fullname" type="text" class="form-control input-border-bottom" required>
							<label for="fullname" class="placeholder">Fullname</label>
						</div>
						<div class="form-group form-floating-label">
							<input  id="email" name="email" type="email" class="form-control input-border-bottom" required>
							<label for="email" class="placeholder">Email</label>
						</div>
						<div class="form-group form-floating-label">
							<input  id="passwordsignin" name="passwordsignin" type="password" class="form-control input-border-bottom" required>
							<label for="passwordsignin" class="placeholder">Password</label>
							<div class="show-password">
								<i class="icon-eye"></i>
							</div>
						</div>
						<div class="form-group form-floating-label">
							<input  id="confirmpassword" name="confirmpassword" type="password" class="form-control input-border-bottom" required>
							<label for="confirmpassword" class="placeholder">Confirm Password</label>
							<div class="show-password">
								<i class="icon-eye"></i>
							</div>
						</div>
						<div class="row form-sub m-0">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" name="agree" id="agree">
								<label class="custom-control-label" for="agree">I Agree the terms and conditions.</label>
							</div>
						</div>
						<div class="form-action">
							<a href="#" id="show-signin" class="btn btn-danger btn-link btn-login mr-3">Cancel</a>
							<a href="#" class="btn btn-primary btn-rounded btn-login">Sign Up</a>
						</div>
					</div>
				</div>
			</div>

			<script src="<?php echo base_url('assets/') ?>js/core/jquery.3.2.1.min.js"></script>
			<script src="<?php echo base_url('assets/') ?>js/core/popper.min.js"></script>
			<script src="<?php echo base_url('assets/') ?>js/core/bootstrap.min.js"></script>

			<!-- jQuery UI -->
			<script src="<?php echo base_url('assets/') ?>js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>

			<!-- Atlantis JS -->
			<script src="<?php echo base_url('assets/') ?>js/atlantis.min.js"></script>
			<script src="<?php echo base_url('assets/login') ?>/js_login.js" type="text/javascript"></script>
		</body>
	</div>
	</html>