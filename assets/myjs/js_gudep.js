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

function lihat(id)
{
	location.href = base+'gudep/lihat_gudep/'+ id;
}