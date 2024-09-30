<?php
    include "config.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama_user = $_POST['nama_user'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hak_akses_user = $_POST['hak_akses_user'];

        if (empty($nama_user) || empty($username) || empty($jabatan) || empty($password)) {
            echo "<script>alert('Data Tidak Lengkap'); location.href='';</script>";
        } else {
            $check = "SELECT * FROM master_users WHERE username = '$username'";
            $result = mysqli_query($conn, $check);

            if (mysqli_num_rows($result) > 0) {
                echo "<script>alert('Username sudah ada, silakan pilih username lain.'); location.href='';</script>";
            } else {
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);

                $query = "INSERT INTO master_users (nama_user, username, hak_akses_user, password) VALUES ('$nama_user', '$username', '$jabatan', '$hashed_password')";

                if (mysqli_query($conn, $query)) {
                    echo "<script>alert('Pendaftaran berhasil!'); location.href='auth-login-hlp.php';</script>";
                } else {
                    echo "<script>alert('Terjadi kesalahan saat mendaftar, silakan coba lagi.'); location.href='';</script>";
                }
            }
        }
    }
?>