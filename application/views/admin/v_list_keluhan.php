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
                <h1 class="page-header">Keluhan Users</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered table-striped table-hover dt-responsive" id="mydata">
                    <thead>
                        <tr>
                            <th style="text-align:center;width:20px;">No</th>
                            <th style="width:60px;text-align:center;">Role</th>
                            <th style="text-align:center;">Email</th>
                            <th style="text-align:center;">Keluhan</th>
                            <th style="width:160px; text-align:center;">Balas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no=0;
                            foreach ($data->result_array() as $a):
                                $no++;
                                $id=$a['keluhan_id'];
                                $nm=$a['nama'];
                                $email=$a['email'];
                                $kel=$a['keluhan'];
                        ?>
                        <tr>
                            <td style="text-align:center;"><?php echo $no;?></td>
                            <td><?php echo $nm;?></td>
                            <td><?php echo $email;?></td>
                            <td><?php echo $kel;?></td>
                            
                            <td style="text-align:center;">
                                <?php
                                    if($nm == 'Masyarakat')
                                {?>
                                    <a class="btn btn-xs btn-primary" href="<?php echo base_url().'admin/res_masyarakat'?>" data-toggle="modal" title="Masyarakat"><span class="fa fa-commenting"></span> Balas</a>
                                <?php
                                } else {
                                ?>
                                    <a class="btn btn-xs btn-primary" href="<?php echo base_url().'admin/res_kades'?>" data-toggle="modal" title="Kepala Desa"><span class="fa fa-commenting"></span> Balas</a>
                                <?php } ?>
                            </td>
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

    <script type="text/javascript">
        tampil_keluhan();
            function tampil_keluhan(){
                $.ajax({
                    type:'POST',
                    url : '<?php echo base_url()."admin/list_keluhan/tampil_keluhan"?>',
                    dataType: 'json',
                    success : function(data){
                        var row='';
                        for(var i=0;i<data.length;i++){
                            row += '<tr>'+
                                        '<td>'+ data[i].keluhan_id +'</td>' +
                                        '<td>'+ data[i].nama + '</td>' +
                                        '<td>'+ data[i].email + '</td>' +
                                        '<td>'+ data[i].keluhan + '</td>' +
                                    '</tr>';
                        }
                        $('#target').html(row);
                    }
                })

            }

    </script>

</body>
</html>
