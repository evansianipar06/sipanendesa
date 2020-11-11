<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta name="author" content="">

    <title>Ubah Data Diri</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
    
	<link href="<?php echo base_url().'assets/css/font-awesome.css'?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'assets/css/4-col-portfolio.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/dataTables.bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/jquery.dataTables.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/dist/css/bootstrap-select.css'?>" rel="stylesheet">
    
</head>

<body>

    <!-- Navigation -->
   <?php 
        $this->load->view('admin/menu');
   ?>

    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <center><?php echo $this->session->flashdata('msg');?></center>
                <h1 class="page-header">Ubah Data Diri</h1>
            </div>
        </div>

        <?php
            foreach ($data->result_array() as $a) {
                $id=$a['penduduk_id'];
                $nik=$a['penduduk_nik'];
                $nm=$a['penduduk_nama'];
                $tgl_lahir=$a['penduduk_tgl_lahir'];
                $golda=$a['penduduk_golda'];
                $alamat=$a['penduduk_alamat'];
                $notelp=$a['penduduk_notelp'];
            }
        ?>

        <form class="form-horizontal" method="post" action="<?php echo base_url().'change/edit_penduduk'?>">
            <div class="modal-body">
                <input name="kode" type="hidden" value="<?php echo $id;?>">    
                    <div class="form-group">
                        <label class="col-xs-3" >NIK Penduduk</label>
                        <div class="col-xs-9">
                            <input name="nik" class="form-control" type="text" placeholder="NIK Penduduk..." style="width:280px;" value="<?php echo $nik ?>" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-xs-3" >Nama Penduduk</label>
                        <div class="col-xs-9">
                            <input name="nama" class="form-control" type="text" placeholder="Nama Penduduk..." style="width:280px;" value="<?php echo $nm ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-3" >Tanggal Lahir Penduduk</label>
                        <div class="col-xs-9">
                            <input name="tgl_lahir" class="form-control" type="text" placeholder="Tanggal Lahir Penduduk..." style="width:280px;" value="<?php echo $tgl_lahir ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-3" >Golda Penduduk</label>
                        <div class="col-xs-9">
                            <input name="golda" class="form-control" type="text" placeholder="Golongan Darah Penduduk..." style="width:280px;" value="<?php echo $golda ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-3" >Alamat</label>
                        <div class="col-xs-9">
                            <input name="alamat" class="form-control" type="text" placeholder="Alamat..." style="width:280px;" value="<?php echo $alamat ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-3" >No Telp/ HP</label>
                        <div class="col-xs-9">
                            <input name="notelp" class="form-control" type="text" placeholder="No Telp/HP..." style="width:280px;" value="<?php echo $notelp ?>" required>
                        </div>
                    </div>   

                    <label class="col-xs-3" ></label>
                    <div class="col-xs-9">
                        <button type="submit" class="btn btn-primary">Change</button>
                    </div>
                </div>
        </form>
    </div>
       
    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p style="text-align:center;">Copyright &copy; <?php echo '2020';?> by Kelompok 8</p>
            </div>
        </div>
        <!-- /.row -->
    </footer>

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
