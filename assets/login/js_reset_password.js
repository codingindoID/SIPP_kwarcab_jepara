$('#btn-reset').click(function(event){
	var base 	= $('#base').val()
	var email 	= $('input[name="email"]').val()
	var p1 		= $('input[name="password1"]').val()
	var p2 		= $('input[name="password2"]').val()


	if (p1 != p2) {
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Password dan Perulangannya Tidak Sama'
		})
	}
	else
	{
		$.ajax({
			url: base+'auth/aksireset',
			type: 'post',
			dataType: 'json',
			data: {email : email, password : p1},
		})
		.done(function(data) {
			Swal.fire({
				title: 'Sukses',
				text: data.message,
				icon: 'success',
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Ok'
			}).then((result) => {
				if (result.isConfirmed) {
					location.href = base+'auth';
				}
			})
		})
		.fail(function() {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Gagal, Coba Ulangi . . '
			})
		});
		
	}
});