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
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>