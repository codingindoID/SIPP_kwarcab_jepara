$(document).ready(function() {
	$('#select-kwaran').select2({
		theme: "bootstrap",
		dropdownParent: $('#modal_add')
	});
});

function edit(id)
{
	var base = $('#base').val()

	$.ajax({
		url: base+'pangkalan/detil/'+id,
		type: 'get',
		dataType: 'json',
	})
	.done(function(data) {
		$('#id_pangkalan').val(id)
		$('#nama_pangkalan').val(data.nama_pangkalan)
		$('#alamat').val(data.alamat_pangkalan)
		$('#kwaran').val(data.kwaran)
		$('#kamabigus').val(data.kamabigus)
		$('#kagudep').val(data.kagudep)
		$('#jumlah_pembina').val(data.jumlah_pembina)

	})
	.fail(function() {
		Swal.fire(
			'Gagal,',
			'Silahkan Ulangi, Atau gunakan koneksi yang baik..',
			'error'
			)
	});
	
}

function hapus(id)
{
	var base = $('#base').val()
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
				url: base+'pangkalan/hapus_pangkalan/'+id,
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