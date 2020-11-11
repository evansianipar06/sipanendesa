<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>Laporan data panen</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css')?>"/>
</head>

<body onload="window.print()">
    <div id="laporan">
    <table border="0" align="center" style="width:800px; border:none;margin-top:20px;margin-bottom:0px;">
        <tr>
            <td colspan="2" style="width:800px;paddin-left:20px;"><center><h1>LAPORAN DATA PANEN</h4></center><br/></td>
        </tr>                       
    </table>
 
    <table border="0" align="center" style="width:900px;border:none;">
            <tr>
                <th style="text-align:left"></th>
            </tr>
    </table>

    <table border="3" align="center" style="margin-bottom:20px;">
    <?php 
        $urut=0;
        $nomor=0;
        $group='-';
        foreach($data->result_array()as $d){
            $nomor++;
            $urut++;
            if($group=='-' || $group!=$d['kategori_nama']){
                $kat=$d['kategori_nama'];
                if($group!='-')
                echo "</table><br>";
                echo "<table align='center' width='900px;' border='3'>";
                echo "<tr><td colspan='6'><b>Kategori: $kat</b></td> </tr>";
                echo "<tr style='background-color:#ccc;'>
                            <td width='4%' align='center'>No</td>
                            <td width='10%' align='center'>Kode panen</td>
                            <td width='40%' align='center'>Nama panen</td>
                            <td width='10%' align='center'>Satuan</td>
                            <td width='20%' align='center'>Harga Jual</td>
                            <td width='30%' align='center'>Stok</td> 
                       </tr>";
                $nomor=1;
            }

            $group=$d['kategori_nama'];
                if($urut==500){
                    $nomor=0;
                        echo "<div class='pagebreak'> </div>";
            }
    ?>
    <tr>
            <td style="text-align:center;vertical-align:center;text-align:center;"><?php echo $nomor; ?></td>
            <td style="vertical-align:center;padding-left:5px;text-align:center;"><?php echo $d['panen_id']; ?></td>
            <td style="vertical-align:center;padding-left:5px;"><?php echo $d['panen_nama']; ?></td>
            <td style="vertical-align:center;text-align:center;"><?php echo $d['panen_satuan']; ?></td>
            <td style="vertical-align:center;padding-right:5px;text-align:right;"><?php echo 'Rp '.number_format($d['panen_harjul']); ?></td>
            <td style="vertical-align:center;text-align:center;text-align:center;"><?php echo $d['panen_stok']; ?></td>  
    </tr>
                    

    <?php
    }
    ?>
    </table>
</table>

<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td></td>
</table>

<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td align="right">Balige, <?php echo date('d-M-Y')?></td>
    </tr>
    <tr>
        <td align="right"></td>
    </tr>
   
    <tr>
    <td><br/><br/><br/><br/></td>
    </tr>    
    <tr>
        <td align="right">( <?php echo $this->session->userdata('nama');?> )</td>
    </tr>
    <tr>
        <td align="center"></td>
    </tr>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <th><br/><br/></th>
    </tr>
    <tr>
        <th align="left"></th>
    </tr>
</table>
</div>
</body>
</html>