<div id="modal_add" class="modal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Gudep</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo site_url('gudep/tambah_gudep/regional') ?>" method="post" accept-charset="utf-8">
				<div class="modal-body">
					<div class="form-group row">
						<div class="col-md-8">
							<label for="exampleInputEmail1">Nama Pangkalan</label>
							<div class="select2-input">
								<?php 
								$id_pang  	= $this->session->userdata('ses_pangkalan');
								$sesi  		= $this->session->userdata('ses_level');
								?>
								<select id="select-gudep" name="pangkalan" required>
									<option value="">Pilih..</option>
									<?php foreach ($pangkalan as $pang): ?>
										<option value="<?php echo $pang->id_pangkalan ?>"
											<?php echo $id_pang ==  $pang->id_pangkalan ? 'selected' : '' ?>>
											<?php echo $pang->nama_pangkalan ?>
										</option>
									<?php endforeach ?>
								</select>

							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-12">
							<label for="exampleInputPassword1">No Gudep</label>
							<input type="text" class="form-control" name="gudep" placeholder="xxx.xxx" required>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-12">
							<label for="exampleInputPassword1">Satuan</label>
							<select name="ambalan" class="form-control">
								<option value="Putra">Putra</option>
								<option value="Putri">Putri</option>
							</select>
						</div>
					</div>


				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" id="simpan_data">Simpan Data</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				</div>
			</div>
		</form>
	</div>
</div>
