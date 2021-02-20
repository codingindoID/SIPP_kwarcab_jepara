var base = $('#base').val()
	$('#simpan_pass').click(function(event) {
		var password1 		= $('input[name="password1"]').val()
		var password2 		= $('input[name="password2"]').val()
		var id_user 		= $('input[name="id_user"]').val()

		if (password1 != password2) {
			Swal.fire(
				'Gagal!',
				'Password tidak sama',
				'error'
				)
		}
		else
		{
			$.ajax({
				url: base+'profil/updatepassword',
				type: 'post',
				dataType: 'json',
				data: {id_user: id_user, password : password1},
			})
			.done(function(data) {
				Swal.fire({
					title: data.title,
					text: data.message,
					icon: data.icon,
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Ok'
				}).then((result) => {
					if (result.isConfirmed) {
						if (data.success == 1) {
							location.href  = base+'profil'
						}
					}
				})
			})
			.fail(function() {
				Swal.fire(
					'Gagal!',
					'Coba Ulangi, Atau Gunakan Koneksi Yang Baik',
					'error'
					)
			});

		}
	});

	$('#button-update').click(function(event) {
		var username 	= $('input[name="username"]').val()
		var email 		= $('input[name="email"]').val()
		var display 	= $('input[name="display"]').val()

		if (username == '' || email == '' || display == '') {
			Swal.fire(
				'Gagal!',
				'Data Inputan Tidak Boleh Kosong',
				'error'
				)
		}
		else
		{
			$.ajax({
				url: base+'profil/update',
				type: 'post',
				dataType: 'json',
				data: {username: username, email : email, display : display},
			})
			.done(function(data) {
				Swal.fire({
					title: data.title,
					text: data.message,
					icon: data.icon,
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Ok'
				}).then((result) => {
					if (result.isConfirmed) {
						if (data.success == 1) {
							location.href  = base+'profil'
						}
					}
				})
			})
			.fail(function() {
				console.log("error");
			});
			
		}
	});