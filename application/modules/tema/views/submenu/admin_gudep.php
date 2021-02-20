<?php $this->load->view('submenu/sub_2/anggota'); ?>

<li class="nav-section">
	<span class="sidebar-mini-icon">
		<i class="fa fa-ellipsis-h"></i>
	</span>
	<h4 class="text-section">Data Regional</h4>
</li>
<li class="nav-item <?php echo $menu == 'gudep_regional' ? 'active' : '' ?>">
	<a href="<?php echo site_url('gudep/regional') ?>" >
		<i class="icon-graph"></i>
		<p>Gudep Regional Saya</p>
	</a>
</li>