<div class="table-responsive">
	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<?php echo $this->session->flashdata('success'); ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php elseif ($this->session->flashdata('error')):  ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<?php echo $this->session->flashdata('error'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php endif ?>
		<table id="basic-datatables" class="display table">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Pangkalan</th>
					<th>Kamabigus</th>
					<th>Kgudep</th>
					<th class="text-center">Jumlah Pembina</th>
					<th class="text-center">#</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$no = 1;
				foreach ($pangkalan as $p): ?>
					<?php if ($p->nama_pangkalan != null): ?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $p->nama_pangkalan ?></td>
							<td><?php echo $p->kamabigus ?></td>
							<td><?php echo $p->kagudep ?></td>
							<td class="text-center"><?php echo $p->jumlah_pembina ?></td>
							<td class="text-right">
								<div class="dropdown">
									<a href="#" class="btn-sm btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white"> 
										<i class="fas fa-align-justify"></i>
									</a>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<a class="dropdown-item" href="<?php echo site_url('pangkalan/lihat/').$p->id_pangkalan.'/'.$p->jumlah_pembina ?>" ><i class="fa fa-eye" ></i> Lihat</a>

										<?php if ($this->session->userdata('ses_level') == 1): ?>
											<a onclick="edit(<?php echo $p->id_pangkalan ?>)" class="dropdown-item" href="#modal_edit" data-toggle="modal"><i class="fa fa-edit" ></i> Edit</a>
											<a class="dropdown-item" href="#" onclick="hapus(<?php echo $p->id_pangkalan ?>)"><i class="fa fa-trash"></i> Hapus</a>
										<?php endif ?>
									</div>
								</div>
							</td>
						</tr>
					<?php endif ?>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>


	<!-- modal -->
	<div id="modal_add" class="modal" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Pangkalan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group row">
						<div class="col-md-6">
							<label for="exampleInputEmail1">Nama Pangkalan</label>
							<input type="text" name="nama_pangkalan" value="" class="form-control">
						</div>
						<div class="col-md-6">
							<label>Kwaran ** </label>
							<div class="select2-input">
								<select id="select-kwaran" name="kwaran" >
									<option value="">Pilih . . </option>
									<?php foreach ($kwaran as $k): ?>
										<option  value="<?php echo $k->id_kwaran ?>"><?php echo $k->nama_kwaran ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-12">
							<label for="exampleInputPassword1">Alamat</label>
							<textarea type="text" class="form-control" name="alamat" placeholder="xxx.xxx" required></textarea>
						</div>
						
					</div>
					<div class="form-group row">
						<div class="col-md-6">
							<label for="exampleInputPassword1">Ka. Mabigus</label>
							<input type="text" name="kamabigus" value="" class="form-control">
						</div>
						<div class="col-md-6">
							<label for="exampleInputPassword1">Ka. Gudep</label>
							<input type="text" name="kagudep" value="" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-6">
							<label for="exampleInputPassword1">Jumlah Pembina</label>
							<input type="number" name="jumlah_pembina" value="" class="form-control">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" id="simpan_data"><i class="fa fa-save"></i> Simpan Data</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				</div>
			</div>
		</div>
	</div>

	<!-- modal -->
	<div id="modal_edit" class="modal" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Pangkalan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group row">
						<div class="col-md-6">
							<input type="hidden" id="id_pangkalan">
							<label for="exampleInputEmail1">Nama Pangkalan</label>
							<input type="text" id="nama_pangkalan"  value="" class="form-control">
						</div>
						<div class="col-md-6">
							<label>Kwaran ** </label>
							<div class="select2-input">
								<select id="kwaran" name="kwaran" class="form-control" >
									<option value="">Pilih . . </option>
									<?php foreach ($kwaran as $b): ?>
										<option  value="<?php echo $b->id_kwaran ?>"><?php echo $b->nama_kwaran ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-12">
							<label for="exampleInputPassword1">Alamat</label>
							<textarea type="text" class="form-control" id="alamat" id="alamat" placeholder="xxx.xxx" required></textarea>
						</div>
						
					</div>
					<div class="form-group row">
						<div class="col-md-6">
							<label for="exampleInputPassword1">Kamabigus</label>
							<input type="text" id="kamabigus" value="" class="form-control">
						</div>
						<div class="col-md-6">
							<label for="exampleInputPassword1">Kagudep</label>
							<input type="text" id="kagudep" value="" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-6">
							<label for="exampleInputPassword1">Jumlah Pembina</label>
							<input type="number" id="jumlah_pembina" value="" class="form-control">
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
	<script src="<?php echo site_url('assets/myjs/') ?>js_pangkalan.js" type="text/javascript" ></script>