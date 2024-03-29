<div class="form-group row">
	<div class="col-md-6">
		<input type="hidden" name="id_user" value="<?php echo $user->id_user ?>" >
		<input type="hidden" name="jenis_admin" value="2" >
		<label for="exampleInputEmail1">Set Username</label>
		<input type="text" class="form-control" name="username" placeholder="username" required value="<?php echo $user->username ?>">
	</div>
	<div class="col-md-6">
		<label for="exampleInputEmail1">Set Email</label>
		<input type="email" class="form-control" name="email" placeholder="email" required value="<?php echo $user->email ?>">
	</div>
</div>
<div class="form-group row">
	<div class="col-md-6">
		<label for="exampleInputEmail1">Set Display Name</label>
		<input type="text" class="form-control" name="display_name" placeholder="display name" required value="<?php echo $user->display_name ?>">
	</div>
	<div class="col-md-6">
		<label>Kwaran ** </label>
		<div class="select2-input">
			<select id="select-kwaran" class="form-control" style="width: 100%;"  name="kwaran"  required>
				<option value="">Pilih . . </option>
				<?php foreach ($kwaran as $k): ?>
					<option <?php echo $user->id_kwaran == $k->id_kwaran ? 'selected' : ''  ?> value="<?php echo $k->id_kwaran ?>"><?php echo $k->nama_kwaran ?></option>	
				<?php endforeach ?>
			</select>
		</div>
	</div>
</div>
<div class="modal-footer">
	<button class="btn btn-primary" id="update_data"><i class="fa fa-save"></i> Update Data</button>
</div>


<!-- select 2 -->
<script src="<?php echo base_url('assets/select2') ?>/select2.full.min.js"></script>
<script src="<?php echo base_url('assets/myjs/') ?>update_admin.js"></script>