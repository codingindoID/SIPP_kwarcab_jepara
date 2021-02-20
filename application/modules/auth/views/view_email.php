<!DOCTYPE html>
<html lang="en">
<head>
	<title>Pramuka Kwarcab Jepara</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
</head>
<body>
	<center>
		<img width="20%" src="https://cdn.dribbble.com/users/201757/screenshots/1960156/tick.gif" style="border-radius: 50%; text-align: center; padding-top : 1em " >
		<p>
			klik untuk reset password, segera lakukan reset karena link bersifat sementara, dan akan terhapus otomatis setelah user melakuakn reset yang pertama kali, jika terjadi kesalahan silahkan ulangi kembali prosesnya pada halaman login dan tekan lupa password, terimakasih .. 
		</p>
		<a href="<?php echo site_url('auth/reset?email='.$email.'&token='.urlencode($token)) ?>" style="background: blue; padding: 0.5em; color: white; text-decoration: none; border-radius: 20px">
			Reset Password
		</a>
	</center>
</body>
</html>