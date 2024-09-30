<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>FAQ 1.1 Layanan Email</title>
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
        <?php 
        include "header.php";
        ?>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">FAQs Penggunaan sistem informasi akademik dosen</h4>
                            </div>
                        </div>
                    </div>

                    <div class="checkout-tabs">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-5">Pertanyaan General</h4>

                                        <?php
                                            include "config.php";

                                            $query = "SELECT id_master_faq, judul, deskripsi FROM master_faq WHERE id_sub_sub_kodefikasi_tiket = 29"; 
                                            $result = $conn->query($query);

                                            if ($result->num_rows > 0) {
                                                while($faq = $result->fetch_assoc()) {
                                        ?>
                                        <div class="faq-box d-flex mb-4">
                                            <div class="flex-shrink-0 me-3 faq-icon">
                                                <i class="bx bx-help-circle font-size-20 text-success"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="font-size-15">
                                                    <?php echo htmlspecialchars($faq['judul']); ?>
                                                </h5>
                                                <div class="d-flex align-items-center">
                                                    <p class="mb-0 me-2">
                                                        <?php echo nl2br(htmlspecialchars($faq['deskripsi'])); ?>
                                                    </p>
                                                    <div class="event-up-icon">
                                                        <a href="faq-satu-tujuh-dua.php?id_master_faq=<?php echo $faq['id_master_faq']; ?>"><i class="bx bx-right-arrow-circle h3 text-primary"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                                }
                                            } else {
                                                echo "<p>No FAQs found.</p>";
                                            }
                                        ?>
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
    </div>

    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>
