<?php
include "config.php";

// Mendapatkan id_sub_kodefikasi_tiket dari URL
$id_sub_kodefikasi_tiket = isset($_GET['id_sub_kodefikasi_tiket']) ? intval($_GET['id_sub_kodefikasi_tiket']) : 0;

if ($id_sub_kodefikasi_tiket > 0) {
  // Prepared statement untuk mengambil data sub_sub_kodefikasi_tiket
  $stmt = $conn->prepare("
        SELECT master_sub_sub_kodefikasi_tiket.*, master_sub_kodefikasi_tiket.nama_sub_kodefikasi_tiket 
        FROM master_sub_sub_kodefikasi_tiket
        JOIN master_sub_kodefikasi_tiket 
            ON master_sub_kodefikasi_tiket.id_sub_kodefikasi_tiket = master_sub_sub_kodefikasi_tiket.id_sub_kodefikasi_tiket
        WHERE master_sub_sub_kodefikasi_tiket.id_sub_kodefikasi_tiket = ?
    ");
  if (!$stmt) {
    die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
  }
  $stmt->bind_param("i", $id_sub_kodefikasi_tiket);
  $stmt->execute();
  $result = $stmt->get_result();
} else {
  echo "Invalid ID.";
  exit;
}
?>
<!DOCTYPE html>
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
    <?php include "header.php"; ?>

    <div class="main-content">
      <div class="page-content">
        <div class="container-fluid">
          <!-- Title -->
          <div class="row">
            <div class="col-12">
              <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">FAQs</h4>
              </div>
            </div>
          </div>
          <!-- End Title -->

          <div class="checkout-tabs">
            <div class="row">
              <?php
              // Menggunakan data dari hasil query sebelumnya
              if ($result->num_rows > 0) {
                // Mengambil data pertama untuk judul
                $dt_judul = $result->fetch_assoc();
                ?>
                <div class="col-lg-2">
                  <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" role="tab">
                      <i class="bx bx-question-mark d-block check-nav-icon mt-4 mb-2"></i>
                      <p class="fw-bold mb-4"><?= htmlspecialchars($dt_judul['nama_sub_kodefikasi_tiket']) ?></p>
                    </a>
                  </div>
                </div>

                <div class="col-lg-10">
                  <div class="card">
                    <div class="card-body">
                      <div class="tab-content">
                        <div class="tab-pane fade show active">
                          <h4 class="card-title mb-5">Pertanyaan General</h4>
                          <?php

                          $result->data_seek(0);
                          while ($dt_sub_sub_kategori = $result->fetch_assoc()) {
                            ?>
                            <div class="faq-box d-flex mb-4">
                              <div class="flex-shrink-0 me-3 faq-icon">
                                <i class="bx bx-help-circle font-size-20 text-success"></i>
                              </div>

                              <div class="flex-grow-1">
                                <h5 class="font-size-15">
                                  <?= htmlspecialchars($dt_sub_sub_kategori['nama_sub_sub_kodefikasi_tiket']) ?>
                                </h5>
                                <div class="d-flex align-items-center">
                                  <p class="text-muted mb-0 me-2">
                                    <?= htmlspecialchars($dt_sub_sub_kategori['deskripsi']) ?>
                                  </p>
                                  <div class="event-up-icon">
                                    <a href="tiket.php"><i class="bx bx-right-arrow-circle h3 text-primary"></i></a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <?php
                          }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
              } else {
                echo "<div class='col-12'><p>No records found.</p></div>";
              }
              ?>
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
  </div>

  <!-- Right Sidebar -->
  <div class="right-bar">
    <div data-simplebar class="h-100">
      <div class="rightbar-title d-flex align-items-center px-3 py-4">
        <h5 class="m-0 me-2">Settings</h5>
        <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
          <i class="mdi mdi-close noti-icon"></i>
        </a>
      </div>
      <hr class="mt-0" />
      <h6 class="text-center mb-0">Choose Layouts</h6>
      <div class="p-4">
        <div class="mb-2">
          <img src="assets/images/layouts/layout-1.jpg" class="img-thumbnail" alt="layout images">
        </div>
        <div class="form-check form-switch mb-3">
          <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
          <label class="form-check-label" for="light-mode-switch">Light Mode</label>
        </div>
        <div class="mb-2">
          <img src="assets/images/layouts/layout-2.jpg" class="img-thumbnail" alt="layout images">
        </div>
        <div class="form-check form-switch mb-3">
          <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch">
          <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
        </div>
        <div class="mb-2">
          <img src="assets/images/layouts/layout-3.jpg" class="img-thumbnail" alt="layout images">
        </div>
        <div class="form-check form-switch mb-5">
          <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch">
          <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
        </div>
      </div>
    </div>
  </div>
  <div class="rightbar-overlay"></div>

  <!-- Scripts -->
  <script src="assets/libs/jquery/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/libs/metismenu/metisMenu.min.js"></script>
  <script src="assets/libs/simplebar/simplebar.min.js"></script>
  <script src="assets/libs/node-waves/waves.min.js"></script>
  <script src="assets/js/app.js"></script>
</body>

</html>