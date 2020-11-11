<!DOCTYPE html>
<html lang="en">

<head>

      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Welcome</title>

      <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
      <link href="<?php echo base_url().'assets/css/style.css'?>" rel="stylesheet">
      <link href="<?php echo base_url().'assets/css/font-awesome.css'?>" rel="stylesheet">

      <!-- Custom CSS -->
      <link href="<?php echo base_url().'assets/css/4-col-portfolio.css'?>" rel="stylesheet">
     
?>
      <style type="text/css">
      .bg {
           width: 100%;
           height: 100%;
           position: fixed;
           z-index: -1;
           float: left;
           left: 0;
           margin-top: -20px;
      }

      .a {
            color: black;
      }

      .d {
            margin-left: 5%;
            margin-right:5%;
            font-family: Times New Roman;
            font-size: 20px;
            color: white;
            font-style: italic;
            line-height: 30px;
            text-align: justify;
      }

      .p {
            margin-left: 5%;
            margin-right:5%;
            font-family: Times New Roman;
            font-size: 20px;
            color: white;
            line-height: 30px;
            text-align: justify;
      }

      .q {
            margin-left: 5%;
            margin-right:5%;
            font-family: Times New Roman;
            font-size: 20px;
            color: white;
            line-height: 30px;
            text-align: center;
      }

      .menu-item {
            border-radius:15px !important;
            border-style: double !important;
            border-bottom: 6px solid yellow !important;
            border-top: 6px solid yellow !important;
            padding-top: 27px;
            padding-left: 2px;
      }

      .menu-item2 {
            border-radius:15px !important;
            border-style: double !important;
            border-bottom: 6px solid black !important;
            border-top: 6px solid black !important;
            padding-top: 27px;
            padding-left: 2px;
      }

      .menu-item3 {
            border-radius:15px !important;
            border-style: double !important;
            border-bottom: 6px solid orange !important;
            border-top: 6px solid orange !important;
            padding-top: 27px;
            padding-left: 2px;
      }
      </style>
</head>

<body>
      <img src="<?php echo base_url().'assets/img/desa.jpg'?>" alt="gambar" class="bg" />
      
      <!-- Navigation -->
      <?php 
            $this->load->view('admin/menu');
      ?>

      <!-- Page Content -->
      <div class="container">

      <!-- Page Heading -->
      <div class="row">
                  <h4 class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                  </button>
                  <?php

                        date_default_timezone_set("Asia/Jakarta");
                        $b = time();
                        $hour = date("G",$b);

                        if ($hour>=0 && $hour<=11)
                        {
                              echo '<p style= "font-size: 40px;"><b>Halo, Selamat Pagi</b></p> <hr> <p><b><i>" Anda Sukses login sebagai '.$this->session->userdata('nama').' "</p></b></i>';
                        } elseif ($hour >=12 && $hour<=14) {
                              echo '<p style= "font-size: 40px;"><b>Halo, Selamat Siang</b></p> <hr> <p><b><i>" Anda Sukses login sebagai '.$this->session->userdata('nama').' "</p></b></i>';
                        } elseif ($hour >=15 && $hour<=17) {
                              echo '<p style= "font-size: 40px;"><b>Halo, Selamat Sore</b></p> <hr> <p><b><i>" Anda Sukses login sebagai '.$this->session->userdata('nama').' "</p></b></i>';
                        } elseif ($hour >=17 && $hour<=18) {
                              echo '<p style= "font-size: 40px;"><b>Halo, Selamat Petang</b></p> <hr> <p><b><i>" Anda Sukses login sebagai '.$this->session->userdata('nama').' "</p></b></i>';
                        } elseif ($hour >=19 && $hour<=23){ 
                              echo '<p style= "font-size: 40px;"><b>Halo, Selamat Malam</b></p> <hr> <p><b><i>" Anda Sukses login sebagai '.$this->session->userdata('nama').' "</p></b></i>';
                        }

                  ?>
                  </h4>
      </div>

	<div >
            <?php $h=$this->session->userdata('akses'); ?>
            <?php $u=$this->session->userdata('user'); ?>

            <!-- Admin -->
            <div class="row">
            <?php if($h=='1'){ ?> 
                  <div class="row">
                        <div class="col-md-4 portfolio-item">
                              <div class="menu-item blue" style="height:300px;">
                                    <center><strong style="color: white; font-size: 40px;">Visi</strong></center>
                                    <hr>
                                    <p class="d">Meningkatkan kualitas hasil panen yang bermutu dan memiliki nilai guna yang tinggi dalam memnuhi kebutuhan pangan masyarakat.</p>
                              <tr>
                              </div> 
                        </div>

                        <div class="col-md-4 portfolio-item">
                              <div class="menu-item2 red" style="height:300px;">
                                    <center><strong style="color: white; font-size: 40px;">Motto</strong></center>
                                    <hr>
                                    <p class="q"><strong class="p">TRAMTIBMABES</strong><br>(Tentram, Tertib, Aman dan Kebersamaan )
                                    </p>
                              <tr>
                              </div> 
                        </div>

                        <div class="col-md-4 portfolio-item">
                              <div class="menu-item3 blue" style="height:300px;">
                                    <center><strong style="color: white; font-size: 40px;">Misi</strong></center>
                                    <hr>
                                    <p class="d">Optimalisasi Otonomi Desa melalui Pemberdayaan masyarakat dan 
                                    meningkatkan ekonomi kerakyatan yang berbasis agribisnis.</p>
                              <tr>
                              </div> 
                        </div>
            
            <?php } ?>

            <!-- Kepala Desa -->
            <?php if($h=='2'){ ?> 
                  <div class="col-md-4 portfolio-item">
                              <div class="menu-item blue" style="height:300px;">
                                    <center><strong style="color: white; font-size: 40px;">Visi</strong></center>
                                    <hr>
                                    <p class="d">Meningkatkan kualitas hasil panen yang bermutu dan memiliki nilai guna yang tinggi dalam memnuhi kebutuhan pangan masyarakat.</p>
                              <tr>
                              </div> 
                        </div>

                        <div class="col-md-4 portfolio-item">
                              <div class="menu-item2 red" style="height:300px;">
                                    <center><strong style="color: white; font-size: 40px;">Motto</strong></center>
                                    <hr>
                                    <p class="q"><strong class="p">TRAMTIBMABES</strong><br>(Tentram, Tertib, Aman dan Kebersamaan )
                                    </p>
                              <tr>
                              </div> 
                        </div>

                        <div class="col-md-4 portfolio-item">
                              <div class="menu-item3 blue" style="height:300px;">
                                    <center><strong style="color: white; font-size: 40px;">Misi</strong></center>
                                    <hr>
                                    <p class="d">Optimalisasi Otonomi Desa melalui Pemberdayaan masyarakat dan 
                                    meningkatkan ekonomi kerakyatan yang berbasis agribisnis.</p>
                              <tr>
                              </div> 
                        </div>
            
            <?php }?>
        </div>

        <!-- Masyarakat -->
         <?php if($h=='3'){ ?> 
            <div class="col-md-4 portfolio-item">
                              <div class="menu-item blue" style="height:300px;">
                                    <center><strong style="color: white; font-size: 40px;">Visi</strong></center>
                                    <hr>
                                    <p class="d">Meningkatkan kualitas hasil panen yang bermutu dan memiliki nilai guna yang tinggi dalam memnuhi kebutuhan pangan masyarakat.</p>
                              <tr>
                              </div> 
                        </div>

                        <div class="col-md-4 portfolio-item">
                              <div class="menu-item2 red" style="height:300px;">
                                    <center><strong style="color: white; font-size: 40px;">Motto</strong></center>
                                    <hr>
                                    <p class="q"><strong class="p">TRAMTIBMABES</strong><br>(Tentram, Tertib, Aman dan Kebersamaan )
                                    </p>
                              <tr>
                              </div> 
                        </div>

                        <div class="col-md-4 portfolio-item">
                              <div class="menu-item3 blue" style="height:300px;">
                                    <center><strong style="color: white; font-size: 40px;">Misi</strong></center>
                                    <hr>
                                    <p class="d">Optimalisasi Otonomi Desa melalui Pemberdayaan masyarakat dan 
                                    meningkatkan ekonomi kerakyatan yang berbasis agribisnis.</p>
                              <tr>
                              </div> 
                        </div>
            <?php }?>
</div>

    <!-- jQuery -->
    <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/grafik/jquery.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/grafik/highcharts.js'?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>

</body>
</html>


<script>
      $(document).ready(function(){
      // updating the view with notifications using ajax
      function load_unseen_notification(view = '')
      {
      $.ajax({
      url:"fetch.php",
      method:"POST",
      data:{view:view},
      dataType:"json",
      success:function(data)
      {
      $('.dropdown-menu').html(data.notification);
      if(data.unseen_notification > 0)
      {
      $('.count').html(data.unseen_notification);
      }
      }
      });
      }
      load_unseen_notification();
      // submit form and get new records
      $('#comment_form').on('submit', function(event){
      event.preventDefault();
      if($('#subject').val() != '' && $('#comment').val() != '')
      {
      var form_data = $(this).serialize();
      $.ajax({
      url:"insert.php",
      method:"POST",
      data:form_data,
      success:function(data)
      {
      $('#comment_form')[0].reset();
      load_unseen_notification();
      }
      });
      }
      else
      {
      alert("Both Fields are Required");
      }
      });
      // load new notifications
      $(document).on('click', '.dropdown-toggle', function(){
      $('.count').html('');
      load_unseen_notification('yes');
      });
      setInterval(function(){
      load_unseen_notification();;
      }, 5000);
      });
</script>
