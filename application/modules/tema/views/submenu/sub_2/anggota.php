<?php 
$admin  = ['anggota','tambah_anggota'];
?>
<li class="nav-item <?php if(in_array($menu, $admin , true)) {echo 'active';} ?>">
    <a data-toggle="collapse" href="#menu1">
        <i class="fas fa-chalkboard-teacher"></i>
        <p>Anggota</p>
        <span class="caret"></span>
    </a>
    <div class="collapse <?php if(in_array($menu, $admin , true)) {echo 'show';} ?>" id="menu1">
        <ul class="nav nav-collapse">
            <li class="<?php echo $menu == 'anggota' ? 'active' : '' ?>">
                <a href="<?php echo site_url('anggota') ?>">
                    <span class="sub-item">Anggota</span>
                </a>
            </li>
            <li class="<?php echo $menu == 'tambah_anggota' ? 'active' : '' ?>">
                <a href="<?php echo site_url('anggota/tambah_anggota') ?>">
                    <span class="sub-item">Tambah Anggota</span>
                </a>
            </li>
            <li class="<?php echo $menu == 'export' ? 'active' : '' ?>">
                <a href="<?php echo site_url('anggota/export_anggota') ?>">
                    <span class="sub-item">Export Excel</span>
                </a>
            </li>
        </ul>
    </div>
</li>