<?php 
$level = $this->session->userdata('ses_level');
?>
<div class="table-responsive">
	<table id="basic-datatables" class="display table">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Pangkalan</th>
				<th>No Gudep</th>
				<th>Satuan</th>
				<th class="text-center">Jumlah Anggota</th>
				<th class="text-center">#</th>
			</tr>
		</thead>
		<tbody>
			<?php $no =1 ;
			foreach ($rekap as $rekap): ?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $rekap['nama_pangkalan'] ?></td>
					<td><?php echo $rekap['no_gudep'] ?></td>
					<td><?php echo $rekap['ambalan'] ?></td>
					<td class="text-center" style=""><a href="<?php echo site_url('gudep/anggota_regional/').$rekap['id_gudep'] ?>"><?php echo $rekap['jumlah_anggota'] ?></a></td>
					<td class="text-right">
						<div class="dropdown">
							<a href="#" class="btn-sm btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white"> 
								<i class="fas fa-align-justify"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item" href="<?php echo site_url('gudep/lihat_gudep/').$rekap['id_gudep'] ?>"><i class="fa fa-eye"></i> Lihat</a>
								<a class="dropdown-item" onclick="edit(<?php echo $rekap['id_gudep'] ?>)" href="#modal_edit" data-toggle="modal"><i class="fa fa-edit"></i> Edit</a>
								<a class="dropdown-item" href="#" onclick="hapus(<?php echo $rekap['id_gudep'] ?>,'regional')" ><i class="fa fa-trash"></i> Hapus</a>
							</div>
						</div>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>

<!-- modal -->
<?php $this->load->view('modal/modal_add'); ?>
<?php $this->load->view('modal/modal_edit'); ?>

<!-- select 2 -->
<script src="<?php echo base_url('assets/myjs/js_gudep.js') ?>" type="text/javascript"></script>