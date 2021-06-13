<?php if ($this->session->flashdata('success')): ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<?php echo $this->session->flashdata('success'); ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php elseif ($this->session->flashdata('error')):  ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<?php echo $this->session->flashdata('error'); ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<?php endif ?>
	<div class="row">
		<div class="col-md-12">
			<form method="post" action="<?php echo site_url('anggota/upload') ?>" enctype="multipart/form-data" style="text-align: center">
				<div class="form-row">
					<div class="col-md-6">
						<input type="file" name="file" class="form-control" placeholder="pilih file xls / xlsx" accept=".xlsx, .xls">
					</div>
					<div class="col-md-2 py-1">
						<button class="btn btn-secondary" type="submit" onclick="return confirm('apakah data anda sudah benar? jika ada kekeliruan mungkin akan mengakibatkan data anda redundant dan tidak valid, mohon pastikan terlebih dahulu sebelum anda melakukan proses import.. Terimakasih,.')"> <i class="fa fa-upload"></i> Import File</button>
					</div>
				</div>
			</form>
		</div>

	</div>

	<div class="separator-solid"></div>
	<div class="row">
		<div class="col-md-12">
			<h3 style="color: red"><center><strong>Petunjuk Pengisian File</strong></center></h3>
			<table>
				<tbody>
					<tr>
						<td>1. Jangan melakukan perubahan header pada file excel tersebut, karena format sudah disesuaikan dengan format inputan pada database kami, </td>
					</tr>
					<tr>
						<td>2. Pada kolom kwaran silahkan isikan kode kwaran sesuai pada table dibawah ini, </td>
					</tr>
					<tr>
						<td>3. Pada kolom id gudep isikan <span style="color: red; font-weight: bold">Nomor Urut Gudep</span>, Misal :  <span style="color: red; font-weight: bold">020</span> , cukup isikan dengan :  <span style="color: red; font-weight: bold">20</span>.</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="separator-solid"></div>
	<style type="text/css" media="screen">
		div.table-kwaran div.dataTables_wrapper div.dataTables_filter input {
			width: 60%; 
		}


	</style>
	<div class="row">
		<div class="col-md-4">
			<h3><center><b>Kode Kwaran Terdaftar</b></center></h3>
			<div class="table-responsive">
				<div class="table-kwaran">
					<table id="table-kwaran" class="table table-bordered" width="100%">
						<thead>
							<tr class="bg-secondary" style="color: white">
								<th width="50%" class="text-center">ID KWARAN</th>
								<th class="text-center">NAMA KWARAN</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($kwaran as $k): ?>
								<tr>
									<td class="text-center"><?php echo $k->id_kwaran ?></td>
									<td class="text-center"><?php echo $k->nama_kwaran ?></td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<h3><center><b>Kode Gudep Terdaftar</b></center></h3>
			<div class="table-responsive">
				<table id="table-gudep" class="table table-bordered">
					<thead>
						<tr class="bg-secondary" style="color: white">
							<th class="text-center">NO GUDEP</th>
							<th class="text-center">Pangkalan</th>
							<th class="text-center">Satuan</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($gudep as $g): ?>
							<tr>
								<td class="text-center"><?php echo $g->no_gudep ?></td>
								<td class="text-center"><?php echo $g->nama_pangkalan ?></td>
								<td class="text-center"><?php echo $g->ambalan ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>


	</div>
