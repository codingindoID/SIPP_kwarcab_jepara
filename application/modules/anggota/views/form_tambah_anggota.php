<form method="post" action="<?php echo site_url('anggota/insert_anggota/') ?>">
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label >Kwarran <span class="text-danger">**</span> </label>
				<div class="select2-input">
					<select id="kwaran" name="kwaran" class="form-control" required >
						<option value="">Pilih . . </option>
						<?php foreach ($kwaran as $k): ?>
							<option value="<?php echo $k->id_kwaran ?>"><?php echo $k->nama_kwaran ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label >Gudep <span class="text-danger">**</span></label>
				<div class="select2-input">
					<select id="gudep" name="gudep" class="form-control" disabled="true" required>
						<option value="">Pilih Gudep. . </option>
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
					<label >Tahun Ajaran <span class="text-danger">**</span></label>
					<input type="number" class="form-control" name="ta" required>
				</div>
		</div>
	</div>
	<div class="info" hidden="true" >
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label >Nama <span class="text-danger">**</span></label>
					<input type="text" class="form-control" name="nama" required>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md">
				<span class="ml-3"><b>Alamat <span class="text-danger">**</span></b></span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<div class="select2-input">
						<select id="kecamatan" name="kecamatan" class="form-control" style="width: 100%;" required>
							<option value="">KECAMATAN . . </option>
							<?php foreach ($kecamatan as $kec): ?>
								<option value="<?php echo $kec->id_kecamatan ?>"><?php echo $kec->nama_kecamatan ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<div class="select2-input">
						<select id="desa" name="desa" class="form-control" style="width: 100%;" disabled required>
							<option value="">DESA</option>
							<!-- <?php foreach ($kecamatan as $kec): ?>
								<option value="<?php echo $kec->id_kecamatan ?>"><?php echo $kec->nama_kecamatan ?></option>
							<?php endforeach ?> -->
						</select>
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<input type="number" class="form-control" name="rt" disabled placeholder="RT" required>
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<input type="number" class="form-control" name="rw" disabled placeholder="RT" required>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label >Tempat Lahir</label>
					<input type="text" class="form-control" name="tempat_lahir" required>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label >Tanggal Lahir</label>
					<input type="date" class="form-control" name="tgl_lahir" required>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label >Golongan Darah <span class="text-danger">**</span></label>
					<select name="darah" class="form-control" required>
						<option value="">Pilih . . </option>
						<?php foreach ($darah as $d): ?>
							<option value="<?php echo $d->darah ?>"><?php echo $d->darah ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
		</div>
		<div class="separator-solid"></div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label >Golongan Kepramukaan <span class="text-danger">**</span></label>
					<select name="golongan" id="golongan" class="form-control" required>
						<option value="">Pilih . . </option>
						<?php foreach ($golongan as $g): ?>
							<option value="<?php echo $g->golongan ?>"><?php echo ucwords($g->golongan) ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label >Tingkat / Kualifikasi ( Tingkatan Terahir Yang Diperoleh ) <span class="text-danger">**</span></label>
					<select name="tingkat" class="form-control" disabled="true" required>
						<option value="">Pilih Tingkat. . </option>
					</select>
				</div>
				<p class="ml-2 text-danger">* Keterangan : NK = Non Kualifikasi</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Nomor KTA ( kosongkan jika tidak mempunyai )</label>
					<input type="text" class="form-control" name="kta" placeholder="-">
				</div>
			</div>
		</div>


		<div class="separator-solid"></div>
		<H4 data-toggle="collapse" href="#kmd" role="button" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer;" class="ml-2"><b>Ijazah KMD</b><span class="caret"></span></H4>
		<div class="row collapse" id="kmd">
			<div class="col-md-6">
				<div class="form-group">
					<label>Nomor</label>
					<input type="text" class="form-control" name="no_kmd" placeholder="-">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Penyelenggara</label>
					<input type="text" class="form-control" name="p_kmd" placeholder="-">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Tempat</label>
					<input type="text" class="form-control" name="tempat_kmd" placeholder="-">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Tahun</label>
					<input type="number" class="form-control" name="tahun_kmd" placeholder="-" value="">
				</div>
			</div>
			<div class="col-md-4">

			</div>
		</div>
		<div class="separator-solid"></div>
		<H4 data-toggle="collapse" href="#kml" role="button" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer;" class="ml-2"><b>Ijazah KML</b><span class="caret"></span></H4>
		<div class="row collapse" id="kml">
			<div class="col-md-6">
				<div class="form-group">
					<label>Nomor</label>
					<input type="text" class="form-control" name="no_kml" placeholder="-">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Penyelenggara</label>
					<input type="text" class="form-control" name="p_kml" placeholder="-">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Tempat</label>
					<input type="text" class="form-control" name="tempat_kml" placeholder="-">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Tahun</label>
					<input type="number" class="form-control" name="tahun_kml" placeholder="-" value="">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Golongan</label>
					<select name="golongan_kml" class="form-control">
						<option value="">Pilih . . </option>
						<?php foreach ($golongan_sert as $g): ?>
							<option value="<?php echo $g->golongan ?>"><?php echo $g->golongan ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
		</div>

		<div class="separator-solid"></div>
		<H4 data-toggle="collapse" href="#kpd" role="button" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer;" class="ml-2"><b>Ijazah KPD</b><span class="caret"></span></H4>
		<div class="row collapse" id="kpd">
			<div class="col-md-6">
				<div class="form-group">
					<label>Nomor</label>
					<input type="text" class="form-control" name="no_kpd" placeholder="-">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Penyelenggara</label>
					<input type="text" class="form-control" name="p_kpd" placeholder="-">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Tempat</label>
					<input type="text" class="form-control" name="tempat_kpd" placeholder="-">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Tahun</label>
					<input type="number" class="form-control" name="tahun_kpd" placeholder="-" value="">
				</div>
			</div>
			<div class="col-md-4">

			</div>
		</div>

		<div class="separator-solid"></div>
		<H4 data-toggle="collapse" href="#kpl" role="button" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer;" class="ml-2"><b>Ijazah KPL</b><span class="caret"></span></H4>
		<div class="row collapse" id="kpl">
			<div class="col-md-6">
				<div class="form-group">
					<label>Nomor</label>
					<input type="text" class="form-control" name="no_kpl" placeholder="-">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Penyelenggara</label>
					<input type="text" class="form-control" name="p_kpl" placeholder="-">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Tempat</label>
					<input type="text" class="form-control" name="tempat_kpl" placeholder="-">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Tahun</label>
					<input type="number" class="form-control" name="tahun_kpl" placeholder="-" value="">
				</div>
			</div>
			<div class="col-md-4">

			</div>
		</div>
		<div class="row">
			<div class="col-md-4 mt-2">
				<div class="form-group">
					<button type="submit" class="btn btn-secondary" style="color: white"><i class="fa fa-save"></i> Simpan data</button>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<p class="text-danger">Nb : <br><strong>**  Wajib Diisi</strong></p>
		</div>
	</div>
</form>


<!-- select 2 -->
<script src="<?php echo base_url('assets/select2') ?>/select2.full.min.js"></script>
<script src="<?php echo base_url('assets/myjs') ?>/js_insert.js"></script>
