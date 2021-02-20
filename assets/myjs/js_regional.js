$(document).ready(function() {
	$('#select-kwaran').select2({
		theme: "bootstrap",
		dropdownParent: $('#modal_add')
	});
});

$('#simpan_data').click(function(event){
	var base = $('#base').val()
	var nama_pangkalan 	= $('input[name="nama_pangkalan"]').val()
	var alamat    		= $('textarea[name="alamat"]').val()
	var kwaran  		= $('input[name="kwaran"]').val()
	var kamabigus 		= $('input[name="kamabigus"]').val()
	var kagudep 		= $('input[name="kagudep"]').val()
	var jumlah_pembina 	= $('input[name="jumlah_pembina"]').val()

	var input = {
		nama_pangkalan 	: nama_pangkalan,
		alamat 			: alamat,
		kwaran 			: kwaran,
		kamabigus 		: kamabigus,
		kagudep 		: kagudep,
		jumlah_pembina 	: jumlah_pembina
	};

	if (nama_pangkalan == '' || alamat == '' || kwaran == '' || kamabigus == '' || kagudep == '' ||jumlah_pembina == ''  ) {
		Swal.fire(
			'Maaf,',
			'Data Inputan Tidak Boleh Kosong..',
			'error'
			)
	}
	else
	{
		$.ajax({
			url: base+'pangkalan/tambah_pangkalan',
			type: 'post',
			dataType: 'json',
			data:input,
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
					location.href  = base+'pangkalan/regional';
				}
			})
		})
		.fail(function() {
			Swal.fire(
				'Gagal,',
				'Silahkan Ulangi, Atau gunakan koneksi yang baik..',
				'error'
				)
		});
		
	}
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

$('#update_data').click(function(event) {
	var base = $('#base').val()
	var id_pangkalan 	= $('#id_pangkalan').val()
	var nama_pangkalan 	= $('#nama_pangkalan').val()
	var alamat    		= $('#alamat').val()
	var kamabigus 		= $('#kamabigus').val()
	var kagudep 		= $('#kagudep').val()
	var jumlah_pembina 	= $('#jumlah_pembina').val()

	var input = {
		id_pangkalan 	: id_pangkalan,
		nama_pangkalan 	: nama_pangkalan,
		alamat 			: alamat,
		kamabigus 		: kamabigus,
		kagudep 		: kagudep,
		jumlah_pembina 	: jumlah_pembina
	};

	if (nama_pangkalan == '' || alamat == '' || kwaran == '' || kamabigus == '' || kagudep == '' ||jumlah_pembina == ''  ) {
		Swal.fire(
			'Maaf,',
			'Data Inputan Tidak Boleh Kosong..',
			'error'
			)
	}
	else
	{
		$.ajax({
			url: base+'pangkalan/update_pangkalan',
			type: 'post',
			dataType: 'json',
			data:input,
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
					location.href = base+'pangkalan/regional';
				}
			})
		})
		.fail(function() {
			Swal.fire(
				'Gagal,',
				'Silahkan Ulangi, Atau gunakan koneksi yang baik..',
				'error'
				)
		});
		
	}
});

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
					location.href  = base+'pangkalan/regional';
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