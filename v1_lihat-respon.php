<?php
include "config.php";
$id = isset($_GET['id_transaksi_tiket']) ? intval($_GET['id_transaksi_tiket']) :
    (isset($_GET['id']) ? intval($_GET['id']) : 0);

$stmt = $conn->prepare("
    SELECT transaksi_tiket.*, master_status_tiket.jenis_status_tiket 
    FROM transaksi_tiket 
    JOIN master_status_tiket ON master_status_tiket.id = transaksi_tiket.id_status_tiket 
    WHERE id_transaksi_tiket = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$respon = $stmt->get_result()->fetch_assoc();

$adminResponse = $respon['respon_admin'];
$statusTiket = $respon['jenis_status_tiket']; // Menyimpan status tiket
$stmt->close();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Detail Tiket</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body data-sidebar="dark">
    <div id="layout-wrapper">
    <?php include "header.php";?>
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-0">
                                <h4 class="font-size-18">Detail Respon</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-0">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">

                                    <!-- Menambahkan Status Tiket -->
                                    <h4 class="card-title mb-4">Status Tiket</h4>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" value="<?php echo htmlspecialchars($statusTiket); ?>" readonly />
                                    </div>

                                    <h4 class="card-title mb-4">Keluhan</h4>
                                    <form>
                                        <div class="mb-3">
                                            <textarea id="formmessage" class="form-control" rows="4" readonly><?php echo htmlspecialchars($adminResponse); ?></textarea>
                                        </div>
                                    </form>

                                    <h4 class="card-title mb-4">Respon Admin</h4>
                                    <form>
                                        <div class="mb-3">
                                            <textarea id="formmessage" class="form-control" rows="4" readonly><?php echo htmlspecialchars($adminResponse); ?></textarea>
                                        </div>
                                        <div class="mt-4 d-flex">
                                            <a href="lihat-tiket.php" class="btn btn-primary me-2">Kembali</a>
                                            <a href="tiket.php" class="btn btn-primary me-2">Ajukan lagi</a>
                                            <a href="tiket-selesai.php?id_transaksi_tiket=<?php echo $id; ?>" class="btn btn-primary">Selesai</a>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
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
            </div>
        </footer>
    </div>
    <div class="rightbar-overlay"></div>
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>
    <script src="assets/js/pages/dashboard.init.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>
