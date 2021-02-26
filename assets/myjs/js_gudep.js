var base = $('#base').val()

$('#select-gudep').select2({
	theme: "bootstrap",
	dropdownParent: $('#modal_add')
});

function hapus(id,asal="")
{
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
				url: base+'gudep/hapus_gudep/'+id+'/'+asal,
				type: 'get',
				dataType: 'json',
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

function edit(id)
{
	$.ajax({
		url: base+'gudep/detil/'+id,
		type: 'get',
		dataType: 'json',
	})
	.done(function(data) {
		$('#pangkalan').val(data.id_pangkalan)
		$('#id_gudep').val(id)
		$('#gudep').val(data.no_gudep)
		$('#ambalan').val(data.ambalan)
	})
	.fail(function() {
		console.log("error");
	});

}

$('#update_data').click(function(event){
	var base 		= $('#base').val()
	var pangkalan 	= $('#pangkalan').val()
	var no_gudep 	= $('#gudep').val()
	var ambalan 	= $('#ambalan').val()
	var id_gudep 	= $('#id_gudep').val()

	if (pangkalan == '' || no_gudep == '' || ambalan == '') {
		Swal.fire({
			title: 'Maaf,',
			text: 'Inputan Tidak Boleh Ada Yang Kosong',
			icon: 'error',
			confirmButtonColor: '#3085d6',
			confirmButtonText: 'Ok'
		}).then((result) => {
			if (result.isConfirmed) {
			}
		})
	}
	else
	{
		$.ajax({
			url: base+'gudep/update_gudep',
			type: 'post',
			dataType: 'json',
			data: {
				pangkalan : pangkalan,
				gudep     : no_gudep,
				ambalan   : ambalan,
				id_gudep  : id_gudep
			},
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
			Swal.fire({
				title: 'Maaf,',
				text: 'Gagal Update, Silahkan Ulangi Atau Gunakan Koneksi Yang Baik',
				icon: 'error',
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Ok'
			}).then((result) => {
				if (result.isConfirmed) {
				}
			})
		});
	}
});

function lihat(id)
{
	location.href = base+'gudep/lihat_gudep/'+ id;
}