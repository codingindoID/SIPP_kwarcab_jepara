<!-- Logo Header -->
<div class="logo-header" data-background-color="blue">
    
    <a href="<?php echo site_url() ?>" class="logo">
        <img src="<?php echo base_url('assets/') ?>img/logo.png" alt="navbar brand" class="navbar-brand">
    </a>
    <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
            <i class="icon-menu"></i>
        </span>
    </button>
    <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
    <div class="nav-toggle">
        <button class="btn btn-toggle toggle-sidebar">
            <i class="icon-menu"></i>
        </button>
    </div>
</div>
<!-- End Logo Header -->

<!-- Navbar Header -->
<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
    
    <div class="container-fluid">
        <div class="collapse" id="search-nav">
            <form class="navbar-left navbar-form nav-search mr-md-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="submit" class="btn btn-search pr-1">
                            <i class="fa fa-search search-icon"></i>
                        </button>
                    </div>
                    <input type="text" placeholder="Search ..." class="form-control">
                </div>
            </form>
        </div>
        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item toggle-nav-search hidden-caret">
                <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                    <i class="fa fa-search"></i>
                </a>
            </li>
<!--             <li class="nav-item dropdown hidden-caret">
                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fas fa-layer-group"></i>
                </a>
                <div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
                    <div class="quick-actions-header">
                        <span class="title mb-1">Quick Actions</span>
                        <span class="subtitle op-8">Shortcuts</span>
                    </div>
                    <div class="quick-actions-scroll scrollbar-outer">
                        <div class="quick-actions-items">
                            <div class="row m-0">
                                <a class="col-6 col-md-4 p-0" href="#">
                                    <div class="quick-actions-item">
                                        <i class="flaticon-file-1"></i>
                                        <span class="text">Generated Report</span>
                                    </div>
                                </a>
                                <a class="col-6 col-md-4 p-0" href="#">
                                    <div class="quick-actions-item">
                                        <i class="flaticon-database"></i>
                                        <span class="text">Create New Database</span>
                                    </div>
                                </a>
                                <a class="col-6 col-md-4 p-0" href="#">
                                    <div class="quick-actions-item">
                                        <i class="flaticon-pen"></i>
                                        <span class="text">Create New Post</span>
                                    </div>
                                </a>
                                <a class="col-6 col-md-4 p-0" href="#">
                                    <div class="quick-actions-item">
                                        <i class="flaticon-interface-1"></i>
                                        <span class="text">Create New Task</span>
                                    </div>
                                </a>
                                <a class="col-6 col-md-4 p-0" href="#">
                                    <div class="quick-actions-item">
                                        <i class="flaticon-list"></i>
                                        <span class="text">Completed Tasks</span>
                                    </div>
                                </a>
                                <a class="col-6 col-md-4 p-0" href="#">
                                    <div class="quick-actions-item">
                                        <i class="flaticon-file"></i>
                                        <span class="text">Create New Invoice</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </li> -->
            <li class="nav-item dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm">
                        <img src="<?php echo base_url('assets/') ?>img/cikal.png" alt="..." class="avatar-img rounded-circle">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                        <li>
                            <div class="user-box">
                                <div class="avatar-lg"><img src="<?php echo base_url('assets/') ?>img/cikal.png" alt="image profile" class="avatar-img rounded"></div>
                                <div class="u-text">
                                    <h4><?php echo $this->session->userdata('ses_display'); ?></h4>
                                    <p class="text-muted"><?php echo $this->session->userdata('ses_email'); ?></p><a href="<?php echo site_url('profil') ?>" class="btn btn-xs btn-secondary btn-sm">Lihat Profil</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <a id="btn-log-out" class="dropdown-item" href="#">Keluar</a>
                        </li>
                    </div>
                </ul>
            </li>
        </ul>
    </div>
</nav>
