<div class="row">
	<div class="col-md-12">
		<form method="post" action="<?php echo site_url('pangkalan/upload') ?>" enctype="multipart/form-data" style="text-align: center">
			<div class="form-row">
				<div class="col-md-6">
					<input type="file" name="file" class="form-control" placeholder="pilih file xls / xlsx">
				</div>
				<div class="col-md-2 py-1">
					<button class="btn btn-secondary" type="submit"> <i class="fa fa-upload"></i> Import File</button>
				</div>
			</div>
		</form>
	</div>
	
</div>

<div class="separator-solid"></div>

<div class="row">
	<div class="col-md-6">
		<h3><center>Kode Kwaran Terdaftar</center></h3>
		<div class="table-responsive">
			<table id="table-kwaran" class="table table-bordered">
				<thead>
					<tr class="bg-secondary" style="color: white">
						<th class="text-center">ID KWARAN</th>
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
	<div class="col-md-6">
		<h3 style="color: red"><center><strong>Petunjuk Pengisian File</strong></center></h3>
		<table>
			<tbody>
				<tr>
					<td>1. Jangan melakukan perubahan header pada file excel tersebut, karena format sudah disesuaikan dengan format inputan pada database kami, </td>
				</tr>
				<tr>
					<td>2. Pada kolom kwaran silahkan isikan kode kwaran sesuai pada table disamping ini, </td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
