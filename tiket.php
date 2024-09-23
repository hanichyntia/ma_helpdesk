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
           <?php include "header.php";?>
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Tiket</h4>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Form Keluhan</h4>
                                        <form action="simpan_tiket.php" class="needs-validation" method="post"
                                            id="formSearch" novalidate>
                                            <div class="mb-3">
                                                <label for="kategori" class="form-label">Kategori Masalah</label>
                                                <select id="kategori" name="kategori" class="form-select" required>
                                                    <option value="">Pilih...</option>
                                                    <?php
                                                    include "config.php";
                                                    $qry_kategori = mysqli_query($conn, "SELECT * FROM master_kodefikasi_tiket");
                                                    while ($data_kategori = mysqli_fetch_array($qry_kategori)) {
                                                        echo '<option value="' . $data_kategori['id_kodefikasi_tiket'] . '">' . $data_kategori['name_kodefikasi_tiket'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <div class="invalid-feedback">Tolong Pilih Kategori</div>
                                            </div>

                                            <div class="mb-3" id="subkategori-container" style=" display:none;">
                                                <label for="subkategori" class="form-label">Subkategori</label>
                                                <select id="subkategori" name="subkategori" class="form-select"
                                                    required>
                                                    <option value="">Pilih Subkategori</option>
                                                </select>
                                                <div class="invalid-feedback">Tolong Pilih Subkategori</div>
                                            </div>

                                            <div class="mb-3" id="subsubkategori-container" style=" display:none;">
                                                <label for="subsubkategori" class="form-label">Detail
                                                    Subkategori</label>
                                                <select id="subsubkategori" name="subsubkategori" class="form-select"
                                                    required>
                                                    <option value="" selected disabled>Pilih Detail Subkategori</option>
                                                </select>
                                                <div class="invalid-feedback">Tolong Pilih Detail Subkategori</div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="keluhan" class="form-label">Keluhan :</label>
                                                <textarea id="keluhan" name="keluhan" class="form-control" rows="3"
                                                    placeholder="Masukkan Keluhan Anda" required></textarea>
                                                <div class="invalid-feedback">Tolong Masukkan Keluhan</div>
                                            </div>

                                            <div class="mt-4">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
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
    </body>

</php>