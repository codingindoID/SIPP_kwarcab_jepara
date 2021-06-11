<?php 
$kelola  = ['admin_kwaran','admin_gudep'];
$master = ['gudep','pangkalan','kwarran'];
?>
<?php $this->load->view('submenu/sub_2/anggota'); ?>

<li class="nav-section">
	<span class="sidebar-mini-icon">
		<i class="fa fa-ellipsis-h"></i>
	</span>
	<h4 class="text-section">Data Regional</h4>
</li>

<li class="nav-item <?php echo $menu == 'pangkalan_regional' ? 'active' : '' ?>">
	<a href="<?php echo site_url('pangkalan/regional') ?>" >
		<i class="icon-size-actual"></i>
		<p>Pangkalan Regional Saya</p>
	</a>
</li>
<li class="nav-item <?php echo $menu == 'gudep_regional' ? 'active' : '' ?>">
	<a href="<?php echo site_url('gudep/regional') ?>" >
		<i class="icon-graph"></i>
		<p>Gudep Regional Saya</p>
	</a>
</li>


<li class="nav-section">
	<span class="sidebar-mini-icon">
		<i class="fa fa-ellipsis-h"></i>
	</span>
	<h4 class="text-section">Master Admin</h4>
</li>
<li class="nav-item <?php if(in_array($menu, $kelola , true)) {echo 'active';} ?>" >
	<a data-toggle="collapse" href="#admin">
		<i class="fas fa-key"></i>
		<p>Kelola Admin</p>
		<span class="caret"></span>
	</a>


	<div class="collapse  <?php if(in_array($menu, $kelola , true)) {echo 'show';} ?>" id="admin">
		<ul class="nav nav-collapse">
			<li class="<?php echo $menu == 'admin_gudep' ? 'active' : '' ?>">
				<a href="<?php echo site_url('admin/admin_gudep') ?>">
					<span class="sub-item">Admin Gudep</span>
				</a>
			</li>
		</li>
	</ul>
</div>