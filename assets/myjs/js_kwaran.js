var base = $('#base').val()
function tambah()
{
	$('#modal_title_kwaran').text('Tambah Kwaran')
	$('#id_kwaran').val('')
	$('input[name="kwaran"]').val('')
	$('input[name="no_kwaran"]').val('')
	$('textarea[name="alamat_kwaran"]').val('')
	$('input[name="kamabiran"]').val('')
	$('input[name="kakwaran"]').val('')
	$('select[name="status"]').val('')
	$('select[name="sifat"]').val('')
}

function detil(id)
{
	$('#modal_title_kwaran').text('Edit Kwaran')
	$.ajax({
		url: base+'kwaran/detil/'+id,
		type: 'get',
		dataType: 'json',
	})
	.done(function(data) {
		$('#id_kwaran').val(id)
		$('input[name="nomor_kwaran"]').val(data.nomor_kwaran)
		$('input[name="nama_kwaran"]').val(data.nama_kwaran)
		$('textarea[name="alamat_kwaran"]').val(data.alamat_kwaran)
		$('input[name="kamabiran"]').val(data.kamabiran)
		$('input[name="kakwaran"]').val(data.kakwaran)
		$('input[name="nomor_sk"]').val(data.nomor_sk)
		$('input[name="tgl_sk"]').val(data.tgl_sk)
		$('input[name="awal_bakti"]').val(data.awal_bakti)
		$('input[name="akhir_bakti"]').val(data.akhir_bakti)
		$('select[name="status"]').val(data.status_kepemilikan)
		$('select[name="sifat"]').val(data.sifat_kepemilikan)
	})
	.fail(function() {
		console.log("error");
	});
}

function hapus(id)
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
				url: base+'kwaran/hapus_kwaran/'+id,
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