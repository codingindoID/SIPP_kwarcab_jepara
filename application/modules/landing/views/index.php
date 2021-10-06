<?php 
$this->load->view('tema/header'); 
$this->load->view('tema/navbar'); 
?>

<div class="container">
<?php 
$this->load->view('content/potensi'); 
$this->load->view('content/potensiAnggota'); 
?>

</div>
<?php 
	$this->load->view('tema/js');
	$this->load->view('tema/footer');
 ?>