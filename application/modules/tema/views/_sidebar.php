<?php 
$gudep  = ['anggota','tambah_anggota'];
$master = ['gudep','pangkalan','kwaran'];
$admin  = ['admin_kwaran','admin_gudep'];
$akses  = ['1','2'];
$level = $this->session->userdata('ses_level');
?>

<div class="sidebar sidebar-style-2">           
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="<?php echo base_url('assets/') ?>img/cikal.png" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            <?php echo $this->session->userdata('ses_display') ?>
                            <span class="user-level"><?php echo $this->session->userdata('ses_email') ?></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item <?php echo $menu == 'beranda' ? 'active' : '' ?>">
                    <a href="<?php echo site_url() ?>" >
                        <i class="fas fa-home"></i>
                        <p>Beranda</p>
                    </a>
                </li>
                <li class="nav-item <?php if(in_array($menu, $gudep , true)) {echo 'active';} ?>">
                    <a data-toggle="collapse" href="#menu1">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <p>Anggota</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($menu, $gudep , true)) {echo 'show';} ?>" id="menu1">
                        <ul class="nav nav-collapse">
                            <?php if ($level == 1 || $level == 2): ?>
                                <li class="<?php echo $menu == 'anggota' ? 'active' : '' ?>">
                                    <a href="<?php echo site_url('anggota') ?>">
                                        <span class="sub-item">Anggota</span>
                                    </a>
                                </li>
                            <?php endif ?>
                            <?php if ($level == 3): ?>
                                <?php 
                                $detil_user = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('ses_id')])->row();
                                $id_pangkalan = $detil_user->id_pangkalan;
                                ?>
                                <li class="<?php echo $menu == 'anggota' ? 'active' : '' ?>">
                                    <a href="<?php echo site_url('anggota/anggota_gudep/').$id_pangkalan ?>">
                                        <span class="sub-item">Anggota</span>
                                    </a>
                                </li>

                            <?php endif ?>

                            <?php if ($this->session->userdata('ses_level') != 4): ?>
                                <li class="<?php echo $menu == 'tambah_anggota' ? 'active' : '' ?>">
                                    <a href="<?php echo site_url('anggota/tambah_anggota') ?>">
                                        <span class="sub-item">Tambah Anggota</span>
                                    </a>
                                </li>
                                <li class="<?php echo $menu == 'tambah_anggota' ? 'active' : '' ?>">
                                    <a href="<?php echo site_url('anggota/export_anggota') ?>">
                                        <span class="sub-item">Export Excel</span>
                                    </a>
                                </li>
                            <?php endif ?>
                        </ul>
                    </div>
                </li>
                <?php if (in_array($this->session->userdata('ses_level'), ['2','3'])): ?>
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Data Regional</h4>
                    </li>

                    <?php if ($this->session->userdata('ses_level') == '2'): ?>
                        <li class="nav-item <?php echo $menu == 'pangkalan_regional' ? 'active' : '' ?>">
                            <a href="<?php echo site_url('pangkalan/regional') ?>" >
                                <i class="icon-size-actual"></i>
                                <p>Pangkalan Regional Saya</p>
                            </a>
                        </li>
                    <?php endif ?>
                    <li class="nav-item <?php echo $menu == 'gudep_regional' ? 'active' : '' ?>">
                        <a href="<?php echo site_url('gudep/regional') ?>" >
                            <i class="icon-graph"></i>
                            <p>Gudep Regional Saya</p>
                        </a>
                    </li>
                <?php endif ?>
                <?php if ($level != 3 ): ?>
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Master Data</h4>
                    </li>
                <?php endif ?>

                <li class="nav-item <?php if(in_array($menu, $master , true)) {echo 'active';} ?>" >
                    <?php if ($level == 1): ?>
                        <a data-toggle="collapse" href="#submenu">
                            <i class="fas fa-database"></i>
                            <p>Potensi</p>
                            <span class="caret"></span>
                        </a>
                    <?php endif ?>
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
                        <li class="<?php echo $menu == 'kwaran' ? 'active' : '' ?>">
                            <a href="<?php echo site_url('kwaran') ?>">
                                <span class="sub-item">Kwarran</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <?php 
                $level = $this->session->userdata('ses_level');
                if (in_array($level, $akses , true)): ?>
                    <li class="nav-item <?php if(in_array($menu, $admin , true)) {echo 'active';} ?>" >
                      <a data-toggle="collapse" href="#admin">
                        <i class="fas fa-database"></i>
                        <p>Kelola Admin</p>
                        <span class="caret"></span>
                    </a>
                <?php endif ?>


                <div class="collapse  <?php if(in_array($menu, $admin , true)) {echo 'show';} ?>" id="admin">
                    <ul class="nav nav-collapse">
                        <?php 
                        $level = $this->session->userdata('ses_level');
                        if ($level== 1 ): ?>
                            <li class="<?php echo $menu == 'admin_kwaran' ? 'active' : '' ?>">
                                <a href="<?php echo site_url('admin/admin_kwaran') ?>">
                                    <span class="sub-item">Admin Kwarran</span>
                                </a>
                            </li>
                        <?php endif ?>
                        <?php if ($level != 3): ?>
                            <li class="<?php echo $menu == 'admin_gudep' ? 'active' : '' ?>">
                                <a href="<?php echo site_url('admin/admin_gudep') ?>">
                                    <span class="sub-item">Admin gudep</span>
                                </a>
                            </li>
                        <?php endif ?>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
</div>