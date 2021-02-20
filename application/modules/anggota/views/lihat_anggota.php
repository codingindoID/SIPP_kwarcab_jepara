<style>
	h4{
		color : purple;
		font-weight: bold;
	}
</style>
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="card card-with-nav">
				<div class="card-header">
					<div class="row row-nav-line">
						<ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-3" role="tablist">
							<li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Detil Anggota</a> </li>
						</ul>
					</div>
				</div>
				<div class="card-body">
					<div class="row mt-2">
						<div class="col-md-6">
							<div class="form-group form-group-default">
								<label>Nama Anggota</label>
								<input type="text" class="form-control" value="<?php echo $anggota->nama  ?>" >
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group form-group-default">
								<label>NO KTA</label>
								<input type="email" class="form-control" value="<?php echo $anggota->kta ?>" >
							</div>
						</div>
					</div>
					<div class="row mt-2">
						<div class="col-md-6">
							<div class="form-group form-group-default">
								<label>TTL</label>
								<input type="email" class="form-control" value="<?php echo strtoupper($anggota->tempat_lahir).' / '.date('d-m-Y',strtotime($anggota->tanggal_lahir))  ?>" >
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group form-group-default">
								<label>Alamat Anggota</label>
								<textarea type="text" class="form-control"><?php echo $anggota->nama_desa.", RT: ".$anggota->rt."/ RW : ".$anggota->rw.", Kecamatan : ".$anggota->nama_kecamatan?></textarea>
							</div>
						</div>
					</div>
					<div class="separator-solid"></div>
					<h3 class="text-secondary"><center><b>Infromasi Pangkalan</b></center></h3>
					<div class="separator-solid"></div>
					<div class="row mt-2">
						<div class="col-md-6">
							<div class="form-group form-group-default">
								<label>Asal Pangkalan</label>
								<input type="text" class="form-control" value="<?php echo $anggota->nama_pangkalan  ?>" >
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group form-group-default">
								<label>Tingkat Pendidikan</label>
								<input type="text" class="form-control" value="<?php echo $anggota->tingkat  ?>" >
							</div>
						</div>
					</div>
					<div class="row mt-2">
						<div class="col-md-6">
							<div class="form-group form-group-default">
								<label>Satuan</label>
								<input type="text" class="form-control" value="<?php echo $anggota->ambalan  ?>" >
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group form-group-default">
								<label>Asal Kwaran</label>
								<input type="text" class="form-control" value="<?php echo $anggota->nama_kwaran  ?>" >
							</div>
						</div>
					</div>

					<?php if ($anggota->golongan == 'dewasa'): ?>
						<div class="separator-solid"></div>
						<h3 class="text-secondary"><center><b>Sertifikat</b></center></h3>
						<div class="separator-solid"></div>
						<h4>KMD</h4>
						<div class="row mt-2">
							<div class="col-md-4">
								<div class="form-group form-group-default">
									<label>Tempat</label>
									<input type="text" class="form-control" value="<?php  echo $anggota->tempat_kmd ?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group form-group-default">
									<label>Tahun</label>
									<input type="text" class="form-control" value="<?php echo $anggota->tahun_kmd  ?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group form-group-default">
									<label>Golongan</label>
									<input type="text" class="form-control" value="<?php  echo $anggota->golongan_kmd ?>">
								</div>
							</div>
						</div>
						<div class="separator-solid"></div>
						<h4>KML</h4>
						<div class="row mt-2">
							<div class="col-md-4">
								<div class="form-group form-group-default">
									<label>Tempat</label>
									<input type="text" class="form-control" value="<?php  echo $anggota->tempat_kml ?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group form-group-default">
									<label>Tahun</label>
									<input type="text" class="form-control" value="<?php echo $anggota->tahun_kml  ?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group form-group-default">
									<label>Golongan</label>
									<input type="text" class="form-control" value="<?php  echo $anggota->golongan_kml ?>">
								</div>
							</div>
						</div>
						<div class="separator-solid"></div>
						<h4>KPD</h4>
						<div class="row mt-2">
							<div class="col-md-4">
								<div class="form-group form-group-default">
									<label>Tempat</label>
									<input type="text" class="form-control" value="<?php  echo $anggota->tempat_kpd ?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group form-group-default">
									<label>Tahun</label>
									<input type="text" class="form-control" value="<?php echo $anggota->tahun_kpd  ?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group form-group-default">
									<label>Golongan</label>
									<input type="text" class="form-control" value="<?php  echo $anggota->golongan_kpd ?>">
								</div>
							</div>
						</div>
						<div class="separator-solid"></div>
						<h4>KPL</h4>
						<div class="row mt-2">
							<div class="col-md-4">
								<div class="form-group form-group-default">
									<label>Tempat</label>
									<input type="text" class="form-control" value="<?php  echo $anggota->tempat_kpl ?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group form-group-default">
									<label>Tahun</label>
									<input type="text" class="form-control" value="<?php echo $anggota->tempat_kpl  ?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group form-group-default">
									<label>Golongan</label>
									<input type="text" class="form-control" value="<?php  echo $anggota->golongan_kpl ?>">
								</div>
							</div>
						</div>
					<?php endif ?>
					
				</div>
			</div>
		</div>
	</div>
