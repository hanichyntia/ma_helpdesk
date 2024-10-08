<?php
include "config.php";

// Initialize the keluhan variable
$keluhan = '';

$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($id) {
    // Query to get user complaints
    $stmt = mysqli_prepare($conn, "SELECT keluhan FROM transaksi_tiket WHERE id_transaksi_tiket = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $keluhan);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Respon</title>
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
        <?php include "header-admin.php"; ?>
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Respon</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Respon Keluhan</h4>
                                    <?php if (isset($_GET['status'])): ?>
                                        <div class="alert alert-<?php echo ($_GET['status'] == 'success') ? 'success' : 'danger'; ?> alert-dismissible fade show"
                                            role="alert">
                                            <?php echo htmlspecialchars($_GET['message']); ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    <?php endif; ?>
                                    <form action="update-status.php?id=<?php echo htmlspecialchars($id); ?>"
                                        method="POST">
                                        <div class="mb-3">
                                            <label for="status_tiket" class="form-label">Status Tiket</label>
                                            <select id="status_tiket" name="id_status_tiket" class="form-select"
                                                required>
                                                <?php
                                                $qry_status = mysqli_query($conn, "SELECT * FROM master_status_tiket");
                                                echo '<option value="" selected disabled>Pilih...</option>';
                                                while ($data_status = mysqli_fetch_array($qry_status)) {
                                                    // Exclude option with ID 1 (Telah Diterima)
                                                    if ($data_status['id'] != 1) {
                                                        echo '<option value="' . $data_status['id'] . '">' . htmlspecialchars($data_status['jenis_status_tiket']) . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <div class="invalid-feedback">Tolong Pilih Status</div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="formmessage">Keluhan User</label>
                                            <textarea id="formmessage" class="form-control" rows="3"
                                                readonly><?php echo htmlspecialchars($keluhan); ?></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="respon_admin">Respon</label>
                                            <textarea id="respon_admin" name="respon_admin" class="form-control"
                                                rows="3" placeholder="Enter Your Response"></textarea>
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
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
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Helpdesk.
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
        <script>
            document.getElementById('status_tiket').addEventListener('change', function () {
                var statusTiket = this.value;
                var responAdmin = document.getElementById('respon_admin');

                // Set readonly based on the status ticket
                if (statusTiket == '2') { // '2' is assumed to be "Menunggu Respon"
                    responAdmin.setAttribute('readonly', 'readonly');
                } else {
                    responAdmin.removeAttribute('readonly');
                }
            });

            // Check status on page load
            (function () {
                var statusTiket = document.getElementById('status_tiket').value;
                var responAdmin = document.getElementById('respon_admin');

                if (statusTiket == '2') { // '2' is assumed to be "Menunggu Respon"
                    responAdmin.setAttribute('readonly', 'readonly');
                }
            })();
        </script>
</body>

</html>