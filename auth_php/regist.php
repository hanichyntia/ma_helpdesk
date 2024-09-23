<?php
session_start();
include "connection.php";

$name = $_POST['name'];
$username = $_POST['username'];
$role = $_POST['role'];
$password = $_POST['password'];

if (empty($name) || empty($username) || empty($role) || empty($password)) {
    echo "<script>alert('Data Tidak Lengkap'); location.href='';</script>";
} else {

    $check = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $check);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Username sudah ada, silakan pilih username lain.'); location.href='';</script>";
    } else {
        
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO users (name, username, role, password) VALUES ('$name', '$username', '$role', '$hashed_password')";
        
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Pendaftaran berhasil!'); location.href='login.php';</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan saat mendaftar, silakan coba lagi.'); location.href='';</script>";
        }
    }
}
?>
