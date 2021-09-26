<script src="<?php echo base_url('assets/') ?>js/core/jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url('assets/') ?>js/core/popper.min.js"></script>
<script src="<?php echo base_url('assets/') ?>js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="<?php echo base_url('assets/') ?>js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="<?php echo base_url('assets/') ?>js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="<?php echo base_url('assets/') ?>js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


<!-- Chart JS -->
<script src="<?php echo base_url('assets/') ?>js/plugin/chart.js/chart.min.js"></script>


<!-- Chart Circle -->
<script src="<?php echo base_url('assets/') ?>js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="<?php echo base_url('assets/') ?>js/plugin/datatables/datatables.min.js"></script>

<!-- Atlantis JS -->
<script src="<?php echo base_url('assets/') ?>js/atlantis.min.js"></script>

<!-- select 2 -->
<script src="<?php echo base_url('assets/select2') ?>/select2.full.min.js"></script>

<!-- jQuery Validation -->
<script src="<?php echo base_url('assets/js/') ?>jquery.validate.min.js"></script>
<script src="<?php echo base_url('assets/myjs/') ?>flash.js"></script>
<script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({
        });

        $('#table-kwaran').DataTable({
           paging : false,
           info : false
       });

        $('#table-gudep').DataTable({
         paging : false,
         info : false
     });

        $('#table-anggota').DataTable({ 

            "processing": true, 
            "serverSide": true, 
            "order": [], 

            "ajax": {
                "url": "<?php echo site_url('anggota/get_data_anggota')?>",
                "type": "POST"
            },


            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],

        });

    });
</script>
<script>
    function goBack() {
        window.history.back();
    }
    $('#btn-log-out').click(function(event) {
        var base = $('#base').val()
        Swal.fire({
            title: 'Anda Yakin Akan Keluar?',
            text: "Anda Harus Melakukan Login Ulang Saat Membuka Aplikasi Kembali",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Tetap Keluar!',
            cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.isConfirmed) {
           location.href = base+'auth/logout';
       }
   })
    });
</script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
</body>
</html>