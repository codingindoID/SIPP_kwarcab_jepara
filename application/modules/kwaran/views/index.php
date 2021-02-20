<div class="row">
	<div class="col-md-12" style="padding-right: 12%; padding-left: 12%">
		<center>
			<div class="table-responsive">
				<table class="table table-hover" id="basic-datatables">
					<thead>
						<tr>
							<th class="text-center">NO</th>
							<th>NOMOR KWARAN</th>
							<th>NAMA KWARAN</th>
							<th class="text-center">#</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach ($kwaran as $k): ?>
						<tr>
							<td class="text-center"><?php echo $no++ ?></td>
							<td><b><?php echo $k->nomor_kwaran ?></b></td>
							<td><b><?php echo $k->nama_kwaran ?></b></td>
							<td class="text-center">
								<div class="dropdown">
									<a href="#" class="btn-sm btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white"> 
										<i class="fas fa-align-justify"></i>
									</a>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<a class="dropdown-item" href="<?php echo site_url('kwaran/lihat/').$k->id_kwaran ?>" ><i class="fa fa-eye" ></i> Lihat</a>

										<?php if ($this->session->userdata('ses_level') == 1): ?>
											<a class="dropdown-item" onclick="detil(<?php echo $k->id_kwaran  ?>)" href="#modal_add" data-toggle="modal"><i class="fa fa-edit"></i> Edit</a>
											<a class="dropdown-item" href="#" onclick="hapus(<?php echo $k->id_kwaran  ?>)"><i class="fa fa-trash"></i> Hapus</a>
										<?php endif ?>
										
									</div>
								</div>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</center>
</div>
</div>

<!-- modal -->
<div id="modal_add" class="modal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><span id="modal_title_kwaran" style="color: black; font-weight: bold"><b>TAMBAH KWARAN</b></span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?php echo site_url('kwaran/aksi_tambah_kwaran') ?>" method="post" accept-charset="utf-8">
					<div class="form-group row">
						<div class="col-md-6">
							<input type="hidden" id="id_kwaran" value="" name="id_kwaran">
							<label for="exampleInputPassword1">NOMOR KWARAN</label>
							<input type="text" class="form-control" name="nomor_kwaran" placeholder="nomor Kwaran" required>
						</div>
						<div class="col-md-6">
							<label for="exampleInputPassword1">NAMA KWARAN</label>
							<input type="text" class="form-control" name="nama_kwaran" placeholder="nama kwaran" required>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-12">
							<label for="exampleInputPassword1">ALAMAT KWARAN</label>
							<textarea type="text" class="form-control" name="alamat_kwaran" placeholder="alamat kwaran" required></textarea>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-6">
							<label for="exampleInputPassword1">KA.MABIRRAN</label>
							<input type="text" class="form-control" name="kamabiran" placeholder="kamabiran" required>
						</div>
						<div class="col-md-6">
							<label for="exampleInputPassword1">KA.KWARRAN</label>
							<input type="text" class="form-control" name="kakwaran" placeholder="kakwaran" required>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-6">
							<label for="exampleInputPassword1">STATUS SEKRETARIAT</label>
							<select name="status"  class="form-control">
								<option value="">Pilih..</option>
								<?php foreach ($status_sek as $st): ?>
									<option value="<?php echo $st->id ?>"><?php echo $st->status_kepemilikan ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="col-md-6">
							<label for="exampleInputPassword1">SIFAT SEKRETARIAT</label>
							<select name="sifat"  class="form-control">
								<option value="">Pilih..</option>
								<?php foreach ($sifat_sek as $sf): ?>
									<option value="<?php echo $sf->id_sifat ?>"><?php echo $sf->sifat_kepemilikan ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<h3><center><b>Kepengurusan</b></center></h3>
					<div class="separator-solid"></div>
					<div class="form-group row">
						<div class="col-md-6">
							<label for="exampleInputPassword1">NOMOR SK</label>
							<input type="text" class="form-control" name="nomor_sk" placeholder="NOMOR SK" required>
						</div>
						<div class="col-md-6">
							<label for="exampleInputPassword1">TANGGAL SK</label>
							<input type="date" class="form-control" name="tgl_sk" placeholder="Tanggal SK" required>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-6">
							<label for="exampleInputPassword1">MASA BAKTI</label>
							<input type="date" class="form-control" name="awal_bakti" placeholder="Mulai Tahun" required>
						</div>
						<div class="col-md-6">
							<label for="exampleInputPassword1">SAMPAI DENGAN</label>
							<input type="date" class="form-control" name="akhir_bakti" placeholder="Sampai Tahun" required>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				</div>
			</div>
		</form>
	</div>
</div>


<script src="<?php echo base_url('assets/myjs/js_kwaran.js') ?>" type="text/javascript"></script>
