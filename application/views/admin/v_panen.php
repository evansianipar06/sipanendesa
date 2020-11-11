<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Panen</title>

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
                <h1 class="page-header">Data Panen
                    <div class="pull-right"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#largeModal">
                    <span class="fa fa-plus"></span> Tambah Panen</a></div>
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="pull-left"><a href="<?php echo base_url("admin/panen/Data_Penjualan_Hasil_Panen"); ?>" class="btn btn-warning btn-sm">
                    <span class="fa fa-file-excel-o"></span><b> Export to Excel</b></a> 
                    <a href="<?php echo base_url("admin/panen/Data_Penjualan_Hasil_Panen2"); ?>" class="btn btn-primary btn-sm">
                    <span class="fa fa-file-pdf-o"></span><b> Export to PDF</b></a>
                </div></br></br></br>
                <table class="table table-bordered table-striped table-hover dt-responsive " style="font-size: 12px;" id="mydata">
                    <thead>
                        <tr>
                            <th style="text-align:center;width:40px;">No</th>
                            <th style="text-align:center;">Kode Panen</th>
                            <th style="text-align:center;">Nama Panen</th>
                            <th style="text-align:center;">Satuan</th>
                            <th style="text-align:center;">Harga Pokok</th>
                            <th style="text-align:center;">Harga Jual (Eceran)</th>
                            <th style="text-align:center;">Harga Jual (Grosir)</th>
                            <th style="text-align:center;">Stok</th>
                            <th style="text-align:center;">Stok Minimal</th>
                            <th style="text-align:center;">Kategori</th>
                            <th style="width:130px;text-align:center;">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            $no=0;
                            foreach ($data->result_array() as $a):
                                $no++;
                                $id=$a['panen_id'];
                                $nm=$a['panen_nama'];
                                $satuan=$a['panen_satuan'];
                                $harpok=$a['panen_harpok'];
                                $harjul=$a['panen_harjul'];
                                $harjul_grosir=$a['panen_harjul_grosir'];
                                $stok=$a['panen_stok'];
                                $min_stok=$a['panen_min_stok'];
                                $kat_id=$a['panen_kategori_id'];
                                $kat_nama=$a['kategori_nama'];
                        ?>
                            <tr>
                                <td style="text-align:center;"><?php echo $no;?></td>
                                <td><?php echo $id;?></td>
                                <td><?php echo $nm;?></td>
                                <td style="text-align:center;"><?php echo $satuan;?></td>
                                <td style="text-align:right;"><?php echo 'Rp '.number_format($harpok);?></td>
                                <td style="text-align:right;"><?php echo 'Rp '.number_format($harjul);?></td>
                                <td style="text-align:right;"><?php echo 'Rp '.number_format($harjul_grosir);?></td>
                                <td style="text-align:center;"><?php echo $stok;?></td>
                                <td style="text-align:center;"><?php echo $min_stok;?></td>
                                <td><?php echo $kat_nama;?></td>
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
                        <h3 class="modal-title" id="myModalLabel">Tambah Panen</h3>
                    </div>
                    
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/panen/tambah_panen'?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Nama Panen</label>
                            <div class="col-xs-9">
                                <input name="nabar" class="form-control" type="text" placeholder="Nama Panen..." style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Kategori</label>
                            <div class="col-xs-9">
                                <select name="kategori" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Kategori" data-width="80%" placeholder="Pilih Kategori" required>
                                    <?php foreach ($kat2->result_array() as $k2) {
                                        $id_kat=$k2['kategori_id'];
                                        $nm_kat=$k2['kategori_nama'];
                                        ?>
                                            <option value="<?php echo $id_kat;?>"><?php echo $nm_kat;?></option>
                                    <?php }?>     
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Satuan</label>
                            <div class="col-xs-9">
                                <select name="satuan" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Satuan" data-width="80%" placeholder="Pilih Satuan" required>
                                    <option>Kilogram</option>
                                    <option>Buah</option>
                                    <option>Gram</option>
                                    <option>Biji</option>
                                    <option>Bungkus</option>
                                    <option>Rim</option>
                                    <option>Lusin</option>
                                    <option>Liter</option>
                                    <option>Kodi</option>
                                    <option>Gross</option>
                                    <option>Ton</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Harga Pokok</label>
                            <div class="col-xs-9">
                                <input name="harpok" class="harpok form-control" type="text" placeholder="Harga Pokok..." style="width:335px;">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Harga (Eceran)</label>
                            <div class="col-xs-9">
                                <input name="harjul" class="harjul form-control" type="text" placeholder="Harga Jual Eceran..." style="width:335px;">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Harga (Grosir)</label>
                            <div class="col-xs-9">
                                <input name="harjul_grosir" class="harjul form-control" type="text" placeholder="Harga Jual Grosir..." style="width:335px;">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Stok</label>
                            <div class="col-xs-9">
                                <input name="stok" class="form-control" type="number" placeholder="Stok..." style="width:335px;">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Minimal Stok</label>
                            <div class="col-xs-9">
                                <input name="min_stok" class="form-control" type="number" placeholder="Minimal Stok..." style="width:335px;">
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
                $id=$a['panen_id'];
                $nm=$a['panen_nama'];
                $satuan=$a['panen_satuan'];
                $harpok=$a['panen_harpok'];
                $harjul=$a['panen_harjul'];
                $harjul_grosir=$a['panen_harjul_grosir'];
                $stok=$a['panen_stok'];
                $min_stok=$a['panen_min_stok'];
                $kat_id=$a['panen_kategori_id'];
                $kat_nama=$a['kategori_nama'];
        ?>

        <div id="modalEditPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Panen</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/panen/edit_panen'?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label col-xs-3" >Kode Panen</label>
                                <div class="col-xs-9">
                                    <input name="kobar" class="form-control" type="text" value="<?php echo $id;?>" placeholder="Kode panen..." style="width:335px;" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" >Nama Panen</label>
                                <div class="col-xs-9">
                                    <input name="nabar" class="form-control" type="text" value="<?php echo $nm;?>" placeholder="Nama panen..." style="width:335px;" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" >Kategori</label>
                                <div class="col-xs-9">
                                    <select name="kategori" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Kategori" data-width="80%" placeholder="Pilih Kategori" required>
                                        <?php foreach ($kat2->result_array() as $k2) {
                                            $id_kat=$k2['kategori_id'];
                                            $nm_kat=$k2['kategori_nama'];
                                            if($id_kat==$kat_id)
                                                echo "<option value='$id_kat' selected>$nm_kat</option>";
                                            else
                                                echo "<option value='$id_kat'>$nm_kat</option>";
                                        }
                                        ?>   
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" >Satuan</label>
                                <div class="col-xs-9">
                                    <select name="satuan" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Satuan" data-width="80%" placeholder="Pilih Satuan" required>
                                        <?php if($satuan=='Kilogram'):?>
                                            <option selected>Kilogram</option>
                                            <option>Buah</option>
                                            <option>Gram</option>
                                            <option>Biji</option>
                                            <option>Ons</option>
                                            <option>Bungkus</option>
                                            <option>Rim</option>
                                            <option>Lusin</option>
                                            <option>Liter</option>
                                            <option>Kodi</option>
                                            <option>Gross</option>
                                            <option>Ton</option>
                                        <?php elseif($satuan=='Buah'):?>
                                            <option>Kilogram</option>
                                            <option selected>Buah</option>
                                            <option>Gram</option>
                                            <option>Biji</option>
                                            <option>Ons</option>
                                            <option>Bungkus</option>
                                            <option>Rim</option>
                                            <option>Lusin</option>
                                            <option>Liter</option>
                                            <option>Kodi</option>
                                            <option>Gross</option>
                                            <option>Ton</option>                                  
                                        <?php elseif($satuan=='Gram'):?>
                                            <option>Kilogram</>
                                            <option>Buah</option>
                                            <option selected>Gram</option>
                                            <option>Biji</option>
                                            <option>Ons</option>
                                            <option>Bungkus</option>
                                            <option>Rim</option>
                                            <option>Lusin</option>
                                            <option>Liter</option>
                                            <option>Kodi</option>
                                            <option>Gross</option>
                                            <option>Ton</option>    
                                        <?php elseif($satuan=='Biji'):?>
                                            <option>Kilogram</option>
                                            <option>Buah</option>
                                            <option>Gram</option>
                                            <option selected>Biji</option>
                                            <option>Ons</option>
                                            <option>Bungkus</option>
                                            <option>Rim</option>
                                            <option>Lusin</option>
                                            <option>Liter</option>
                                            <option>Kodi</option>
                                            <option>Gross</option>
                                            <option>Ton</option>
                                        <?php elseif($satuan=='Ons'):?>
                                            <option>Kilogram</option>
                                            <option>Buah</option>
                                            <option>Gram</option>
                                            <option>Biji</option>
                                            <option selected>Ons</option>
                                            <option>Bungkus</option>
                                            <option>Rim</option>
                                            <option>Lusin</option>
                                            <option>Liter</option>
                                            <option>Kodi</option>
                                            <option>Gross</option>
                                            <option>Ton</option>
                                        <?php elseif($satuan=='Bungkus'):?>
                                            <option>Kilogram</option>
                                            <option>Buah</option>
                                            <option>Gram</option>
                                            <option>Biji</option>
                                            <option>Ons</option>
                                            <option selected>Bungkus</option>
                                            <option>Rim</option>
                                            <option>Lusin</option>
                                            <option>Liter</option>
                                            <option>Kodi</option>
                                            <option>Gross</option>
                                            <option>Ton</option>
                                        <?php elseif($satuan=='Rim'):?>
                                            <option>Kilogram</option>
                                            <option>Buah</option>
                                            <option>Gram</option>
                                            <option>Biji</option>
                                            <option>Ons</option>
                                            <option>Bungkus</option>
                                            <option selected>Rim</option>
                                            <option>Lusin</option>
                                            <option>Liter</option>
                                            <option>Kodi</option>
                                            <option>Gross</option>
                                            <option>Ton</option>
                                        <?php elseif($satuan=='Lusin'):?>
                                            <option>Kilogram</option>
                                            <option>Buah</option>
                                            <option>Gram</option>
                                            <option>Biji</option>
                                            <option>Ons</option>
                                            <option>Bungkus</option>
                                            <option>Rim</option>
                                            <option selected>Lusin</option>
                                            <option>Liter</option>
                                            <option>Kodi</option>
                                            <option>Gross</option>
                                            <option>Ton</option>
                                        <?php elseif($satuan=='Liter'):?>
                                            <option>Kilogram</option>
                                            <option>Buah</option>
                                            <option>Gram</option>
                                            <option>Biji</option>
                                            <option>Ons</option>
                                            <option>Bungkus</option>
                                            <option>Rim</option>
                                            <option>Lusin</option>
                                            <option selected>Liter</option>
                                            <option>Kodi</option>
                                            <option>Gross</option>
                                            <option>Ton</option>
                                        <?php elseif($satuan=='Kodi'):?>
                                            <option>Kilogram</option>
                                            <option>Buah</option>
                                            <option>Gram</option>
                                            <option>Biji</option>
                                            <option>Ons</option>
                                            <option>Bungkus</option>
                                            <option>Rim</option>
                                            <option>Lusin</option>
                                            <option>Liter</option>
                                            <option selected>Kodi</option>
                                            <option>Gross</option>
                                            <option>Ton</option>
                                        <?php elseif($satuan=='Gross'):?>
                                            <option>Kilogram</option>
                                            <option>Buah</option>
                                            <option>Gram</option>
                                            <option>Biji</option>
                                            <option>Ons</option>
                                            <option>Bungkus</option>
                                            <option>Rim</option>
                                            <option>Lusin</option>
                                            <option>Liter</option>
                                            <option>Kodi</option>
                                            <option selected>Gross</option>
                                            <option>Ton</option>
                                        <?php elseif($satuan=='Ton'):?>
                                            <option>Kilogram</option>
                                            <option>Buah</option>
                                            <option>Gram</option>
                                            <option>Biji</option>
                                            <option>Ons</option>
                                            <option>Bungkus</option>
                                            <option>Rim</option>
                                            <option>Lusin</option>
                                            <option selected>Liter</option>
                                            <option>Kodi</option>
                                            <option>Gross</option>
                                            <option selected>Ton</option>
                                        <?php endif;?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" >Harga Pokok</label>
                                <div class="col-xs-9">
                                    <input name="harpok" class="harpok form-control" type="text" value="<?php echo $harpok;?>" placeholder="Harga Pokok..." style="width:335px;" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" >Harga Jual (Eceran)</label>
                                <div class="col-xs-9">
                                    <input name="harjul" class="harjul form-control" type="text" value="<?php echo $harjul;?>" placeholder="Harga Jual..." style="width:335px;" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" >Harga Jual (Grosir)</label>
                                <div class="col-xs-9">
                                    <input name="harjul_grosir" class="harjul form-control" type="text" value="<?php echo $harjul_grosir;?>" placeholder="Harga Jual Grosir..." style="width:335px;" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" >Stok</label>
                                <div class="col-xs-9">
                                    <input name="stok" class="form-control" type="number" value="<?php echo $stok;?>" placeholder="Stok..." style="width:335px;" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" >Minimal Stok</label>
                                <div class="col-xs-9">
                                    <input name="min_stok" class="form-control" type="number" value="<?php echo $min_stok;?>" placeholder="Minimal Stok..." style="width:335px;" required>
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
            $id=$a['panen_id'];
            $nm=$a['panen_nama'];
            $harpok=$a['panen_harpok'];
            $harjul=$a['panen_harjul'];
            $stok=$a['panen_stok'];
            $min_stok=$a['panen_min_stok'];
            $kat_id=$a['panen_kategori_id'];
            $kat_nama=$a['kategori_nama'];
    ?>

    <div id="modalHapusPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title" id="myModalLabel">Hapus Panen</h3>
                </div>

                <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/panen/hapus_panen'?>">
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus..?</p>
                                <input name="kode" type="hidden" value="<?php echo $id; ?>">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Batal</button>
                        <button type="submit" class="btn btn-primary">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <?php } ?>

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
    <script src="<?php echo base_url().'assets/dist/js/bootstrap-select.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/dataTables.bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.price_format.min.js'?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#mydata').DataTable();
        } );
    </script>
    <script type="text/javascript">
        $(function(){
            $('.harpok').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('.harjul').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
        });
    </script>
    
</body>
</html>
