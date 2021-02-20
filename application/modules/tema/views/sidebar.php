<?php 
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

                <?php if ($level == ADMIN): ?>
                  <?php $this->load->view('submenu/super_admin') ?>
                <?php endif ?>

                <?php if ($level == ADMIN_KWARAN): ?>
                  <?php $this->load->view('submenu/admin_kwarran') ?>
                <?php endif ?>

                <?php if ($level == ADMIN_GUDEP): ?>
                  <?php $this->load->view('submenu/admin_gudep') ?>
                <?php endif ?>

          </ul>
      </div>
  </div>
</div>