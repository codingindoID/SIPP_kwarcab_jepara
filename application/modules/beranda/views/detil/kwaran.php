<div class="card" style="margin-top: -2em">
	<div class="card-header" style="border-radius: 10px; cursor: pointer" href="#body_detil" role="button" aria-expanded="false" aria-controls="body_detil" data-toggle="collapse">
		<h3><i class="fa fa-info-circle"></i> <strong>Detil Kwaran</strong></h3>
	</div>
	<div class="collapse" id="body_detil">
		<div class="card-body " >
			<form action="<?php echo site_url('beranda/aksi_update_kwaran/').$this->session->userdata('ses_kwaran'); ?>" method="post" accept-charset="utf-8">
				<div class="form-group row">
					<div class="col-md-6">
						<input type="hidden" id="id_kwaran" value="" name="id_kwaran">
						<label for="exampleInputPassword1">NOMOR KWARAN</label>
						<input type="text" class="form-control" name="nomor_kwaran" placeholder="nomor Kwaran" required value="<?php echo $kwaran->nomor_kwaran ?>">
					</div>
					<div class="col-md-6">
						<label for="exampleInputPassword1">NAMA KWARAN</label>
						<input type="text" class="form-control" name="nama_kwaran" placeholder="nama kwaran" required value="<?php echo $kwaran->nama_kwaran ?>">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-12">
						<label for="exampleInputPassword1">ALAMAT KWARAN</label>
						<textarea type="text" class="form-control" name="alamat_kwaran" placeholder="alamat kwaran" required><?php echo $kwaran->alamat_kwaran ?></textarea>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-6">
						<label for="exampleInputPassword1">KA.MABIRRAN</label>
						<input type="text" class="form-control" name="kamabiran" placeholder="kamabiran" required value="<?php echo $kwaran->kamabiran ?>">
					</div>
					<div class="col-md-6">
						<label for="exampleInputPassword1">KA.KWARRAN</label>
						<input type="text" class="form-control" name="kakwaran" placeholder="kakwaran" required value="<?php echo $kwaran->kakwaran ?>">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-6">
						<label for="exampleInputPassword1">STATUS SEKRETARIAT</label>
						<select name="status"  class="form-control" required>
							<option value="">Pilih..</option>
							<?php foreach ($status_sek as $st): ?>
								<option value="<?php echo $st->id ?>" <?php echo $kwaran->status_kepemilikan == $st->id ? 'selected' : '' ?>><?php echo $st->status_kepemilikan ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="col-md-6">
						<label for="exampleInputPassword1">SIFAT SEKRETARIAT</label>
						<select name="sifat"  class="form-control">
							<option value="">Pilih..</option>
							<?php foreach ($sifat_sek as $sf): ?>
								<option value="<?php echo $sf->id_sifat ?>" <?php echo $sf->id_sifat == $kwaran->sifat_kepemilikan ? 'selected' : '' ?>><?php echo $sf->sifat_kepemilikan ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
				<h3><center><b>Kepengurusan</b></center></h3>
				<div class="separator-solid"></div>
				<div class="form-group row">
					<div class="col-md-6">
						<label for="exampleInputPassword1">NOMOR SK</label>
						<input type="text" class="form-control" name="nomor_sk" placeholder="NOMOR SK" required value="<?php echo $kwaran->nomor_sk ?>">
					</div>
					<div class="col-md-6">
						<label for="exampleInputPassword1">TANGGAL SK</label>
						<input type="date" class="form-control" name="tgl_sk" placeholder="Tanggal SK" required value="<?php echo $kwaran->tgl_sk ?>">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-6">
						<label for="exampleInputPassword1">MASA BAKTI</label>
						<input type="date" class="form-control" name="awal_bakti" placeholder="Mulai Tahun" required value="<?php echo $kwaran->awal_bakti ?>">
					</div>
					<div class="col-md-6">
						<label for="exampleInputPassword1">SAMPAI DENGAN</label>
						<input type="date" class="form-control" name="akhir_bakti" placeholder="Sampai Tahun" required value="<?php echo $kwaran->akhir_bakti ?>">
					</div>
				</div>
			</div>
			<div class="card-footer">
				<button onclick="return confirm('anda akan merubah info kwaran?')" type="submit" class="btn btn-success float-right mb-3"><i class="fa fa-save"></i> Simpan Perubahan</button>
			</div>
		</div>
	</div>

</form>