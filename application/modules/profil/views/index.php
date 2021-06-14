<div class="row">
	<div class="col-md-4">
		<div class="card card-profile">
			<div class="card-header">
				<div class="profile-picture">
					<div class="avatar avatar-xl">
						<img src="<?php echo base_url('assets/img/cikal.png') ?>" alt="..." class="avatar-img rounded-circle">
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="user-profile text-center">
					<div class="name"><?php echo $this->session->userdata('ses_display'); ?></div>
					<div class="job"><?php echo $this->session->userdata('ses_username'); ?></div>
					<div class="desc"><?php echo $this->session->userdata('ses_email'); ?></div>
				</div>
			</div>
			<div class="card-footer">
				<center><p>-- Pramuka Untuk Negeri --</p></center>
			</div>
		</div>
	</div>


	<!-- right -->
	<div class="col-md-8">
		<div class="card card-with-nav">
			<div class="card-header">
				<div class="row row-nav-line">
					<ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-3" role="tablist">
						<li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Profile : </a> </li>
						<li class="nav-item"> <a class="nav-link show" data-toggle="tab" href="#home" role="tab" aria-selected="true">KODE KWARRAN : <?php echo $this->session->userdata('ses_kwaran') != null ?  $this->session->userdata('ses_kwaran') : '-' ?></a> </li>
						<li class="nav-item"> <a class="nav-link show" data-toggle="tab" href="#home" role="tab" aria-selected="true">KODE PANGKALAN : <?php echo $this->session->userdata('ses_pangkalan') != null ? $this->session->userdata('ses_pangkalan') : '-'; ?></a> </li>
					</ul>
				</div>
			</div>
			<div class="card-body">
				<div class="row mt-2">
					<div class="col-md-6">
						<div class="form-group form-group-default">
							<label>Username</label>
							<input type="text" class="form-control" name="username" value="<?php echo $this->session->userdata('ses_username'); ?>" >
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group form-group-default">
							<label>Email</label>
							<input type="email" class="form-control" name="email" value="<?php echo $this->session->userdata('ses_email'); ?>" >
						</div>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-md-6">
						<div class="form-group form-group-default">
							<label>Display Name</label>
							<input type="text" class="form-control" name="display" value="<?php echo $this->session->userdata('ses_display'); ?>" >
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group form-group-default">
							<label class="mb-2 mt-1">Password</label>
							<b><a href="#modal_pass" data-toggle="modal">* * * * * * *</a></b>
						</div>
					</div>
				</div>
				<div class="text-right mt-3 mb-3">
					<?php if ($this->session->userdata('ses_level') != 4): ?>
						<button class="btn btn-success" id="button-update"><i class="fa fa-save"></i> Update</button>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- modal -->
<div id="modal_pass" class="modal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content"> 
			<div class="modal-header bg-primary">
				<h4 class="modal-title"><span id="title_modal">Ganti Password</span></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group row">
					<div class="col-md-6">
						<input type="hidden" name="<?php echo $this->session->userdata('ses_id'); ?>" >
						<label for="exampleInputEmail1">Set Password Baru</label>
						<input type="password" class="form-control" name="password1" placeholder="password" required>
					</div>
					<div class="col-md-6">
						<label for="exampleInputEmail1">Ulangi</label>
						<input type="password" class="form-control" name="password2" placeholder="ulang password" required>
					</div>
					
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary" id="simpan_pass"><i class="fa fa-lock"></i> Update Password</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url('assets/myjs/js_profil.js') ?>" type="text/javascript"></script>
