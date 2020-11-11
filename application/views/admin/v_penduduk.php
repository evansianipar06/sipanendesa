<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 

    <title>Data Penduduk</title>

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

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
            <center><?php echo $this->session->flashdata('msg');?></center>
                <h1 class="page-header">Data Penduduk
                    <div class="pull-right"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#largeModal">
                    <span class="fa fa-plus"></span> Tambah Penduduk</a></div>
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="pull-left"><a href="<?php echo base_url("admin/penduduk/Data_Penduduk"); ?>" class="btn btn-warning btn-sm">
                    <span class="fa fa-file-excel-o"></span><b> Export to Excel</b></a> 
                    <a href="<?php echo base_url("admin/penduduk/Data_Penduduk2"); ?>" class="btn btn-primary btn-sm">
                        <span class="fa fa-file-pdf-o"></span><b> Export to PDF</b>
                    </a>
                </div></br></br></br>
                <table class="table table-bordered table-striped table-hover dt-responsive" id="mydata">
                    <thead>
                        <tr>
                            <th style="text-align:center;width:40px;">No</th>
                            <th style="text-align:center;">NIK</th>
                            <th style="width:120px;text-align:center;">Nama Penduduk</th>
                            <th style="width:120px;text-align:center;">Jenis Kelamin</th>
                            <th style="width:100px;text-align:center;">Tanggal Lahir</th>
                            <th style="text-align:center;">Golongan Darah</th>
                            <th style="width:120px;text-align:center;">Alamat</th>
                            <th style="text-align:center;">No Telp/HP</th>
                            <th style="width:140px;text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $no=0;
                        foreach ($data->result_array() as $a):
                            $no++;
                            $id=$a['penduduk_id'];
                            $nik=$a['penduduk_nik'];
                            $nm=$a['penduduk_nama'];
                            $jenis_kelamin=$a['jenis_kelamin'];
                            $tgl_lahir=$a['penduduk_tgl_lahir'];
                            $golda=$a['penduduk_golda'];
                            $alamat=$a['penduduk_alamat'];
                            $notelp=$a['penduduk_notelp'];
                    ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no;?></td>
                        <td><?php echo $nik;?></td>
                        <td><?php echo $nm;?></td>
                        <td style="text-align:center;"><?php echo $jenis_kelamin;?></td>
                        <td><?php echo $tgl_lahir;?></td>
                        <td style="text-align:center;"><?php echo $golda;?></td>
                        <td><?php echo $alamat;?></td>
                        <td><?php echo $notelp;?></td>
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
                        <h3 class="modal-title" id="myModalLabel">Tambah Penduduk</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/penduduk/tambah_penduduk'?>">
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="control-label col-xs-3" >NIK Penduduk</label>
                                <div class="col-xs-9">
                                    <input name="nik" class="form-control" type="text" placeholder="NIK Penduduk..." style="width:280px;" required>
                                </div>
                            </div>
                    
                            <div class="form-group">
                                <label class="control-label col-xs-3" >Nama Penduduk</label>
                                <div class="col-xs-9">
                                    <input name="nama" class="form-control" type="text" placeholder="Nama Penduduk..." style="width:280px;" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" >Jenis Kelamin</label>
                                <div class="col-xs-9">
                                    <select name="jenis_kelamin" class="form-control" style="width:280px;" required>
                                        <option selected>- Pilih - </option>
                                        <option>Laki-laki</option>
                                        <option>Perempuan</option>
                                    </select>
                                </div>
                            </div>   

                            <div class="form-group">
                                <label class="control-label col-xs-3" >Tanggal Lahir Penduduk</label>
                                <div class="col-xs-9">
                                    <div class='input-group date' id='datepicker3' style="width:280px;">
                                        <input type='text' name="tgl_lahir" class="form-control" value="" placeholder="Tanggal lahir..." />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" >Golda Penduduk</label>
                                <div class="col-xs-9">
                                    <input name="golda" class="form-control" type="text" placeholder="Golongan Darah Penduduk..." style="width:280px;" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" >Alamat</label>
                                <div class="col-xs-9">
                                    <input name="alamat" class="form-control" type="text" placeholder="Alamat..." style="width:280px;" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" >No Telp/ HP</label>
                                <div class="col-xs-9">
                                    <input name="notelp" class="form-control" type="text" placeholder="No Telp/HP..." style="width:280px;" required>
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
            $id=$a['penduduk_id'];
            $nik=$a['penduduk_nik'];
            $nm=$a['penduduk_nama'];
            $tgl_lahir=$a['penduduk_tgl_lahir'];
            $golda=$a['penduduk_golda'];
            $alamat=$a['penduduk_alamat'];
            $notelp=$a['penduduk_notelp'];
    ?>

    <div id="modalEditPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Update Penduduk</h3>
            </div>

            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/penduduk/edit_penduduk'?>">
                <div class="modal-body">
                    <input name="kode" type="hidden" value="<?php echo $id;?>">
                    <div class="form-group">
                        <label class="control-label col-xs-3" >NIK Penduduk</label>
                        <div class="col-xs-9">
                            <input name="nik" class="form-control" type="text" placeholder="NIK Penduduk..." style="width:280px;" value="<?php echo $nik ?>" required>
                        </div>
                    </div>
        
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Penduduk</label>
                        <div class="col-xs-9">
                            <input name="nama" class="form-control" type="text" placeholder="Nama Penduduk..." style="width:280px;" value="<?php echo $nm ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jenis Kelamin</label>
                        <div class="col-xs-9">
                            <select name="jenis_kelamin" class="form-control" style="width:280px;" required>
                                <option selected>- Pilih - </option>
                                <option>Laki-laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Tanggal Lahir Penduduk</label>
                        <div class="col-xs-9">
                            <div class='input-group date' id='datepicker2' style="width:280px;">
                                <input type='text'name="tgl_lahir" class="form-control" placeholder="Tanggal lahir..." value="<?php echo $tgl_lahir ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Golda Penduduk</label>
                        <div class="col-xs-9">
                            <input name="golda" class="form-control" type="text" placeholder="Golongan Darah Penduduk..." style="width:280px;" value="<?php echo $golda ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Alamat</label>
                        <div class="col-xs-9">
                            <input name="alamat" class="form-control" type="text" placeholder="Alamat..." style="width:280px;" value="<?php echo $alamat ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >No Telp/ HP</label>
                        <div class="col-xs-9">
                            <input name="notelp" class="form-control" type="text" placeholder="No Telp/HP..." style="width:280px;" value="<?php echo $notelp ?>" required>
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
        $id=$a['penduduk_id'];
        $nik=$a['penduduk_nik'];
        $nm=$a['penduduk_nama'];
        $tgl_lahir=$a['penduduk_tgl_lahir'];
        $golda=$a['penduduk_golda'];
        $alamat=$a['penduduk_alamat'];
        $notelp=$a['penduduk_notelp'];
?>
    <div id="modalHapusPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title" id="myModalLabel">Hapus Penduduk</h3>
                </div>
        <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/penduduk/hapus_penduduk'?>">
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
</div><?php } ?>

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
    <script src="<?php echo base_url().'assets/js/bootstrap-datetimepicker.min.js'?>"></script>
    
    <script type="text/javascript">
            $(function () {
                $('#datetimepicker').datetimepicker({
                    format: 'DD MMMM YYYY HH:mm',
                });
                
                $('#datepicker').datetimepicker({
                    format: 'DD-MMMM-YYYY',
                });
                $('#datepicker2').datetimepicker({
                    format: 'DD-MMMM-YYYY',
                });
                $('#datepicker3').datetimepicker({
                    format: 'DD-MMMM-YYYY',
                });

                $('#timepicker').datetimepicker({
                    format: 'HH:mm'
                });
            });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#mydata').DataTable();
        } );
    </script>
    
</body>
</html>
