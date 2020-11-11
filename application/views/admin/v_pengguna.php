<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Data Users</title>

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

    <!-- Page Content -->
    <div class="container" style="font-family:Times New Roman;">

        <div class="row">
            <div class="col-lg-12">
            <center><?php echo $this->session->flashdata('msg');?></center>
                <h1 class="page-header">Data Users
                    <div class="pull-right"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#largeModal"><span class="fa fa-plus"></span> Tambah Users</a></div>
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
            <table class="table table-bordered table-striped table-hover dt-responsive" id="mydata">
                <thead>
                   <tr>
                        <th style="text-align:center;width:40px;">No</th>
                        <th style="text-align:center;">Nama</th>
                        <th style="text-align:center;">Email</th>
                        <th style="text-align:center;">Password</th>
                        <th style="text-align:center;">Level</th>
                        <th style="text-align:center;">Status</th>
                        <th style="width:140px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    foreach ($data->result_array() as $a):
                        $no++;
                        $id=$a['user_id'];
                        $nm=$a['user_nama'];
                        $username=$a['user_username'];
                        $password=$a['user_password'];
                        $level=$a['user_level'];
                        $status=$a['user_status'];
                ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no;?></td>
                        <td><?php echo $nm;?></td>
                        <td><?php echo $username;?></td>
                        <td><?php echo $password;?></td>
                        <td style="text-align:center;"><?php echo $level;?></td>
                        <td style="text-align:center;"><?php echo $status;?></td>
                        <td style="text-align:center;">
                            <a class="btn btn-xs btn-warning" href="#modalEditPelanggan<?php echo $id?>" data-toggle="modal" title="Edit Akun"><span class="fa fa-edit"></span> Update</a>
                            <a class="btn btn-xs btn-danger" href="#modalHapusPelanggan<?php echo $id?>" data-toggle="modal" title="Nonaktifkan Akun"><span class="fa fa-close"></span>Off</a>
                            <a class="btn btn-xs btn-success" href="#modalHapusPelanggan1<?php echo $id?>" data-toggle="modal" title="Aktifkan Akun"><span class="fa fa-check"></span> On</a>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
            </div>
        </div>

        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Users</h3>
            </div>

            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/pengguna/tambah_pengguna'?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama</label>
                        <div class="col-xs-9">
                            <input name="nama" class="form-control" type="text" placeholder="Input Nama..." style="width:280px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Email</label>
                        <div class="col-xs-9">
                            <input name="username" class="form-control" type="email" placeholder="Input Username..." style="width:280px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Password</label>
                        <div class="col-xs-9">
                            <input name="password" class="form-control" type="password" placeholder="Input Password..." style="width:280px;" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Ulangi Password</label>
                        <div class="col-xs-9">
                            <input name="password2" class="form-control" type="password" placeholder="Ulangi Password..." style="width:280px;" required>
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Level</label>
                        <div class="col-xs-9">
                            <select name="level" class="form-control" style="width:280px;" required>
                                <option value="1">Admin</option>
                                <option value="2">Kepala Desa</option>
                                <option value="3">Masyarakat</option>
                            </select>
                        </div>
                    </div>   

                </div>

                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Batal</button>
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>

        <!-- Update -->
        <?php
            foreach ($data->result_array() as $a) {
                $id=$a['user_id'];
                $nm=$a['user_nama'];
                $username=$a['user_username'];
                $password=$a['user_password'];
                $level=$a['user_level'];
                $status=$a['user_status'];
        ?>

        <div id="modalEditPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update User</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/pengguna/edit_pengguna'?>">
                        <div class="modal-body">
                            <input name="kode" type="hidden" value="<?php echo $id;?>">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama</label>
                        <div class="col-xs-9">
                            <input name="nama" class="form-control" type="text" value="<?php echo $nm;?>" placeholder="Input Nama..." style="width:280px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Email</label>
                        <div class="col-xs-9">
                            <input name="username" class="form-control" type="email" value="<?php echo $username;?>" placeholder="Input Username..." style="width:280px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Password</label>
                        <div class="col-xs-9">
                            <input name="password" class="form-control" type="password" placeholder="Input Password..." style="width:280px;">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Ulangi Password</label>
                        <div class="col-xs-9">
                            <input name="password2" class="form-control" type="password" placeholder="Ulangi Password..." style="width:280px;">
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Level</label>
                        <div class="col-xs-9">
                            <select name="level" class="form-control" style="width:280px;" required>
                            <?php if ($level=='1'):?>
                                <option value="1">Admin</option>
                                <option value="2">Kepala Desa</option>
                                <option value="3">Masyarakat</option>
                            <?php else:?>
                                <option value="1">Admin</option>
                                <option value="2">Kepala Desa</option>
                                <option value="3">Masyarakat</option>
                            <?php endif;?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div><?php } ?>

    <!-- Hapus -->
    <?php
        foreach ($data->result_array() as $a) {
            $id=$a['user_id'];
            $nm=$a['user_nama'];
            $username=$a['user_username'];
            $password=$a['user_password'];
            $level=$a['user_level'];
            $status=$a['user_status'];
    ?>

    <div id="modalHapusPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title" id="myModalLabel">NonAktifkan Pengguna</h3>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/pengguna/nonaktifkan'?>">
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menon-aktifkan pengguna..??<b><?php echo $nm;?></b>..?</p>
                                <input name="kode" type="hidden" value="<?php echo $id; ?>">
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
                        <button type="submit" class="btn btn-primary">Nonaktifkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

    <!-- Hapus -->
    <?php
        foreach ($data->result_array() as $a) {
            $id=$a['user_id'];
            $nm=$a['user_nama'];
            $username=$a['user_username'];
            $password=$a['user_password'];
            $level=$a['user_level'];
            $status=$a['user_status'];
    ?>

    <div id="modalHapusPelanggan1<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title" id="myModalLabel">Aktifkan Pengguna</h3>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/pengguna/aktifkan'?>">
                    <div class="modal-body">
                        <p>Apakah Anda yakin mau mengaktifkan pengguna..??? <b><?php echo $nm;?></b>..?</p>
                                <input name="kode" type="hidden" value="<?php echo $id; ?>">
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
                        <button type="submit" class="btn btn-success">Aktifkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p style="text-align:center;">Copyright &copy; <?php echo '2020';?> by Kelompok 08</p>
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
