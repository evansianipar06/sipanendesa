<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Keluhan</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/font-awesome.css'?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'assets/css/4-col-portfolio.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/jquery.dataTables.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/dist/css/bootstrap-select.css'?>" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
   <?php 
        $this->load->view('admin/menu');
   ?>

    <div class="container" style="font-family:Times New Roman;">
        <div class="row">
            <div class="col-lg-12">
                <center><?php echo $this->session->flashdata('msg');?></center>
                <h1 class="page-header">Berikan Feedback</h1>
                <p align="left">Tanggal : <?php echo date('d-M-Y')?>
                <p> Kepada : Masyarakat</br>Dari : <?php echo $this->session->userdata('nama');?> </p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/res_masyarakat/tambah_feedback'?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <h4>Nama</h4>
                            <div>
                                <input name="nama" class="form-control" type="text" value="<?php echo $this->session->userdata('nama');?>" style="width:450px;" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <h4>Email</h4>
                            <div>
                                <input name="email" class="form-control" type="email" placeholder="Masukkan email ..." style="width:450px;">
                            </div>
                        </div>

                        <div class="form-group">
                            <h4>Respon</h4>
                            <div>
                                <textarea name="respon" class="form-control" type="text" placeholder="Apa Keluhan Anda ???" style="width:450px; height: 100px;"></textarea>
                            </div>
                        </div>

                        <div class="form-group" style="margin-left: 34%;">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p style="text-align:center;">Copyright &copy; <?php echo '2020';?> by Kelompok 8</p>
                </div>
            </div>
        </footer>
    </div>

     <!-- jQuery -->
     <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/dataTables.bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#mydata').DataTable();
        } );
    </script>

</body>
</html>
