<?php $this->load->view('header'); ?>
<style>
    .backgroundatas{
        background-color: #F25961 !important;
    }
</style>
<body>
    <input type="hidden" id="base" value="<?php echo site_url() ?>">
    <div class="wrapper">
        <div class="main-header">
            <?php $this->load->view('navbar'); ?>
        </div>

        <!-- Sidebar -->
        <?php $this->load->view('sidebar'); ?>
        <!-- End Sidebar -->
        <!-- background asli = bg-primary-gradient -->
        <div class="main-panel">
            <div class="content">
              <div class="panel-header">
                <div class="page-inner py-3 bg-primary">
                  <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white fw-bold"><?php echo $title ?></h2>
                        <?php if ($sub == true): ?>
                            <h5 class="text-white" style="margin-top: -0.7em; margin-bottom: 0.8em"><?php echo $sub ?></h5>
                        <?php endif ?>

                    </div>
                        <div class="ml-md-auto py-2 py-md-0 mb-2">
                            <?php echo $button_menu ?>
                                <!-- <a href="#" class="btn-sm btn-white btn-border btn-round mr-2">Manage</a>
                                <a href="#" class="btn-sm btn-secondary btn-round">Add Customer</a> -->
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="page-inner mt--5">
                    <div class="card">
                        <div class="card-body">
                            <?php echo $contents; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('footer'); ?>
        </div>
    </div>
    <!--   Core JS Files   -->
    <?php $this->load->view('js'); ?>