<!DOCTYPE html>
<html>
<head>
    <title>Grafik Stok Panen</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- load library jquery dan highcharts -->
    
    <!-- end load library -->
</head>
<body>

<?php
    /* Mengambil query report*/
    foreach($report as $result){
        $bulan[] = $result->kategori_nama; //ambil bulan
        $value[] = (float) $result->tot_stok; //ambil nilai
    }
    /* end mengambil query*/
     
?>
 
<!-- Load chart dengan menggunakan ID -->
<div id="report"></div>

<!-- END load chart -->
 

<script src="<?php echo base_url().'assets/js/grafik/jquery.js'?>"></script>
<script src="<?php echo base_url().'assets/js/grafik/highcharts.js'?>"></script>
<!-- Script untuk memanggil library Highcharts -->

<script type="text/javascript">
$(function () {
    $('#report').highcharts({
        chart: {
            type: 'column',
            margin: 100,
            options3d: {
                enabled: false,
                alpha: 10,
                beta: 25,
                depth: 70
            }
        },
        title: {
            text: 'Grafik Stok Panen Per- Kategori',
            style: {
                    fontSize: '25px',
                    fontFamily: 'Times New Roman'
            }
        },
        subtitle: {
           text: '',
           style: {
                    fontSize: '20px',
                    fontFamily: 'Times New Roman'
            }
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        credits: {
            enabled: false
        },
        xAxis: {
            categories:  <?php echo json_encode($bulan);?>
        },
        exporting: { 
            enabled: false 
        },
        yAxis: {
            title: {
                text: 'Total Stok Panen'
            },
        },
        tooltip: {
             formatter: function() {
                 return 'Total Stok <b>' + this.x + '</b> Adalah <b>' + Highcharts.numberFormat(this.y,0) + '</b> items ';
             }
          },
        series: [{
            name: 'Stok Panen Per Kategori',
            data: <?php echo json_encode($value);?>,
            shadow : true,
            color: '#FFD700	',
            dataLabels: {
                enabled: true,
                color: '#A52A2A',
                align: 'center',
                formatter: function() {
                     return Highcharts.numberFormat(this.y, 0);
                }, // one decimal
                y: 0, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Times New Roman'
                }
            }
        }]
    });
});
</script>
</body>
</html>

 
