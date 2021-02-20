	var id_kwaran = $('#id_kwaran').val()
	var base = $('#base').val()
	var items="<option value=''>Filter Kwaran..</option>";
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

	$('#kwaran').change(function(event) {
		var id = $('#kwaran').val()
		location.href = base+'anggota/filter_anggota/'+id;	
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