<!DOCTYPE html>
<html lang="en">
<head>
	<title>Pramuka Kwarcab Jepara</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/') ?>vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/') ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/') ?>fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/') ?>css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/') ?>css/main.css">
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
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<input type="hidden" id="base" value="<?php echo site_url() ?>">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<span class="login100-form-title p-b-33">
					Masukkan Password Baru
				</span>
				<div class="wrap-input100 validate-input mb-2" data-validate = "Valid email is required: ex@abc.xyz">
					<input class="input100" type="text" name="email" value="<?php echo $email ?>" readonly>
				</div>
				<div class="wrap-input100 validate-input mb-2" data-validate = "Valid email is required: ex@abc.xyz">
					<input class="input100" type="password" name="password1" placeholder="password">
				</div>

				<div class="wrap-input100 rs1 validate-input" data-validate="Password wajib diisi">
					<input class="input100" type="password" name="password2" placeholder="Ulangi Password">
				</div>

				<div class="container-login100-form-btn m-t-20">
					<button class="login100-form-btn" id="btn-reset">
						Reset
					</button>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url('assets/login/') ?>js_reset_password.js" type="text/javascript" charset="utf-8" ></script>
</body>
</html>