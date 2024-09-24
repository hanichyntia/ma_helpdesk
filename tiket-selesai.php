<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Progress Pengajuan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <!-- Custom Css for centering the id_rating -->
    <style>
        .center-content {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .id_rating-description {
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="p-2">
                                <div class="text-center">
                                    <div class="avatar-md mx-auto">
                                        <div class="avatar-title rounded-circle bg-light">
                                            <i class="bx bx-badge-check h1 mb-0 text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="p-2 mt-4">
                                        <h4>Selesai</h4>
                                        <p class="text-muted">Keluhan sudah teratasi</p>
                                        <div class="center-content">
                                            <h5 class="font-size-15 mb-3">Mohon beri id_rating</h5>
                                            
                                            <!-- id_rating Form -->
                                            <form action="" method="POST">
                                                <div class="col-xl-3 col-sm-6">
                                                    <div class="mt-4">
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" type="radio" name="id_rating" value="1" id="formRadios1" required>
                                                            <label class="form-check-label" for="formRadios1">
                                                                1 = Buruk Sekali
                                                            </label>
                                                        </div>
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" type="radio" name="id_rating" value="2" id="formRadios2">
                                                            <label class="form-check-label" for="formRadios2">
                                                                2 = Buruk
                                                            </label>
                                                        </div>
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" type="radio" name="id_rating" value="3" id="formRadios3">
                                                            <label class="form-check-label" for="formRadios3">
                                                                3 = Cukup
                                                            </label>
                                                        </div>
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" type="radio" name="id_rating" value="4" id="formRadios4">
                                                            <label class="form-check-label" for="formRadios4">
                                                                4 = Bagus
                                                            </label>
                                                        </div>
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" type="radio" name="id_rating" value="5" id="formRadios5">
                                                            <label class="form-check-label" for="formRadios5">
                                                                5 = Bagus Sekali
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Submit Button -->
                                                <div class="mt-4">
                                                    <button type="submit" name="submit_id_rating" class="btn btn-primary" formaction="faq.php">Kirim</button>
                                                </div>
                                            </form>

                                            <?php
                                            include "config.php";

                                            if (isset($_POST['submit_id_rating'])) {
                                                $id_rating = $_POST['id_rating'];
                                                $id_transaksi_tiket = intval($_GET['id_transaksi_tiket']);

                                                $sql = "UPDATE transaksi_tiket SET id_rating = ? WHERE id_transaksi_tiket = ?";
                                                $stmt = $conn->prepare($sql);
                                                $stmt->bind_param("ii", $id_rating, $id_transaksi_tiket);

                                                if ($stmt->execute()) {
                                                    echo "<p class='text-success mt-3'>Terima kasih atas id_rating Anda!</p>";
                                                } else {
                                                    echo "<p class='text-danger mt-3'>Gagal mengirim id_rating.</p>";
                                                }

                                                $stmt->close();
                                            }
                                            ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 text-center">
                        <p>©
                            <script>document.write(new Date().getFullYear())</script> Helpdesk. Crafted with <i class="mdi mdi-heart text-danger"></i> by Ma Chung
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>
