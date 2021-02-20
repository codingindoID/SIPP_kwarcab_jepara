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
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="width: 100%">
			<input type="hidden" id="base" value="<?php echo site_url() ?>">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<span class="login100-form-title p-b-33">
					Daftar Akun
				</span>
				<div class="wrap-input100 validate-input mb-2">
					<input class="input100" type="text" name="username" placeholder="Email/username">
					<span class="focus-input100-1"></span>
					<span class="focus-input100-2"></span>
				</div>

				<div class="wrap-input100 rs1 validate-input">
					<input class="input100" type="password" name="password" placeholder="Password">
					<span class="focus-input100-1"></span>
					<span class="focus-input100-2"></span>
				</div>

				<div class="container-login100-form-btn m-t-20">
					<button class="login100-form-btn" id="btn-login">
						Masuk
					</button>
				</div>

				<div class="text-center">
					<span class="txt1">
						Create an account?
					</span>

					<a href="#" class="txt2 hov1">
						Sign up
					</a>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url('assets/login') ?>/js_login.js" type="text/javascript"></script>

</body>
</html>