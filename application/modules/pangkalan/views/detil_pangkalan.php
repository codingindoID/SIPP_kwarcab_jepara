<style>
	.detil_p{
		font-size: 1rem;
	}
</style>

<div class="row row-card-no-pd">
	<div class="col-sm-12 col-md-12 mt-2">
		<div class="card card-stats card-secondary card-round">
			<div class="card-body ">
				<div class="row">
					<div class="col-5">
						<div class="icon-big text-center">
							<i class="flaticon-profile text-danger"></i>
						</div>
					</div>
					<div class="col-7 col-stats">
						<div class="numbers">
							<center><h4 class="card-title">Jumlah Anggota Terdaftar</h4>
								<h4 class="card-title"><?php echo $anggota ?></h4></center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- DETIL PANGKALAN -->
	<div class="card" style="margin-top: -1em">
		<div class="card-header" data-toogle="collapse" href="#body-detil" role="button" aria-expanded="false" aria-controls="body_detil" data-toggle="collapse" style="cursor: pointer">
			<h3><i class="flaticon-layers-1"></i> <strong>Detil Pangkalan</strong></h3>
		</div>
		<div class="card-body collapse" id="body-detil">
			<!-- start body content -->
			<div class="form-group row">
				<div class="col-md-6">
					<label for="exampleInputEmail1">Nama Pangkalan</label>
					<p class="detil_p"><?php echo $pangkalan->nama_pangkalan ?></p>
				</div>
				<div class="col-md-6">
					<label for="exampleInputPassword1">Kwaran</label>
					<p class="detil_p"><?php echo $pangkalan->nama_kwaran ?></p>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-12">
					<label for="exampleInputPassword1">Alamat</label>
					<p class="detil_p"><?php echo $pangkalan->alamat_pangkalan ?></p>
				</div>

			</div>
			<div class="form-group row">
				<div class="col-md-6">
					<label for="exampleInputPassword1">Kamabigus</label>
					<p class="detil_p"><?php echo $pangkalan->kamabigus ?></p>
				</div>
				<div class="col-md-6">
					<label for="exampleInputPassword1">Kagudep</label>
					<p class="detil_p"><?php echo $pangkalan->kagudep ?></p>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-6">
					<label for="exampleInputPassword1">Jumlah Pembina</label>
					<p class="detil_p"><?php echo $jumlah_pembina ?></p>
				</div>
			</div>

			<!-- end body -->
		</div>
	</div>


	<!-- PRAMUKA MUDA -->
	<h3 data-toggle="collapse" href="#body_muda" role="button" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer; margin-left: 1em"><b><i class="flaticon-layers-1"></i> Potensi Anggota Muda</b> (<?php echo $siaga+$penggalang+$penegak+$pandega ?>)</h3>
	<div class="separator-solid"></div>
	<div class="row collapse" id="body_muda">
		<div class="col-sm-6 col-md-3 col-xs-12">
			<div class="card card-stats card-round">
				<div class="card-body" data-toggle="collapse" href="#card-siaga" role="button" aria-expanded="false" aria-controls="card-siaga" style="cursor: pointer">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-siaga bubble-shadow-small">
								<i class="flaticon-user-1"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category text-siaga" id="muda">Siaga</p>
								<h4 class="card-title"><?php echo $siaga != null ? $siaga : '-' ?></h4>
							</div>
						</div>
					</div>
					<div class="row mt-2 collapse" id="card-siaga">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body bg-siaga text-white" style="border-radius: 20px;">
									<table width="100%" style="font-size: 1rem">
										<?php foreach ($sub_siaga as $s): ?>
											<tr>
												<td width="60%"><strong><?php echo $s['tingkat'] ?></strong></td>
												<td> : </td>
												<td> <?php echo $s['jumlah'] ?></td>
											</tr>
										<?php endforeach ?>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-3 col-xs-12">
			<div class="card card-stats card-round">
				<div class="card-body" data-toggle="collapse" href="#card-penggalang" role="button" aria-expanded="false" aria-controls="card-penggalang" style="cursor: pointer">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-penggalang bubble-shadow-small">
								<i class="flaticon-user-1"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category text-penggalang" id="muda">Penggalang</p>
								<h4 class="card-title"><?php echo $penggalang != null ? $penggalang : '-' ?></h4>
							</div>
						</div>
					</div>
					<div class="row mt-2 collapse" id="card-penggalang">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body bg-penggalang text-white" style="border-radius: 20px;">
									<table width="100%" style="font-size: 1rem">
										<?php foreach ($sub_penggalang as $g): ?>
											<tr>
												<td width="60%"><strong><?php echo $g['tingkat'] ?></strong></td>
												<td> : </td>
												<td> <?php echo $g['jumlah'] ?></td>
											</tr>
										<?php endforeach ?>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-3 col-xs-12">
			<div class="card card-stats card-round">
				<div class="card-body" data-toggle="collapse" href="#card-penegak" role="button" aria-expanded="false" aria-controls="card-penegak" style="cursor: pointer">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-penegak bubble-shadow-small">
								<i class="flaticon-user-1"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category text-penegak" id="muda">Penegak</p>
								<h4 class="card-title"><?php echo $penegak != null ? $penegak : '-' ?></h4>
							</div>
						</div>
					</div>
					<div class="row mt-2 collapse" id="card-penegak">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body bg-penegak text-white" style="border-radius: 20px;">
									<table width="100%" style="font-size: 1rem">
										<?php foreach ($sub_penegak as $t): ?>
											<tr>
												<td width="60%"><strong><?php echo $t['tingkat'] ?></strong></td>
												<td> : </td>
												<td> <?php echo $t['jumlah'] ?></td>
											</tr>
										<?php endforeach ?>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-3 col-xs-12">
			<div class="card card-stats card-round">
				<div class="card-body"  data-toggle="collapse" href="#card-pandega" role="button" aria-expanded="false" aria-controls="card-pandega" style="cursor: pointer">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-pandega bubble-shadow-small">
								<i class="flaticon-user-1"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category text-pandega" id="muda">Pandega</p>
								<h4 class="card-title"><?php echo $pandega != null ? $pandega : '-' ?></h4>
							</div>
						</div>
					</div>
					<div class="row mt-2 collapse" id="card-pandega">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body bg-pandega text-white" style="border-radius: 20px;">
									<table width="100%" style="font-size: 1rem">
										<?php foreach ($sub_pandega as $d): ?>
											<tr>
												<td width="60%"><strong><?php echo $d['tingkat'] ?></strong></td>
												<td> : </td>
												<td> <?php echo $d['jumlah'] ?></td>
											</tr>
										<?php endforeach ?>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- DEWASA -->
	<h3 data-toggle="collapse" href="#body_dewasa" role="button" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer; margin-left: 1em"><b><i class="flaticon-layers-1"></i> Potensi Anggota Dewasa</b> (<?php echo $kmd+$kml+$kpd+$kpl ?>)</h3>
	<div class="separator-solid"></div>
	<div class="row collapse" id="body_dewasa">
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<div class="card-body ">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-primary bubble-shadow-small">
								<i class="icon-like"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category"><a href="<?php echo site_url('anggota/potensi/kmd') ?>">KMD</a></p>
								<h4 class="card-title"><?php echo $kmd != null ? $kmd : '-' ?></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-info bubble-shadow-small">
								<i class="icon-badge"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category"><a href="<?php echo site_url('anggota/potensi/kml') ?>">KML</a></p>
								<h4 class="card-title"><?php echo $kml != null ? $kml : '-' ?></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-success bubble-shadow-small">
								<i class="icon-graduation"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category"><a href="<?php echo site_url('anggota/potensi/kpd') ?>">KPD</a></p>
								<h4 class="card-title"><?php echo $kpd != null ? $kpd : '-' ?></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-secondary bubble-shadow-small">
								<i class="icon-diamond"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category"><a href="<?php echo site_url('anggota/potensi/kpl') ?>">KPL</a></p>
								<h4 class="card-title"><?php echo $kpl != null ? $kpl : '-' ?></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<h3 data-toggle="collapse" href="#body_non" role="button" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer; margin-left: 1em"><b><i class="flaticon-layers-1"></i> Anggota Dewasa Non Kualifikasi</b> (<?php echo $non ?>)</h3>
	<div class="separator-solid"></div>
	<div class="row collapse" id="body_non">
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<div class="card-body ">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-danger bubble-shadow-small">
								<i class="flaticon-shapes"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category text-danger"><a href="<?php echo site_url('anggota/potensi/kmd') ?>">NON Kualifikasi</a></p>
								<h4 class="card-title"><?php echo $non != null ? $non : '-' ?></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



