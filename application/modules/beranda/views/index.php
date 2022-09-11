<?php
$level = $this->session->userdata('ses_level');
switch ($level) {
	case 1:
		$link_pangkalan = 'pangkalan';
		$link_gudep 	= 'gudep';
		$link_anggota 	= 'anggota';
		$link_kwaran 	= 'kwaran';
		break;
	case 2:
		$link_kwaran 	= '';
		$link_pangkalan = 'pangkalan/regional';
		$link_gudep 	= 'gudep/regional';
		$link_anggota 	= 'anggota/filter_anggota/' . $id_kwaran;
		break;
	case 3:
		$link_pangkalan = 'pangkalan/regional';
		$link_gudep 	= 'gudep/regional';
		$link_anggota 	= 'anggota/anggota_gudep/' . $id_kwaran; //id kwaran disini berisi id pangkalan, penamaannya saja yang kwaran
		break;
	default:
		break;
}
?>
<div class="row row-card-no-pd">
	<?php if ($level == 1) : ?>
		<div class="col-sm-6 col-md-6 mt-2">
			<div class="card card-stats card-success card-round">
				<div class="card-body " id="link_kwaran" style="cursor: pointer">
					<div class="row">
						<div class="col-5">
							<div class="icon-big text-center">
								<i class="flaticon-profile text-danger"></i>
							</div>
						</div>
						<div class="col-7 col-stats">
							<div class="numbers">
								<p class="card-category">Kwaran</p>
								<h4 class="card-title"><?php echo $kwaran ?></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif ?>

	<?php if ($level == 1 || $level == 2) : ?>
		<div class="col-sm-6 col-md-6 mt-2">
			<div class="card card-stats card-secondary card-round">
				<div class="card-body" id="link_pangkalan" style="cursor: pointer">
					<div class="row">
						<div class="col-5">
							<div class="icon-big text-center">
								<i class="flaticon-database text-primary"></i>
							</div>
						</div>
						<div class="col-7 col-stats">
							<div class="numbers">
								<p class="card-category">Pangkalan</p>
								<h4 class="card-title"><?php echo $pangkalan ?></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif ?>

	<div class="col-sm-6 col-md-6 mt-2">
		<div class="card card-stats card-info card-round">
			<div class="card-body" id="link_gudep" style="cursor: pointer">
				<div class="row">
					<div class="col-5">
						<div class="icon-big text-center">
							<i class="flaticon-web text-success"></i>
						</div>
					</div>
					<div class="col-7 col-stats">
						<div class="numbers">
							<p class="card-category">Gudep</p>
							<h4 class="card-title"><?php echo $gudep ?></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="col-sm-6 col-md-6 mt-2">
		<div class="card card-stats card-primary card-round">
			<div class="card-body" id="link_anggota" style="cursor: pointer">
				<div class="row">
					<div class="col-5">
						<div class="icon-big text-center">
							<i class="flaticon-profile text-danger"></i>
						</div>
					</div>
					<div class="col-7 col-stats">
						<div class="numbers">
							<p class="card-category">Anggota</p>
							<h4 class="card-title"><?php echo $anggota ?></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<br>

<?php if ($level == '2') : ?>
	<?php $this->load->view('detil/kwaran'); ?>
<?php endif ?>
<?php if ($level == '3') : ?>
	<?php $this->load->view('detil/pangkalan'); ?>
<?php endif ?>


<!-- PRAMUKA MUDA -->
<h3 data-toggle="collapse" href="#body_muda" role="button" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer"><b><i class="flaticon-layers-1"></i> Potensi Anggota Muda</b> ( <span class="text-danger"><?php echo number_format($siaga['total'] + $penggalang['total'] + $penegak['total'] + $pandega['total'], 0) ?></span> ) </h3>
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
							<h4 class="card-title"><?php echo $siaga['total'] != null ? number_format($siaga['total'], 0) : '-' ?></h4>
						</div>
					</div>
				</div>
				<div class="row mt-2 collapse" id="card-siaga">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body bg-siaga text-white" style="border-radius: 20px;">
								<table width="100%" style="font-size: 1rem">
									<?php
									$key = 0;
									$title = array_keys($siaga);
									foreach ($siaga as $s) : ?>
										<?php if ($title[$key] != 'total') : ?>
											<tr>
												<td width="60%"><strong><?= ucfirst($title[$key])  ?></strong></td>
												<td> : </td>
												<td class="text-right"><?php echo number_format($s, 0) ?></td>
											</tr>
										<?php endif ?>
									<?php
										$key++;
									endforeach ?>
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
							<h4 class="card-title"><?php echo $penggalang['total'] != null ? number_format($penggalang['total'], 0) : '-' ?></h4>
						</div>
					</div>
				</div>
				<div class="row mt-2 collapse" id="card-penggalang">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body bg-penggalang text-white" style="border-radius: 20px;">
								<table width="100%" style="font-size: 1rem">
									<?php
									$key = 0;
									$title = array_keys($penggalang);
									foreach ($penggalang as $g) : ?>
										<?php if ($title[$key] != 'total') : ?>
											<tr>
												<td width="60%"><strong><?= ucfirst($title[$key])  ?></strong></td>
												<td> : </td>
												<td class="text-right"> <?php echo number_format($g, 0) ?></td>
											</tr>
										<?php endif; ?>
									<?php
										$key++;
									endforeach ?>
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
							<h4 class="card-title"><?php echo $penegak['total'] != null ? number_format($penegak['total'], 0) : '-' ?></h4>
						</div>
					</div>
				</div>
				<div class="row mt-2 collapse" id="card-penegak">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body bg-penegak text-white" style="border-radius: 20px;">
								<table width="100%" style="font-size: 1rem">
									<?php
									$key = 0;
									$title = array_keys($penegak);
									foreach ($penegak as $t) : ?>
										<?php if ($title[$key] != 'total') : ?>
											<tr>
												<td width="60%"><strong><?= ucfirst($title[$key])  ?></strong></td>
												<td> : </td>
												<td class="text-right"> <?php echo number_format($t, 0) ?></td>
											</tr>
										<?php endif; ?>
									<?php
										$key++;
									endforeach ?>
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
			<div class="card-body" data-toggle="collapse" href="#card-pandega" role="button" aria-expanded="false" aria-controls="card-pandega" style="cursor: pointer">
				<div class="row align-items-center">
					<div class="col-icon">
						<div class="icon-big text-center icon-pandega bubble-shadow-small">
							<i class="flaticon-user-1"></i>
						</div>
					</div>
					<div class="col col-stats ml-3 ml-sm-0">
						<div class="numbers">
							<p class="card-category text-pandega" id="muda">Pandega</p>
							<h4 class="card-title"><?php echo $pandega['total'] != null ? number_format($pandega['total'], 0) : '-' ?></h4>
						</div>
					</div>
				</div>
				<div class="row mt-2 collapse" id="card-pandega">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body bg-pandega text-white" style="border-radius: 20px;">
								<table width="100%" style="font-size: 1rem">
									<?php
									$key = 0;
									$title = array_keys($pandega);
									foreach ($pandega as $d) : ?>
										<?php if ($title[$key] != 'total') : ?>
											<tr>
												<td width="60%"><strong><?= ucfirst($title[$key])  ?></strong></td>
												<td> : </td>
												<td class="text-right"> <?php echo number_format($d, 0) ?></td>
											</tr>
										<?php endif; ?>
									<?php
										$key++;
									endforeach ?>
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
<h3 data-toggle="collapse" href="#body_dewasa" role="button" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer"><b><i class="flaticon-layers-1"></i> Potensi Anggota Dewasa</b> ( <span class="text-danger"><?php echo number_format($dewasa['total'] - $dewasa['NK'], 0) ?></span> )</h3>
<div class="separator-solid"></div>
<div class="row collapse" id="body_dewasa">
	<?php
	$key = 0;
	$title = array_keys($dewasa);
	$exclude = ['total', 'NK'];
	foreach ($dewasa as $var) : ?>
		<?php if (!in_array($title[$key], $exclude, true)) : ?>
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-round">
					<div class="card-body ">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-info bubble-shadow-small">
									<i class="icon-graduation"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category"><a href="<?php echo site_url('anggota/potensi/') . $title[$key]  ?>"><?= strtoupper($title[$key]) ?></a></p>
									<h4 class="card-title"><?php echo $var ? number_format($var, 0) : '-' ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	<?php
		$key++;
	endforeach ?>
</div>

<h3 data-toggle="collapse" href="#body_non" role="button" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer"><b><i class="flaticon-layers-1"></i> Anggota Lainnya</b> ( <span class="text-danger"><?= number_format($dewasa['NK'] + $lainnya['total'], 0) ?></span> ) </h3>
<div class="separator-solid"></div>
<div class="row collapse" id="body_non">
	<div class="col-sm-6 col-md-6">
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
							<p class="card-category text-danger"><a href="<?php echo site_url('anggota/potensi/nk') ?>">Dewasa NK</a></p>
							<h4 class="card-title"><?php echo $dewasa['NK'] ? number_format($dewasa['NK'], 0) : '-' ?></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-md-6">
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
							<p class="card-category text-danger"><a target="__blank" href="<?= site_url('anggota/listAnggotaByTingkat') ?>">Tidak Berkategori</a></p>
							<h4 class="card-title"><?= $lainnya['total'] ? number_format($lainnya['total'], 0)  : 0 ?></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	var base = $('#base').val()
	$('#link_kwaran').click(function(event) {
		location.href = base + '<?php echo $link_kwaran ?>';
	});

	$('#link_pangkalan').click(function(event) {
		location.href = base + '<?php echo $link_pangkalan ?>';
	});

	$('#link_gudep').click(function(event) {
		location.href = base + '<?php echo $link_gudep ?>';
	});

	$('#link_anggota').click(function(event) {
		location.href = base + '<?php echo $link_anggota ?>';
	});
</script>