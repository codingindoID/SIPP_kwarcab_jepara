<style>
	p{
		color: #52057b;
		font-weight: bold;
		font-size: 1.2rem;
	}
</style>
<?php 
$link_pangkalan = 'pangkalan/regional_admin/'.$potensi['id_kwaran'];
$link_gudep 	= 'gudep/regional_admin/'.$potensi['id_kwaran'];
$link_anggota 	= 'anggota/filter_anggota_admin/'.$potensi['id_kwaran'];
?>


<div class="row row-card-no-pd">
	<div class="col-sm-6 col-md-4 mt-2">
		<div class="card card-stats card-secondary card-round">
			<a style="color: white; " href="<?php echo site_url($link_pangkalan) ?>">
				<div class="card-body">
					<div class="row">
						<div class="col-5">
							<div class="icon-big text-center">
								<i class="flaticon-database text-primary"></i>
							</div>
						</div>
						<div class="col-7 col-stats">
							<div class="numbers">
								<p class="card-category">Pangkalan</p>
								<h4 class="card-title"><?php echo $potensi['pangkalan'] ?></h4>
							</div>
						</div>
					</div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-sm-6 col-md-4 mt-2">
		<div class="card card-stats card-info card-round">
			<a style="color: white; " href="<?php echo site_url($link_gudep) ?>">
				<div class="card-body ">
					<div class="row">
						<div class="col-5">
							<div class="icon-big text-center">
								<i class="flaticon-web text-success"></i>
							</div>
						</div>
						<div class="col-7 col-stats">
							<div class="numbers">
								<p class="card-category">Gudep</p>
								<h4 class="card-title"><?php echo $potensi['gudep'] ?></h4>
							</div>
						</div>
					</div>
				</div>
			</a>
		</div>
	</div>

	
	<div class="col-sm-6 col-md-4 mt-2">
		<div class="card card-stats card-primary card-round">
			<a style="color: white; " href="<?php echo site_url($link_anggota) ?>">
				<div class="card-body ">
					<div class="row">
						<div class="col-5">
							<div class="icon-big text-center">
								<i class="flaticon-profile text-danger"></i>
							</div>
						</div>
						<div class="col-7 col-stats">
							<div class="numbers">
								<p class="card-category">Anggota</p>
								<h4 class="card-title"><?php echo $potensi['anggota'] ?></h4>
							</div>
						</div>
					</div>
				</div>
			</a>
		</div>
	</div>

</div>

<div class="card">
	<div class="card-header" style="border-radius: 10px; cursor: pointer" href="#body_detil" role="button" aria-expanded="false" aria-controls="body_detil" data-toggle="collapse">
		<h3><strong>Detil Kwaran</strong></h3>
	</div>
	<div class="card-body collapse" id="body_detil">
		<div class="form-group row">
			<div class="col-md-6">
				<input type="hidden" id="id_kwaran" value="" >
				<label for="exampleInputPassword1">NOMOR KWARAN</label>
				<p><?php echo $kwaran->nomor_kwaran != null ? $kwaran->nomor_kwaran : '-'?></p>
			</div>
			<div class="col-md-6">
				<label for="exampleInputPassword1">NAMA KWARAN</label>
				<p><?php echo $kwaran->nama_kwaran != null ? $kwaran->nama_kwaran : '-' ?></p>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-md-12">
				<label for="exampleInputPassword1">ALAMAT KWARAN</label>
				<p><?php echo $kwaran->alamat_kwaran != null ?  $kwaran->alamat_kwaran : '-'?></p>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-md-6">
				<label for="exampleInputPassword1">KAMABIRAN</label>
				<p><?php echo $kwaran->kamabiran != null ?  $kwaran->kamabiran : '-'?></p>
			</div>
			<div class="col-md-6">
				<label for="exampleInputPassword1">KAKWARAN</label>
				<p><?php echo $kwaran->kakwaran != null ?  $kwaran->kakwaran : '-'?></p>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-md-6">
				<label for="exampleInputPassword1">STATUS SEKRETARIAT</label>
				<p><?php echo $kwaran->status_kepemilikan != null ?  $kwaran->status_kepemilikan : '-'?></p>
			</div>
			<div class="col-md-6">
				<label for="exampleInputPassword1">SIFAT SEKRETARIAT</label>
				<p><?php echo $kwaran->sifat_kepemilikan != null ?  $kwaran->sifat_kepemilikan : '-'?></p>
			</div>
		</div>
		<div class="separator-solid"></div>
		<div class="form-group row">
			<div class="col-md-6">
				<label for="exampleInputPassword1">NOMOR SK</label>
				<p><?php echo $kwaran->nomor_sk != null ?  $kwaran->nomor_sk : '-'?></p>
			</div>
			<div class="col-md-6">
				<label for="exampleInputPassword1">TANGGAL SK</label>
				<?php if ($kwaran->tgl_sk == null || $kwaran->tgl_sk == "0000-00-00"): ?>
					<p>-</p>	
				<?php else :  ?>
					<p><?php echo date('d/m/Y',strtotime($kwaran->tgl_sk)) ?></p>
				<?php endif ?>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-md-6">
				<label for="exampleInputPassword1">MASA BAKTI</label>
				<?php if ($kwaran->awal_bakti == null || $kwaran->awal_bakti == "0000-00-00"): ?>
					<p>-</p>	
				<?php else :  ?>
					<p><?php echo date('d/m/Y',strtotime($kwaran->awal_bakti)) ?></p>
				<?php endif ?>
			</div>
			<div class="col-md-6">
				<label for="exampleInputPassword1">SAMPAI DENGAN</label>
				<?php if ($kwaran->akhir_bakti == null || $kwaran->akhir_bakti == "0000-00-00"): ?>
					<p>-</p>	
				<?php else :  ?>
					<p><?php echo date('d/m/Y',strtotime($kwaran->akhir_bakti)) ?></p>
				<?php endif ?>
			</div>
		</div>
	</div>
</div>




<!-- potensi -->
<h3><b>POTENSI</b></h3>
<br>
<h3 data-toggle="collapse" href="#body_muda" role="button" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer"><b><i class="flaticon-layers-1"></i> Potensi Anggota Muda</b> (<?php echo $potensi['siaga']+$potensi['penggalang']+$potensi['penegak']+$potensi['pandega'] ?>)</h3>
<div class="separator-solid"></div>
<div class="row collapse" id="body_muda">
	<div class="col-sm-6 col-md-3">
		<div class="card card-stats card-round">
			<div class="card-body" data-toggle="collapse" href="#card-siaga" role="button" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer">
				<div class="row align-items-center">
					<div class="col-icon">
						<div class="icon-big text-center icon-primary bubble-shadow-small">
							<i class="flaticon-user-1"></i>
						</div>
					</div>
					<div class="col col-stats ml-3 ml-sm-0">
						<div class="numbers">
							<p class="card-category" id="muda">Siaga</p>
							<h4 class="card-title"><?php echo  $potensi['siaga'] != null ?  $potensi['siaga'] : '-' ?></h4>
						</div>
					</div>
				</div>
				<div class="row mt-2 collapse" id="card-siaga">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body bg-primary text-white" style="border-radius: 20px;">
								<table width="100%" style="font-size: 1rem">
									<?php foreach ($potensi['sub_siaga'] as $s): ?>
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
	<div class="col-sm-6 col-md-3">
		<div class="card card-stats card-round">
			<div class="card-body" data-toggle="collapse" href="#card-penggalang" role="button" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer">
				<div class="row align-items-center">
					<div class="col-icon">
						<div class="icon-big text-center icon-info bubble-shadow-small">
							<i class="flaticon-user-1"></i>
						</div>
					</div>
					<div class="col col-stats ml-3 ml-sm-0">
						<div class="numbers">
							<p class="card-category" id="muda"><a href="<?php echo site_url('anggota/potensi/kml') ?>">Penggalang</a></p>
							<h4 class="card-title"><?php echo $potensi['penggalang'] != null ? $potensi['penggalang'] : '-' ?></h4>
						</div>
					</div>
				</div>
				<div class="row mt-2 collapse" id="card-penggalang">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body bg-info text-white" style="border-radius: 20px;">
								<table width="100%" style="font-size: 1rem">
									<?php foreach ($potensi['sub_penggalang'] as $s): ?>
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
	<div class="col-sm-6 col-md-3">
		<div class="card card-stats card-round">
			<div class="card-body" data-toggle="collapse" href="#card-penegak" role="button" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer">
				<div class="row align-items-center">
					<div class="col-icon">
						<div class="icon-big text-center icon-success bubble-shadow-small">
							<i class="flaticon-user-1"></i>
						</div>
					</div>
					<div class="col col-stats ml-3 ml-sm-0">
						<div class="numbers">
							<p class="card-category" id="muda"><a href="<?php echo site_url('anggota/potensi/kpd') ?>">Penegak</a></p>
							<h4 class="card-title"><?php echo $potensi['penegak'] != null ? $potensi['penegak'] : '-' ?></h4>
						</div>
					</div>
				</div>
				<div class="row mt-2 collapse" id="card-penegak">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body bg-success text-white" style="border-radius: 20px;">
								<table width="100%" style="font-size: 1rem">
									<?php foreach ($potensi['sub_penegak'] as $s): ?>
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
	<div class="col-sm-6 col-md-3">
		<div class="card card-stats card-round">
			<div class="card-body" data-toggle="collapse" href="#card-pandega" role="button" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer">
				<div class="row align-items-center">
					<div class="col-icon">
						<div class="icon-big text-center icon-secondary bubble-shadow-small">
							<i class="flaticon-user-1"></i>
						</div>
					</div>
					<div class="col col-stats ml-3 ml-sm-0">
						<div class="numbers">
							<p class="card-category" id="muda"><a href="<?php echo site_url('anggota/potensi/kpl') ?>">Pandega</a></p>
							<h4 class="card-title"><?php echo $potensi['pandega'] != null ? $potensi['pandega'] : '-' ?></h4>
						</div>
					</div>
				</div>
				<div class="row mt-2 collapse" id="card-pandega">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body bg-secondary text-white" style="border-radius: 20px;">
								<table width="100%" style="font-size: 1rem">
									<?php foreach ($potensi['sub_pandega'] as $s): ?>
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
</div>

<h3 data-toggle="collapse" href="#body_dewasa" role="button" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer"><b><i class="flaticon-layers-1"></i> Potensi Anggota Dewasa</b> (<?php echo $potensi['kmd']+$potensi['kml']+$potensi['kpd']+$potensi['kpl'] ?>)</h3>
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
							<h4 class="card-title"><?php echo $potensi['kmd'] != null ? $potensi['kmd'] : '-' ?></h4>
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
							<h4 class="card-title"><?php echo $potensi['kml'] != null ? $potensi['kml'] : '-' ?></h4>
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
							<h4 class="card-title"><?php echo $potensi['kpd'] != null ? $potensi['kpd'] : '-' ?></h4>
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
							<h4 class="card-title"><?php echo $potensi['kpl'] != null ? $potensi['kpl'] : '-' ?></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<h3 data-toggle="collapse" href="#body_non" role="button" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer"><b><i class="flaticon-layers-1"></i> Anggota Dewasa Non Kualifikasi</b> (<?php echo $potensi['non'] ?>)</h3>
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
							<h4 class="card-title"><?php echo $potensi['non'] != null ? $potensi['non'] : '-' ?></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>