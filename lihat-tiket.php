<?php
include "config.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Beranda Helpdesk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body data-sidebar="dark">

    <div id="layout-wrapper">
        <?php include "header.php"; ?>
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Respon Tiket</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap table-check">
                            <thead class="table-light">
                                <tr>
                                    <th class="align-middle">No tiket</th>
                                    <th class="align-middle">Nama</th>
                                    <th class="align-middle">Kodefikasi</th>
                                    <th class="align-middle">Sub Kodefikasi</th>
                                    <th class="align-middle">Detail Sub Kodefikasi</th>
                                    <th class="align-middle">Status</th>
                                    <th class="align-middle">Lihat Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Query yang diperbaiki
                                $qry_tiket = mysqli_query(
                                    $conn,
                                    "SELECT transaksi_tiket.*, master_user.username AS nama_user, 
                                    master_kodefikasi_tiket.name_kodefikasi_tiket, 
                                    master_sub_kodefikasi_tiket.nama_sub_kodefikasi_tiket, 
                                    master_sub_sub_kodefikasi_tiket.nama_sub_sub_kodefikasi_tiket, 
                                    master_status_tiket.jenis_status_tiket 
                                    FROM transaksi_tiket 
                                    JOIN master_user ON master_user.id_user = transaksi_tiket.id_user
                                    JOIN master_kodefikasi_tiket ON master_kodefikasi_tiket.id_kodefikasi_tiket = transaksi_tiket.id_kodefikasi_tiket
                                    JOIN master_sub_kodefikasi_tiket ON master_sub_kodefikasi_tiket.id_sub_kodefikasi_tiket = transaksi_tiket.id_sub_kodefikasi_tiket
                                    JOIN master_sub_sub_kodefikasi_tiket ON master_sub_sub_kodefikasi_tiket.id_sub_sub_kodefikasi_tiket = transaksi_tiket.id_sub_sub_kodefikasi
                                    JOIN master_status_tiket ON master_status_tiket.id = transaksi_tiket.id_status_tiket 
                                    ORDER BY transaksi_tiket.id_transaksi_tiket ASC"
                                );


                                $no = 0;
                                while ($data_tiket = mysqli_fetch_array($qry_tiket)) {
                                    $no++;
                                    ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $data_tiket['nama_user'] ?></td>
                                        <td><?= $data_tiket['name_kodefikasi_tiket'] ?></td>
                                        <td><?= $data_tiket['nama_sub_kodefikasi_tiket'] ?></td>
                                        <td><?= $data_tiket['nama_sub_sub_kodefikasi_tiket'] ?></td>

                                        <?php
                                        if ($data_tiket['id_status_tiket'] == 1) {
                                            echo "<td style='background-color:rgba(220, 53, 69, 0.3);'>{$data_tiket['jenis_status_tiket']}</td>";
                                        } elseif ($data_tiket['id_status_tiket'] == 2) {
                                            echo "<td style='background-color:rgba(255, 193, 7, 0.3)'>{$data_tiket['jenis_status_tiket']}</td>";
                                        } else {
                                            echo "<td style='background-color:rgba(25, 135, 84, 0.3)'>{$data_tiket['jenis_status_tiket']}</td>";
                                        }
                                        ?>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <a href="lihat-respon.php?id_transaksi_tiket=<?= $data_tiket['id_transaksi_tiket'] ?>"><button
                                                    class="btn btn-primary btn-sm btn-rounded">Lihat Respon</button>
                                            </a>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © Helpdesk.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Ma Chung
                            </div>
                        </div>
                    </div>
            </footer>
        </div>
    </div>
    </div>

    <div class="rightbar-overlay"></div>

    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>
</body>

</html>