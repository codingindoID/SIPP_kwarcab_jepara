<div class="card" style="margin-top: -2em">
	<div class="card-header" style="border-radius: 10px; cursor: pointer" href="#body_detil" role="button" aria-expanded="false" aria-controls="body_detil" data-toggle="collapse">
		<h3><i class="fa fa-info-circle"></i> <strong>Detil Pangkalan</strong></h3>
	</div>
	<div class="collapse" id="body_detil">
		<div class="card-body " >
			<form action="<?php echo site_url('beranda/aksi_updatePangkalan/').$pangkalan->id_pangkalan ?>" method="post" accept-charset="utf-8">
				<div class="form-group row">
					<div class="col-md-6">
						<input type="hidden" id="id_kwaran" value="" name="id_kwaran">
						<label for="exampleInputPassword1">Nama Pangkalan</label>
						<input type="text" class="form-control" name="nama_pangkalan" placeholder="Nama Pangkalan" required value="<?php echo $pangkalan->nama_pangkalan ?>">
					</div>
					<div class="col-md-6">
						<label for="exampleInputPassword1">Alamat Pangkalan</label>
						<textarea type="text" class="form-control" name="alamat_pangkalan" placeholder="Alamat Pangkalan" required><?php echo $pangkalan->alamat_pangkalan ?></textarea>
					</div>
				</div>
				<div class="form-group row">
					<div class="col">
						<label for="exampleInputPassword1">KA.MABIGUS</label>
						<input type="text" class="form-control" name="kamabigus" placeholder="KA.MABIGUS" required value="<?php echo $pangkalan->kamabigus ?>">
					</div>
					<div class="col">
						<label for="exampleInputPassword1">KA.GUDEP</label>
						<input type="text" class="form-control" name="kagudep" placeholder="KA.GUDEP" required value="<?php echo $pangkalan->kagudep ?>">
					</div>
					<div class="col">
						<label for="exampleInputPassword1">Jumlah Pembina</label>
						<input type="number" class="form-control" name="jumlah_pembina" placeholder="Jumlah Pembina" required value="<?php echo $pangkalan->jumlah_pembina ?>">
					</div>
				</div>
			</div>
			<div class="card-footer">
				<button onclick="return confirm('anda akan merubah info Pangkalan?')" type="submit" class="btn btn-success float-right mb-3"><i class="fa fa-save"></i> Simpan Perubahan</button>
			</div>
		</div>
	</div>

</form>