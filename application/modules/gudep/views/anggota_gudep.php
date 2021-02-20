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
			<?php $no =1 ;
			foreach ($rekap as $rekap): ?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $rekap->nama ?></td>
					<td><?php echo $rekap->nama_pangkalan ?></td>
					<td><?php echo $rekap->ambalan ?></td>
					<td><?php echo $rekap->tingkat ?></td>
					<td class="text-right">
						<div class="dropdown">
							<a href="#" class="btn-sm btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white"> 
								<i class="fas fa-align-justify"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item" href="<?php echo site_url('anggota/lihat_anggota/').$rekap->id_anggota ?>" ><i class="fa fa-eye"></i> Lihat</a>

								<a class="dropdown-item" href="<?php echo site_url('anggota/edit_anggota/').$rekap->id_anggota.'/regional' ?>" ><i class="fa fa-edit"></i> Edit</a>
								<a class="dropdown-item" href="#" ><i class="fa fa-trash"></i> Hapus</a>
							</div>
						</div>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>