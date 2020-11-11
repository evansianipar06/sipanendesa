<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>List Keluhan</title>

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
                <h1 class="page-header">Feedback</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered table-striped table-hover dt-responsive" id="mydata">
                    <thead>
                        <tr>
                            <th style="text-align:center;width:20px;">No</th>
                            <th style="width:200px;text-align:center;">Role</th>
                            <th style="width:300px;text-align:center;">Email</th>
                            <th style="text-align:center;">Respon</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no=0;
                            foreach ($data->result_array() as $a):
                                $no++;
                                $id=$a['respon_id'];
                                $nm=$a['nama'];
                                $email=$a['email'];
                                $res=$a['respon'];
                        ?>
                        <tr>
                            <td style="text-align:center;"><?php echo $no;?></td>
                            <td><?php echo $nm;?></td>
                            <td><?php echo $email;?></td>
                            <td><?php echo $res;?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p style="text-align:center;">Copyright &copy; <?php echo '2020';?> by Kelompok 2020</p>
                </div>
            </div>
            <!-- /.row -->
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
