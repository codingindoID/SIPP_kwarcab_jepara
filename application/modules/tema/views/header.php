<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Sensus Anggota Pramuka Kwarcab Jepara</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="<?php echo base_url('assets/') ?>img/logo2.png" type="image/x-icon"/>
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

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/atlantis.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/mycss.css">

    <script src="<?php echo base_url('assets/login') ?>/sweetalert.min.js"></script>

    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="<?php echo base_url('assets/select2') ?>/select2.full.min.js"></script>

</head>

<?php 
if ($this->session->flashdata('success')) {
    $flash_type = 'success';
    $data_flash = $this->session->flashdata('success');
}
else if($this->session->flashdata('warning'))
{
    $flash_type = 'warning';
    $data_flash = $this->session->flashdata('warning');
}
else if($this->session->flashdata('error'))
{
    $flash_type = 'error';
    $data_flash = $this->session->flashdata('error');
}
else if($this->session->flashdata('prompt'))
{
    $flash_type = 'prompt';
    $data_flash = $this->session->flashdata('prompt');
}
else
{
    $flash_type = '';
    $data_flash = '';
}
?>

<input type="hidden" id="x_flash" value="<?= $flash_type ?>">
<input type="hidden" id="m_flash" value="<?= $data_flash ?>">