<div class="table-responsive">
	<table class="table" id="basic-datatables">
		<thead>
			<tr>
				<th>No</th>
				<th>Asal Pangkalan</th>
				<th>Nama Alias</th>
				<th>Email</th>
				<th>Username</th>
				<th>Password</th>
				<th class="text-center">#</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1 ; foreach ($admin as $adm): ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><b><?php echo strtoupper($adm->nama_pangkalan) ?></b></td>
				<td><?php echo $adm->display_name ?></td>
				<td><?php echo $adm->email ?></td>
				<td><?php echo $adm->username ?></td>
				<td><a href="#modal_pass" data-toggle="modal" onclick="lihat(<?php echo $adm->id_user ?>)"><?php echo substr($adm->password, 1, 10) ?></a></td>
				<td class="text-right">
					<div class="dropdown">
						<a href="#" class="btn-sm btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white"> 
							<i class="fas fa-align-justify"></i>
						</a>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="<?php echo site_url('admin/detil_admin/3/').$adm->id_user ?>" ><i class="fa fa-edit"></i> Edit</a>
							<a class="dropdown-item" href="#" onclick="hapus('<?php echo $adm->id_user ?>')"><i class="fa fa-trash" ></i> Hapus</a>
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
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content"> 
			<div class="modal-header bg-primary">
				<h4 class="modal-title"><span id="title_modal">Tambah Admin Kwaran</span></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?php echo site_url('admin/tambah_admin') ?>" method="post" accept-charset="utf-8">
					<div class="form-group row">
						<div class="col-md-6">
							<input type="hidden" name="id_user" >
							<label for="exampleInputEmail1">Set Username</label>
							<input type="text" class="form-control" name="username" placeholder="username" required>
						</div>
						<div class="col-md-6">
							<label for="exampleInputEmail1">Set Email</label>
							<input type="email" class="form-control" name="email" placeholder="email" required>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-6">
							<label for="exampleInputEmail1">Set Display Name</label>
							<input type="text" class="form-control" name="display_name" placeholder="display name" required>
						</div>
						<div class="col-md-6">
							<label>Pangkalan ** </label>
							<div class="select2-input">
								<select class="select-kwaran" name="pangkalan" class="form-control" style="width: 100%;" required >
									<option value="">Pilih . . </option>
									<?php foreach ($pangkalan as $k): ?>
										<option value="<?php echo $k->id_pangkalan ?>"><?php echo $k->nama_pangkalan ?></option>	
									<?php endforeach ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row col-md-12 ml-1">
						<p class="text-danger"><b>NB : </b> Default password = <b>12345</b></p>
					</div>
					<div class="modal-footer">
						<button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Simpan Data</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- modal -->
<div id="modal_pass" class="modal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content"> 
			<div class="modal-header bg-primary">
				<h4 class="modal-title"><span id="title_modal">Ganti Password</span></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group row">
					<div class="col-md-6">
						<input type="hidden" name="id_user" >
						<input type="hidden" name="jenis_admin" >
						<label for="exampleInputEmail1">Set Password Baru</label>
						<input type="password" class="form-control" name="password1" placeholder="password" required>
					</div>
					<div class="col-md-6">
						<label for="exampleInputEmail1">Ulangi</label>
						<input type="password" class="form-control" name="password2" placeholder="ulang password" required>
					</div>
					
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary" id="simpan_pass"><i class="fa fa-lock"></i> Update Password</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- select 2 -->
<script src="<?php echo base_url('assets/select2') ?>/select2.full.min.js"></script>
<script src="<?php echo base_url('assets/myjs/') ?>admin_gudep.js"></script>
