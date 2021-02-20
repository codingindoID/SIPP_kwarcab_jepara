var base = $('#base').val()

$('.select-kwaran').select2({
	theme: "bootstrap",
	dropdownParent: $('#modal_add')
});

$('#tambah_data').click(function(event) {
	$('#title_modal').text('Tambah Admin Gudep')
	$('select[name="pangkalan"]').val('')
	$('input[name="username"]').val('')
	$('input[name="email"]').val('')
	$('input[name="display_name"]').val('')
});

function lihat(id)
{
	$('input[name="id_user"]').val(id)
}

$('#simpan_pass').click(function(event) {
	var password1 		= $('input[name="password1"]').val()
	var password2 		= $('input[name="password2"]').val()
	var id_user 		= $('input[name="id_user"]').val()
	var jenis_admin 	= 3

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
			url: base+'admin/updatepassword',
			type: 'post',
			dataType: 'json',
			data: {id_user: id_user, password : password1, jenis_admin : jenis_admin},
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
				'Coba Ulangi, Atau Gunakan Koneksi Yang Baik',
				'error'
				)
		});
		
	}
});


function hapus(id)
{
	var jenis_admin 	= 3
	Swal.fire({
		title: 'Anda Yakin Menghapus Data Ini?',
		text: "Data Terhapus Tidak Dapat Dikembalikan, Dan Mungkin Akan Berprngaruh Pada Data Lainnya,",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Batal',
		confirmButtonText: 'Ya, tetap Hapus!'
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				url: base+'admin/hapus_admin',
				type: 'post',
				dataType: 'json',
				data : {jenis_admin : jenis_admin , id_user : id}
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
						location.href  = data.action;
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

		}
	})
}