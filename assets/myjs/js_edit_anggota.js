$(document).ready(function() {
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
			$('#desa').attr('disabled', false);
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
		$('input[name="rt"]').attr('disabled', false);
		$('input[name="rw"]').attr('disabled', false);
	});


	$('#kwaran').select2({
		theme: "bootstrap"
	});

	$('#gudep').select2({
		theme: "bootstrap"
	});
});