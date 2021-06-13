<?php 
$level = $this->session->userdata('ses_level');
?>
<div class="table-responsive">
	<table id="basic-datatables" class="display table">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Anggota</th>
				<th>Asal Pangkalan</th>
				<th>Satuan</th>
				<th>Tingkat</th>
				<th class="text-center">#</th>

			</tr>
		</thead>
		<tbody>
			<?php if ($anggota): $no = 1;?>
				<?php foreach ($anggota as $anggota): ?>
					<input type="hidden" id="id_kwaran" value="<?php echo $anggota->id_kwaran ?>">
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $anggota->nama ?></td>
						<td><?php echo $anggota->nama_pangkalan ?></td>
						<td><?php echo $anggota->ambalan ?></td>
						<td><?php echo $anggota->tingkat ?></td>
						<td class="text-right">
							<div class="dropdown">
								<a href="#" class="btn-sm btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white"> 
									<i class="fas fa-align-justify"></i>
								</a>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item" href="<?php echo site_url('anggota/lihat_anggota/').$anggota->id_anggota ?>"><i class="fa fa-eye" ></i> Lihat</a>
									<?php if ($level != 4): ?>
										<a class="dropdown-item" href="<?php echo site_url('anggota/edit_anggota/').$anggota->id_anggota.'/anggota' ?>"><i class="fa fa-edit"></i> Edit</a>
										<a class="dropdown-item" href="#" onclick="hapus(<?php echo $anggota->id_anggota ?>)"><i class="fa fa-trash" ></i> Hapus</a>
									<?php endif ?>
								</div>
							</div>
						</td>
						

					</tr>
				<?php endforeach ?>
			<?php endif ?>
			
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
								<select id="pangkalan_bulk" name="pangkalan_bulk" required>
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