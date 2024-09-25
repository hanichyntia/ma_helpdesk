<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Master FAQ</title>
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
                                <h4 class="mb-sm-0 font-size-18">Master FAQ</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Form Pengiriman</h4>
                                    <form action="simpan-faq.php" method="post" id="formSearch" enctype="multipart/form-data" novalidate>
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

                                        <div class="mb-3" id="subkategori-container" style="display:none;">
                                            <label for="subkategori" class="form-label">Subkategori</label>
                                            <select id="subkategori" name="subkategori" class="form-select" required>
                                                <option value="">Pilih Subkategori</option>
                                            </select>
                                            <div class="invalid-feedback">Tolong Pilih Subkategori</div>
                                        </div>

                                        <div class="mb-3" id="subsubkategori-container" style="display:none;">
                                            <label for="subsubkategori" class="form-label">Detail Subkategori</label>
                                            <select id="subsubkategori" name="subsubkategori" class="form-select" required>
                                                <option value="" selected disabled>Pilih Detail Subkategori</option>
                                            </select>
                                            <div class="invalid-feedback">Tolong Pilih Detail Subkategori</div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="judul" class="form-label">Judul :</label>
                                            <textarea id="judul" name="judul" class="form-control" rows="2" placeholder="Masukkan Judul FAQ" required></textarea>
                                            <div class="invalid-feedback">Tolong Masukkan Judul FAQ</div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="deskripsi" class="form-label">Deskripsi :</label>
                                            <textarea id="deskripsi" name="deskripsi" class="form-control" rows="2" placeholder="Masukkan Deskripsi FAQ" required></textarea>
                                            <div class="invalid-feedback">Tolong Masukkan Deskripsi FAQ</div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Dokumen</label>
                                            <div id="dokumen-container"></div>
                                            <button type="button" id="add-document-button" class="btn btn-secondary">Add Document</button>
                                            <div id="error-message" class="alert alert-danger mt-3" style="display: none;">
                                                <p class="mb-0">Please add at least one document with a document name.</p>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
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

            // Function to add new document group
            document.getElementById('add-document-button').addEventListener('click', function() {
                var index = document.querySelectorAll('#dokumen-container .document-group').length;
                var container = document.getElementById('dokumen-container');

                // Create new document group HTML
                var html = `
                    <div class="document-group" id="document-group-${index}">
                        <label for="keterangan${index}" class="form-label">Deskripsi Dokumen ${index + 1}</label>
                        <textarea name="keterangan${index}" class="form-control" rows="3" placeholder="Deskripsi Dokumen" required></textarea>

                        <label for="dokumen${index}" class="form-label">Upload Dokumen ${index + 1}</label>
                        <input type="file" name="dokumen${index}" class="form-control mb-2" required>

                        <button type="button" class="btn btn-danger delete-document-button" data-id="${index}">Hapus Dokumen</button>
                        <hr>
                    </div>
                `;

                // Add new document group to the container
                container.insertAdjacentHTML('beforeend', html);

                // Add event listener for delete button
                var deleteButtons = document.querySelectorAll('.delete-document-button');
                deleteButtons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        var id = this.getAttribute('data-id');
                        document.getElementById(`document-group-${id}`).remove();
                    });
                });
            });

            // Validate the form on submission
            document.getElementById('formSearch').addEventListener('submit', function(event) {
                var valid = true;
                var documentGroups = document.querySelectorAll('.document-group');
                documentGroups.forEach(function(group) {
                    var textarea = group.querySelector('textarea');
                    var fileInput = group.querySelector('input[type="file"]');

                    if (!textarea.value || !fileInput.files.length) {
                        valid = false;
                    }
                });

                if (!valid) {
                    event.preventDefault();
                    document.getElementById('error-message').style.display = 'block';
                }
            });
        </script>
    </body>
</html>
