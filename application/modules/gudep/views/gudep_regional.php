<?php 
$level = $this->session->userdata('ses_level');
?>
<div class="table-responsive">
	<table id="basic-datatables" class="display table">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Pangkalan</th>
				<th>No Gudep</th>
				<th>Satuan</th>
				<th class="text-center">Jumlah Anggota</th>
				<th class="text-center">#</th>
			</tr>
		</thead>
		<tbody>
			<?php $no =1 ;
			foreach ($rekap as $rekap): ?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $rekap['nama_pangkalan'] ?></td>
					<td><?php echo $rekap['no_gudep'] ?></td>
					<td><?php echo $rekap['ambalan'] ?></td>
					<td class="text-center" style=""><a href="<?php echo site_url('gudep/anggota_regional/').$rekap['id_gudep'] ?>"><?php echo $rekap['jumlah_anggota'] ?></a></td>
					<td class="text-right">
						<div class="dropdown">
							<a href="#" class="btn-sm btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white"> 
								<i class="fas fa-align-justify"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item" href="<?php echo site_url('gudep/lihat_gudep/').$rekap['id_gudep'] ?>"><i class="fa fa-edit"></i> Lihat</a>
								<a class="dropdown-item" href="#" onclick="hapus(<?php echo $rekap['id_gudep'] ?>,'regional')" ><i class="fa fa-trash"></i> Hapus</a>
							</div>
						</div>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>

<!-- modal -->
<div id="modal_add" class="modal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Gudep</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo site_url('gudep/tambah_gudep/regional') ?>" method="post" accept-charset="utf-8">
				<div class="modal-body">
					<div class="form-group row">
						<div class="col-md-8">
							<label for="exampleInputEmail1">Nama Pangkalan</label>
							<div class="select2-input">
								<select id="select-gudep" name="pangkalan" required>
									<option value="">Pilih..</option>
									<?php foreach ($pangkalan as $pang): ?>
										<option value="<?php echo $pang->id_pangkalan ?>"><?php echo $pang->nama_pangkalan ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-12">
							<label for="exampleInputPassword1">No Gudep</label>
							<input type="text" class="form-control" name="gudep" placeholder="xxx.xxx" required>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-12">
							<label for="exampleInputPassword1">Satuan</label>
							<select name="ambalan" class="form-control">
								<option value="Putra">Putra</option>
								<option value="Putri">Putri</option>
							</select>
						</div>
					</div>


				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" id="simpan_data">Simpan Data</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				</div>
			</div>
		</form>
	</div>
</div>

<div id="modal_edit" class="modal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Gudep</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">			
				<input type="hidden" id="id_gudep">
				<div class="form-group row">
					<div class="col-md-8">
						<label for="exampleInputEmail1">Nama Pangkalan</label>
						<select name="pangkalan" id="pangkalan" class="form-control" required>
							<option value="">Pilih..</option>	
							<?php foreach ($pangkalan as $pang2): ?>
								<option value="<?php echo $pang2->id_pangkalan ?>"><?php echo $pang2->nama_pangkalan ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-12">
						<label for="exampleInputPassword1">No Gudep</label>
						<input type="text" class="form-control" name="gudep" id="gudep" placeholder="xxx.xxx" required>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-12">
						<label for="exampleInputPassword1">Nama Ambalan</label>
						<select name="ambalan" class="form-control" id="ambalan">
							<option value="Putra">Putra</option>
							<option value="Putri">Putri</option>
						</select>
					</div>
				</div>


			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary" id="update_data"><i class="fa fa-save"></i> Simpan Perubahan</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
			</div>
		</div>
	</div>
</div>

<!-- select 2 -->
<script src="<?php echo base_url('assets/select2') ?>/select2.full.min.js"></script>
<script src="<?php echo base_url('assets/myjs/js_gudep.js') ?>" type="text/javascript"></script>