<?php 
$level = $this->session->userdata('ses_level');
?>
<input type="hidden" id="id_kwaran" value="<?php echo $filter_kwaran ?>">
<div class="table-responsive">
	<table id="table-anggota" class="display table">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Anggota</th>
				<th>Asal Pangkalan</th>
				<th>Satuan</th>
				<th>Tingkat</th>
				<th>TA</th>
				<th class="text-center">#</th>

			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>

<!-- modal bulk -->
<form action="<?php echo site_url('anggota/bulk_action') ?>" method="post" accept-charset="utf-8">
	<div class="modal fade" id="modal-bulk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-users"></i> Hapus Anggota Berdasarkan Tahun Ajaran</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<?php if ($this->session->userdata('ses_level') == 1 || $this->session->userdata('ses_level') == 2 ): ?>
						<div class="col-md-6">
							<div class="form-group">
								<label >Pangkalan <span class="text-danger">**</span></label>
								<select id="pangkalan_anggota_bulk" class="form-control" name="pangkalan_bulk" required style="width: 100%;">
									<option value="">Pilih Pangkalan. . </option>
									<?php foreach ($pangkalan as $pang): ?>
										<option value="<?php echo $pang->id_pangkalan ?>"><?php echo $pang->nama_pangkalan ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
					<?php endif ?>
					<div class="col">
						<div class="form-group">
							<label>Pilih Tahun Ajaran</label>
							<select id="ta_bulk" name="ta_bulk" required class="form-control">
								<option value="">--Pilih Tahun--</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">Close</button>
				<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Ekseskusi Bulk</button>
			</div>
		</div>
	</div>
</div>
</form>

<script src="<?php echo base_url('assets/myjs/js_anggota.js') ?>" type="text/javascript"></script>
<script>
	$(document).ready(function() {
		$('#table-anggota').DataTable({ 

			"processing": true, 
			"serverSide": true, 
			"order": [], 

			"ajax": {
				"url": "<?php echo $link?>",
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