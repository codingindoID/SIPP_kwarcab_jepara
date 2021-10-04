<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>

    </button>
    <span class="my-2 my-lg-0 d-lg-none" >
        <img height="40px" src="<?php echo base_url('assets/') ?>img/logo.png" alt="navbar brand" class="navbar-brand ml-2">
    </span>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand d-none d-sm-block" href="#">
            <img height="45px" src="<?php echo base_url('assets/') ?>img/logo.png" alt="navbar brand" class="d-none d-sm-block ml-2">
        </a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <form action="<?php echo site_url('landing/cari') ?>" method="post">
            <div class="input-group">
                <div class="input-group-prepend bg-white" style="border-radius: 25px 0 0 25px;">
                    <button type="submit" class="btn btn-search pr-1 bg-white" >
                        <i class="fa fa-search search-icon"></i>
                    </button>
                </div>
                <input name="cari" type="text" placeholder="Search ..." class="form-control">
            </div>
        </form>
    </li>
</ul>
<form class="form-inline my-2 my-lg-0">
 <a id="btn-log-out" href="#" class="btn-sm btn-warning">Keluar <i class="fa fa-power-off ml-2" aria-hidden="true"></i></a>
</form>
</div>
</nav>
</div>