<!doctype php>
<php lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Sistem Informasi Helpdesk</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
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
                                            <p>Silahkan log in terlebih dahulu</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="auth-logo">
                                    <a class="auth-logo-light">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="assets/images/logo-light.svg" alt="" class="rounded-circle"
                                                    height="34">
                                            </span>
                                        </div>
                                    </a>

                                    <a class="auth-logo-dark">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="assets/images/logo.svg" alt="" class="rounded-circle"
                                                    height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <?php
                                    session_start(); // Mulai sesi
                                    
                                    include "config.php";

                                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                        $username = $_POST['username'];
                                        $password = $_POST['password'];

                                        // Ambil data pengguna dari database
                                        $login = mysqli_query($conn, "SELECT * FROM master_user WHERE username='$username'");
                                        $cek = mysqli_num_rows($login);

                                        if ($cek > 0) {
                                            $data = mysqli_fetch_assoc($login);

                                            // Verifikasi password
                                            if (password_verify($password, $data['password'])) {
                                                // Set session variables
                                                $_SESSION['id_user'] = $data['id_user'];
                                                $_SESSION['username'] = $username;
                                                $_SESSION['hak_akses_user'] = $data['hak_akses_user'];
                                                $_SESSION['status_login'] = true;

                                                // Redirect sesuai dengan hak akses
                                                switch ($data['hak_akses_user']) {
                                                    case "Mahasiswa":
                                                     case "Dosen":
                                                    case "Staff":
                                                        header("Location: faq.php");
                                                        break;
                                                    case "Admin":
                                                        header("Location: index-admin.php");
                                                        break;
                                                    default:
                                                        header("Location: login-hlp.php?pesan=gagal");
                                                        break;
                                                }
                                                exit;
                                            } else {
                                                echo "<script>alert('Password tidak benar');location.href='login-hlp.php';</script>";
                                            }
                                        } else {
                                            echo "<script>alert('Username tidak ditemukan');location.href='login-hlp.php';</script>";
                                        }
                                    }
                                    ?>


                                    <!-- Form login -->
                                    <form class="form-horizontal" method="POST" action="login-hlp.php">
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                placeholder="Masukkan username" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" name="password"
                                                    placeholder="Masukkan password" aria-label="Password"
                                                    aria-describedby="password-addon" required>
                                                <button class="btn btn-light " type="button" id="password-addon"><i
                                                        class="mdi mdi-eye-outline"></i></button>
                                            </div>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember-check">
                                            <label class="form-check-label" for="remember-check">
                                                Ingat saya
                                            </label>
                                        </div>

                                        <div class="mt-3 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">Log
                                                In</button>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <div>
                                <p>Tidak punya akun? <a href="register-hlp.php" class="fw-medium text-primary">Daftar
                                        sekarang</a></p>
                                <p>©
                                    <script>document.write(new Date().getFullYear())</script> Helpdesk. Crafted with <i
                                        class="mdi mdi-heart text-danger"></i> by Ma Chung
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end account-pages -->

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
    </body>

</php>