<!doctype php>
<php lang="en">
<head>
    <meta charset="utf-8" />
    <title>Register Akun</title>
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
                                        <h5 class="text-primary">Daftar</h5>
                                        <p>Mohon daftar untuk melanjutkan ke Helpdesk.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <a>
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                <?php
                                include "config.php";

                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                    $nama_user = $_POST['nama_user'] ?? null;
                                    $username = $_POST['username'] ?? null;
                                    $password = $_POST['password'] ?? null;
                                    $hak_akses_user = $_POST['hak_akses_user'] ?? null;

                                    if (empty($nama_user) || empty($username) || empty($hak_akses_user) || empty($password)) {
                                        $error_message = 'Data Tidak Lengkap';
                                    } else {
                                        $check = "SELECT * FROM master_user WHERE username = '$username'";
                                        $result = mysqli_query($conn, $check);

                                        if (mysqli_num_rows($result) > 0) {
                                            $error_message = 'Username sudah ada, silakan pilih username lain.';
                                        } else {
                                            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                                            $query = "INSERT INTO master_user (nama_user, username, hak_akses_user, password) VALUES ('$nama_user', '$username', '$hak_akses_user', '$hashed_password')";

                                            if (mysqli_query($conn, $query)) {
                                                echo "<script>alert('Pendaftaran berhasil!'); location.href='register-hlp.php';</script>";
                                                exit();
                                            } else {
                                                $error_message = 'Terjadi kesalahan saat mendaftar, silakan coba lagi.';
                                            }
                                        }
                                    }
                                }
                                ?>
                                <form class="needs-validation" novalidate method="POST" action="">
                                    <div class="mb-3">
                                        <label for="nama_user" class="form-label">Nama User</label>
                                        <input type="text" class="form-control" id="nama_user" name="nama_user" placeholder="Masukkan nama" required>
                                        <div class="invalid-feedback">Tolong Masukkan Nama</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="email" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
                                        <div class="invalid-feedback">Tolong Masukkan Username</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="userpassword" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="userpassword" name="password" placeholder="Masukkan password" required>
                                        <div class="invalid-feedback">Tolong Masukkan Password</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="hak_akses_user" class="form-label">Hak Akses User</label>
                                        <select id="hak_akses_user" name="hak_akses_user" class="form-select" required>
                                            <option value="" selected disabled>Pilih...</option>
                                            <option value="Mahasiswa">Mahasiswa</option>
                                            <option value="Dosen">Dosen</option>
                                            <option value="Staff">Staff</option>
                                        </select>
                                        <div class="invalid-feedback">Tolong Pilih Hak Akses User</div>
                                    </div>
                                    <div class="mt-4 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Daftar</button>
                                    </div>
                                </form>
                                <?php
                                if (isset($error_message)) {
                                    echo "<div class='alert alert-danger mt-3'>$error_message</div>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>Sudah punya akun? <a href="login-hlp.php" class="fw-medium text-primary">Login</a></p>
                        <p>© <script>document.write(new Date().getFullYear())</script> Helpdesk. Crafted with <i class="mdi mdi-heart text-danger"></i> by Ma Chung</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/js/pages/validation.init.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</php>
