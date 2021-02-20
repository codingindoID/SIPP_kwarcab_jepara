<?php 
$master = ['gudep','pangkalan','kwarran'];
$kelola  = ['admin_kwaran','admin_gudep']; 
?>

<?php $this->load->view('submenu/sub_2/anggota'); ?>

<li class="nav-section">
    <span class="sidebar-mini-icon">
        <i class="fa fa-ellipsis-h"></i>
    </span>
    <h4 class="text-section">Master Data</h4>
</li>

<li class="nav-item <?php if(in_array($menu, $master , true)) {echo 'active';} ?>" >
    <a data-toggle="collapse" href="#submenu">
        <i class="fas fa-database"></i>
        <p>Potensi</p>
        <span class="caret"></span>
    </a>
    <div class="collapse  <?php if(in_array($menu, $master , true)) {echo 'show';} ?>" id="submenu">
        <ul class="nav nav-collapse">
            <li class="<?php echo $menu == 'pangkalan' ? 'active' : '' ?>">
                <a href="<?php echo site_url('pangkalan') ?>">
                    <span class="sub-item">Pangkalan</span>
                </a>
            </li>
            <li class="<?php echo $menu == 'gudep' ? 'active' : '' ?>">
                <a href="<?php echo site_url('gudep') ?>">
                    <span class="sub-item">Gudep Terdaftar</span>
                </a>
            </li>
        </li>
        <li class="<?php echo $menu == 'kwarran' ? 'active' : '' ?>">
            <a href="<?php echo site_url('kwaran') ?>">
                <span class="sub-item">Kwarran</span>
            </a>
        </li>

    </ul>
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

        <li class="<?php echo $menu == 'admin_kwaran' ? 'active' : '' ?>">
            <a href="<?php echo site_url('admin/admin_kwaran') ?>">
                <span class="sub-item">Admin Kwarran</span>
            </a>
        </li>

        <li class="<?php echo $menu == 'admin_gudep' ? 'active' : '' ?>">
            <a href="<?php echo site_url('admin/admin_gudep') ?>">
                <span class="sub-item">Admin gudep</span>
            </a>
        </li>
    </li>
</ul>
</div>