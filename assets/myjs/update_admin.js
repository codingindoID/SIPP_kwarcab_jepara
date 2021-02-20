var base = $('#base').val()
$('#select-kwaran').select2({
	theme: "bootstrap",
});

$('#update_data').click(function(event) {
	var jenis_admin 	= $('input[name="jenis_admin"]').val();
	var input;
	if (jenis_admin == 2 ) {
		input = {
			id_user 		: $('input[name="id_user"]').val(),
			username 		: $('input[name="username"]').val(),
			display_name 	: $('input[name="display_name"]').val(),
			email 			: $('input[name="email"]').val(),
			id_kwaran 		: $('select[name="kwaran"]').val(),
			jenis_admin 	: jenis_admin
		}
	}
	else
	{
		input = {
			id_user 		: $('input[name="id_user"]').val(),
			username 		: $('input[name="username"]').val(),
			display_name 	: $('input[name="display_name"]').val(),
			email 			: $('input[name="email"]').val(),
			id_pangkalan	: $('select[name="pangkalan"]').val(),
			jenis_admin 	: jenis_admin
		}
	}


	$.ajax({
		url: base+'admin/update_admin/',
		type: 'post',
		dataType: 'json',
		data: input,
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
					location.href  = data.action;
				}
			}
		})
	})
	.fail(function() {
		Swal.fire(
			'Gagal!',
			'Gagal Hapus Data, Silahkan Ulangi Atau Gunakan Koneksi Yang Baik.',
			'error'
			)
	});

});
