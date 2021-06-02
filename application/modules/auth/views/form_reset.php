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

	<style>
		.container-login100{
			background-color: #0e49b5;
		}
		.wrap-input100{
			height: 65px;
			border-radius: 20px;
		}

		#btn-login{
			border-radius : 25px;
		}
	</style>
</head>
<div>

	<body class="login">
		<input type="hidden" id="base" value="<?php echo site_url() ?>">
		<div class="wrapper wrapper-login">
			<div class="container container-login animated fadeIn">
				<h3 class="text-center">Buat Password Baru</h3>
				<div class="login-form">
					<div class="form-group form-floating-label mb-3">
						<input name="email" type="email" class="form-control input-border-bottom" readonly value="<?php echo $email ?>">
					</div>
					<div class="form-group form-floating-label">
						<input type="password" class="form-control input-border-bottom" name="password1">
						<label for="email" class="placeholder">Password</label>
					</div>
					<div class="form-group form-floating-label">
						<input type="password" class="form-control input-border-bottom" name="password2">
						<label for="email" class="placeholder">Ulangi Password</label>
					</div>
					<div class="form-action mb-3">
						<button href="#" class="btn btn-primary btn-rounded btn-login" id="btn-reset">Reset Passsword</button>
					</div>
			</div>
		</div>

		<script src="<?php echo base_url('assets/login/') ?>js_reset_password.js" type="text/javascript" charset="utf-8" ></script>
	</body>

</div>
</html>