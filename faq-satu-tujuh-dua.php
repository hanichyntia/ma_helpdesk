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
                    <div class="d-flex"></div>
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
                                <span key="t-dashboards">FAQ</span>
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
                                        <?php
                                        include "config.php";

                                        $id_master_faq = isset($_GET['id_master_faq']) ? intval($_GET['id_master_faq']) : 0;

                                        $query = "SELECT mf.judul, mf.deskripsi, df.text, df.file FROM master_faq mf
                                                  LEFT JOIN master_detail_faq df ON mf.id_master_faq = df.id_master_faq
                                                  WHERE mf.id_master_faq = $id_master_faq";
                                        $result = $conn->query($query);

                                        if ($result->num_rows > 0) {
                                            $faq = $result->fetch_assoc();
                                        ?>
                                            <h4 class="card-title mb-5">
                                                <?php echo htmlspecialchars($faq['judul']); ?>
                                            </h4>
                                            <?php
                                            do {
                                            ?>
                                                <div class="faq-box d-flex mb-4">
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex flex-column align-items-start">
                                                            <p class="mb-3 me-2"><?php echo htmlspecialchars($faq['text']); ?></p>
                                                            <?php if (!empty($faq['file'])): ?>
                                                                <?php
                                                                $filePath = htmlspecialchars($faq['file']);
                                                                $fileType = pathinfo($filePath, PATHINFO_EXTENSION);

                                                                if (in_array(strtolower($fileType), ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'])): ?>
                                                                    <img src="<?php echo $filePath; ?>" alt="Image" class="img-fluid mb-3" style="width: 50%; display:block; margin-left: auto; margin-right: auto;" />
                                                                <?php endif; ?>
                                                                
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                        <?php
                                            } while ($faq = $result->fetch_assoc());
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

</php>