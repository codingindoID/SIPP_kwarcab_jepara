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
				<table class="table table-striped table-bordered table-hover ml-auto mr-auto" width="80%" id="basic-datatables">
					<thead class="bg-info text-white">
						<tr>
							<th class="text-center">NO</th>
							<th class="text-center">NOMOR KWARAN</th>
							<th class="text-center">NAMA KWARAN</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach ($kwaran as $k): ?>
						<tr>
							<td class="text-center"><?php echo $no++ ?></td>
							<td class="text-center"><b><?php echo $k->nomor_kwaran ?></b></td>
							<td class="text-center"><b><?php echo strtoupper($k->nama_kwaran) ?></b></td>
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
