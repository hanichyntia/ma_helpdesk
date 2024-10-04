<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Sistem Informasi Helpdesk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Selamat Datang di Sistem Informasi Helpdesk</h5>
                                        <p>Silahkan isi keluhan anda</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>

                        <div class="p-2">
                            <!-- Form Tiket -->
                            <form action="simpan_tiket.php" class="needs-validation mt-4" method="post" id="formSearch"
                                novalidate onsubmit="checkSpecialCharsOnSubmit(event)">
                                <?php
                                // Cek apakah ada status dan message di URL
                                $status = $_GET['status'] ?? null;
                                $message = $_GET['message'] ?? null;

                                if ($status && $message) {
                                    $alertType = $status == 'success' ? 'alert-success' : 'alert-danger';
                                    echo "<div class='alert $alertType' role='alert'>" . urldecode($message) . "</div>";
                                }
                                ?>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="Masukkan nama" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nim" class="form-label">NIM/NIP</label>
                                    <input type="text" class="form-control" id="nim" name="nim"
                                        placeholder="Masukkan NIM/NIP" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Masukkan email" required>
                                </div>

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

                                <div class="mb-3" id="email-container" style="display:none;">
                                    <label for="reset_email" class="form-label">Email untuk Reset Password:</label>
                                    <input type="email" class="form-control" id="reset_email" name="reset_email"
                                        placeholder="Masukkan email untuk reset password" required>
                                    <div class="invalid-feedback">Tolong Masukkan Email</div>
                                </div>

                                <div class="mb-3" id="keluhan-container">
                                    <label for="keluhan" class="form-label">Keluhan :</label>
                                    <textarea id="keluhan" name="keluhan" class="form-control" rows="3"
                                        placeholder="Masukkan Keluhan Anda" required></textarea>
                                    <div class="invalid-feedback">Tolong Masukkan Keluhan</div>
                                </div>

                                <div class="mt-3 d-grid" id="submit-button-container">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit"
                                        name="login">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal untuk karakter spesial -->
                <div class="modal fade" id="specialCharAlertModal" tabindex="-1" aria-labelledby="specialCharAlertLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="specialCharAlertLabel">Peringatan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Harap tidak menggunakan karakter spesial pada kalimat.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-5 text-center">
                    <p>©
                        <script>
                            document.write(new Date().getFullYear())
                        </script> Helpdesk. Crafted with <i class="mdi mdi-heart text-danger"></i> by Ma Chung
                    </p>
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
    <script>
        function checkSpecialCharsOnSubmit(event) {
            var keluhan = document.getElementById("keluhan").value;
            var nama = document.getElementById("nama").value;
            var nim = document.getElementById("nim").value;

            var specialChars = /[!@#$%^&*(),.?":{}|<>]/g;

            if (specialChars.test(keluhan) || specialChars.test(nama) || specialChars.test(nim)) {
                event.preventDefault();
                var specialCharAlertModal = new bootstrap.Modal(document.getElementById('specialCharAlertModal'));
                specialCharAlertModal.show(); // Tampilkan modal
            }
        }

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

</html>