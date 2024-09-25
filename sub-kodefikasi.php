<?php
include "config.php";

$id_sub_kodefikasi_tiket = isset($_GET['id_kodefikasi_tiket']) ? intval($_GET['id_kodefikasi_tiket']) : 0;

if ($id_sub_kodefikasi_tiket) {
    $stmt = $conn->prepare("SELECT * FROM master_kodefikasi_tiket WHERE id_kodefikasi_tiket = ?");
    $stmt->bind_param("i", $id_sub_kodefikasi_tiket);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        echo "<p>No data found for the given ID.</p>";
        exit;
    }
}

$qry_sub_kategori = mysqli_query($conn, "
    SELECT 
        master_sub_kodefikasi_tiket.*, 
        master_kodefikasi_tiket.name_kodefikasi_tiket 
    FROM master_sub_kodefikasi_tiket
    JOIN master_kodefikasi_tiket 
        ON master_kodefikasi_tiket.id_kodefikasi_tiket = master_sub_kodefikasi_tiket.id_kodefikasi_tiket
    WHERE master_sub_kodefikasi_tiket.id_kodefikasi_tiket = $id_sub_kodefikasi_tiket");

$sub_categories = [];
while ($row = mysqli_fetch_array($qry_sub_kategori)) {
    $sub_categories[] = $row;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Hardware</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
</head>

<body data-sidebar="dark">
    <?php include "header.php"; ?>

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">
                                <?= !empty($sub_categories) ? $sub_categories[0]['name_kodefikasi_tiket'] : "Data not found" ?>
                            </h4>
                        </div>
                    </div>
                </div>

                <?php if (!empty($sub_categories)): ?>
                    <?php foreach ($sub_categories as $dt_sub_kategori): ?>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4"><?= $dt_sub_kategori['nama_sub_kodefikasi_tiket'] ?></h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mt-4">
                                            <a href="sub-sub-kodefikasi.php?id_sub_kodefikasi_tiket=<?= $dt_sub_kategori['id_sub_kodefikasi_tiket'] ?>"
                                                class="btn btn-primary waves-effect waves-light btn-sm">
                                                Lihat Lebih Lanjut <i class="mdi mdi-arrow-right ms-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No data available for this category.</p>
                <?php endif; ?>
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
