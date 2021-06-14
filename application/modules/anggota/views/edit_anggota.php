<form method="post" action="<?php echo site_url('anggota/update_anggota') ?>">
	<div class="row">
		<div class="col-md-4">
			<input type="hidden" name="id_anggota" value="<?php echo $anggota->id_anggota ?>">
			<input type="hidden" name="asal" value="<?php echo $asal ?>">
			<div class="form-group">
				<label>Kwaran ** </label>
				<div class="select2-input">
					<select id="kwaran" name="kwaran" class="form-control" required >
						<option value="">Pilih . . </option>
						<?php foreach ($kwaran as $k): ?>
							<option <?php echo $anggota->id_kwaran == $k->id_kwaran ? 'selected' : '' ?> value="<?php echo $k->id_kwaran ?>"><?php echo $k->nama_kwaran ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>Gudep **</label>
				<div class="select2-input">
					<select id="gudep" name="gudep" class="form-control" required>
						<option value="">Pilih Gudep. . </option>
						<?php foreach ($gudep_dropdown as $g): ?>
							<option <?php echo $gudep_terpilih == $g->id_gudep ? 'selected' : '' ?> value="<?php echo $g->id_gudep ?>"><?php echo $g->no_gudep.' - '.$g->ambalan.' ( '.$g->nama_pangkalan.')' ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
					<label >Tahun Ajaran <span class="text-danger">**</span></label>
					<input type="number" class="form-control" name="ta" required value="<?php echo $anggota->ta != null ? $anggota->ta : '' ?>">
				</div>
		</div>
	</div>
	<div class="info">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Nama **</label>
					<input type="text" class="form-control" name="nama" value="<?php echo $anggota->nama ?>" required>
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
						<select id="select-kecamatan" name="kecamatan" class="form-control" required>
							<option value="">KECAMATAN . . </option>
							<?php foreach ($kecamatan as $kec): ?>
								<option <?php echo $anggota->kecamatan == $kec->id_kecamatan ? 'selected' : '' ?> value="<?php echo $kec->id_kecamatan ?>"><?php echo $kec->nama_kecamatan ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<div class="select2-input">
						<select id="desa" name="desa" readonly class="form-control" required>
							<option value="">DESA</option>
							<?php foreach ($desa as $des): ?>
								<option <?php echo $anggota->desa == $des->id_desa ? 'selected' : '' ?> value="<?php echo $des->id_desa ?>"><?php echo $des->nama_desa ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<input type="number" class="form-control" name="rt" placeholder="RT" value="<?= $anggota->rt ?>" required>
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<input type="number" class="form-control" name="rw"  placeholder="RT"  value="<?= $anggota->rw ?>" required>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Tempat Lahir</label>
					<input type="text" class="form-control" name="tempat_lahir" value="<?php echo $anggota->tempat_lahir ?>" required>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Tanggal Lahir</label>
					<input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $anggota->tanggal_lahir != null ? $anggota->tanggal_lahir : '-' ?>" required>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Golongan Darah **</label>
					<select name="darah" class="form-control" required>
						<option value="">Pilih . . </option>
						<?php foreach ($darah as $d): ?>
							<option <?php echo $d->darah == $anggota->gol_darah ? 'selected' : '' ?> value="<?php echo $d->darah ?>"><?php echo $d->darah ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
		</div>
		<div class="separator-solid"></div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Golongan Kepramukaan **</label>
					<select id="golongan" name="golongan" class="form-control" required>
						<option value="">Pilih . . </option>
						<?php foreach ($golongan as $g): ?>
							<option <?php echo $anggota->golongan == $g->golongan ? 'selected' : '' ?> value="<?php echo $g->golongan ?>"><?php echo strtoupper($g->golongan) ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label >Tingkat / Kualifikasi ( Tingkatan Terahir Yang Diperoleh ) <span class="text-danger">**</span></label>
					<select name="tingkat" class="form-control" required>
						<option value="">Pilih Tingkat. . </option>
						<?php foreach ($tingkat as $t): ?>
							<option value="<?php echo $t->sub_tingkat ?>" <?php echo $anggota->tingkat == $t->sub_tingkat ? 'selected' : '' ?>><?php echo strtoupper($t->sub_tingkat) ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<p class="ml-2 text-danger">* Keterangan : NK = Non Kualifikasi</p>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Nomor KTA ( kosongkan jika tidak mempunyai )</label>
					<input type="text" class="form-control" name="kta" value="<?php echo $anggota->kta ?>" placeholder="-">
				</div>
			</div>
		</div>
		<div class="separator-solid"></div>
		<H4><center>Ijazah KMD</center></H4>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Tempat</label>
					<input type="text" class="form-control" name="tempat_kmd" placeholder="-" value="<?php echo $anggota->tempat_kmd ?>">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Tahun</label>
					<input type="text" class="form-control" name="tahun_kmd" placeholder="-" value="<?php echo $anggota->tahun_kmd != null ? $anggota->tahun_kmd : ''?>">
				</div>
			</div>
			<div class="col-md-4">

			</div>
		</div>
		<div class="separator-solid"></div>
		<H4><center>Ijazah KML</center></H4>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Tempat</label>
					<input type="text" class="form-control" name="tempat_kmd" placeholder="-" value="<?php echo $anggota->tempat_kml ?>">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Tahun</label>
					<input type="text" class="form-control" name="tahun_kml" placeholder="-" value="<?php echo $anggota->tahun_kml != null ? $anggota->tahun_kml : ''?>">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Golongan</label>
					<select name="golongan_kml" class="form-control">
						<option value="">Pilih . . </option>
						<?php foreach ($golongan_sert as $g): ?>
							<option <?php echo $anggota->golongan_kml == $g->golongan ? 'selected' : '' ?> value="<?php echo $g->golongan ?>"><?php echo $g->golongan ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
		</div>

		<div class="separator-solid"></div>
		<H4><center>Ijazah KPD</center></H4>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Tempat</label>
					<input type="text" class="form-control" name="tempat_kpd" placeholder="-" value="<?php echo $anggota->tempat_kpd ?>">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Tahun</label>
					<input type="text" class="form-control" name="tahun_kpd" placeholder="-" value="<?php echo $anggota->tahun_kpd != null ? $anggota->tahun_kpd : ''?>">
				</div>
			</div>
			<div class="col-md-4">

			</div>
		</div>

		<div class="separator-solid"></div>
		<H4><center>Ijazah KPL</center></H4>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Tempat</label>
					<input type="text" class="form-control" name="tempat_kpl" placeholder="-" value="<?php echo $anggota->tempat_kpl ?>">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Tahun</label>
					<input type="text" class="form-control" name="tahun_kpl" placeholder="-" value="<?php echo $anggota->tahun_kpl != null ? $anggota->tahun_kpl : '' ?>">
				</div>
			</div>
			<div class="col-md-4">

			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<button type="submit" class="btn btn-secondary" style="color: white"><i class="fa fa-save"></i> Simpan Perubahan</button>
				</div>
			</div>
		</div>
	</div>

	
</form>


<!-- select 2 -->
<script src="<?php echo base_url('assets/select2') ?>/select2.full.min.js"></script>
<script src="<?php echo base_url('assets/myjs/') ?>js_edit_anggota.js"></script>