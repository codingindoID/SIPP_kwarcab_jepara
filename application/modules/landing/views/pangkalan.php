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
							<th>No</th>
							<th>Nama Pangkalan</th>
							<th>Kamabigus</th>
							<th>Kgudep</th>
							<th class="text-center">Jumlah Pembina</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no = 1;
						foreach ($pangkalan as $p): ?>
							<?php if ($p->nama_pangkalan != null): ?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td><?php echo strtoupper($p->nama_pangkalan) ?></td>
									<td><?php echo $p->kamabigus ?></td>
									<td><?php echo $p->kagudep ?></td>
									<td class="text-center"><?php echo $p->jumlah_pembina ?></td>
								</tr>
							<?php endif ?>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>

	</div>

</div>
<?php $this->load->view('tema/js'); ?>
<?php $this->load->view('tema/footer'); ?>