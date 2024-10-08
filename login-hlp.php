<?php
$error_message = ''; // Variabel untuk menyimpan pesan error

include 'config.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username)) {
        $error_message = 'Username tidak boleh kosong'; // Pesan error jika username kosong
    } elseif (empty($password)) {
        $error_message = 'Password tidak boleh kosong'; // Pesan error jika password kosong
    } else {
        // Query ke database untuk mencocokkan username dan password
        $qry_login = mysqli_query($conn, "SELECT * FROM master_user WHERE username = '" . $username . "' AND password = '" . $password . "'");

        if (mysqli_num_rows($qry_login) > 0) {
            $dt_login = mysqli_fetch_array($qry_login);

            session_start();
            $_SESSION['user_id'] = $dt_login['id'];
            $_SESSION['status_login'] = true;
            header("location: index-admin.php");
        } else {
            $error_message = 'Username atau password tidak benar'; // Pesan error jika login gagal
        }
    }
}
?>


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
                                        <p>Silahkan log in terlebih dahulu</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="p-2">
                                <?php if ($error_message != ''): ?>
                                    <div class="alert alert-danger">
                                        <?php echo $error_message; ?>
                                    </div>
                                <?php endif; ?>


                                <!-- Form Login -->
                                <form class="form-horizontal" method="POST" action="login-hlp.php">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            placeholder="Masukkan username" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Masukkan password" required>
                                    </div>
                                    <div class="mt-3 d-grid" id="submit-button-container">
                                        <button class="btn btn-primary waves-effect waves-light"
                                            type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Card Gabungan -->

                    <div class="mt-5 text-center">
                        <p>©
                            <script>document.write(new Date().getFullYear())</script> Helpdesk. Crafted with <i
                                class="mdi mdi-heart text-danger"></i> by Ma Chung
                        </p>
                    </div>
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
</body>

</html>