<?php 
$level = $this->session->userdata('ses_level');
?>
<div class="table-responsive">
	<table id="basic-datatables" class="display table">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Anggota</th>
				<th>Asal Pangkalan</th>
				<th>Satuan</th>
				<th>Tingkat</th>
				<th class="text-center">#</th>

			</tr>
		</thead>
		<tbody>
			<?php if ($anggota): $no = 1;?>
				<?php foreach ($anggota as $anggota): ?>
					<input type="hidden" id="id_kwaran" value="<?php echo $anggota->id_kwaran ?>">
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $anggota->nama ?></td>
						<td><?php echo $anggota->nama_pangkalan ?></td>
						<td><?php echo $anggota->ambalan ?></td>
						<td><?php echo $anggota->tingkat ?></td>
						<td class="text-right">
							<div class="dropdown">
								<a href="#" class="btn-sm btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white"> 
									<i class="fas fa-align-justify"></i>
								</a>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item" href="<?php echo site_url('anggota/lihat_anggota/').$anggota->id_anggota ?>"><i class="fa fa-eye" ></i> Lihat</a>
									<?php if ($level != 4): ?>
										<a class="dropdown-item" href="<?php echo site_url('anggota/edit_anggota/').$anggota->id_anggota.'/anggota' ?>"><i class="fa fa-edit"></i> Edit</a>
										<a class="dropdown-item" href="#" onclick="hapus(<?php echo $anggota->id_anggota ?>)"><i class="fa fa-trash" ></i> Hapus</a>
									<?php endif ?>
								</div>
							</div>
						</td>
						

					</tr>
				<?php endforeach ?>
			<?php endif ?>
			
		</tbody>
	</table>
</div>

<script src="<?php echo base_url('assets/myjs/js_anggota.js') ?>" type="text/javascript"></script>