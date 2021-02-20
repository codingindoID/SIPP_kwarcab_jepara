$(document).ready(function() {
	$('#kwaran').select2({
		theme: "bootstrap"
	});

	$('#kecamatan').select2({
		theme: "bootstrap"
	});

	$('#desa').select2({
		theme: "bootstrap"
	});

	/*event onchange*/
	$('#kecamatan').on('change', function(event) {
		var kecamatan 	= $('#kecamatan').val()
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

	$('#kwaran').on("change", function (e) { 
		var id_kwaran = $('#kwaran').val()
		var base    = $('#base').val()
		if (id_kwaran == '') {
			Swal.fire(
				'Maaf,',
				'Kwaran Tidak Boleh Kosong..',
				'error'
				)
		}
		else
		{
			$('#gudep').attr('disabled', false);
			$('#gudep').select2({
				theme: "bootstrap"
			});   

			var items="<option value=''>Pilih Gudep..</option>";
			$.ajax({
				url : base+'anggota/get_gudep/'+id_kwaran,
				type:'get',
				dataType: 'json',
				success: function(response) {

					for (var i = 0; i < response.length; i++) {
						items+="<option value='"+response[i].id_gudep+"'>"+response[i].no_gudep+" - "+ response[i].ambalan +" ( " +response[i].nama_pangkalan+" )</option>";
					}
					$("#gudep").html(items); 
				}
			});

			getgudep();
		}

		function getgudep()
		{
			$('#gudep').on('change',function(event){
				$('.info').attr('hidden', false);
			});
		}
	});

	$('#golongan').on('change', function(event) {
		var base    = $('#base').val()
		var golongan  = $('#golongan').val()
		$('select[name="tingkat"]').attr('disabled', false);
		var items="";
		$.ajax({
			url : base+'anggota/get_tingkat/'+golongan,
			type:'get',
			dataType: 'json',
			success: function(response) {

				for (var i = 0; i < response.length; i++) {
					items+="<option value='"+response[i].sub_tingkat+"'>"+response[i].sub_tingkat.toUpperCase()+"</option>";
				}
				$('select[name="tingkat"]').html(items); 
			}
		});
	});

});