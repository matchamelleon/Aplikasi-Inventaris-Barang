<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <!-- Favicon icon -->
    <!-- General CSS Files -->
    <link rel="stylesheet" href=./assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href=./assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href=./assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href=./assets/modules/weather-icon/css/weather-icons.min.css">
    <link rel="stylesheet" href=./assets/modules/weather-icon/css/weather-icons-wind.min.css">
    <link rel="stylesheet" href=./assets/modules/summernote/summernote-bs4.css">

    <!-- Template CSS -->
    <!-- <link rel="stylesheet" href=./assets/css/style.css">
    <link rel="stylesheet" href=./assets/css/components.css"> -->

    <link rel="stylesheet" href="./assets/DataTables/datatables.min.css">

    <!-- font awesom -->
    <link rel="stylesheet" href="./assets/fontawesome/css/fontawesome.min.css">

</head>


<style type="text/css">
    th {
        text-align: center;
        vertical-align: middle;
    }

    td {
        text-align: center;
        vertical-align: middle;
    }

    .header {
        display: flex;
    }

    .text-kop {
        text-align: center;
        color: black;
    }

    table {
        margin-top: 0px;
    }

    .bwh {
        text-align: right;
    }
</style>

<body>

    <div class="col-lg-12">
        <div class="header mb-n5">
            <div class="row">
                <div class="col-md-3 ml-n2">
                    <!-- <img src="" alt="logo-image" class="img-circle" width="150px"> -->
                </div>
                <div class="col-md-9 mt-5 text-dark">
                    <div class="text-kop">
                        <h1 style="margin-bottom: -4;"><b>Laporan Keluar Tahunan</b></h1>
                        <h2><b></b></h2>
                        <h5>Tahun <?= $tahun ?></h5>
                    </div>
                </div>
            </div>
        </div>
        <section>
            <div class="row">

                <table class="table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Jumlah Keluar</th>
                            <th>Tanggal Keluar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $n = 1;
                        foreach ($keluar as $laporan) { ?>
                            <tr>
                                <td><?= $n; ?></td>
                                <td><?= $laporan->kode_produk ?></td>
                                <td><?= $laporan->nama_produk ?></td>
                                <td>Rp. <?= number_format($laporan->harga), 0, ".", "." ?></td>
                                <td><?= $laporan->jumlah ?></td>
                                <td><?= $laporan->tanggal ?></td>
                            </tr>
                        <?php $n++;
                        } ?>
                    </tbody>
                </table>
            </div>
            <div class="bwh" style="margin-top: 5px;">
                <p><b>Jakarta, <?php $hariIni = new DateTime();
                                echo $hariIni->format('d F Y'); ?></b></p>
            </div>
    </div>

    </section>

    <!-- General JS Scripts -->
    <script src="./assets/modules/jquery.min.js"></script>
    <script src="./assets/modules/popper.js"></script>
    <script src="./assets/modules/tooltip.js"></script>
    <script src="./assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="./assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="./assets/modules/moment.min.js"></script>
    <script src="./assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="./assets/modules/simple-weather/jquery.simpleWeather.min.js"></script>
    <script src="./assets/modules/chart.min.js"></script>
    <script src="./assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="./assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="./assets/modules/summernote/summernote-bs4.js"></script>
    <script src="./assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="./assets/js/page/index-0.js"></script>

    <!-- Template JS File -->
    <script src="./assets/js/scripts.js"></script>
    <script src="./assets/js/custom.js"></script>

    <script src="./assets/DataTables/datatables.min.js"></script>

    <!-- fontawesome -->
    <script src="./assets/fontawesom/js/fontawesome.min.js"></script>

</body>

</html>