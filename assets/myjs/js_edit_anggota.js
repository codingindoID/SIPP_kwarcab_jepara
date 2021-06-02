$(document).ready(function() {
	var base    	= $('#base').val()
	/*event onchange*/
	$('#select-kecamatan').select2({
		theme: "bootstrap"
	});

	$('#desa').select2({
		theme: "bootstrap"
	});


	$('#select-kecamatan').on('change', function(event) {
		var kecamatan 	= $('#select-kecamatan').val()
		var base    	= $('#base').val()

		$.ajax({
			url: base+'anggota/getDesa/'+kecamatan,
			type: 'get',
			dataType: 'json',
		})
		.done(function(data) {
			$('#desa').attr('readonly', false);
			var items="<option value=''>Pilih Desa..</option>";
			for (var i = 0; i < data.length; i++) {
				items+="<option value='"+data[i].id_desa+"'>"+data[i].nama_desa + "</option>";
			}
			$("#desa").html(items); 
		})
		.fail(function() {
			console.log("error");
		});
	});

	$('#desa').on('change', function(event) {
		$('input[name="rt"]').attr('readonly', false);
		$('input[name="rw"]').attr('readonly', false);
	});


	$('#kwaran').select2({
		theme: "bootstrap"
	});

	$('#gudep').select2({
		theme: "bootstrap"
	});


	$('#kwaran').change(function(event) {
		var id = $(this).val()
		if (id == "" || id == null) {
			Swal.fire(
				'Maaf,',
				'Kwaran Tidak Boleh Kosong..',
				'error'
				)
		}
		else
		{
			var items="<option value=''>Pilih Gudep..</option>";
			$.ajax({
				url: base+'c_master/ajax_gudep/'+id,
				type: 'get',
				dataType: 'json',
			})
			.done(function(data) {
				for (var i = 0; i < data.length; i++) {
					items+="<option value='"+data[i].id_gudep+"'>"+data[i].no_gudep+" - "+ data[i].ambalan +" ( " +data[i].nama_pangkalan+" )</option>";
				}
				$("#gudep").html(items); 

				console.log(data)
			})
			.fail(function() {
				console.log("error");
			});
		}
	});

});