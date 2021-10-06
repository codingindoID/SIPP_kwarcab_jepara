<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?php echo SITENAME ?></title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="<?php echo base_url('assets/') ?>img/cikal.png" type="image/x-icon"/>
    <script src="<?php echo base_url('assets/') ?>js/core/jquery.3.2.1.min.js"></script>

    <!-- Fonts and icons -->
    <script src="<?php echo base_url('assets/') ?>js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?php echo base_url('assets/') ?>css/fonts.min.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!-- 
        tema dari : http://www.themekita.com  
     -->
     
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/atlantis.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/mycss.css">

    <script src="<?php echo base_url('assets/login') ?>/sweetalert.min.js"></script>
    <script src="<?php echo base_url('assets/select2') ?>/select2.full.min.js"></script>


    <div id="base_url" data-id="<?php echo site_url() ?>">
        
    </div>
</head>