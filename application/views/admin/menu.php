<?php
      $jml_feedback_kades = $this->m_res_kades->total_rows();
      $jml_feedback_mas = $this->m_res_mas->total_rows();
      $jml_list_keluhan = $this->m_keluhan->total_rows();
?>
<style type="text/css">
    .navbar-inversee {
    background-color: #008080 !important;
}
</style>

<nav class="navbar navbar-inversee navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" > </br>
                <ul class="navbar-nav navbar-right" style="color: white; font-size: 15px;">
                   <?php $h=$this->session->userdata('akses'); ?>
                    <?php $u=$this->session->userdata('user'); ?>
                    <?php if($h=='1'){ ?>         
                    <li class="dropdown">
                        <a class="active" href="<?php echo base_url().'welcome'?>" style="color: white;"><span class="fa fa-home" aria-hidden="true"></span> Home</a> &emsp;
                        <a class="active" href="<?php echo base_url().'admin/panen'?>" style="color: white;"> <span class="fa fa-pagelines" aria-hidden="true"></span> Panen </a> &emsp;
                        <a href="<?php echo base_url().'admin/penduduk'?>" style="color: white;"><span class="fa fa-users"></span> Penduduk </a> &emsp;
                        <a href="<?php echo base_url().'admin/kategori'?>" style="color: white;"><span class="fa fa-sitemap"></span> Kategori</a> &emsp;
                        <a href="<?php echo base_url().'admin/pengguna'?>" style="color: white;"><span class="fa fa-user-plus"></span> Pengguna</a> &emsp;
                        <a href="<?php echo base_url().'admin/penjualan'?>" style="color: white;"><span class="fa fa-usd"></span> Jual Panen </a> &emsp;
                        <a href="<?php echo base_url().'admin/grafik'?>" style="color: white;"><span class="fa fa-line-chart" aria-hidden="true"></span> Grafik</a> &emsp;
                        <a href="<?php echo base_url().'admin/laporan'?>" style="color: white;"><span class="fa fa-file-text" aria-hidden="true"></span> Laporan</a> &emsp;
                        <a href="<?php echo base_url().'admin/list_keluhan'?>" style="color: white;"><span class="fa fa-comments" aria-hidden="true"></span> List Keluhan 
                            <span class="label label-primary"><?= $jml_list_keluhan; ?></span>
                        </a> &emsp;
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="Admin" style="color: white;">
                            <span class="fa fa-user" aria-hidden="true"></span>
                            (<small class="fa fa-circle text-success" style="color: orange;"> Online</small>)<i ></i>  
                            <?php echo $this->session->userdata('nama');?></a>&emsp;
                            <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo base_url().'administrator/logout'?>"><span class="fa fa-sign-out"></span> Logout</a>
                            </li>
                    <?php }?>
                    
                    <?php if($h=='2'){ ?> 
                        <li class="dropdown">
                            <a class="active" href="<?php echo base_url().'welcome'?>" style="color: white;"><span class="fa fa-home" aria-hidden="true"></span> Home</a> &emsp;&emsp;
                            <a class="active" href="<?php echo base_url().'admin/panen'?>" style="color: white;"> <span class="fa fa-pagelines" aria-hidden="true"></span> Panen </a> &emsp;&emsp;
                            <a href="<?php echo base_url().'admin/penduduk'?>" style="color: white;"><span class="fa fa-users"></span> Penduduk </a> &emsp;&emsp;
                            <a href="<?php echo base_url().'admin/grafik'?>" style="color: white;"><span class="fa fa-line-chart" aria-hidden="true"></span> Grafik</a> &emsp;&emsp;
                            <a href="<?php echo base_url().'admin/laporan'?>" style="color: white;"><span class="fa fa-file-text" aria-hidden="true"></span> Laporan</a> &emsp;&emsp;
                            <a href="<?php echo base_url().'admin/keluhan'?>" style="color: white;"><span class="fa fa-comments" aria-hidden="true"></span> Keluhan</a> &emsp;&emsp;
                            <a href="<?php echo base_url().'admin/feedback_to_kades'?>" style="color: white;">
                                <span class="fa fa-commenting" aria-hidden="true"></span> Feedback
                                <span class="label label-primary"><?= $jml_feedback_kades; ?></span>
                            </a>&emsp;&emsp;
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="Kepala Desa" style="color: white;">
                            <span class="fa fa-user" aria-hidden="true"></span>
                            (<small class="fa fa-circle text-success" style="color: orange;"> Online</small>)<i ></i>  
                            <?php echo $this->session->userdata('nama');?></a>&emsp;&emsp;
                            <span class="fa fa-sign-out" aria-hidden="true"></span>
                            <a href="<?php echo base_url().'administrator/logout'?>" style="color: white">Logout</a>                               
                        </li>
                    <?php }?>
                     
                    <?php if($h=='3'){ ?> 
                        <li class="dropdown">
                            <a class="active" href="<?php echo base_url().'welcome'?>" style="color: white;"><span class="fa fa-home" aria-hidden="true"></span> Home</a> &emsp;&emsp;
                            <a class="active" href="<?php echo base_url().'admin/panen'?>" style="color: white;"> <span class="fa fa-pagelines" aria-hidden="true"></span> Panen </a> &emsp;&emsp;
                            <a href="<?php echo base_url().'admin/penjualan'?>" style="color: white;"><span class="fa fa-usd" aria-hidden="true"></span> Jual Panen </a> &emsp;&emsp;
                            <a href="<?php echo base_url().'admin/penduduk'?>" style="color: white;"><span class="fa fa-users" aria-hidden="true"></span> Penduduk </a> &emsp;&emsp;
                            <a href="<?php echo base_url().'admin/keluhan'?>" style="color: white;"><span class="fa fa-comments" aria-hidden="true"></span> Keluhan</a> &emsp;&emsp;
                            <a href="<?php echo base_url().'admin/feedback_to_masyarakat'?>" style="color: white;">
                                <span class="fa fa-commenting" aria-hidden="true"></span> Feedback
                                <span class="label label-primary"><?= $jml_feedback_mas; ?></span>
                            </a>&emsp;&emsp;&emsp;&emsp;
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="Masyarakat" style="color: white;">
                            <span class="fa fa-user" aria-hidden="true"></span>
                            (<small class="fa fa-circle text-success" style="color: orange;"> Online</small>)<i ></i>  
                            <?php echo $this->session->userdata('nama');?></a>&emsp;&emsp;
                            <a href="<?php echo base_url().'administrator/logout'?>" style="color: white;"><span class="fa fa-sign-out"></span> Logout</a> 
                            <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo base_url().'admin/Change/index2'?>"><span class="fa fa-user"></span> Change Data</a>  
                            </li> 
                        </li>
                    <?php }?>
                     
                    <?php if($h=='4'){ ?> 
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="Guest">
                        <span class="fa fa-user" aria-hidden="true"></span>
                        (<small class="fa fa-circle text-success" style="color: orange;"> Online</small>)<i ></i>  
                        <?php echo $this->session->userdata('nama');?></a>
                        <li>
                            <a href="<?php echo base_url().'administrator/logout'?>"><span class="fa fa-sign-out"></span> Logout</a>                             </li>
                        </li>
                    <?php }?>
                </ul>
            </div>
        </div>
    </nav>


    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap-datetimepicker.min.css'?>">

                        <!-- Bootstrap Core JavaScript -->
                        <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
                        <script src="<?php echo base_url().'assets/js/dataTables.bootstrap.min.js'?>"></script>
                        <script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"></script>
                        <script src="<?php echo base_url().'assets/js/moment.js'?>"></script>
                        <script src="<?php echo base_url().'assets/js/bootstrap-datetimepicker.min.js'?>"></script>
                        <script type="text/javascript">
                                $(function () {
                                    $('#datepicker2').datetimepicker({
                                        format: 'YYYY-MM-DD',
                                    });
                                });
                        </script>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                $('#mydata').DataTable();
                            } );
                        </script>
                </form>
            </div>
        </div>
    </div>
       
   
    

    