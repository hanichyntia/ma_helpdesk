<?php
include "config.php";

// Check if id_sub_kodefikasi_tiket is passed via GET and validate it
$id_sub_kodefikasi_tiket = isset($_GET['id_sub_kodefikasi_tiket']) ? intval($_GET['id_sub_kodefikasi_tiket']) : 0;

if ($id_sub_kodefikasi_tiket > 0) {
    // Prepare the query to fetch data for the specific id_sub_kodefikasi_tiket
    $stmt = $conn->prepare("
        SELECT master_sub_sub_kodefikasi_tiket.*, master_sub_kodefikasi_tiket.nama_sub_kodefikasi_tiket 
        FROM master_sub_sub_kodefikasi_tiket
        JOIN master_sub_kodefikasi_tiket 
            ON master_sub_kodefikasi_tiket.id_sub_kodefikasi_tiket = master_sub_sub_kodefikasi_tiket.id_sub_kodefikasi_tiket
        WHERE master_sub_sub_kodefikasi_tiket.id_sub_kodefikasi_tiket = ?
    ");
    $stmt->bind_param("i", $id_sub_kodefikasi_tiket);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    echo "Invalid ID.";
    exit;
}
?>
<!doctype php>
<php lang="en">

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
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <div class="navbar-brand-box">
                    <a href="index.php" class="logo logo-ma-light">
                            <span class="logo-sm">
                                <img src="assets/images/logo-ma-kecil.png" alt="Logo Small Light" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-ma-light.png" alt="Logo Large Light" height="100">
                            </span>
                    </a>
                    </div>
                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </div>
                <div class="d-flex">

                    </div>
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1" key="t-henry">Henry</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>
                            <a class="dropdown-item d-block" href="#"><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-settings">Settings</span></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="#"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="vertical-menu">
            <div data-simplebar class="h-100">
                <div id="sidebar-menu">
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title" key="t-menu"></li>
                        <li>
                            <a href="index.php" class="waves-effect">
                                <i class="bx bx-file"></i>
                                <span key="t-dashboards">Dashboards</span>
                            </a>
                        </li>
                        <li>  
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-detail"></i>
                                    <span key="t-tiket">Tiket</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="tiket.php" key="t-tiket">Kirim Tiket</a></li>
                                    <li><a href="lihat-tiket.php" key="t-lihat">Lihat Tiket</a></li>
                                </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">FAQs</h4>
                            </div>
                        </div>
                    </div>

                    <div class="checkout-tabs">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                                <h4 class="card-title mb-5">Pertanyaan General</h4>

                                                <div class="faq-box d-flex mb-4">
                                                    <div class="flex-shrink-0 me-3 faq-icon">
                                                        <i class="bx bx-help-circle font-size-20 text-success"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="font-size-15">Mengakses MAC IS mahasiswa</h5>
                                                        <div class="d-flex align-items-center">
                                                            <p class="text-muted mb-0 me-2">Layanan Helpdesk untuk sivitas Universitas mengakses MAC IS mahasiswa. Berikut adalah FAQ untuk mengakses MAC IS mahasiswa</p>
                                                            <div class="event-up-icon">
                                                                <a href="mengakses-mac.php"><i class="bx bx-right-arrow-circle h3 text-primary"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="faq-box d-flex mb-4">
                                                    <div class="flex-shrink-0 me-3 faq-icon">
                                                        <i class="bx bx-help-circle font-size-20 text-success"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="font-size-15">Melihat dashboard mahasiswa</h5>
                                                        <div class="d-flex align-items-center">
                                                            <p class="text-muted mb-0 me-2">Layanan Helpdesk untuk sivitas Universitas melihat dashboard mahasiswa. Berikut adalah FAQ untuk melihat dashboard mahasiswa</p>
                                                            <div class="event-up-icon">
                                                                <a href="melihat-dashboard.php"><i class="bx bx-right-arrow-circle h3 text-primary"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="faq-box d-flex mb-4">
                                                    <div class="flex-shrink-0 me-3 faq-icon">
                                                        <i class="bx bx-help-circle font-size-20 text-success"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="font-size-15">Melihat kalender akademik</h5>
                                                        <div class="d-flex align-items-center">
                                                            <p class="text-muted mb-0 me-2">Layanan Helpdesk untuk sivitas Universitas melihat kalender akademik. Berikut adalah FAQ untuk melihat kalender akademik</p>
                                                            <div class="event-up-icon">
                                                                <a href="melihat-kalender.php"><i class="bx bx-right-arrow-circle h3 text-primary"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="faq-box d-flex mb-4">
                                                    <div class="flex-shrink-0 me-3 faq-icon">
                                                        <i class="bx bx-help-circle font-size-20 text-success"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="font-size-15">Melihat KRS mata kuliah</h5>
                                                        <div class="d-flex align-items-center">
                                                            <p class="text-muted mb-0 me-2">Layanan Helpdesk untuk sivitas Universitas melihat KRS mata kuliah. Berikut adalah FAQ untuk melihat KRS mata kuliah</p>
                                                            <div class="event-up-icon">
                                                                <a href="melihat-krs.php"><i class="bx bx-right-arrow-circle h3 text-primary"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="faq-box d-flex mb-4">
                                                    <div class="flex-shrink-0 me-3 faq-icon">
                                                        <i class="bx bx-help-circle font-size-20 text-success"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="font-size-15">Melihat presensi kehadiran</h5>
                                                        <div class="d-flex align-items-center">
                                                            <p class="text-muted mb-0 me-2">Layanan Helpdesk untuk sivitas Universitas melihat presensi kehadiran. Berikut adalah FAQ untuk melihat presensi kehadiran</p>
                                                            <div class="event-up-icon">
                                                                <a href="melihat-presensi.php"><i class="bx bx-right-arrow-circle h3 text-primary"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="faq-box d-flex mb-4">
                                                    <div class="flex-shrink-0 me-3 faq-icon">
                                                        <i class="bx bx-help-circle font-size-20 text-success"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="font-size-15">Melihat nilai mata kuliah</h5>
                                                        <div class="d-flex align-items-center">
                                                            <p class="text-muted mb-0 me-2">Layanan Helpdesk untuk sivitas Universitas melihat nilai mata kuliah. Berikut adalah FAQ untuk melihat nilai mata kuliah</p>
                                                            <div class="event-up-icon">
                                                                <a href="melihat-nilai.php"><i class="bx bx-right-arrow-circle h3 text-primary"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="faq-box d-flex mb-4">
                                                    <div class="flex-shrink-0 me-3 faq-icon">
                                                        <i class="bx bx-help-circle font-size-20 text-success"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="font-size-15">Menambahkan poin keaktifan</h5>
                                                        <div class="d-flex align-items-center">
                                                            <p class="text-muted mb-0 me-2">Layanan Helpdesk untuk sivitas Universitas menambahkan poin keaktifan. Berikut adalah FAQ untuk menambahkan poin keaktifan</p>
                                                            <div class="event-up-icon">
                                                                <a href="menambahkan-poin.php"><i class="bx bx-right-arrow-circle h3 text-primary"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="faq-box d-flex mb-4">
                                                    <div class="flex-shrink-0 me-3 faq-icon">
                                                        <i class="bx bx-help-circle font-size-20 text-success"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="font-size-15">Melihat detail rekapitulasi poin keaktifan</h5>
                                                        <div class="d-flex align-items-center">
                                                            <p class="text-muted mb-0 me-2">Layanan Helpdesk untuk sivitas Universitas melihat detail rekapitulasi poin keaktifan. Berikut adalah FAQ untuk melihat detail rekapitulasi poin keaktifan</p>
                                                            <div class="event-up-icon">
                                                                <a href="melihat-detail.php"><i class="bx bx-right-arrow-circle h3 text-primary"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="faq-box d-flex mb-4">
                                                    <div class="flex-shrink-0 me-3 faq-icon">
                                                        <i class="bx bx-help-circle font-size-20 text-success"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="font-size-15">Melihat log aktivitas PKL</h5>
                                                        <div class="d-flex align-items-center">
                                                            <p class="text-muted mb-0 me-2">Layanan Helpdesk untuk sivitas Universitas melihat log aktivitas PKL. Berikut adalah FAQ untuk melihat log aktivitas PKL</p>
                                                            <div class="event-up-icon">
                                                                <a href="melihat-log-pkl.php"><i class="bx bx-right-arrow-circle h3 text-primary"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="faq-box d-flex mb-4">
                                                    <div class="flex-shrink-0 me-3 faq-icon">
                                                        <i class="bx bx-help-circle font-size-20 text-success"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="font-size-15">Melihat log aktivitas tugas akhir</h5>
                                                        <div class="d-flex align-items-center">
                                                            <p class="text-muted mb-0 me-2">Layanan Helpdesk untuk sivitas Universitas melihat log aktivitas tugas akhir. Berikut adalah FAQ untuk melihat log aktivitas tugas akhir</p>
                                                            <div class="event-up-icon">
                                                                <a href="melihat-log-ta.php"><i class="bx bx-right-arrow-circle h3 text-primary"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="faq-box d-flex mb-4">
                                                    <div class="flex-shrink-0 me-3 faq-icon">
                                                        <i class="bx bx-help-circle font-size-20 text-success"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="font-size-15">Memperbarui biodata mahasiswa</h5>
                                                        <div class="d-flex align-items-center">
                                                            <p class="text-muted mb-0 me-2">Layanan Helpdesk untuk sivitas Universitas memperbarui biodata mahasiswa. Berikut adalah FAQ untuk memperbarui biodata mahasiswa</p>
                                                            <div class="event-up-icon">
                                                                <a href="memperbarui-biodata.php"><i class="bx bx-right-arrow-circle h3 text-primary"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="faq-box d-flex mb-4">
                                                    <div class="flex-shrink-0 me-3 faq-icon">
                                                        <i class="bx bx-help-circle font-size-20 text-success"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="font-size-15">Mengubah password akun</h5>
                                                        <div class="d-flex align-items-center">
                                                            <p class="text-muted mb-0 me-2">Layanan Helpdesk untuk sivitas Universitas mengubah password akun. Berikut adalah FAQ untuk mengubah password akun</p>
                                                            <div class="event-up-icon">
                                                                <a href="mengubah-password.php"><i class="bx bx-right-arrow-circle h3 text-primary"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="faq-box d-flex mb-4">
                                                    <div class="flex-shrink-0 me-3 faq-icon">
                                                        <i class="bx bx-help-circle font-size-20 text-success"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="font-size-15">Mengisikan angket perkuliahan</h5>
                                                        <div class="d-flex align-items-center">
                                                            <p class="text-muted mb-0 me-2">Layanan Helpdesk untuk sivitas Universitas mengisikan angket perkuliahan. Berikut adalah FAQ untuk mengisikan angket perkuliahan</p>
                                                            <div class="event-up-icon">
                                                                <a href="mengisikan-angket.php"><i class="bx bx-right-arrow-circle h3 text-primary"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="faq-box d-flex mb-4">
                                                    <div class="flex-shrink-0 me-3 faq-icon">
                                                        <i class="bx bx-help-circle font-size-20 text-success"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="font-size-15">Mendaftar program Ma Chung Merdeka (MBKM)</h5>
                                                        <div class="d-flex align-items-center">
                                                            <p class="text-muted mb-0 me-2">Layanan Helpdesk untuk sivitas Universitas mendaftar program Ma Chung Merdeka (MBKM). Berikut adalah FAQ untuk mendaftar program Ma Chung Merdeka (MBKM)</p>
                                                            <div class="event-up-icon">
                                                                <a href="mendaftar-mbkm.php"><i class="bx bx-right-arrow-circle h3 text-primary"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="faq-box d-flex mb-4">
                                                    <div class="flex-shrink-0 me-3 faq-icon">
                                                        <i class="bx bx-help-circle font-size-20 text-success"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="font-size-15">Melihat pendaftaran Ma Chung Merdeka (MBKM)</h5>
                                                        <div class="d-flex align-items-center">
                                                            <p class="text-muted mb-0 me-2">Layanan Helpdesk untuk sivitas Universitas melihat pendaftaran Ma Chung Merdeka (MBKM). Berikut adalah FAQ untuk melihat pendaftaran Ma Chung Merdeka (MBKM)</p>
                                                            <div class="event-up-icon">
                                                                <a href="melihat-mbkm.php"><i class="bx bx-right-arrow-circle h3 text-primary"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="faq-box d-flex mb-4">
                                                    <div class="flex-shrink-0 me-3 faq-icon">
                                                        <i class="bx bx-help-circle font-size-20 text-success"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="font-size-15">Pengelolaan log kegiatan Ma Chung Merdeka (MBKM)</h5>
                                                        <div class="d-flex align-items-center">
                                                            <p class="text-muted mb-0 me-2">Layanan Helpdesk untuk sivitas Universitas mengelola log kegiatan Ma Chung Merdeka (MBKM). Berikut adalah FAQ untuk pengelolaan log kegiatan Ma Chung Merdeka (MBKM)</p>
                                                            <div class="event-up-icon">
                                                                <a href="pengelolaan-log-mbkm.php"><i class="bx bx-right-arrow-circle h3 text-primary"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

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

</php>