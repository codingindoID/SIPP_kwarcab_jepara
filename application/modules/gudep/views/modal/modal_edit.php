<form action="<?php echo site_url('gudep/update_gudep') ?>" method="post" accept-charset="utf-8">
	<div id="modal_edit" class="modal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Gudep</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">			
					<input type="hidden" id="id_gudep" name="id_gudep">
					<div class="form-group row">
						<div class="col-md-8">
							<label for="exampleInputEmail1">Nama Pangkalan</label>
							<select name="pangkalan" id="pangkalan" class="form-control" required>
								<option value="">Pilih..</option>	
								<?php foreach ($pangkalan as $pang2): ?>
									<option value="<?php echo $pang2->id_pangkalan ?>"><?php echo $pang2->nama_pangkalan ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-12">
							<label for="exampleInputPassword1">No Gudep</label>
							<input type="text" class="form-control" name="gudep" id="gudep" placeholder="xx.xxx" required>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-12">
							<label for="exampleInputPassword1">Nama Ambalan</label>
							<select name="ambalan" class="form-control" id="ambalan">
								<option value="Putra">Putra</option>
								<option value="Putri">Putri</option>
							</select>
						</div>
					</div>


				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				</div>
			</div>
		</div>
	</div>
</form>