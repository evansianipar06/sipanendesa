<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kategori</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/font-awesome.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/style.css'?>" rel="stylesheet">

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
                <h1 class="page-header">Kategori Panen
                    <div class="pull-right"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#largeModal">
                        <span class="fa fa-plus"></span> Tambah Kategori Panen</a>
                    </div>
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered table-striped table-hover dt-responsive" id="mydata">
                    <thead>
                        <tr>
                            <th style="text-align:center;width:20px;">No</th>
                            <th style="text-align:center;">Kategori Panen</th>
                            <th style="width:140px;text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no=0;
                            foreach ($data->result_array() as $a):
                                $no++;
                                $id=$a['kategori_id'];
                                $nm=$a['kategori_nama'];
                        ?>
                        <tr>
                            <td style="text-align:center;"><?php echo $no;?></td>
                            <td><?php echo $nm;?></td>
                            <td style="text-align:center;">
                                <a class="btn btn-xs btn-success" href="#modalEditPelanggan<?php echo $id?>" data-toggle="modal" title="Update"><span class="fa fa-edit"></span> Update</a>
                                <a class="btn btn-xs btn-danger" href="#modalHapusPelanggan<?php echo $id?>" data-toggle="modal" title="Delete"><span class="fa fa-trash-o"></span> Delete</a>
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
                        <h3 class="modal-title" id="myModalLabel">Tambah Kategori Panen</h3>
                    </div>

                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/kategori/tambah_kategori'?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label col-xs-3" >Nama Kategori </label>
                                <div class="col-xs-9">
                                    <input name="kategori" class="form-control" type="text" placeholder="Input Nama Kategori..." style="width:280px;" required>
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

        <!-- Edit -->
        <?php
            foreach ($data->result_array() as $a) {
                $id=$a['kategori_id'];
                $nm=$a['kategori_nama'];
        ?>
            <div id="modalEditPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="modal-title" id="myModalLabel">Update Kategori</h3>
                        </div>

                        <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/kategori/edit_kategori'?>">
                            <div class="modal-body">
                                <input name="kode" type="hidden" value="<?php echo $id;?>">
                                <div class="form-group">
                                    <label class="control-label col-xs-3" >Kategori Panen</label>
                                    <div class="col-xs-9">
                                        <input name="kategori" class="form-control" type="text" value="<?php echo $nm;?>" style="width:280px;" required>
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
            </div>
        <?php } ?>

        <!-- Hapus -->
        <?php
            foreach ($data->result_array() as $a) {
                $id=$a['kategori_id'];
                $nm=$a['kategori_nama'];
        ?>
            <div id="modalHapusPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="modal-title" id="myModalLabel">Hapus Kategori</h3>
                        </div>
                        <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/kategori/hapus_kategori'?>">
                            <div class="modal-body">
                                <p>Apakah anda yakin ingin menghapus ?</p>
                                        <input name="kode" type="hidden" value="<?php echo $id; ?>">
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Batal</button>
                                <button type="submit" class="btn btn-primary">Hapus</button>
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
