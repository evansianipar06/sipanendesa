<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
</head>

  <style type="text/css">
      .bg {
           width: 100%;
           height: 100%;
           position: fixed;
           z-index: -1;
           float: left;
           left: 0;
           margin-top: -96px;
      }
      #mybutton {
            position: relative;
            z-index: 1;
            left: 92.5%;
            top: -25px;
            cursor: pointer;
         }
      .myinput {
            width: 100%;
            padding: 5px;
         }

      #loginLogo {
        margin-left: 24%;
      }
      </style>

<body class="login-page">
  <img src="<?php echo base_url().'assets/img/login_bg.jpg'?>" alt="gambar" class="bg" />
      <div class="login-box">
        <div class="login-logo">
          <a href="#" style="color: #FFF8DC;"><b>SMART</b>    VILLAGE</a>
        </div>

        <div class="login-box-body">
          <h3 align="center"><b>LOGIN</b></h3>
          <hr align="right"></hr>
          <form action="<?php echo base_url().'administrator/cekuser'?>" method="post">
            <p><?php echo $this->session->flashdata('msg');?></p>
            
            <h5><b>Email</b> </h5>
            <div class="form-group has-feedback">
              <input type="email" class="form-control" placeholder="Masukkan Email..." name="username" required />
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <h5><b>Password</b></h5>
            <div class="form-group has-feedback">
              <input type="password" class="form-control" placeholder="Masukkan Password..." id="pass" name="password" required />
              <span id="mybutton" onclick="change()"><i class="glyphicon glyphicon-eye-close"></i>
            </div>

            <div class="form-group has-feedback">
              <span><?php echo $captcha_image; ?></span>
              <a href="#" onclick="parent.window.location.reload(true)"> <img src="assets/images/refresh.png"></a></br>
              <h5><b>Captcha</b></h5>
              <input type="text" class="form-control" placeholder="Masukkan Captcha..." name="captcha" required>
            </div>
            
            <div class="row">
              <div class="col-xs-8"></div>
              <div class="col-xs-4">
                <input type="submit" class="btn btn-primary btn-block btn-flat" value="Login" />
              </div>
            </div>
        </form>
      </div>
    </div>

    <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript">
         function change()
         {
            var x = document.getElementById('pass').type;
 
            if (x == 'password')
            {
               document.getElementById('pass').type = 'text';
               document.getElementById('mybutton').innerHTML = '<i class="glyphicon glyphicon-eye-open"></i>';
            }
            else
            {
               document.getElementById('pass').type = 'password';
               document.getElementById('mybutton').innerHTML = '<i class="glyphicon glyphicon-eye-close"></i>';
            }
         }
    </script>
  </body>
</html>