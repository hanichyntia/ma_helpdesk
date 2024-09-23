<!doctype php>
<php lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Tiket</title>
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
                            <!-- Logo untuk mode terang -->
                            <a href="index-admin.php" class="logo logo-ma-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-ma-kecil.png" alt="Logo Small Light" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-ma-light.png" alt="Logo Large Light" height="100">
                                </span>
                            </a>
                        </div>
                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect"
                            id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                    </div>
                    <div class="d-flex">
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1" key="t-henry">Henry</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i
                                        class="bx bx-user font-size-16 align-middle me-1"></i>
                                    <span key="t-profile">Profile</span></a>
                                <a class="dropdown-item d-block" href="#"><i
                                        class="bx bx-wrench font-size-16 align-middle me-1"></i> <span
                                        key="t-settings">Settings</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="#"><i
                                        class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span
                                        key="t-logout">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="vertical-menu">
            <div data-simplebar class="h-100">
                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title" key="t-menu"></li>
                        <li>
                            <a href="index-admin.php" class="waves-effect">
                                <i class="bx bx-file"></i>
                                <span key="t-dashboards">Dashboards</span>
                            </a>
                        </li>
                        <li>
                            <a href="respon-tiket.php" class="waves-effect">
                                <i class="bx bx-file"></i>
                                <span key="t-dashboards">Respon Tiket</span>
                            </a>
                        </li>
                        <li>
                            <a href="kirim-faq.php" class="waves-effect">
                                <i class="bx bx-file"></i>
                                <span key="t-dashboards">Kirim FAQ</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Kirim FAQ</h4>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Form Pengiriman</h4>
                                        <form action="simpan_tiket.php" class="needs-validation" method="post"
                                            id="formSearch" novalidate>

                                            <div class="mb-3">
                                                <label for="judul" class="form-label">Judul :</label>
                                                <textarea id="judul" name="judul" class="form-control" rows="2" placeholder="Masukkan Judul FAQ" required></textarea>
                                                <div class="invalid-feedback">Tolong Masukkan Judul FAQ</div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="deskripsi" class="form-label">Deskripsi :</label>
                                                <textarea id="deskripsi" name="deskripsi" class="form-control" rows="5" placeholder="Masukkan Deskripsi FAQ" required></textarea>
                                                <div class="invalid-feedback">Tolong Masukkan Deskripsi FAQ</div>
                                            </div>

                                            <form action="simpan_tiket.php" class="needs-validation" method="post" id="formSearch" novalidate>
                                            <!-- Form fields -->
                                                <div class="mt-4">
                                                    <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                                                </div>
                                            </form>
                                        </form>
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
                <script>
                    // Mengambil Subkategori saat Kategori dipilih
                    document.getElementById('kategori').addEventListener('change', function () {
                        var kategori = this.value;
                        var subKategoriContainer = document.getElementById('subkategori-container');
                        var subKategoriSelect = document.getElementById('subkategori');

                        if (kategori) {
                            subKategoriContainer.style.display = 'block';

                            fetch('get_subkategori.php?kategori=' + kategori)
                                .then(response => response.json())
                                .then(data => {
                                    subKategoriSelect.innerHTML = '<option value="">Pilih Subkategori</option>';
                                    data.forEach(subkategori => {
                                        subKategoriSelect.innerHTML += `<option value="${subkategori.id}">${subkategori.nama}</option>`;
                                    });
                                });
                        } else {
                            subKategoriContainer.style.display = 'none';
                        }
                    });

                    // Mengambil Detail Subkategori saat Subkategori dipilih
                    document.getElementById('subkategori').addEventListener('change', function () {
                        var subKategori = this.value;
                        var subSubKategoriContainer = document.getElementById('subsubkategori-container');
                        var subSubKategoriSelect = document.getElementById('subsubkategori');

                        if (subKategori) {
                            subSubKategoriContainer.style.display = 'block';

                            fetch('get_subsubkategori.php?subkategori=' + subKategori)
                                .then(response => response.json())
                                .then(data => {
                                    subSubKategoriSelect.innerHTML = '<option value="">Pilih Detail Subkategori</option>';
                                    data.forEach(subsubkategori => {
                                        subSubKategoriSelect.innerHTML += `<option value="${subsubkategori.id}">${subsubkategori.nama}</option>`;
                                    });
                                });
                        } else {
                            subSubKategoriContainer.style.display = 'none';
                        }
                    });
                </script>
                <script>
                document.getElementById('formSearch').addEventListener('submit', function(event) {
                    event.preventDefault(); // Mencegah submit form default
                    // Lakukan validasi di sini jika diperlukan

                    // Setelah submit berhasil, arahkan ke halaman dashboard
                    window.location.href = "index-admin.php";
                });
                </script>
    </body>

</php>