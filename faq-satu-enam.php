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
                    <a href="faq.php" class="logo logo-ma-light">
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
                            <a href="faq.php" class="waves-effect">
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
                            <div class="col-lg-2">
                                <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" role="tab">
                                        <i class="bx bx-question-mark d-block check-nav-icon mt-4 mb-2"></i>
                                        <p class="fw-bold mb-4">1.6. Layanan Sistem Informasi Akademik Mahasiswa</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active">
                                                <h4 class="card-title mb-5">Pertanyaan General</h4>

                                                <div class="faq-box d-flex mb-4">
                                                    <div class="flex-shrink-0 me-3 faq-icon">
                                                        <i class="bx bx-help-circle font-size-20 text-success"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="font-size-15">1.6.1. Reset password akun sistem informasi akademik mahasiswa</h5>
                                                        <div class="d-flex align-items-center">
                                                            <p class="text-muted mb-0 me-2">Layanan Helpdesk untuk sivitas Universitas untuk reset password akun sistem informasi mahasiswa. Berikut adalah form pengajuan untuk reset password akun sistem informasi akademik mahasiswa</p>
                                                            <div class="event-up-icon">
                                                                <a href="tiket.php"><i class="bx bx-right-arrow-circle h3 text-primary"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="faq-box d-flex mb-4">
                                                    <div class="flex-shrink-0 me-3 faq-icon">
                                                        <i class="bx bx-help-circle font-size-20 text-success"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="font-size-15">1.6.2. Akun sistem informasi akademik mahasiswa tidak bisa diakses</h5>
                                                        <div class="d-flex align-items-center">
                                                            <p class="text-muted mb-0 me-2">Layanan Helpdesk untuk sivitas Universitas untuk akun sistem informasi akademik mahasiswa yang tidak bisa di akses. Berikut adalah form pengajuan untuk akun sistem informasi akademik mahasiswa yang tidak bisa diakses</p>
                                                            <div class="event-up-icon">
                                                                <a href="tiket.php"><i class="bx bx-right-arrow-circle h3 text-primary"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="faq-box d-flex mb-4">
                                                    <div class="flex-shrink-0 me-3 faq-icon">
                                                        <i class="bx bx-help-circle font-size-20 text-success"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="font-size-15">1.6.3. Kendala teknis pada akun sistem informasi akademik mahasiswa</h5>
                                                        <div class="d-flex align-items-center">
                                                            <p class="text-muted mb-0 me-2">Layanan Helpdesk untuk sivitas Universitas untuk kendala teknis pada akun sistem informasi akademik mahasiswa. Berikut adalah form pengajuan untuk kendala teknis pada akun sistem informasi akademik mahasiswa</p>
                                                            <div class="event-up-icon">
                                                                <a href="tiket.php"><i class="bx bx-right-arrow-circle h3 text-primary"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="faq-box d-flex mb-4">
                                                    <div class="flex-shrink-0 me-3 faq-icon">
                                                        <i class="bx bx-help-circle font-size-20 text-success"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="font-size-15">1.6.4. Penggunaan sistem informasi akademik mahasiswa</h5>
                                                        <div class="d-flex align-items-center">
                                                            <p class="text-muted mb-0 me-2">Layanan Helpdesk untuk sivitas Universitas untuk sivitas yang ingin mengetahui penggunaan sistem informasi akademik mahasiswa. Berikut adalah playlist video untuk penggunaan sistem informasi akademik mahasiswa</p>
                                                            <div class="event-up-icon">
                                                                <a href="faq-satu-enam-empat.php"><i class="bx bx-right-arrow-circle h3 text-primary"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="faq-box d-flex mb-4">
                                                    <div class="flex-shrink-0 me-3 faq-icon">
                                                        <i class="bx bx-help-circle font-size-20 text-success"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="font-size-15">1.6.5. Pembuatan akun sistem informasi akademik mahasiswa</h5>
                                                        <div class="d-flex align-items-center">
                                                            <p class="text-muted mb-0 me-2">Layanan Helpdesk untuk sivitas Universitas untuk pembuatan akun sistem informasi akademik mahasiswa. Berikut adalah form pengajuan untuk pembuatan akun sistem informasi akademik mahasiswa</p>
                                                            <div class="event-up-icon">
                                                                <a href="tiket.php"><i class="bx bx-right-arrow-circle h3 text-primary"></i></a>
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

    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</php>