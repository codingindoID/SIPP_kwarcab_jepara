<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="card card-with-nav">
				<div class="card-header">
					<div class="row row-nav-line">
						<ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-3" role="tablist">
							<li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Detil Gudep</a> </li>
							</ul>
						</div>
					</div>
					<div class="card-body">
						<div class="row mt-3">
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Nomor Gugus Depan</label>
									<input type="text" class="form-control" value="<?php echo $gudep['no_gudep'] ?>" >
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Satuan</label>
									<input type="email" class="form-control" value="<?php echo $gudep['ambalan'] ?>" >
								</div>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-md-12">
								<div class="form-group form-group-default">
									<label>Nama Pangkalan</label>
									<input type="text" class="form-control" value="<?php echo $gudep['nama_pangkalan'] ?>" >
								</div>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Kwarran</label>
									<input type="text" class="form-control" value="<?php echo $gudep['kwaran'] ?>" >
								</div>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Ka. Mabigus</label>
									<input type="text" class="form-control" value="<?php echo $gudep['kamabigus'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Ka. Gudep</label>
									<input type="text" class="form-control" value="<?php echo $gudep['kagudep'] ?>">
								</div>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-md-12">
								<div class="form-group form-group-default">
									<label>Alamat Lengkap</label>
									<textarea type="text" class="form-control" rows="3" ><?php echo $gudep['alamat'] ?></textarea>
								</div>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-md-4">
								<div class="form-group form-group-default">
									<label>Jumlah Pembina</label>
									<input type="text" class="form-control" value="<?php echo $gudep['jumlah_pembina'] ?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group form-group-default">
									<label>Jumlah Anggota</label>
									<input type="text" class="form-control" value="<?php echo $gudep['jumlah_anggota'] ?>">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
