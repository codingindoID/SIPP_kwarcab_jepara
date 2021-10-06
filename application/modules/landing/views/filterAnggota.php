<?php 
$this->load->view('tema/header'); 
$this->load->view('tema/navbar'); 
?>

<div class="container">
	<div class="card">
		<div class="card-header">
			<a class="btn-sm btn-success" href="#" onclick="window.history.back()"><i class="fa fa-arrow-left"></i> Kembali</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="table-anggota" class="display table table-hover table-bordered table-striped">
					<thead class="bg-info text-white">
						<tr>
							<th class="text-center">No</th>
							<th class="text-center">Nama Anggota</th>
							<th class="text-center">Asal Pangkalan</th>
							<th class="text-center">Satuan</th>
							<th class="text-center">Tingkat</th>
							<th class="text-center">TA</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no = 1;
						foreach ($anggota as $a): ?>
							<tr>
								<td class="text-center"><?php echo $no++ ?></td>
								<td class="text-center font-weight-bold"><?php echo $a->nama ?></td>
								<td class="text-center"><?php echo $a->nama_pangkalan ?></td>
								<td class="text-center"><?php echo $a->ambalan ?></td>
								<td class="text-center"><?php echo strtoupper($a->tingkat) ?></td>
								<td class="text-center"><?php echo $a->ta ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>

	</div>

</div>
<?php $this->load->view('tema/js'); ?>
<?php $this->load->view('tema/footer'); ?>