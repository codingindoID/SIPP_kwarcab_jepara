	var id_kwaran = $('#id_kwaran').val()
	var base = $('#base').val()
	var items="<option value=''>Filter Kwaran..</option><option value='semua'>Semua Kwaran</option>";
	$.ajax({
		url : base+'c_master/get_kwaran',
		type:'get',
		dataType: 'json',
		success: function(response) {

			for (var i = 0; i < response.length; i++) {
				items+="<option value='"+response[i].id_kwaran+"'>"+response[i].nama_kwaran+"</option>";
			}
			$("#kwaran").html(items); 
		}
	});

	$('#kwaran').select2({
		theme: "bootstrap"
	});

	$('#kwaran').change(function(event) {
		var id = $('#kwaran').val()
		location.href = base+'anggota/filter_anggota/'+id;	
	});

	$('#pangkalan_anggota_bulk').select2({
		theme: "bootstrap",
		dropdownParent: $("#modal-bulk")
	});

	$('#pangkalan_anggota_bulk').change(function(event) {
		var id = $(this).val()
			var ta="<option value=''>--Pilih Tahun Ajaran--</option>";
			$.ajax({
				url : base+'anggota/get_tahun_ajaran/',
				type:'post',
				data : { pangkalan_bulk : id},
				dataType: 'json',
				success: function(response) {
					
					for (var i = 0; i < response.length; i++) {
						ta+="<option value='"+response[i].ta+"'>"+response[i].ta+"</option>";
					}
					$("#ta_bulk").html(ta); 

				}
			});
	});

	$('#bulk').change(function(event) {
		var id = $(this).val()
		if (id == 'angkatan') {
			var ta="<option value=''>--Pilih Tahun Ajaran--</option>";
			$.ajax({
				url : base+'anggota/get_tahun_ajaran',
				type:'get',
				dataType: 'json',
				success: function(response) {
					
					for (var i = 0; i < response.length; i++) {
						ta+="<option value='"+response[i].ta+"'>"+response[i].ta+"</option>";
					}
					$("#ta_bulk").html(ta); 

				}
			});


			$('#modal-bulk').modal('show')
		}
	});

	$('#close').click(function(event) {
		$('#bulk').val("")
	});

	$('.close').click(function(event) {
		$('#bulk').val("")
	});





	function lihat(id)
	{
		location.href = base+'anggota/lihat_anggota/'+id;
	}

	function edit(id)
	{
		location.href	= base+'anggota/edit_anggota/'+id;
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
				location.href= base+'anggota/hapus_anggota/'+id+'/'+id_kwaran

			}
		})
	}

	function hapus_potensi(id)
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
				location.href= base+'anggota/hapus_potensi_anggota/'+id+'/'+id_kwaran

			}
		})
	}