<?php 
$this->load->view('tema/header'); 
$this->load->view('tema/navbar'); 
?>

<div class="container">
	<div class="card">
		<div class="card-header">
			<a class="btn-sm btn-success" href="#" onclick="window.history.back()"><i class="fa fa-arrow-left"></i> Kembali</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="table-anggota" class="display table table-hover table-bordered table-striped">
					<thead class="bg-info text-white">
						<tr>
							<th>No</th>
							<th>Nama Anggota</th>
							<th>Asal Pangkalan</th>
							<th>Satuan</th>
							<th>Tingkat</th>
							<th>TA</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>

	</div>

</div>
<?php $this->load->view('tema/js'); ?>

<script>
	$(document).ready(function() {
		var base = $('#base_url').data('id')
		var table 	= $('#table-anggota').DataTable()
		table.destroy()
		$('#table-anggota').DataTable({ 

			"processing": true, 
			"serverSide": true, 
			"order": [], 

			"ajax": {
				"url": base + 'landing/getAnggota/',
				"type": "POST"
			},


			"columnDefs": [
			{ 
				"targets": [ 0 ], 
				"orderable": false, 
			},
			],

		});
	});
</script>



<?php $this->load->view('tema/footer'); ?>