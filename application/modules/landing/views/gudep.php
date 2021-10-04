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
				<table id="basic-datatables" class="display table table-hover table-bordered table-striped">
					<thead class="bg-info text-white">
						<tr>
							<th class="text-center">No</th>
							<th class="text-center">No Gudep</th>
							<th class="text-center">Satuan</th>
							<th class="text-center">Nama Pangkalan</th>
							<th class="text-center">Jumlah Anggota</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no = 1; 
						foreach ($gudep as $rekap): ?>	
							<tr>
								<td class="text-center"><?php echo $no++ ?></td>
								<td class="text-center"><?php echo $rekap['no_gudep'] ?></td>
								<td class="text-center"><?php echo $rekap['satuan'] ?></td>
								<td class="text-center"><?php echo $rekap['pangkalan'] ?></td>
								<td class="text-center"><?php echo $rekap['jumlah_anggota'] != 0 ?  $rekap['jumlah_anggota'] : '-'  ?></td>
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

